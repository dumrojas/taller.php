<?php
class Fibonacci {
    public function serie(int $n): array {
        $serie = [];
        $a = 0;
        $b = 1;
        for ($i = 0; $i < $n; $i++) {
            $serie[] = $a;
            $temp = $a + $b;
            $a = $b;
            $b = $temp;
        }
        return $serie;
    }
}
