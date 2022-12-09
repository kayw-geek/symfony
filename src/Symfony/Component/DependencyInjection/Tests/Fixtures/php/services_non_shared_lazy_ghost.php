<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class ProjectServiceContainer extends Container
{
    protected $parameters = [];
    protected readonly \WeakReference $ref;

    public function __construct()
    {
        $this->ref = \WeakReference::create($this);
        $this->services = $this->privates = [];
        $this->methodMap = [
            'bar' => 'getBarService',
        ];

        $this->aliases = [];
    }

    public function compile(): void
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled(): bool
    {
        return true;
    }

    public function getRemovedIds(): array
    {
        return [
            'foo' => true,
        ];
    }

    protected function createProxy($class, \Closure $factory)
    {
        return $factory();
    }

    /**
     * Gets the public 'bar' shared service.
     *
     * @return \stdClass
     */
    protected static function getBarService($container)
    {
        return $container->services['bar'] = new \stdClass((isset($container->factories['service_container']['foo']) ? $container->factories['service_container']['foo']($container) : self::getFooService($container)));
    }

    /**
     * Gets the private 'foo' service.
     *
     * @return \stdClass
     */
    protected static function getFooService($container, $lazyLoad = true)
    {
        $containerRef = $container->ref;

        $container->factories['service_container']['foo'] ??= self::getFooService(...);

        if (true === $lazyLoad) {
            return $container->createProxy('stdClassGhost5a8a5eb', static fn () => \stdClassGhost5a8a5eb::createLazyGhost(static fn ($proxy) => self::getFooService($containerRef->get(), $proxy)));
        }

        return $lazyLoad;
    }
}

class stdClassGhost5a8a5eb extends \stdClass implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;

    private const LAZY_OBJECT_PROPERTY_SCOPES = [];
}

// Help opcache.preload discover always-needed symbols
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);
