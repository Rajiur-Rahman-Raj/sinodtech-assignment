<?php

namespace App\Jobs;

use App\Mail\InvoiceMail;
use App\Models\Sale;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendInvoiceMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public Sale $sale
    ) {}

    public function handle(): void
    {
        $this->sale->loadMissing([
            'customer',
            'branch',
            'items.product',
        ]);

        Mail::to($this->sale->customer->email)
            ->send(new InvoiceMail($this->sale));
    }
}
