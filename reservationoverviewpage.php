<!DOCTYPE html>
<html>


<?php

include 'model/reserva.php';

// Função que calcula a quantidade de dias entre duas datas
// Params $enter = data de entrada // $leave = data de saida 


function calcdays($enter, $leave)
{
    //%d1,$d2 Guarda o tempo em segundos do dia atribuido a ele.
    $d1 = strtotime($enter);
    $d2 = strtotime($leave);
    // Variavel $totalDaysr recebe a diferença entre $d1 e $d2 dividido por 86400 quantidade de segundos em um dia
    $totalDaysr = ($d2 - $d1) / 86400;

    return $totalDaysr;
}

function defineidroom($category){
    $idRoom =0;
    if($category == "Individual"){
        $idRoom=1;
    }
    if($category == "Duplo"){
        $idRoom=2;
    }
    return $idRoom;
}

// Função que calcula o valor final da reserva
// Params $categoryRoomf recebe a categoria do quarto "Individual", "Duplo" etc
// $totalDaysf recebe o retorno da função caldays com a quantidade em dias da hospedagem
// $qtHospedesf recebe a quantidade de pessoas inserida no form;
function calctax($categoryRoomf, $totalDaysf, $qtHospedesf)
{
    // Variaveis que guardam os valores padrão das categorias dos quartos 100.0 R$ Individual e 150$ Duplo
    $individualRoomPrice = 100.0;
    $duploRoomPrice = 150.0;

    //$total variavel que vai receber operações de calculo de estadia

    $total = 0;


    //Verificação de qual tipo de quarto se enquadra a reserva e desenvolvimento da logica de calculo do valor final;
    if ($categoryRoomf == "Individual") {
        // $total = $individualRoomPrice * $totalDaysf; == Calcula o valor das diaria multiplicado pela quantidade diarias
        // e atribui a $total
        $total = $individualRoomPrice * $totalDaysf;
        // $total += $total * 0.05; == Variavel total recebe ela mesma mais os 5% da taxa de quarto e estadia
        $total += $total * 0.05;
        // $total += (10.0 * $qtHospedesf) * $totalDaysf; == Variavel total recebe ela mesma mais o calculo da taxa de turismo por pessoa
        // e por dia
        $total += (10.0 * $qtHospedesf) * $totalDaysf;
        //  $total += 20 * $totalDaysf; == Total recebe a taxa de uso do wi-fi do quarto por dia.
        $total += 20 * $totalDaysf;
    }

    // A mesma logica a cima a aplicada somente modificando o preço do quarto devido a categoria ter mudado.
    if ($categoryRoomf == "Duplo") {
        $total = $duploRoomPrice * $totalDaysf;
        $total += $total * 0.05;
        $total += (10 * $qtHospedesf) * $totalDaysf;
        $total += 20 * $totalDaysf;
    }
   
    return $total;
}



// Recupera os dados do form 
if (isset($_POST['CPF']) && isset($_POST['Category']) && isset($_POST['enter_date']) && isset($_POST['leave_date']) && isset($_POST['Qthospedes'])) 
{

    // Instancia objeto tipo reserva
    $reserva = new reserva();
 
    // Seta os valores do form nos atributos do objeto $reserva
    $reserva->__setCategory($_POST['Category']);
    $reserva->__setEnterDate($_POST['enter_date']);
    $reserva->__setLeaveDate($_POST['leave_date']);
    $reserva->__setQtHospedes($_POST['Qthospedes']);
    $reserva->__setIdQuarto(defineidroom($reserva->__getCategory()));
    $reserva->__setTotalDays(calcdays($reserva->__getEnterDate(),$reserva->__getLeaveDate()));
    $reserva->__setTotalPrice(calctax($reserva->__getCategory(),$reserva->__getTotalDays(),$reserva->__getQtHospedes()));

    // Variaveis de acesso ao banco de dados
    $servername = "127.0.0.1";
    $database = "hotel_jamaica";
    $username = "root";
    $password = "";
    // Cria conexão
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Valida Conexão
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

    // Por algum motivo não consegui inserir diretamente nos parametros da variavel $sql os get
    // Então criei essas duas variaveis resgatando os atributos do elemento $reserva e utilizei os mesmos
    // para passar como atributos na criação do Statement

    $sqlpt=$reserva->__getTotalPrice();
    $sqlidq=$reserva->__getIdQuarto();
    
    // Script de Inseração de uma Reserva no Bando de Dados
    $sql = "INSERT INTO reserva (precototal, id_cliente, id_quarto) VALUES ($sqlpt, 1, $sqlidq)";
    

    // Chamando a função query com o statment $sql de inserção    
    if (mysqli_query($conn, $sql)) {
        //echo "Inserção com sucesso";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

}
?>




<head>
    <!-- Titulo -->
    <title>Reserva Efetuada</title>
    <!-- Definição do charset -->
    <meta charset="utf-8">
    <!-- Importação do arquivo de estilos do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Importação do arquivo de estilos propio reservationoverview.css  -->
    <link rel="stylesheet" href="reservationoverview.css">
</head>
<!-- Inicio do Body -->
<body class="bodyreservation">
    <h1 class="heads">Detalhes da reserva</h1>
    <div class="container" id="container">
        <form>
            <div class="form-group">
                <label for="disabledInput">Tipo do quarto:</label>
                <!-- Estes imputs estão Disabled ou seja não podem ser alterados e estou utilizando para exibir os valores
                resgatados do objeto $reserva
                -->
                <input class="form-control" id="disabledInput" type="text" placeholder="" disabled value="<?php echo $reserva->__getCategory() ?>">
            </div>
            <div class="form-group">
                <label for="disabledInput">Preço total:</label>
                <input class="form-control" id="disabledInput" type="text" placeholder="" disabled value="<?php echo $reserva->__getTotalPrice() ?>">
            </div>
        </form>
    </div>
</body>

</html>