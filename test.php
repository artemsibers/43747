<?php

if ($argc != 2) {
    echo "Error! You must specify max number! Example: php test.php 100".PHP_EOL;
    exit;
}
define('MAX_NUMBER', $argv[1]);

$primes     = array();
$prime      = gmp_init(2);
$sum        = 2;
$lastPrime  = $i = 0;

do {
    $primes[$i] = gmp_strval($prime);
    $prime = gmp_nextprime($prime); $sum += $prime; $i++;
} while ($sum <= MAX_NUMBER);

$try = array();
for ($j = 0; $j<count($primes); $j++) {
    $tmp = array_slice($primes, $j, count($primes));
    $sum = 0;
    $primes1 = array();
    foreach ($tmp as $prime) {
        $primes1[] = gmp_intval($prime);
        if (gmp_prob_prime(array_sum($primes1)) === 2) {
            $try[count($primes1)] = $primes1;
        }
    }
}
krsort($try);
$result = array_shift($try);
echo "Prime: ".array_sum($result).PHP_EOL;
echo "Legnt: ".count($result).PHP_EOL;
echo "Expression: ". implode(' + ', $result).' = '.array_sum($result).PHP_EOL;


