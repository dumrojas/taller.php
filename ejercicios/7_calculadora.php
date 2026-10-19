<?php
session_start();
require_once __DIR__ . '/../clases/Calculadora.php';

if (!isset($_SESSION['historial'])) {
    $_SESSION['historial'] = [];
}

$resultado = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['limpiar'])) {
        $_SESSION['historial'] = [];
        $resultado = 'Historial borrado.';
    } else {
        $a = $_POST['num1'] ?? '';
        $b = $_POST['num2'] ?? '';
        $op = $_POST['operacion'] ?? '+';
        if (is_numeric($a) && is_numeric($b)) {
            $calc = new Calculadora();
            $res = $calc->operar((float)$a, (float)$b, $op);
            if (is_string($res) && strpos($res, 'Error') !== false) {
                $error = $res;
            } else {
                $resultado = $a . ' ' . $op . ' ' . $b . ' = ' . $res;
                $_SESSION['historial'][] = $resultado;
            }
        } else {
            $error = 'Ingrese números válidos.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7. Calculadora</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <h2>7. Calculadora con Historial</h2>
        <form action="" method="post">
            <label for="num1">Número 1:</label>
            <input type="number" step="any" name="num1" id="num1" required>
            <label for="operacion">Operación:</label>
            <select name="operacion" id="operacion">
                <option value="+">Suma (+)</option>
                <option value="-">Resta (-)</option>
                <option value="*">Multiplicación (*)</option>
                <option value="/">División (/)</option>
                <option value="%">Porcentaje (%)</option>
            </select>
            <label for="num2">Número 2:</label>
            <input type="number" step="any" name="num2" id="num2" required>
            <button type="submit">Calcular</button>
            <button type="submit" name="limpiar" value="1">Borrar Historial</button>
        </form>
        <?php if ($error !== ''): ?>
            <div class="resultado error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <?php if ($resultado !== ''): ?>
            <div class="resultado"><?php echo htmlspecialchars($resultado); ?></div>
        <?php endif; ?>

        <?php if (!empty($_SESSION['historial'])): ?>
            <h3>Historial</h3>
            <ul>
                <?php foreach ($_SESSION['historial'] as $item): ?>
                    <li><?php echo htmlspecialchars($item); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <p><a href="../index.php">Volver al menú</a></p>
    </main>
</body>
</html>
