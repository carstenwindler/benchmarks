<?php

namespace PerformanceTests\Tests\Benchmark;

use PhpBench\Attributes as Bench;
use Carbon;

class InstantiationBench
{
    #[Bench\Revs(10)]
    #[Bench\Iterations(5)]
    public function benchDate()
    {
        for ($i = 0; $i < 10000; $i++) {
            date('D M d Y H:m:s', $i);
        }
    }


    #[Bench\Revs(10)]
    #[Bench\Iterations(5)]
    public function benchDateTimeNewInstance()
    {
        for ($i = 0; $i < 10000; $i++) {
            (new \DateTime())->setTimestamp($i)->format('D M d Y H:m:s');
        }
    }

    #[Bench\Revs(10)]
    #[Bench\Iterations(5)]
    public function benchDateTimeSameInstance()
    {
        $date = new \DateTime();
        for ($i = 0; $i < 10000; $i++) {
            $date->setTimestamp($i)->format('D M d Y H:m:s');
        }
    }

    #[Bench\Revs(10)]
    #[Bench\Iterations(5)]
    public function benchCarbonNewInstance()
    {
        for ($i = 0; $i < 10000; $i++) {
            (new Carbon\Carbon($i))->format('Y-m-d');
        }
    }

    #[Bench\Revs(10)]
    #[Bench\Iterations(5)]
    public function benchCarbonSameInstance()
    {
        $carbon = new Carbon\Carbon();
        for ($i = 0; $i < 10000; $i++) {
            $carbon->setTimestamp($i)->format('Y-m-d');
        }
    }
}