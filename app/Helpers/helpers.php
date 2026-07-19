<?php

use App\Models\Sale;

if (!function_exists('getStatusBadge')) {
    function getStatusBadge($status)
    {
        if ($status == 1) {
            return "<span class='badge bg-success'>" . ('Active') . "</span> ";
        } else {
            return "<span class='badge bg-danger'>" . ('Inactive') . "</span>";
        }
    }
}

if (!function_exists('showEmptyState')) {
    function showEmptyState($message = 'No data found')
    {
        return '
            <tr>
                <td colspan="100%">
                    <div class="text-center">
                        <p>' . __($message) . '</p>
                    </div>
                </td>
            </tr>
        ';
    }
}

if (!function_exists('generateInvoiceNo')) {
    function generateInvoiceNo()
    {
        return 'INV-' . now()->format('Ymd') . '-' . str_pad(
            Sale::count() + 1,
            5,
            '0',
            STR_PAD_LEFT
        );
    }
}


