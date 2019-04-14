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
