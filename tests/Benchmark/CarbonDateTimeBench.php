<?php

namespace PerformanceTests\Tests\Benchmark;

use PhpBench\Attributes as Bench;
use Carbon;

class CarbonDateTimeBench
{
    #[Bench\Revs(1000)]
    #[Bench\Iterations(5)]
    public function benchStrtotime()
    {
        strtotime('-30 days');
    }

    #[Bench\Revs(1000)]
    #[Bench\Iterations(5)]
    public function benchCarbon()
    {
        (new Carbon\Carbon())->subDays('30')->getTimestamp();
    }

    #[Bench\Revs(1000)]
    #[Bench\Iterations(5)]
    public function benchDateTime()
    {
        (new \DateTime('-30 days'))->getTimestamp();
    }
}