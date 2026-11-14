<?php
class Nodo {
    public $valor;
    public $izq;
    public $der;

    public function __construct($valor) {
        $this->valor = $valor;
        $this->izq = null;
        $this->der = null;
    }
}

class ArbolBinario {
    public function construirPreIn(array $pre, array $in): ?Nodo {
        if (empty($pre) || empty($in)) return null;
        $raiz = new Nodo($pre[0]);
        $pos = array_search($raiz->valor, $in);
        if ($pos === false) return null;
        $izqIn = array_slice($in, 0, $pos);
        $derIn = array_slice($in, $pos + 1);
        $izqPre = array_slice($pre, 1, count($izqIn));
        $derPre = array_slice($pre, 1 + count($izqIn));
        $raiz->izq = $this->construirPreIn($izqPre, $izqIn);
        $raiz->der = $this->construirPreIn($derPre, $derIn);
        return $raiz;
    }

    public function construirInPost(array $in, array $post): ?Nodo {
        if (empty($in) || empty($post)) return null;
        $raizVal = end($post);
        $raiz = new Nodo($raizVal);
        $pos = array_search($raizVal, $in);
        if ($pos === false) return null;
        $izqIn = array_slice($in, 0, $pos);
        $derIn = array_slice($in, $pos + 1);
        $izqPost = array_slice($post, 0, count($izqIn));
        $derPost = array_slice($post, count($izqIn), count($derIn));
        $raiz->izq = $this->construirInPost($izqIn, $izqPost);
        $raiz->der = $this->construirInPost($derIn, $derPost);
        return $raiz;
    }

    public function render(?Nodo $nodo): string {
        if ($nodo === null) return '';
        return '<ul class="arbol-estructura">' . $this->renderNodo($nodo) . '</ul>';
    }

    private function renderNodo(Nodo $nodo): string {
        $html = '<li><strong>' . htmlspecialchars($nodo->valor) . '</strong>';

        if ($nodo->izq !== null || $nodo->der !== null) {
            $html .= '<ul>';
            if ($nodo->izq !== null) $html .= $this->renderNodo($nodo->izq);
            if ($nodo->der !== null) $html .= $this->renderNodo($nodo->der);
            $html .= '</ul>';
        }

        return $html . '</li>';
    }
}
