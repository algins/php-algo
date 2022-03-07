<?php

namespace Algins\PHPAlgo\SearchGraph;

function breadthFirst(array $graph, string $key, string $searchKey): ?array
{
    if (empty($graph)) {
        return null;
    }

    $searchQueue = $graph[$key];
    $searched = [];

    while (!empty($searchQueue)) {
        $currentKey = array_shift($searchQueue);
        if (!in_array($currentKey, $searched)) {
            if ($currentKey === $searchKey) {
                return $graph[$currentKey];
            } else {
                $searchQueue = [...$searchQueue, ...$graph[$currentKey]];
                $searched[] = $currentKey;
            }
        }
    }

    return null;
}
