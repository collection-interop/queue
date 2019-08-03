# queue
An interface describing the behaviours of a 'queue' abstract data type (ADT).

## Installation

The best way to use these interfaces in your project/library, is via [Composer](https://getcomposer.org/):

```cli
$ composer require collection-interop/queue
```

## Usage

```php
final class RouteTable implements \Interop\Collection\Queue
{
    private $routes = [];
    private $type = '';
    
    public function enqueue(object $item): void
    {
        if (!$this->type) {
            $this->type = get_class($item);
        }
        
        if (!($item instanceof $this->type)) {
            throw new InvalidArgumentException(
                sprintf('Item must be an instance of %s. Instance of %s was given instead.', $this->type, get_class($item))
            );
        }
        
        $this->routes[] = $item;
    }
    
    public function dequeue(): object
    {
        return array_shift($this->routes);
    }
}

final class Route
{
    public $name;
    public function __construct(string $name) {
        $this->name = $name;
    }
}

final class RouteTwo
{
    public $name = 'two';
}

$routeTable = new RouteTable();
$routeTable->enqueue(new Route('one'));
//$routeTable->enqueue(new RouteTwo());   // uncomment line to verify that only objects of same type can be added
$routeTable->enqueue(new Route('three'));

var_dump($routeTable->dequeue()->name);   // returns 'one'
var_dump($routeTable->dequeue()->name);   // returns 'three'
```
