<?php

namespace App\Http\Controllers\traits;

trait Offset
{
    public function calculateOffset($offset, $limit, $total)
    {
        if ($offset >= $total)
        {
            return $total - 5 < 0 ? $total : $total - 5;
        } else if ($offset < 0) {
            return 0;
        } else if ($offset % $limit != 0) {
            $temp = (integer) $offset / $limit;
            return $temp * $limit;
        } else {
            return $offset;
        }
    }
}
