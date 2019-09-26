<!-- Tela INDEX que corresponde a tela de "Realização de Reserva" -->
<!DOCTYPE html>
<!-- Inicio do HTML -->
<html>

<head>
    <!-- Definição do Title -->
    <title>Reservar Quarto</title>
    <!-- Definição do Charset -->
    <meta charset="utf-8">
    <!-- Importação do Arquivo de Estilos CSS do BootsTrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Importação do Arquivo de Estilos personalizado -->
    <link rel="stylesheet" href="reservationpage.css">
    <!-- Importação do Arquivo do Script de Validação/Máscara retirado do StackOverflow do arquivo "validation.js -->
    <script type="text/javascript" src="validation.js"></script>
    <!-- Importação do arquivo do Script de validação de data propio -->
    <script type="text/javascript" src="datevalidator.js"></script>


</head>
<!-- Inicio do Body -->
<body>
    <h1 class="heads">Reservar quarto</h1>
    <!-- Div do painel de Reserva -->
    <div class="container" id="container">
        <!-- Implementação do Boostrap GRID Na coluna do Form de Reserva -->
        <div class="row justify-content-md-center">
            <div class="col col-lg 2">
                <!-- Form da Reserva com a declaração dos NAMES dos Inputs -->
                <form action="reservationoverviewpage.php" method="POST" id="form">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">CPF</label>
                        <input required name="CPF" type="text" class="form-control" id="exampleFormControlInput1" onBlur="ValidarCPF(CPF);" onKeyPress="MascaraCPF(CPF);" maxlength="14">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Categoria do quarto</label>
                        <select required name="Category" class="form-control" id="exampleFormControlSelect1">
                            <option>Individual</option>
                            <option>Duplo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Quantidade de hóspedes</label>
                        <input required name="Qthospedes" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Quantidade de hóspedes para o quarto">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Data de entrada</label>
                        <input required name="enter_date" type="date" class="form-control" id="enter_date">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Data de saída</label>
                        <input required name="leave_date" type="date" class="form-control" id="leave_date">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="finaldatevalidation();">Reservar</button>
                </form>
            </div>
            <!-- Implementação do Boostrap Grid na Coluna da imagem do logo do Jamaica Hotel -->
            <div class="col-md-auto" id=imglogo>
                <img src="logojamaica.png" alt="Logo da Jamaica Hoteis" width=200 height=200>
            </div>
        </div>
    </div>
</body>

</html>