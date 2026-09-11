<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use RuntimeException;

class TestFailedJob implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function handle(): void
    {
        //ekhane ekta expection throw korte hobe faild job try korte hole
        \Log::info('TestFailedJob executed successfully after retry.');
    }
}
