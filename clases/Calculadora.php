<?php
class Calculadora {
    public function operar($a, $b, string $op) {
        switch ($op) {
            case '+': return $a + $b;
            case '-': return $a - $b;
            case '*': return $a * $b;
            case '/': return $b != 0 ? $a / $b : 'Error: división por cero';
            case '%': return $b != 0 ? ($a * $b / 100) : 'Error: división por cero';
            default: return 'Error: operación no válida';
        }
    }
}
