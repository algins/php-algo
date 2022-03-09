<?php

namespace Algins\PHPAlgo\SearchGraph;

/**
 * Find node that satisfies condition
 */
function breadthFirst(array $graph, string $node, callable $cb): ?array
{
    if (empty($graph)) {
        return null;
    }

    $searchQueue = $graph[$node];
    $searched = [];

    while (!empty($searchQueue)) {
        $currentNode = array_shift($searchQueue);
        if (!in_array($currentNode, $searched)) {
            if ($cb($currentNode)) {
                return $graph[$currentNode];
            } else {
                $searchQueue = [...$searchQueue, ...$graph[$currentNode]];
                $searched[] = $currentNode;
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
