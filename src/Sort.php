<?php

namespace App\Sort;

function selection(array $list): array
{
    if (empty($list)) {
        return [];
    }

    $smallestIndex = findSmallest($list);
    $smallest = $list[$smallestIndex];
    unset($list[$smallestIndex]);
    $newList = array_values($list);

    return array_merge(
        [$smallest],
        selection($newList)
    );
}

function findSmallest(array $list): int
{
    $smallestIndex = 0;
    $smallest = $list[$smallestIndex];

    foreach ($list as $key => $value) {
        if ($value < $smallest) {
            $smallest = $value;
            $smallestIndex = $key;
        }
    }

    return $smallestIndex;
}
