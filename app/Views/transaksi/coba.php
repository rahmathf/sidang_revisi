<?php

use function PHPUnit\Framework\assertContains;
use function PHPUnit\Framework\containsEqual;

$angka = 1000000000;
$jumlah17 = null;
$i = 1;
$array = array();
while ($i <= $angka) {
    array_push($array, $i);
    $i++;
}
// if (count($val) == $angka) echo true;
