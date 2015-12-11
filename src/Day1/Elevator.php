<?php

namespace Day1;

use SplObserver;

class Elevator implements \SplSubject
{
    private $floor = 0;

    private $observers;

    /**
     * Elevator constructor.
     *
     * @param $observers
     */
    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    public function getFloor()
    {
        return $this->floor;
    }

    public function goUp()
    {
        $this->floor++;
        $this->notify();
    }

    public function goDown()
    {
        $this->floor--;
        $this->notify();
    }

    /**
     * Attach an SplObserver
     * @link http://php.net/manual/en/splsubject.attach.php
     *
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to attach.
     * </p>
     *
     * @return void
     * @since 5.1.0
     */
    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * Detach an observer
     * @link http://php.net/manual/en/splsubject.detach.php
     *
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to detach.
     * </p>
     *
     * @return void
     * @since 5.1.0
     */
    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * Notify an observer
     * @link http://php.net/manual/en/splsubject.notify.php
     * @return void
     * @since 5.1.0
     */
    public function notify()
    {
        /** @var \SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
