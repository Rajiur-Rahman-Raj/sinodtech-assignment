<?php

namespace App\Jobs;

use App\Mail\PromotionMail;
use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPromotionMailJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public Customer $customer
    ) {}

    public function handle(): void
    {
        Mail::to($this->customer->email)
            ->send(
                new PromotionMail($this->customer)
            );
    }
}
