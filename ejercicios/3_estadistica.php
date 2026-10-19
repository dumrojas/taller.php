<?php
require_once __DIR__ . '/../clases/Estadistica.php';

$resultado = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entrada = $_POST['numeros'] ?? '';
    $partes = preg_split('/[\s,]+/', trim($entrada));
    $numeros = [];
    foreach ($partes as $p) {
        if (is_numeric($p)) {
            $numeros[] = (float) $p;
        }
    }
    if (count($numeros) > 0) {
        $est = new Estadistica();
        $resultado = [
            'promedio' => $est->promedio($numeros),
            'mediana' => $est->mediana($numeros),
            'moda' => $est->moda($numeros)
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3. Estadística</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <h2>3. Promedio, Media y Moda</h2>
        <form action="" method="post">
            <label for="numeros">Ingrese números separados por coma o espacio:</label>
            <input type="text" name="numeros" id="numeros" required placeholder="Ej: 1, 2, 3, 4, 5">
            <button type="submit">Calcular</button>
        </form>
        <?php if ($resultado !== null): ?>
            <div class="resultado">
                <p><strong>Promedio:</strong> <?php echo number_format($resultado['promedio'], 2); ?></p>
                <p><strong>Mediana:</strong> <?php echo number_format($resultado['mediana'], 2); ?></p>
                <p><strong>Moda:</strong> <?php echo implode(', ', $resultado['moda']); ?></p>
            </div>
        <?php endif; ?>
        <p><a href="../index.php">Volver al menú</a></p>
    </main>
</body>
</html>

