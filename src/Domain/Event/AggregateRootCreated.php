<?php
namespace ES\Domain\Event;

class AggregateRootCreated implements \Serializable
{
    /** @var string  */
    private $guid;

    /** @var string */
    private $name;

    public function __construct(string $guid, string $name)
    {
        $this->guid = $guid;
        $this->name = $name;
    }

    public function getGuid(): string
    {
        return $this->guid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function serialize()
    {
        return [];
    }

    public function unserialize($serialized)
    {
    }
}
