<?php
namespace ES\Framework;

trait AggregateTrait
{
    private $events = [];

    public function getUnpublishedEvents()
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }

    protected function publish(\Serializable $event)
    {
        $this->events[] = $event;
    }

    public function handle($command)
    {
        preg_match("#[a-z0-9]+$#i", get_class($command), $result);
        $this->{"handle".$result[0]}($command);
    }
}
