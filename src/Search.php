<?php

namespace App\Search;

function linear(array $list, $item): ?int
{
    for ($i = 0; $i < count($list); $i += 1) {
        if ($list[$i] === $item) {
            return $i;
        }
    }

    return null;
}

function binary(array $list, $item): ?int
{
    $low = 0;
    $high = count($list) - 1;

    while ($low <= $high) {
        $mid = floor(($low + $high) / 2);
        $guess = $list[$mid];

        if ($guess === $item) {
            return $mid;
        }

        if ($guess > $item) {
            $high = $mid - 1;
        } else {
            $low = $mid + 1;
        }
    }

    return null;
}
