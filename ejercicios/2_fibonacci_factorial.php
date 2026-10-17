<?php
require_once __DIR__ . '/../clases/Fibonacci.php';
require_once __DIR__ . '/../clases/Factorial.php';

$resultado = '';
$operacion = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = (int) ($_POST['numero'] ?? 0);
    $operacion = $_POST['operacion'] ?? '';
    if ($operacion === 'fibonacci') {
        $fib = new Fibonacci();
        $serie = $fib->serie($numero);
        $resultado = implode(', ', $serie);
    } elseif ($operacion === 'factorial') {
        $fact = new Factorial();
        $resultado = (string) $fact->calcular($numero);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2. Fibonacci / Factorial</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <h2>2. Sucesión de Fibonacci o Factorial</h2>
        <form action="" method="post">
            <label for="numero">Número:</label>
            <input type="number" name="numero" id="numero" min="1" required>
            <label for="operacion">Operación:</label>
            <select name="operacion" id="operacion" required>
                <option value="fibonacci">Fibonacci</option>
                <option value="factorial">Factorial</option>
            </select>
            <button type="submit">Calcular</button>
        </form>
        <?php if ($resultado !== ''): ?>
            <div class="resultado">
                <strong>Resultado (<?php echo $operacion; ?>):</strong> <?php echo htmlspecialchars($resultado); ?>
            </div>
        <?php endif; ?>
        <p><a href="../index.php">Volver al menú</a></p>
    </main>
</body>
</html>
