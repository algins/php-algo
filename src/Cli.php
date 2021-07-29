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
    $searchAlgorithms = [
        'linear' => fn ($list, $item) => linear($list, $item),
        'binary' => fn ($list, $item) => binary($list, $item),
    ];

    $menu = [
        'linear' => 'Linear Search',
        'binary' => 'Binary Search',
        'quit' => 'Quit',
    ];

    while (true) {
        $algorithm = menu($menu, null, 'Choose an algorithm');
        line();

        if ($algorithm === 'quit') {
            break;
        }

        $size = prompt('Enter list size');
        line();
        $list = range(0, $size);
        $item = prompt('Enter value to search');
        line();
        $result = $searchAlgorithms[$algorithm]($list, (int) $item);
        line("Result: {$result}");
        break;
    }
}
