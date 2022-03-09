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

/**
 * Find lowest cost between two nodes
 */
function dijkstras(array $graph, string $startNode, string $endNode): ?int
{
    if (!array_key_exists($startNode, $graph) || !array_key_exists($endNode, $graph)) {
        return null;
    }

    $processed = [];
    $costs = [];
    $parents = [];

    foreach (array_keys($graph) as $node) {
        $costs[$node] = $graph[$startNode][$node] ?? PHP_INT_MAX;
        $parents[$node] = array_key_exists($node, $graph[$startNode]) ? $startNode : null;
    }

    $findLowestCostNode = function (array $costs) use (&$processed) {
        $lowestCost = PHP_INT_MAX;
        $lowestCostNode = null;

        foreach ($costs as $node => $cost) {
            if ($cost < $lowestCost && !in_array($node, $processed)) {
                $lowesCost = $cost;
                $lowestCostNode = $node;
            }
        }

        return $lowestCostNode;
    };

    $lowestCostNode = $findLowestCostNode($costs);

    while ($lowestCostNode) {
        $cost = $costs[$lowestCostNode];
        $neighbours = $graph[$lowestCostNode];

        foreach ($neighbours as $neighbourNode => $neighbourCost) {
            $newCost = $cost + $neighbourCost;
            if ($costs[$neighbourNode] > $newCost) {
                $costs[$neighbourNode] = $newCost;
                $parents[$neighbourNode] = $lowestCostNode;
            }
        }

        $processed[] = $lowestCostNode;
        $lowestCostNode = $findLowestCostNode($costs);
    }

    return $costs[$endNode];
}
