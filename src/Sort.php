<?php

namespace App\Sort;

function quick(array $list): array
{
    if (count($list) < 2) {
        return $list;
    }

    $pivot = $list[0];
    $less = [];
    $greater = [];

    for ($i = 1; $i < count($list); $i += 1) {
        $current = $list[$i];
        if ($current <= $pivot) {
            $less[] = $current;
        } else {
            $greater[] = $current;
        }
    }

    return [
        ...quick($less),
        $pivot,
        ...quick($greater),
    ];
}

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
