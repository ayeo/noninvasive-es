Noninvasive ES support
======================

This is an attempt to build noninvasive ES/CQRS support librarty. By noninvasive I mean allowing domain to stay pure. Commands and Events either remains pure old PHP objects. There is also no any requirements regarding to your aggregate class.

Events are applied (while loading) using dedicated and seperated class responsible only for applying events. It is used only while reconstituting aggregate from store. On regular aggregate usage it itself maintenance its state - see Domain namespace for exmaple use. 



Testing
=======

This lib comes with simple testing tool inspired by Broadway
```php
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
```