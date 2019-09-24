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
            <form action="" method="POST">
                <div class="form-group">
                    <label for="exampleFormControlInput1">CPF</label>
                    <input required name="CPF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="XXX.XXX.XXX-XX">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Selecione o tipo do quarto</label>
                    <select required name="Category" class="form-control" id="exampleFormControlSelect1">
                        <option>Individual</option>
                        <option>Duplo</option>
                    </select>
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
    </body>

    <?php



        function calcdays($enter,$leave){
            $d1 = strtotime($enter); 
            $d2 = strtotime($leave);

            $dataFinal = ($d2 - $d1) /86400;

            return $dataFinal;

        }
        
        function calctax($categoryroom, $totaldays){
            static $individualroom_price =100.0;
            static $duploroom_price = 150.0;

            var_dump($totaldays);
            $total = 0 ;
            var_dump($total);
            if($categoryroom == "Individual"){
                $total = $individualroom_price *1.05;
                $total += 30.0 * $totaldays;
                
            }
            
            if($categoryroom == "Duplo"){
                $total = $duploroom_price*1.05;
                $total += 30.0 * $totaldays;
                
            }

            var_dump($total);
            return $total;
        }
        
        if (isset($_POST['CPF']) && isset($_POST['Category'])&& isset($_POST['enter_date'])&& isset($_POST['leave_date'])){
            $cpf = $_POST['CPF'];
            $category = $_POST['Category'];
            $enterdate = $_POST['enter_date'];
            $leavedate = $_POST['leave_date'];

            $totaldays = calcdays($enterdate,$leavedate);
            
            
            $finalprice = calctax($category, $totaldays);
            
            echo '<script type="text/javascript">';
            echo " document.write('".$cpf.$category.$enterdate.$leavedate.$finalprice."') ";
            echo '</script>';
            
            



        }

    ?>
</html>
