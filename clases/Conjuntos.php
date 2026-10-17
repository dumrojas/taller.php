<?php
class Conjuntos {
    public function union(array $a, array $b): array {
        return array_unique(array_merge($a, $b));
    }

    public function interseccion(array $a, array $b): array {
        return array_intersect($a, $b);
    }

    public function diferencia(array $a, array $b): array {
        return array_diff($a, $b);
    }
}
