<?php

namespace PerformanceTests\Tests\Benchmark;

use PhpBench\Attributes as Bench;
use Carbon;

class DiffBench
{
    #[Bench\Revs(5000)]
    #[Bench\Iterations(10)]
    public function benchDate()
    {
        $origin = new \DateTimeImmutable();
        $target = new \DateTimeImmutable('-3 days');
        $interval = $origin->diff($target);
        $interval->d;
    }

    #[Bench\Revs(5000)]
    #[Bench\Iterations(10)]
    public function benchCarbon()
    {
        Carbon\Carbon::now()->subDays(2)->diffInDays();
    }
}