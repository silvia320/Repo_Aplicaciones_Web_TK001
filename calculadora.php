<?php
// Variables
$num1 = '';
$num2 = '';
$op = '';
$resultado = '';
$simbolo = '';
$error = '';

// Solo calculamos si llegan datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = $_POST['num1'] ?? '';
    $num2 = $_POST['num2'] ?? '';
    $op   = $_POST['op'] ?? '';

    if (!is_numeric($num1) || !is_numeric($num2)) {
        $error = 'Ingresa dos números válidos.';
    } else {
        $a = (float)$num1;
        $b = (float)$num2;

        if ($op === 'suma') {
            $resultado = $a + $b;
            $simbolo = '+';
        } elseif ($op === 'resta') {
            $resultado = $a - $b;
            $simbolo = '−';
        } elseif ($op === 'multiplicacion') {
            $resultado = $a * $b;
            $simbolo = '×';
        } elseif ($op === 'division') {
            if ($b == 0) {
                $error = 'No se puede dividir entre cero.';
            } else {
                $resultado = $a / $b;
                $simbolo = '÷';
            }
        } else {
            $error = 'Operación no válida.';
        }
    }
} else {
    $error = 'Usa el formulario de la página principal.';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resultado | Calculadora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="pagina-resultado">
    <div class="tarjeta-resultado">
        <h1>Resultado</h1>

        <?php if ($error): ?>
            <p class="mensaje-error"><?= htmlspecialchars($error) ?></p>
        <?php else: ?>
            <p class="operacion"><?= htmlspecialchars($num1) ?> <?= $simbolo ?> <?= htmlspecialchars($num2) ?></p>
            <p class="valor"><?= round($resultado, 6) ?></p>
        <?php endif; ?>

        <a class="boton" href="index.html#calculadora">Volver a calcular</a>
    </div>
</body>
</html>
