<?php
namespace ES\Framework;

use PHPUnit\Framework\TestCase;

class TestScenario extends TestCase
{

    private $repository;

    /**
     * @var \Serializable
     */
    private $events;

    private $aggregate;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function given(\Serializable $event)
    {
        $this->events[] = $event;

        return $this;
    }

    public function when($command)
    {
        $this->aggregate = $this->repository->replay($this->events);
        $this->aggregate->handle($command);

        return $this;
    }

    /**
     * @param \Serializable[] $events
     */
    public function then(array $events)
    {
        $this->assertEquals($events, $this->aggregate->getUnpublishedEvents());
    }
}