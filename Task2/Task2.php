<?php

/**
 * @param $n - Кол-во фатальных ошибок
 * @param $m - Кол-во варнингов
 * @return float|int - Минимальное кол-во коммитов
 */
function findMinCommits($n, $m) {
    // Если кол-во варнингов равно 0, а кол-во фат.ошибок нечётно, то нет решения
    if ($m == 0 && $n % 2 == 1) {
        return -1;
    }

    $result = 0;
    // Если кол-во фат. ошибок чётное
    if ($n % 2 == 0) {
        // То кол-во варнингов должно делится на 4 без остатка
        $result = (4 - $m % 4) % 4;
    } else {
        // Иначе кол-во варнингов не должно делится на 4, но должно быть чётным
        $result = (6 - $m % 4) % 4 ;
    }
    // В $result лежит кол-во коммитов необходимых для нужного кол-во варнигов
    $m += $result;
    // Увеличиваем кол-во фат. ошибок на кол-во коммитов, которые нужны для исправления варнингов
    $n += $m / 2;
    // Находим общее кол-во коммитов
    $result += $m / 2 + $n / 2;
    return $result;
}

$n = readline();
$m = readline();

echo findMinCommits($n, $m);