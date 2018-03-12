<?php
namespace ES\Domain\Command;

class ChangeName
{
    /** @var string */
    private $aggregateGuid;

    /** @var string */
    private $newName;

    public function __construct(string $aggregateGuid, string $newName)
    {
        $this->aggregateGuid = $aggregateGuid;
        $this->newName = $newName;
    }

    public function getAggregateGuid(): string
    {
        return $this->aggregateGuid;
    }

    public function getNewName(): string
    {
        return $this->newName;
    }
}
