<?php

namespace PerformanceTests\Tests\Benchmark;

use PhpBench\Attributes as Bench;
use Carbon;

class Subtract30DaysBench
{
    #[Bench\Revs(5000)]
    #[Bench\Iterations(10)]
    public function benchStrtotime()
    {
        strtotime('-30 days');
    }

    #[Bench\Revs(5000)]
    #[Bench\Iterations(10)]
    public function benchCarbon()
    {
        (new Carbon\Carbon())->subDays('30')->getTimestamp();
    }

    #[Bench\Revs(5000)]
    #[Bench\Iterations(10)]
    public function benchCarbon2()
    {
        (new Carbon\Carbon('-30 days'))->getTimestamp();
    }

    #[Bench\Revs(5000)]
    #[Bench\Iterations(10)]
    public function benchDateTime()
    {
        (new \DateTime())->sub(\DateInterval::createFromDateString('30 day'))->getTimestamp();
    }

    #[Bench\Revs(5000)]
    #[Bench\Iterations(10)]
    public function benchDateTime2()
    {
        (new \DateTime('-30 days'))->getTimestamp();
    }
}