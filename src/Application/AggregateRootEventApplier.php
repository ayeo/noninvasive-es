<?php
namespace ES\Application;

use ES\Domain\Event\AggregateRootCreated;
use ES\Domain\Event\NameChanged;
use ES\Framework\EventApplier;

class AggregateRootEventApplier extends EventApplier
{
    private $name;

    private $guid;

    protected function applyAggregateRootCreated(AggregateRootCreated $event)
    {
        $this->guid = $event->getGuid();
        $this->name = $event->getName();
    }

    protected function applyNameChanged(NameChanged $event)
    {
        $this->name = $event->getNewName();
    }
}
