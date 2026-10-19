<?php
require_once __DIR__ . '/../clases/ArbolBinario.php';

$resultado = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pre = trim($_POST['preorden'] ?? '');
    $in = trim($_POST['inorden'] ?? '');
    $post = trim($_POST['postorden'] ?? '');

    $preArr = $pre !== '' ? preg_split('/[\s,]+/', $pre) : [];
    $inArr = $in !== '' ? preg_split('/[\s,]+/', $in) : [];
    $postArr = $post !== '' ? preg_split('/[\s,]+/', $post) : [];

    $count = 0;
    if (!empty($preArr)) $count++;
    if (!empty($inArr)) $count++;
    if (!empty($postArr)) $count++;

    if ($count < 2) {
        $error = 'Debe ingresar al menos dos recorridos.';
    } else {
        $arbol = new ArbolBinario();
        if (!empty($preArr) && !empty($inArr)) {
            $raiz = $arbol->construirPreIn($preArr, $inArr);
            $resultado = $arbol->render($raiz);
        } elseif (!empty($inArr) && !empty($postArr)) {
            $raiz = $arbol->construirInPost($inArr, $postArr);
            $resultado = $arbol->render($raiz);
        } elseif (!empty($preArr) && !empty($postArr)) {
            $error = 'La combinación Preorden - Postorden no es suficiente para reconstruir el árbol de forma única. Use Preorden - Inorden o Inorden - Postorden.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>6. Árbol Binario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <h2>6. Construir Árbol Binario</h2>
        <form action="" method="post">
            <label for="preorden">Preorden (separado por espacios):</label>
            <input type="text" name="preorden" id="preorden" placeholder="Ej: A B D E C">
            <label for="inorden">Inorden (separado por espacios):</label>
            <input type="text" name="inorden" id="inorden" placeholder="Ej: D B E A C">
            <label for="postorden">Postorden (separado por espacios):</label>
            <input type="text" name="postorden" id="postorden" placeholder="Ej: D E B C A">
            <button type="submit">Construir Árbol</button>
        </form>
        <?php if ($error !== ''): ?>
            <div class="resultado error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <?php if ($resultado !== ''): ?>
            <div class="resultado arbol">
                <strong>Árbol (representación indentada):</strong><br>
                <?php echo $resultado; ?>
            </div>
        <?php endif; ?>
        <p><a href="../index.php">Volver al menú</a></p>
    </main>
</body>
</html>
