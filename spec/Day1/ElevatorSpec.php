<?php

namespace spec\Day1;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ElevatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day1\Elevator');
    }

    public function it_should_be_on_zero_to_start()
    {
        $this->getFloor()->shouldBe(0);
    }

    public function it_can_go_up()
    {
        $this->goUp();
        $this->getFloor()->shouldBe(1);
    }

    public function it_can_go_down()
    {
        $this->goDown();
        $this->getFloor()->shouldBe(-1);
    }

    public function it_will_implements_SplSubject()
    {
        $this->shouldHaveType(\SplSubject::class);
    }

    public function it_can_attach(\SplObserver $observer)
    {
        $this->attach($observer);
    }

    public function it_can_detach(\SplObserver $observer)
    {
        $this->attach($observer);
        $this->detach($observer);
    }

    public function it_will_notify_observer_on_goUp(\SplObserver $observer)
    {
        $this->attach($observer);
        $observer->update($this)->shouldBeCalled();

        $this->goUp();
    }


    public function it_will_notify_observer_on_goDown(\SplObserver $observer)
    {
        $this->attach($observer);
        $observer->update($this)->shouldBeCalled();

        $this->goDown();
    }
}
