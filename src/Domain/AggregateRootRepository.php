<?php
namespace ES\Domain;

interface AggregateRootRepository
{
    public function save(AggregateRoot $aggregateRoot);

    public function load(string $guid);
}
