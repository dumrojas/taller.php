<?php
require_once __DIR__ . '/../clases/Conjuntos.php';

$resultado = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = array_map('intval', array_filter(preg_split('/[\s,]+/', trim($_POST['conjuntoA'] ?? '')), 'strlen'));
    $b = array_map('intval', array_filter(preg_split('/[\s,]+/', trim($_POST['conjuntoB'] ?? '')), 'strlen'));

    $conj = new Conjuntos();
    $resultado = [
        'union' => $conj->union($a, $b),
        'interseccion' => $conj->interseccion($a, $b),
        'diferenciaAB' => $conj->diferencia($a, $b),
        'diferenciaBA' => $conj->diferencia($b, $a)
    ];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4. Conjuntos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <h2>4. Operaciones con Conjuntos</h2>
        <form action="" method="post">
            <label for="conjuntoA">Conjunto A (números separados por coma):</label>
            <input type="text" name="conjuntoA" id="conjuntoA" required placeholder="Ej: 1, 2, 3, 4">
            <label for="conjuntoB">Conjunto B (números separados por coma):</label>
            <input type="text" name="conjuntoB" id="conjuntoB" required placeholder="Ej: 3, 4, 5, 6">
            <button type="submit">Calcular</button>
        </form>
        <?php if ($resultado !== null): ?>
            <div class="resultado">
                <p><strong>Unión (A ∪ B):</strong> <?php echo implode(', ', $resultado['union']); ?></p>
                <p><strong>Intersección (A ∩ B):</strong> <?php echo implode(', ', $resultado['interseccion']); ?></p>
                <p><strong>Diferencia (A - B):</strong> <?php echo implode(', ', $resultado['diferenciaAB']); ?></p>
                <p><strong>Diferencia (B - A):</strong> <?php echo implode(', ', $resultado['diferenciaBA']); ?></p>
            </div>
        <?php endif; ?>
        <p><a href="../index.php">Volver al menú</a></p>
    </main>
</body>
</html>
