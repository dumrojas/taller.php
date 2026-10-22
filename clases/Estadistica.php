<?php
class Estadistica {
    public function promedio(array $nums): float {
        return array_sum($nums) / count($nums);
    }

    public function mediana(array $nums): float {
        sort($nums);
        $n = count($nums);
        $mid = floor(($n - 1) / 2);
        if ($n % 2 == 0) {
            return ($nums[$mid] + $nums[$mid + 1]) / 2;
        } else {
            return $nums[$mid];
        }
    }

    public function moda(array $nums): array {
        $strNums = array_map('strval', $nums);
        $freq = array_count_values($strNums);
        $max = max($freq);
        $modas = array_keys($freq, $max);
        return array_map('floatval', $modas);
    }
}
