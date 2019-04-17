<?php

use Carbon\Carbon;

/**
 * Date Now timestamp format
 *
 * @return date
 */
if (!function_exists('format_timestamp'))
{
  function format_timestamp()
  {
    $date = carbon::now();
    $date = $date->format('Y-m-d H:i:s');
    return $date;
  }
}

/**
 * Date Time Now
 *
 * @param  date
 * @return true false
 */
if (!function_exists('date_time'))
{
  function date_time()
  {
    $date = carbon::now();
    $date = Carbon::parse($date);
    $date = $date->format('d-m-Y_H-i-s');
    return $date;
  }
}