<?php
class Factorial {
   
    public function calcular(int $n): string {
        $res = 1;
        for ($i = 2; $i <= $n; $i++) {
            $res *= $i;
        }
        return (string) $res;
    }

    
    public function obtenerProceso(int $n): string {
        if ($n <= 0) return "0";
        if ($n == 1) return "1";
        
        $proceso = [];
        for ($i = $n; $i >= 1; $i--) {
            $proceso[] = $i;
        }
        return implode(' * ', $proceso);
    }
}
