<!DOCTYPE html>
<html>
<head>
    <title>oxe</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="reservationpage.css">

    <body class="bodyreservation">
        <h1 class="heads">Reservar quarto</h1>
        <div class="container" id="container">
            <form action="reservationoverviewpage.html" method="POST">
                <div class="form-group">
                    <label for="exampleFormControlInput1">CPF</label>
                    <input name="CPF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="XXX.XXX.XXX-XX">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Selecione o tipo do quarto</label>
                    <select name="Category" class="form-control" id="exampleFormControlSelect1">
                        <option>Individual</option>
                        <option>Duplo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Data de entrada</label>
                    <input name="enter_date" type="date" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Data de saida</label>
                    <input name="leave_date" type="date" class="form-control" id="exampleFormControlInput1">
                </div>
                <button type="submit" class="btn btn-primary">Reservar</button>
            </form>
        </div>
    </body>

    <?php
        if (isset($_POST['CPF'])){
            echo '<script type="text/javascript">';
            echo "document.write('CPF PREENCHIDO')";
            echo '</script>';
        }
    ?>
</html>