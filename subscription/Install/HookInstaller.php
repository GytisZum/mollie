<?php

declare(strict_types=1);

namespace Mollie\Subscription\Install;

use Mollie;
use Mollie\Subscription;

class HookInstaller extends AbstractInstaller
{
    /** @var Mollie */
    private $module;

    public function __construct(
        Mollie $module
    ) {
        $this->module = $module;
    }

    public function install(): bool
    {
        $this->module->registerHook($this->getHooks());

        return true;
    }

    /**
     * @return string[]
     */
    private function getHooks(): array
    {
        return [
            'actionFrontControllerSetMedia',
            'actionValidateOrder',
            'actionMollieSequenceType',
        ];
    }
}
