<?php

function formatDate($date)
{
    return \Carbon\Carbon::createFromDate(
        $date['year'],
        $date['month'],
        $date['day']
    )->format('d M Y');
}
