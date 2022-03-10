<?php

namespace Codevia\Venus;

use Codevia\Venus\Utils\Http\Input\InputInterface;
use DI\Container;
use DI\ContainerBuilder;
use FastRoute\Dispatcher;
use Psr\Container\ContainerInterface;

class Config
{
    private InputInterface $inputAdapter;
    private Dispatcher $dispatcher;
    private ?ContainerInterface $container = null;

    public function getInputAdapter(): InputInterface
    {
        return $this->inputAdapter;
    }

    /**
     * Set the input adapter that corresponds to the format you are working with.
     *
     * @param InputInterface $inputAdapter
     * @return Application
     */
    public function setInputAdapter(InputInterface $inputAdapter): self
    {
        $this->inputAdapter = $inputAdapter;
        return $this;
    }

    public function getDispatcher(): Dispatcher
    {
        return $this->dispatcher;
    }

    /**
     * Set the dispatcher with route definitions.
     *
     * @param FastRouteDispatcher $dispatcher
     * @return Application
     */
    public function setDispatcher(Dispatcher $dispatcher): self
    {
        $this->dispatcher = $dispatcher;
        return $this;
    }

    public function getContainer(): ContainerInterface | Container
    {
        if ($this->container === null) {
            $builder = new ContainerBuilder();
            $builder->useAnnotations(true);
            $this->container = $builder->build();
        }
        return $this->container;
    }

    /**
     * Set the container to use with middlewares.
     *
     * @param ContainerInterface $container
     * @return Application
     */
    public function setContainer(ContainerInterface $container): self
    {
        $this->container = $container;
        return $this;
    }
}
