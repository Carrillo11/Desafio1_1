<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <link rel="stylesheet" href="css/salario.css" />
    <link rel="stylesheet" href="css/links.css"/>
    <link rel="stylesheet" href="css/formoid-solid-purple.css" />
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Khula:wght@300&display=swap" rel="stylesheet">
    <script src="js/inputFilter.js"></script>
    <script src="js/modernizr.custom.lis.js"></script>
    <script src="js/prefixfree.min.js"></script>
</head>
<body>
<header id="inset">
    <h1>Factura de compra</h1>
</header>
<section>
    <article>
        <?php 
        if(isset($_POST['enviar'])){
			$producto=isset($_POST['producto']) ? $_POST['producto'] : "";
            $precio=isset($_POST['precio']) ? $_POST['precio'] : "";
            $cantidad=isset($_POST['cantidad']) ? $_POST['cantidad'] : "";
            if(isset($_POST['efectivo'])){
                $precio=isset($_POST['precio']) ? $_POST['precio'] : "";
                $cantidad=isset($_POST['cantidad']) ? $_POST['cantidad'] : "";
                $preciodesc=$precio*$cantidad*0.124;
                $metodo="Efectivo";
            }
            else if(isset($_POST['cheque'])){
                $precio=isset($_POST['precio']) ? $_POST['precio'] : "";
                $cantidad=isset($_POST['cantidad']) ? $_POST['cantidad'] : "";
                $preciodesc=$precio*$cantidad*0.086;
                $metodo="Cheque";
            }
            else if(isset($_POST['tarjeta'])){
                $precio=isset($_POST['precio']) ? $_POST['precio'] : "";
                $cantidad=isset($_POST['cantidad']) ? $_POST['cantidad'] : "";
                $preciodesc=$precio*$cantidad*0.0421;
                $metodo="Tarjeta";
            }
        
            $totpag=$precio*$cantidad-$preciodesc;
            echo "<div id=\"tab\">\n<h3>Boleta de pago</h3>\n";
			echo "<table>\n";
			echo "\t<tr>\n\t\t<th colspan=\"2\">\n\t\t\tDetalle del pago \n\t\t</th>\n\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tProducto: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$producto,"\n\t\t</td>\n\t\t\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tCantidad: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$cantidad,"\n\t\t</td>\n\t\t\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tPrecio Unitario: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$precio,"€\n\t\t</td>\n\t\t\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tPrecio Total: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$precio*$cantidad,"€\n\t\t</td>\n\t\t\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tMetodo de Pago: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$metodo,"\n\t\t</td>\n\t\t\t</tr>\n";
			echo "\t<tr>\n\t\t<td>\n\t\t\tDescuento: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",-$preciodesc,"€\n\t\t</td>\n\t\t\t</tr>\n";
			echo "\t<tr>\n\t\t<td>\n\t\t\tTotal: \n\t\t</td>\n\t\t<td class=\"number\">\n\t\t\t",$totpag,"€\n\t\t</td>\n\t\t\t</tr>\n";
		    echo "</table>\n</div>\n";
        }
        ?>
        <a href="index.html" class="a-btn">
			<span class="a-btn-symbol">i</span>
			<span class="a-btn-slide-text">Ingresar otra compra</span>
			<span class="a-btn-slide-icon"></span>
		</a>
    </article>
</section>
</body>
</html>