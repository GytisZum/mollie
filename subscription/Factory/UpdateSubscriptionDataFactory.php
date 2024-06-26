<?php
/**
 * Mollie       https://www.mollie.nl
 *
 * @author      Mollie B.V. <info@mollie.nl>
 * @copyright   Mollie B.V.
 * @license     https://github.com/mollie/PrestaShop/blob/master/LICENSE.md
 *
 * @see        https://github.com/mollie/PrestaShop
 * @codingStandardsIgnoreStart
 */

declare(strict_types=1);

namespace Mollie\Subscription\Factory;

use Mollie\Subscription\Api\Request\UpdateSubscriptionRequest;
use MolRecurringOrder;

if (!defined('_PS_VERSION_')) {
    exit;
}

class UpdateSubscriptionDataFactory
{
    public function build(MolRecurringOrder $subscription, string $mandateId): UpdateSubscriptionRequest
    {
        return new UpdateSubscriptionRequest($subscription->mollie_customer_id, $subscription->mollie_subscription_id, $mandateId);
    }
}
