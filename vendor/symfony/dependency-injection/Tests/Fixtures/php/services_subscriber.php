<?php

namespace _PhpScoper5ea00cc67502b;

use _PhpScoper5ea00cc67502b\Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use _PhpScoper5ea00cc67502b\Symfony\Component\DependencyInjection\ContainerInterface;
use _PhpScoper5ea00cc67502b\Symfony\Component\DependencyInjection\Container;
use _PhpScoper5ea00cc67502b\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use _PhpScoper5ea00cc67502b\Symfony\Component\DependencyInjection\Exception\LogicException;
use _PhpScoper5ea00cc67502b\Symfony\Component\DependencyInjection\Exception\RuntimeException;
use _PhpScoper5ea00cc67502b\Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
use _PhpScoper5ea00cc67502b\Symfony\Component\DependencyInjection\ServiceLocator;
use _PhpScoper5ea00cc67502b\Symfony\Component\DependencyInjection\Tests\Fixtures\CustomDefinition;
use _PhpScoper5ea00cc67502b\Symfony\Component\DependencyInjection\Tests\Fixtures\TestServiceSubscriber;
use function class_alias;
use function sprintf;
use function trigger_error;
use const E_USER_DEPRECATED;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class ProjectServiceContainer extends Container
{
    private $parameters = [];
    private $targetDirs = [];
    public function __construct()
    {
        $this->services = [];
        $this->normalizedIds = ['_PhpScoper5ea00cc67502b\\symfony\\component\\dependencyinjection\\tests\\fixtures\\customdefinition' => '_PhpScoper5ea00cc67502b\\Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\CustomDefinition', '_PhpScoper5ea00cc67502b\\symfony\\component\\dependencyinjection\\tests\\fixtures\\testservicesubscriber' => '_PhpScoper5ea00cc67502b\\Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\TestServiceSubscriber'];
        $this->methodMap = ['_PhpScoper5ea00cc67502b\\Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\CustomDefinition' => 'getCustomDefinitionService', '_PhpScoper5ea00cc67502b\\Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\TestServiceSubscriber' => 'getTestServiceSubscriberService', 'foo_service' => 'getFooServiceService'];
        $this->privates = ['_PhpScoper5ea00cc67502b\\Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\CustomDefinition' => true];
        $this->aliases = [];
    }
    public function getRemovedIds()
    {
        return ['_PhpScoper5ea00cc67502b\\Psr\\Container\\ContainerInterface' => true, '_PhpScoper5ea00cc67502b\\Symfony\\Component\\DependencyInjection\\ContainerInterface' => true, '_PhpScoper5ea00cc67502b\\Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\CustomDefinition' => true, 'service_locator.jmktfsv' => true, 'service_locator.jmktfsv.foo_service' => true];
    }
    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }
    public function isCompiled()
    {
        return true;
    }
    public function isFrozen()
    {
        @trigger_error(sprintf('The %s() method is deprecated since Symfony 3.3 and will be removed in 4.0. Use the isCompiled() method instead.', __METHOD__), E_USER_DEPRECATED);
        return true;
    }
    /**
     * Gets the public 'Symfony\Component\DependencyInjection\Tests\Fixtures\TestServiceSubscriber' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\Tests\Fixtures\TestServiceSubscriber
     */
    protected function getTestServiceSubscriberService()
    {
        return $this->services['Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\TestServiceSubscriber'] = new TestServiceSubscriber();
    }
    /**
     * Gets the public 'foo_service' shared autowired service.
     *
     * @return \Symfony\Component\DependencyInjection\Tests\Fixtures\TestServiceSubscriber
     */
    protected function getFooServiceService()
    {
        return $this->services['foo_service'] = new TestServiceSubscriber((new ServiceLocator(['_PhpScoper5ea00cc67502b\\Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\CustomDefinition' => function () {
            $f = function (CustomDefinition $v = null) {
                return $v;
            };
            return $f(${($_ = isset($this->services['Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\CustomDefinition']) ? $this->services['Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\CustomDefinition'] : ($this->services['Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\CustomDefinition'] = new CustomDefinition())) && false ?: '_'});
        }, '_PhpScoper5ea00cc67502b\\Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\TestServiceSubscriber' => function () {
            $f = function (TestServiceSubscriber $v) {
                return $v;
            };
            return $f(${($_ = isset($this->services['Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\TestServiceSubscriber']) ? $this->services['Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\TestServiceSubscriber'] : ($this->services['Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\TestServiceSubscriber'] = new TestServiceSubscriber())) && false ?: '_'});
        }, 'bar' => function () {
            $f = function (CustomDefinition $v) {
                return $v;
            };
            return $f(${($_ = isset($this->services['Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\TestServiceSubscriber']) ? $this->services['Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\TestServiceSubscriber'] : ($this->services['Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\TestServiceSubscriber'] = new TestServiceSubscriber())) && false ?: '_'});
        }, 'baz' => function () {
            $f = function (CustomDefinition $v = null) {
                return $v;
            };
            return $f(${($_ = isset($this->services['Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\CustomDefinition']) ? $this->services['Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\CustomDefinition'] : ($this->services['Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\CustomDefinition'] = new CustomDefinition())) && false ?: '_'});
        }]))->withContext('foo_service', $this));
    }
    /**
     * Gets the private 'Symfony\Component\DependencyInjection\Tests\Fixtures\CustomDefinition' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\Tests\Fixtures\CustomDefinition
     */
    protected function getCustomDefinitionService()
    {
        return $this->services['Symfony\\Component\\DependencyInjection\\Tests\\Fixtures\\CustomDefinition'] = new CustomDefinition();
    }
}
/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class_alias('_PhpScoper5ea00cc67502b\\ProjectServiceContainer', 'ProjectServiceContainer', false);