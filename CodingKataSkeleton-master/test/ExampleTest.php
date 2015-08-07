<?php

namespace Kata\Test;

use Kata\Example;

class ExampleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function returnsValidConstructorArgument()
    {
        $example = new Example('foo');
        $this->assertEquals('foo', $example->getConstructorArgument(0));
    }

    /**
     * @test
     * @expectedException        \OutOfBoundsException
     * @expectedExceptionMessage Invalid constructor argument
     */
    public function failsForInvalidConstructorArgument()
    {
        $example = new Example('foo', 'bar');
        $example->getConstructorArgument(2);
    }
}