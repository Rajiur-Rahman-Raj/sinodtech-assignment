<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;


Schedule::call(function () {
    Log::info('Laravel Scheduler executed successfully.');
})->everyMinute();

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');



