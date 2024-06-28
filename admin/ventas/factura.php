<?php
// Incluye la librería TCPDF 
require_once('../../app/TCPDF-main/examples/tcpdf_include.php');
include("../../app/config.php");
$id_venta = $_GET['id_venta'];

$sql = "SELECT * FROM ventas as comp WHERE id_venta = '$id_venta'";
$query = $pdo->prepare($sql);
$query->execute();
$venta = $query->fetch();

$id_cliente =$venta['id_cliente'];
$fecha = date ('d/m/Y', strtotime($venta['fecha']));

$sql = "SELECT * FROM usuarios WHERE id_usuario = '$id_cliente'";
$query = $pdo->prepare($sql);
$query->execute();
$cliente = $query->fetch();

// crea un nuevo documento pdf
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(215, 279), true, 'UTF-8', false);

//establece la información del documento
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Centro Veterinario GB');
$pdf->setTitle('Factura');
$pdf->setSubject('Factura');
$pdf->setKeywords('Factura');

// remueve encabezado y pie de página por defecto
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// establece la fuente
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// setea márgenes
$pdf->setMargins(5, 5, 5);

// establece auto page breaks
$pdf->setAutoPageBreak(true, 5);


// escala de imagen
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// seteo de lenguajes
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// fuente
$pdf->setFont('Helvetica', '', 7);

// agrega página
$pdf->AddPage();

// crea el html
$html = '<br><br>
<table border="0">
<tr>
    <td style="text-align: center; width: 260px">
        <b style="font-size: 18px">Centro Veterinario GB</b><br><br>
        <span style="font-size: 11px">Dr. Enrique Simón Pérez 4900, González Catán </span><br><br>
        <span style="font-size: 11px">Condición Frente al IVA: Responsable Monotributo</span> <br>
    </td>
    <td style="width: 210px; text-align: center"><img src="../../Images/pata.jpg" width="110" height="104">
    </td>
    <td style="width: 290px">
        <b style="font-size: 18px">Factura Original</b><br><br>
        <font size="11px">Nº '.$id_venta.'</font><br>
        <font size="11px">Fecha de Emisión: '.$fecha.'</font><br><br>
        CUIT: 20117747896<br>
        Ingresos Brutos: 465343154577 <br>
        Fecha de inicio de actividades 5/11/2021
    </td>
</tr>
</table><br><br>

<div style="border: 1px solid #000000; font-size: 12px;">
    <table cellpadding="6px">
        <tr>
            <td>
            <b>Datos del cliente</b><br>
            Nombre: '.$cliente['nombres'].' '.$cliente['apellido'].'<br>
            Teléfono: '.$cliente['celular'].'<br>
            Dirección: '.$cliente['calle'].' '.$cliente['altura'].'<br>
            Localidad: '.$cliente['localidad'].'<br>
            Consumidor Final
            </td>
        </tr>
    </table>
</div><br>

<div style="font-size: 12px;">
    <table border= "1" cellpadding="5px" style="text-align: center">
        <tr style="background-color: #555555; color: white">
            <th style="width: 40px">Nro</th>
            <th style="width: 180px">Producto</th>
            <th style="width: 280px">Descripción</th>
            <th style="width: 70px">Cantidad</th>
            <th style="width: 70px">Precio Unitario</th>
            <th style="width: 70px">Subtotal</th>
        </tr>
';

//consulta la base de datos para traer la info de la compra
$sql = "SELECT * FROM carrito WHERE id_venta = '$id_venta'";
$query = $pdo->prepare($sql);
$query->execute();
$carritos = $query->fetchAll();

$total = 0;
$contador = 1;
foreach($carritos as $carrito){
    $html .= '<tr>
                <td>'.$contador.'</td>';

    $id = $carrito['id_producto'];
    $sql = "SELECT * FROM productos WHERE id_producto = '$id'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $producto = $query->fetch();

    $html .= '<td>'.$producto['nombre'].'</td>
            <td>'.$producto['descripcion'].'</td>
            <td>'.$carrito['cantidad'].'</td>
            <td>'.$producto['precio'].'</td>';

    $subtotal = $carrito['cantidad'] * $producto['precio'];

    $html .= '<td>'.$subtotal.'</td>
            </tr>';
    $total = $total + $subtotal; 
    $contador = $contador + 1;
}

$html .='
        <tr>
            <td colspan="5" style="text-align: right; background-color: #888; color: white">TOTAL</td>
            <td>'.$total.'</td>
        </tr>
    </table>
</div><br><br>
<div style="font-size: 14px; margin: 5px">
    <p><b>Monto total: </b>$ '.$total.'</p>';


$html .= '<p><b>Son: '.numeroALetras($total).' pesos</b></p><br><hr><br>
</div>
<div style="font-size: 18px; margin: 5px; text-align:center"><b>Gracias por su compra</b></div>

';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');



$style = array(
    'border' => 1,
    'vpadding' => '3',
    'hpadding' => '3',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

$QR = 'Factura realizada por el sistema veterinario de Gustavo Barrajón, al cliente '.$cliente['nombres'].' '.$cliente['apellido'].' y esta factura se genero el '.$fecha;
$pdf->write2DBarcode($QR,'QRCODE,L',  160,230,35,35, $style);




//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

function numeroALetras($numero) {
    // Arrays para unidades, especiales, decenas y centenas hasta veinte
    $unidades = ['', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve'];
    $especiales = ['diez', 'once', 'doce', 'trece', 'catorce', 'quince', 'dieciséis', 'diecisiete', 'dieciocho', 'diecinueve'];
    $decenas = ['', 'diez', 'veinte', 'treinta', 'cuarenta', 'cincuenta', 'sesenta', 'setenta', 'ochenta', 'noventa'];
    $centenas = ['', 'ciento', 'doscientos', 'trescientos', 'cuatrocientos', 'quinientos', 'seiscientos', 'setecientos', 'ochocientos', 'novecientos'];

    // Función para convertir números menores a 1000
    function convertirMenorMil($numero, $unidades, $especiales, $decenas, $centenas) {
        if ($numero < 10) {
            return $unidades[$numero];
        } elseif ($numero < 20) {
            return $especiales[$numero - 10];
        } elseif ($numero < 100) {
            $unidad = $numero % 10;
            $decena = floor($numero / 10);
            if ($unidad === 0) {
                return $decenas[$decena];
            } else {
                return $decenas[$decena] . ' y ' . $unidades[$unidad];
            }
        } else { // Números entre 100 y 999
            $centena = floor($numero / 100);
            $resto = $numero % 100;
            if ($resto === 0) {
                return $centenas[$centena];
            } else {
                return $centenas[$centena] . ' ' . convertirMenorMil($resto, $unidades, $especiales, $decenas, $centenas);
            }
        }
    }

    // Función principal para convertir números hasta un millón
    function convertir($numero, $unidades, $especiales, $decenas, $centenas) {
        if ($numero === 0) {
            return 'cero';
        } elseif ($numero < 1000) {
            return convertirMenorMil($numero, $unidades, $especiales, $decenas, $centenas);
        } elseif ($numero < 1000000) {
            $miles = floor($numero / 1000);
            $resto = $numero % 1000;
            if ($resto === 0) {
                return convertirMenorMil($miles, $unidades, $especiales, $decenas, $centenas) . ' mil';
            } else {
                return convertirMenorMil($miles, $unidades, $especiales, $decenas, $centenas) . ' mil ' . convertirMenorMil($resto, $unidades, $especiales, $decenas, $centenas);
            }
        } else {
            return 'Número demasiado grande para esta implementación'; // Puedes ampliar la función para manejar números mayores si es necesario
        }
    }

    // Verificación de límites y llamada a la función principal
    if ($numero < 1000000) {
        return convertir($numero, $unidades, $especiales, $decenas, $centenas);
    } else {
        return 'Número demasiado grande para esta implementación'; // Puedes ampliar la función para manejar números mayores si es necesario
    }
}