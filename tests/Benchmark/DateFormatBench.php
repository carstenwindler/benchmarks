<?php

namespace PerformanceTests\Tests\Benchmark;

use PhpBench\Attributes as Bench;
use Carbon;

class DateFormatBench
{
    #[Bench\Revs(5000)]
    #[Bench\Iterations(10)]
    public function benchDate()
    {
        date('D M d Y H:m:s');
    }

    #[Bench\Revs(5000)]
    #[Bench\Iterations(10)]
    public function benchDateTime()
    {
        (new DateTime())->format('D M d Y H:m:s');
    }

    #[Bench\Revs(5000)]
    #[Bench\Iterations(10)]
    public function benchCarbon()
    {
        (new Carbon\Carbon())->format('D M d Y H:m:s');
    }
}
