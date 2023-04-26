<?php

namespace PerformanceTests\Tests\Benchmark;

use PhpBench\Attributes as Bench;
use Carbon;

class CreateFromFormatBench
{
    #[Bench\Revs(5000)]
    #[Bench\Iterations(10)]
    public function benchDate()
    {
        \DateTime::createFromFormat("Y-m-d", "2000-01-01")->getTimestamp();
    }

    #[Bench\Revs(5000)]
    #[Bench\Iterations(10)]
    public function benchCarbon()
    {
        Carbon\Carbon::createFromFormat("Y-m-d", "2000-01-01")->getTimestamp();
    }
}