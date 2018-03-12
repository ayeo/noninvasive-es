<?php
namespace ES\Application;

use ES\Domain;
use ES\Framework\Repository;

class AggregateRootRepository extends Repository implements Domain\AggregateRootRepository
{
    public function __construct() {
        parent::__construct(AggregateRootEventApplier::class, Domain\AggregateRoot::class);
    }

    public function replay(array $eventSource): Domain\AggregateRoot {
        return $this->doReplay($eventSource);
    }

    public function save(Domain\AggregateRoot $aggregateRoot)
    {
        //todo: do something with event store
    }

    public function load(string $guid): Domain\AggregateRoot
    {
        //todo: do something with event store
    }
}