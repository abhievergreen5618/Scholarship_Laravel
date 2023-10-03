<?php
function splitDateRange($dateRange)
{
    list($startDate, $endDate) = explode(' - ', $dateRange);

    return [
        'startDate' => $startDate,
        'endDate' => $endDate,
    ];
}