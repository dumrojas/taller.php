<?php
class Acronimo {
    public function generar(string $frase): string {
        $frase = str_replace('-', ' ', $frase);
        $frase = preg_replace('/[^A-Za-z0-9 ]/', '', $frase);
        $palabras = explode(' ', $frase);
        $acronimo = '';
        foreach ($palabras as $palabra) {
            if (trim($palabra) !== '') {
                $acronimo .= strtoupper($palabra[0]);
            }
        }
        return $acronimo;
    }
}