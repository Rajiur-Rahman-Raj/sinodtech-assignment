<?php

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
                        <p>No branch found</p>
                    </div>
                </td>
            </tr>
        ';
    }
}

