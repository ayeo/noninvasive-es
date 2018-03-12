<?php
namespace ES\Domain\Event;

class NameChanged implements \Serializable
{
    /** @var string */
    private $oldName;

    /** @var string */
    private $newName;

    public function __construct(string $oldName, string $newName)
    {
        $this->oldName = $oldName;
        $this->newName = $newName;
    }

    public function getOldName(): string
    {
        return $this->oldName;
    }

    public function getNewName(): string
    {
        return $this->newName;
    }

    public function serialize()
    {
        return [];
    }

    public function unserialize($serialized)
    {
    }


}
