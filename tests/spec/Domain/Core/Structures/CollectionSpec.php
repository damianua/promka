<?php

namespace spec\Domain\Core\Structures;

use Domain\Core\Interfaces\Arrayable;
use Domain\Core\Interfaces\Jsonable;
use Domain\Core\Structures\Collection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class CollectionSpec
 * @package spec\App\Core\Structures
 * @mixin Collection
 */
class CollectionSpec extends ObjectBehavior
{
    private $items;

    function let()
    {
        $this->items = [
            'item1', 'item2', 'item3'
        ];
        $this->beConstructedWith($this->items);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Collection::class);
    }

    function it_should_fill_with_new_items()
    {
        $items = ['item3', 'item4', 'item5'];

        $this->fill($items)
            ->all()
            ->shouldReturn($items);
    }

    function it_should_return_items_as_array()
    {
        $this->toArray()->shouldReturn($this->items);

        $attributes = ['attr1', 'attr2'];
        $items = [$this->createArrayableObject($attributes), 'item2', 'item3'];

        $this->fill($items)
            ->toArray()
            ->shouldReturn([$attributes, 'item2', 'item3']);

    }

    function it_should_return_items_as_json()
    {
        $this->toJson()->shouldReturn(json_encode($this->items));

        $attributes = ['attr1', 'attr2'];
        $items = [$this->createArrayableObject($attributes), 'item2', $this->createJsonableObject($attributes)];

        $this->fill($items)
            ->toJson()
            ->shouldReturn(json_encode([$attributes, 'item2', $attributes]));
    }

    function it_should_get_all_items()
    {
        $this->all()->shouldReturn($this->items);
    }

    function it_should_be_iterable()
    {
        $this->current()->shouldReturn('item1');
        $this->next()->shouldReturn('item2');
        $this->key()->shouldReturn(1);
        $this->valid()->shouldReturn(true);
        $this->next();
        $this->next();
        $this->valid()->shouldReturn(false);
        $this->rewind();
        $this->key()->shouldReturn(0);
    }

    function it_should_use_as_array_access()
    {
        $this[1]->shouldBe('item2');
        $this[2] = 'item3*';
        $this[2]->shouldBe('item3*');
        $this->offsetExists(0)->shouldReturn(true);
        $this->offsetExists(3)->shouldReturn(false);
        unset($this[0]);
        $this->offsetExists(0)->shouldReturn(false);
    }

    function it_should_check_if_empty()
    {
        $this->isEmpty()->shouldReturn(false);
        unset($this[0], $this[1], $this[2]);

        $this->isEmpty()->shouldReturn(true);
    }

    function it_should_return_items_count()
    {
        $this->count()->shouldReturn(3);
        unset($this[0], $this[1], $this[2]);

        $this->count()->shouldReturn(0);
        $this[0] = 'item1';
        $this->count()->shouldReturn(1);
    }

    function it_should_enumerate_items()
    {
        $collection = $this->each(function($item, $key){
            return $item.'_'.$key;
        });

        $collection->shouldNotBe($this);
        $collection->all()->shouldReturn([
            'item1_0', 'item2_1', 'item3_2'
        ]);
    }

    function it_should_walk_around_items()
    {
        $collection = $this->walk(function(&$item, $key){
            $item = $item.'_'.$key;
        });

        $collection->shouldBe($this);
        $collection->all()->shouldReturn([
            'item1_0', 'item2_1', 'item3_2'
        ]);
    }

    private function createArrayableObject(array $attributes)
    {
        $obj = new class($attributes) implements Arrayable{

            private $attributes = [];

            public function __construct(array $attributes)
            {
                $this->attributes = $attributes;
            }

            public function toArray(): array
            {
                return $this->attributes;
            }
        };

        return $obj;
    }

    private function createJsonableObject(array $attributes)
    {
        $obj = new class($attributes) implements Jsonable {

            private $attributes = [];

            public function __construct(array $attributes)
            {
                $this->attributes = $attributes;
            }

            public function toJson(int $options = 0): string
            {
                return json_encode($this->attributes, $options);
            }
        };

        return $obj;
    }
}