<?php

namespace spec\Kata;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ExampleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kata\Example');
    }

    function it_can_return_first_constructor_argument_when_given_one_argument()
    {
        $this->beConstructedWith('foo');
        $this->getConstructorArgument(0)->shouldBe('foo');
    }

    function it_fails_when_requested_argument_was_not_provided()
    {
        $this->beConstructedWith('foo', 'bar');
        $this->shouldThrow(new \OutOfBoundsException('Invalid constructor argument'))->duringGetConstructorArgument(2);
    }
}
