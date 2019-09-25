<!DOCTYPE html>
<html>


<?php

function calcdays($enter, $leave)
{
    $d1 = strtotime($enter);
    $d2 = strtotime($leave);

    $totalDaysr = ($d2 - $d1) / 86400;

    return $totalDaysr;
}

function calctax($categoryRoomf, $totalDaysf, $qtHospedesf)
{
    $individualRoomPrice = 100.0;
    $duploRoomPrice = 150.0;

    var_dump($totalDaysf);
    $total = 0;
    var_dump($total);

    if ($categoryRoomf == "Individual") {
        $total = $individualRoomPrice * $totalDaysf;
        $total += $total * 0.05;
        $total += (10.0 * $qtHospedesf) * $totalDaysf;
        $total += 20 * $totalDaysf;
    }

    if ($categoryRoomf == "Duplo") {
        $total = $duploRoomPrice * $totalDaysf;
        $total += $total * 0.05;
        $total += (10 * $qtHospedesf) * $totalDaysf;
        $total += 20 * $totalDaysf;
    }

    var_dump($total);
    return $total;
}

if (isset($_POST['CPF']) && isset($_POST['Category']) && isset($_POST['enter_date']) && isset($_POST['leave_date']) && isset($_POST['Qthospedes'])) {

    $cpf = $_POST['CPF'];
    $category = $_POST['Category'];
    $enterDate = $_POST['enter_date'];
    $leaveDate = $_POST['leave_date'];
    $qtHospedes = $_POST['Qthospedes'];

    $totalDays = calcdays($enterDate, $leaveDate);

    $finalPrice = calctax($category, $totalDays, $qtHospedes);
    
    $idRoom;
    if($category == "Individual"){
        $idRoom=1;
    }
    if($category == "Duplo"){
        $idRoom=2;
    }

    /*
    echo '<script type="text/javascript">';
    echo " document.write('" . $cpf . $category . $enterDate . $leaveDate . $finalPrice . "') ";
    echo '</script>';
    */
}

?>

<?php
    $servername = "127.0.0.1";
    $database = "hotel_jamaica";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

    $sql = "INSERT INTO reserva (precototal, id_cliente, id_quarto) VALUES ($finalPrice, 1, $idRoom)";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  
    mysqli_close($conn);
?>



<head>
    <title>oxe</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="reservationoverview.css">
</head>

<body class="bodyreservation">
    <h1 class="heads">Detalhes da reserva</h1>
    <div class="container" id="container">
        <form>
            <div class="form-group">
                <label for="disabledInput">Tipo do quarto:</label>
                <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled value="<?php echo $category ?>">
            </div>
            <div class="form-group">
                <label for="disabledInput">Preço total:</label>
                <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled value="<?php echo $finalPrice ?>">
            </div>
        </form>
    </div>
</body>

</html>