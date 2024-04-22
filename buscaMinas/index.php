<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Busca Minas</title>
    </head>
    <body>
        <form name="form1" action="controlador/jugada.php" method="POST">
            <p>Tamaño</p> <input type="text" name="t" value=""> 
            <p>Minas</p> <input type="text" name="m" value="">
            <input type="submit" name="jugar" value="Jugar">
            <input type="submit" name="volveraJugada" value="Volver">
        </form>
    </body>
</html>