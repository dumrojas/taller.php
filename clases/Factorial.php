<?php
class Factorial {
    public function calcular(int $n): int {
        $res = 1;
        for ($i = 2; $i <= $n; $i++) {
            $res *= $i;
        }
        return $res;
    }
}
