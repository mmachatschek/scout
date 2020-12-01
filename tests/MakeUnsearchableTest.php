<?php

namespace Laravel\Scout\Tests;

use Illuminate\Database\Eloquent\Collection;
use Laravel\Scout\Jobs\MakeUnsearchable;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class MakeUnsearchableTest extends TestCase
{
    protected function tearDown(): void
    {
        m::close();
    }

    public function test_handle_passes_the_collection_to_engine()
    {
        $job = new MakeUnsearchable($collection = Collection::make([
            $model = m::mock(),
        ]));

        $model->shouldReceive('searchableUsing->delete')->with($collection);

        $job->handle();
    }
}
