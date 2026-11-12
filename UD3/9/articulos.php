<!DOCTYPE html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Examen DWES</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="encabezado">
	<h1>Ejercicio: </h1>
</div>

<div id="contenido">
	<h2>Contenido</h2>

<?php

$categorias = ['INF', 'JUV', 'VET', 'ALE', 'CLASE_A', 'CLASE_B', 'CLASE_C'];

$recargos = [
    'Importacion' => 10,
    'Diseno' => 12,
    'Temporada' => 8,
    'Piel' => 15
];

// La primera vez que se abre la pagina, el formulario esta vacio.
$descripcion = '';

// Suma los recargos seleccionados sobre el precio base.
function calcula_recargo($precio, $seleccionados, $recargos)
{
    $importe = 0;

    foreach ($seleccionados as $concepto) {
        $importe += round($precio * $recargos[$concepto] / 100, 2);
    }

    return round($importe, 2);
}

// Aplica el descuento al precio con los recargos incluidos.
function calcula_total($precio, $importeRecargos)
{
    $subtotal = $precio + $importeRecargos;
    $descuento = round($subtotal * 0.05, 2);

    return round($subtotal - $descuento, 2);
}

$categoria = $categorias[0];
$precio = '';
$stock = '';
$seleccionados = [];
$errores = [];
$mostrarResultado = false;

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    // Las claves de $_POST coinciden con los atributos name del formulario.
    $descripcion = trim(is_string($_POST['descripcion'] ?? null) ? $_POST['descripcion'] : '');
    $categoria = is_string($_POST['categoria'] ?? null) ? $_POST['categoria'] : '';
    $precio = trim(is_string($_POST['precio'] ?? null) ? $_POST['precio'] : '');
    $stock = trim(is_string($_POST['stock'] ?? null) ? $_POST['stock'] : '');

    // Si no se marca ninguna casilla, PHP no recibe la clave recargos.
    $enviados = $_POST['recargos'] ?? [];

    // Se toman solo los conceptos conocidos, una vez cada uno.
    foreach ($recargos as $concepto => $porcentaje) {
        if (is_array($enviados) && in_array($concepto, $enviados, true)) {
            $seleccionados[] = $concepto;
        }
    }

    // Una cadena vacia y el valor "0" se comprueban por separado.
    if ($descripcion === '') {
        $errores[] = 'Introduce la descripcion.';
    }

    if ($precio === '') {
        $errores[] = 'Introduce el precio.';
    } elseif (!preg_match('/^[0-9]+([.,][0-9]{1,2})?$/D', $precio)) {
        $errores[] = 'Introduce un precio no negativo con un maximo de dos decimales.';
    }

    if ($stock === '') {
        $errores[] = 'Introduce el stock.';
    } elseif (!ctype_digit($stock)) {
        $errores[] = 'El stock debe ser un numero entero no negativo.';
    }

    if (!in_array($categoria, $categorias, true)) {
        $errores[] = 'Selecciona una categoria valida.';
    }

    if ($errores === []) {
        $precioBase = (float) str_replace(',', '.', $precio);
        $importeRecargos = calcula_recargo($precioBase, $seleccionados, $recargos);
        $subtotal = round($precioBase + $importeRecargos, 2);
        $total = calcula_total($precioBase, $importeRecargos);
        $descuento = round($subtotal - $total, 2);
        $mostrarResultado = true;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de articulos</title>
</head>
<body>
    <h1>Registro de articulos</h1>

    <?php if ($errores !== []): ?>
        <ul>
            <?php foreach ($errores as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <!-- El formulario envia los datos a esta misma pagina. -->
    <form method="post">
        <p>
            <label for="descripcion">Descripcion</label>
            <input type="text" id="descripcion" name="descripcion"
                   value="<?= htmlspecialchars($descripcion) ?>" required>
        </p>

        <p>
            <label for="categoria">Categoria</label>
            <select id="categoria" name="categoria">
                <?php foreach ($categorias as $clave): ?>
                    <option value="<?= $clave ?>" <?= $clave === $categoria ? 'selected' : '' ?>>
                        <?= $clave ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <label for="precio">Precio en euros</label>
            <input type="text" inputmode="decimal" id="precio" name="precio"
                   value="<?= htmlspecialchars($precio) ?>" required>
        </p>

        <p>
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" min="0" step="1"
                   value="<?= htmlspecialchars($stock) ?>" required>
        </p>

        <fieldset>
            <legend>Recargos</legend>

            <?php foreach ($recargos as $concepto => $porcentaje): ?>
                <label>
                    <input type="checkbox" name="recargos[]" value="<?= $concepto ?>"
                           <?= in_array($concepto, $seleccionados, true) ? 'checked' : '' ?>>
                    <?= $concepto ?> (<?= $porcentaje ?> %)
                </label><br>
            <?php endforeach; ?>
        </fieldset>

        <p><button type="submit">Registrar articulo</button></p>
    </form>

    <?php if ($mostrarResultado): ?>
        <h2>Datos del articulo</h2>
        <p>Descripcion: <?= htmlspecialchars($descripcion) ?></p>
        <p>Categoria: <?= $categoria ?></p>
        <p>Stock: <?= htmlspecialchars($stock) ?> unidades</p>

        <h2>Desglose del coste por unidad</h2>
        <ul>
            <li>Precio base: <?= number_format($precioBase, 2, ',', '.') ?> €</li>
            <?php foreach ($seleccionados as $concepto): ?>
                <li>
                    <?= $concepto ?> (<?= $recargos[$concepto] ?> %):
                    <?= number_format($precioBase * $recargos[$concepto] / 100, 2, ',', '.') ?> €
                </li>
            <?php endforeach; ?>
            <li>Total de recargos: <?= number_format($importeRecargos, 2, ',', '.') ?> €</li>
            <li>Subtotal: <?= number_format($subtotal, 2, ',', '.') ?> €</li>
            <li>Descuento del 5 %: <?= number_format($descuento, 2, ',', '.') ?> €</li>
            <li><strong>Total a pagar: <?= number_format($total, 2, ',', '.') ?> €</strong></li>
        </ul>
    <?php endif; ?>
</body>
</html>


</div>

<div id="pie">
</div>

</body>
</html>