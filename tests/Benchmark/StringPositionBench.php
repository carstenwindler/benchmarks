<?php

namespace PerformanceTests\Tests\Benchmark;

use PhpBench\Attributes as Bench;

class StringPositionBench
{
    #[Bench\Revs(1000)]
    #[Bench\Iterations(10)]
    public function benchStrContains()
    {
        str_contains('string contains PHP', 'PHP');
    }

    #[Bench\Revs(1000)]
    #[Bench\Iterations(10)]
    public function benchPregMatch()
    {
        preg_match("/php/i", 'string contains PHP');
    }

    #[Bench\Revs(1000)]
    #[Bench\Iterations(10)]
    public function benchStrStr()
    {
        strstr('string contains PHP', 'PHP');
    }
}