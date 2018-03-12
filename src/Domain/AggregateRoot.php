<?php
namespace ES\Domain;

use ES\Domain;
use ES\Framework\AggregateTrait;

class AggregateRoot
{
    use AggregateTrait; //this is optional

    /** @var string */
    private $guid;

    /** @var string */
    private $name;

    public function __construct(string $guid, string $name)
    {
        $this->guid = $guid;
        $this->name = $name;
        $this->publish(new Domain\Event\AggregateRootCreated($guid, $name));
    }

    public function handleChangeName(Domain\Command\ChangeName $command)
    {
        $oldName = $this->name;
        $this->name = $command->getNewName();
        $this->publish(new Domain\Event\NameChanged($oldName, $this->name));
    }

    public function getGuid(): string
    {
        return $this->guid;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
