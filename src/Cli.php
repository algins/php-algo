<?php

namespace App\Cli;

use function App\Search\linear;
use function App\Search\binary;
use function cli\line;
use function cli\menu;
use function cli\out;
use function cli\prompt;

function handle(): void
{
    $choices = [
        'linear' => fn ($list, $item) => linear($list, $item),
        'binary' => fn ($list, $item) => binary($list, $item),
    ];

    $menu = [
        'linear' => 'Linear Search',
        'binary' => 'Binary Search',
        'quit' => 'Quit',
    ];

    while (true) {
        $choice = menu($menu, null, 'Choose an algorithm');
        line();

        if ($choice === 'quit') {
            break;
        }

        $listSize = prompt('Enter list size');
        line();

        $list = range(0, $listSize);
        $randomItem = $list[array_rand($list)];
        line();

        $attempts = 10;
        $executionTimes = [];

        for ($i = 1; $i <= $attempts; $i += 1) {
            $start = microtime(true);
            $result = search($list, $randomItem, $choices[$choice]);
            $end = microtime(true);
            $executionTimes[] = $end - $start;
        }

        $averageExecutionTime = round(array_sum($executionTimes) / $attempts, 5);

        line("Average execution time: {$averageExecutionTime}");
    }
}

function search(array $list, int $item, callable $fn)
{
    return $fn($list, $item);
}
