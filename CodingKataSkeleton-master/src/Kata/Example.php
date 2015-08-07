<?php

namespace Kata;

class Example
{
    /**
     * @var
     */
    protected $constructorArgs;

    function __construct()
    {
        $this->constructorArgs = func_get_args();
    }

    public function getConstructorArgument($index)
    {
        if (!array_key_exists($index, $this->constructorArgs)) {
            throw new \OutOfBoundsException('Invalid constructor argument');
        }

        return $this->constructorArgs[$index];
    }
}
