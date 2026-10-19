<?php
require_once __DIR__ . '/../clases/Binario.php';

$resultado = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = (int) ($_POST['numero'] ?? 0);
    $bin = new Binario();
    $resultado = $bin->convertir($numero);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5. Decimal a Binario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <h2>5. Convertir número entero a binario</h2>
        <form action="" method="post">
            <label for="numero">Número entero:</label>
            <input type="number" name="numero" id="numero" required>
            <button type="submit">Convertir</button>
        </form>
        <?php if ($resultado !== ''): ?>
            <div class="resultado">
                <strong>Binario:</strong> <?php echo htmlspecialchars($resultado); ?>
            </div>
        <?php endif; ?>
        <p><a href="../index.php">Volver al menú</a></p>
    </main>
</body>
</html>
