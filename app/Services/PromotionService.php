<?php

namespace App\Services;

use App\Jobs\SendPromotionMailJob;
use App\Models\Customer;

class PromotionService
{
    public function sendToLostCustomers()
    {
        $customers = Customer::query()
            ->with('latestSale')
            ->whereHas('assignment')
            ->get();

        foreach ($customers as $customer) {

            if (!$customer->latestSale || $customer->latestSale->sale_date->lte(now()->subDays(config('crm.lost_customer_days')))) {
                SendPromotionMailJob::dispatch($customer);
            }

        }

    }
}
