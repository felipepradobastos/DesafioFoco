<!DOCTYPE html>
<html>
<head>
    <title>oxe</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="reservationpage.css">
    <script type="text/javascript" src="validation.js"></script>

</head>

    <body>
        <h1 class="heads">Reservar quarto</h1>
        <div class="container" id="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg 2">
                    <form action="reservationoverviewpage.php" method="POST">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">CPF</label>
                            <input required name="CPF" type="text" class="form-control" id="exampleFormControlInput1" onBlur="ValidarCPF(CPF);" 
                                onKeyPress="MascaraCPF(CPF);" maxlength="14">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Selecione o tipo do quarto</label>
                            <select required name="Category" class="form-control" id="exampleFormControlSelect1">
                                <option>Individual</option>
                                <option>Duplo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Quantidade de Hóspedes</label>
                            <input required name="Qthospedes" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Quantidade de hóspedes para o quarto">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Data de entrada</label>
                            <input required name="enter_date" type="date" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Data de saida</label>
                            <input required name="leave_date" type="date" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <button type="submit" class="btn btn-primary">Reservar</button>
                    </form>
                </div>
                <div class="col-md-auto" id=imglogo>
                    <img src="logojamaica.png" alt="Logo da Jamaica Hoteis" width=200 height=200>
                </div>
            </div>
        </div>
    </body>
</html>