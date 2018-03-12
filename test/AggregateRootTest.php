<?php
use ES\Domain;
use ES\Framework\TestScenario;
use ES\Application\AggregateRootRepository;

class AggregateRootTest extends \PHPUnit\Framework\TestCase
{
    public function testCreatingAggregate()
    {
        $root = new Domain\AggregateRoot('guid', 'Name');
        $this->assertEquals('guid', (string) $root->getGuid());
        $this->assertEquals('Name', (string) $root->getName());
    }

    public function testChangeName()
    {
        $testCase = new TestScenario(new AggregateRootRepository());
        $testCase
            ->given(new Domain\Event\AggregateRootCreated('guid', 'Name'))
            ->given(new Domain\Event\NameChanged('Name', 'New name'))
            ->when(new Domain\Command\ChangeName('guid', 'Even newer name'))
            ->then([
                new Domain\Event\NameChanged('New name', 'Even newer name')
            ]);
    }
}