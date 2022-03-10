<?php

namespace Algins\PHPAlgo\Greedy;

/**
 * Find minimum count of items that covers all needed values
 */
function setCovering(array $neededValues, array $items): array
{
    if (empty($items)) {
        return [];
    }

    $result = [];

    while (!empty($neededValues)) {
        $bestItem = null;
        $coveredValues = [];

        foreach ($items as $item => $values) {
            $itemCoveredValues = array_intersect($neededValues, $values);
            if (count($itemCoveredValues) > count($coveredValues)) {
                $bestItem = $item;
                $coveredValues = $itemCoveredValues;
            }
        }

        $neededValues = array_filter($neededValues, fn($value) => !in_array($value, $coveredValues));
        $result[] = $bestItem;
    }

    return $result;
}
