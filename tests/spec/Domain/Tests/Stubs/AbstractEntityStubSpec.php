<?php

namespace spec\Domain\Tests\Stubs;

use Domain\Core\AbstractEntity;
use Domain\Tests\Stubs\AbstractEntityStub;
use PhpSpec\ObjectBehavior;

/**
 * Class AbstractEntityStubSpec
 * @package spec
 * @mixin AbstractEntity
 */
class AbstractEntityStubSpec extends ObjectBehavior
{
    public function it_should_set_and_get_id()
    {
        $id = rand(0, 10);

        $this->getId()->shouldReturn(null);
        $this
            ->setId($id)
            ->getId()
            ->shouldReturn($id);
    }
}
