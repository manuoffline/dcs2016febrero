<html>
    <head>
        <title>Ejercicio 11</title>
    </head>
    <body>
        <form name="edad" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            <label>Introduce tu fecha de nacimiento (dd-mm-yyyy): </label><input name="edad" type="text" value="<?php if (isset($_REQUEST['edad'])) {
    echo $_REQUEST['edad'];
} ?>"/><br>
            <input type="submit" name="enviar" value="enviar"/>
        </form>
        <?php
        if (isset($_REQUEST['enviar']) && $_SERVER["REQUEST_METHOD"] == "POST") {
            $fecha = $_REQUEST['edad'];
            // Para los meses utilizo mes actual menos mes original
            // checkdate para comprobar la fecha
            $fmes = explode("-", $fecha);

            $f1 = new DateTime($fmes[2]."-".$fmes[1]."-".$fmes[0]);
            $f2 = new DateTime("now");
            $diferencia = $f1->diff($f2);

            echo $diferencia->d . " dias, ". $diferencia->m. " meses, ".$diferencia->y. " años." ;
        }
        ?>
    </body> 
</html>
