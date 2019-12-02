<?php

/**
 * @param $n - Кол-во чисел
 * @param $k - Число, место которого требуется найти
 * @return int - Позиция числа
 */
function placeNum($n, $k) {
    $result = 0;
    // Смотрим все числа до $n
    for ($i = 1; $i <= $n; $i++) {
        // Если $i лексигрофически меньше или равно $k
        if (strcmp($i, $k) <= 0) {
            // То увеличиваем $result на 1
            $result++;
        }
    }

    return $result;
}

$n = readline();
$k = readline();

echo placeNum($n, $k);

