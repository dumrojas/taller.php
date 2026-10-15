<?php
require_once __DIR__ . '/../clases/Acronimo.php';

$resultado = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $frase = $_POST['frase'] ?? '';
    $acronimo = new Acronimo();
    $resultado = $acronimo->generar($frase);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1. Acrónimo</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <h2>1. Convertir frase a acrónimo</h2>
        <form action="" method="post">
            <label for="frase">Ingrese la frase:</label>
            <input type="text" name="frase" id="frase" required placeholder="Ej: Portable Network Graphics">
            <button type="submit">Generar Acrónimo</button>
        </form>
        <?php if ($resultado !== ''): ?>
            <div class="resultado">
                <strong>Acrónimo:</strong> <?php echo htmlspecialchars($resultado); ?>
            </div>
        <?php endif; ?>
        <p><a href="../index.php">Volver al menú</a></p>
    </main>
</body>
</html>
