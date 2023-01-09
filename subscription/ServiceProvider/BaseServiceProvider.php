<?php

declare(strict_types=1);

namespace Mollie\Subscription\ServiceProvider;

use League\Container\Container;
use Mollie;
use Mollie\Factory\ModuleFactory;
use Mollie\Provider\CreditCardLogoProvider;
use Mollie\Provider\CustomLogoProviderInterface;
use Mollie\Provider\PhoneNumberProvider;
use Mollie\Provider\PhoneNumberProviderInterface;
use Mollie\Provider\UpdateMessageProvider;
use Mollie\Provider\UpdateMessageProviderInterface;
use Mollie\Repository\MolCustomerRepository;
use Mollie\Repository\PaymentMethodRepository;
use Mollie\Repository\PaymentMethodRepositoryInterface;
use Mollie\Service\Content\SmartyTemplateParser;
use Mollie\Service\Content\TemplateParserInterface;
use Mollie\Service\PaymentMethod\PaymentMethodRestrictionValidation;
use Mollie\Service\PaymentMethod\PaymentMethodRestrictionValidationInterface;
use Mollie\Service\PaymentMethod\PaymentMethodSortProvider;
use Mollie\Service\PaymentMethod\PaymentMethodSortProviderInterface;
use Mollie\Subscription\Factory\CreateSubscriptionData;
use Mollie\Subscription\Install\AttributeUninstaller;
use Mollie\Subscription\Install\DatabaseTableUninstaller;
use Mollie\Subscription\Install\Uninstaller;
use Mollie\Subscription\Logger\LoggerInterface;
use Mollie\Subscription\Logger\NullLogger;
use Mollie\Subscription\Provider\SubscriptionDescription;
use Mollie\Subscription\Provider\SubscriptionInterval;
use Mollie\Subscription\Repository\Combination;
use Mollie\Subscription\Repository\Currency as CurrencyAdapter;
use Mollie\Subscription\Repository\SubscriptionRepository;
use Mollie\Subscription\Repository\SubscriptionRepositoryInterface;
use Mollie\Subscription\Utility\Clock;
use Mollie\Subscription\Utility\ClockInterface;

/**
 * Load base services here which are usually required
 */
final class BaseServiceProvider
{
    private $extendedServices;

    public function __construct($extendedServices)
    {
        $this->extendedServices = $extendedServices;
    }

    public function register(Container $container)
    {
        /* Logger */
        $this->addService($container, LoggerInterface::class, $container->get(NullLogger::class));
        /* Utility */
        $this->addService($container, ClockInterface::class, $container->get(Clock::class));

        $this->addService($container, PaymentMethodRepositoryInterface::class, $container->get(PaymentMethodRepository::class));
        $this->addService($container, MolCustomerRepository::class, MolCustomerRepository::class)
            ->withArgument('MolCustomer');
        $this->addService($container, Uninstaller::class, Uninstaller::class)
            ->withArgument(DatabaseTableUninstaller::class)
            ->withArgument(AttributeUninstaller::class);

        $this->addService($container, CreateSubscriptionData::class, CreateSubscriptionData::class)
            ->withArgument(MolCustomerRepository::class)
            ->withArgument(SubscriptionInterval::class)
            ->withArgument(SubscriptionDescription::class)
            ->withArgument(CurrencyAdapter::class)
            ->withArgument(Combination::class)
            ->withArgument(PaymentMethodRepositoryInterface::class);

        $this->addService($container, SubscriptionRepositoryInterface::class, SubscriptionRepository::class)
            ->withArgument('MolSubRecurringOrder');

        $this->addService($container, TemplateParserInterface::class, SmartyTemplateParser::class);

        $this->addService($container, UpdateMessageProviderInterface::class, UpdateMessageProvider::class)
            ->withArgument(Mollie::class);

        $this->addService($container, PaymentMethodSortProviderInterface::class, PaymentMethodSortProvider::class);
        $this->addService($container, PhoneNumberProviderInterface::class, PhoneNumberProvider::class);
        $this->addService($container, PaymentMethodRestrictionValidationInterface::class, PaymentMethodRestrictionValidation::class)
            ->withArgument([
                '@Mollie\Service\PaymentMethod\PaymentMethodRestrictionValidation\BasePaymentMethodRestrictionValidator',
                '@Mollie\Service\PaymentMethod\PaymentMethodRestrictionValidation\VoucherPaymentMethodRestrictionValidator',
                '@Mollie\Service\PaymentMethod\PaymentMethodRestrictionValidation\EnvironmentVersionSpecificPaymentMethodRestrictionValidator',
                '@Mollie\Service\PaymentMethod\PaymentMethodRestrictionValidation\ApplePayPaymentMethodRestrictionValidator'
            ]);

        $this->addService($container, CustomLogoProviderInterface::class, CreditCardLogoProvider::class)
            ->withArgument(ModuleFactory::class);

        //todo: Try to make it work without prestashop container in services.yml. Skipping now because its taking to much time
//        $this->addService($container, HookDispatcherInterface::class, HookDispatcher::class);
//
//        $this->addService($container, SubscriptionGridQueryBuilder::class, SubscriptionGridQueryBuilder::class)
//            ->withArgument(Connection::class)
//            ->withArgument('ps_') //todo: change to adapter
//            ->withArgument('@prestashop.core.query.doctrine_search_criteria_applicator')
//        ;
//
//        $this->addService($container, SubscriptionGridDefinitionFactory::class, DoctrineGridDataFactory::class)
//            ->withArgument(SubscriptionGridQueryBuilder::class)
//            ->withArgument('@prestashop.core.hook.dispatcher')
//            ->withArgument('@prestashop.core.grid.query.doctrine_query_parser')
//            ->withArgument('invertus_mollie_subscription')
//            ->withArgument(HookDispatcher::class)
//            ->withArgument(\MollieSubscription::class)
//        ;

//        $this->addService($container, GridFactory::class, GridFactory::class)
//            ->withArgument(SubscriptionGridDefinitionFactory::class)
//            ->withArgument(SubscriptionGridQueryBuilder::class)
//            ->withArgument('@prestashop.core.grid.filter.form_factory')
//            ->withArgument('@prestashop.core.hook.dispatcher')
//        ;
    }

    private function addService(Container $container, $className, $service)
    {
        return $container->add($className, $this->getService($className, $service));
    }

    //NOTE need to call this as extended services should be initialized everywhere.
    public function getService($className, $service)
    {
        if (isset($this->extendedServices[$className])) {
            return $this->extendedServices[$className];
        }

        return $service;
    }
}
