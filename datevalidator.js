// Função Java Script que valida se a data de entrada é anterior a data de saida

function finaldatevalidation() {
    var leavedate = document.getElementById("leave_date").value;
    var enterdate = document.getElementById("enter_date").value;


    var today = new Date();

    var leavedateop = new Date(leavedate);
    var enterdateop = new Date(enterdate);

    var difference = leavedateop - enterdateop;


    // Verifica se a diferença de milisegundos entre as datas e >=0 ou seja esta se tratando do mesmo dia ou de um dia seguinte
    // na data de saida em relação a data de entrada.
    if (difference >= 0) {
        // Permite a continuação da operação invocando a operação submit do form no button
        document.getElementById("form").submit();
    } else {
        // Caso a data esteja invalida é exibido um Alerta
        alert("Data Inválida");
    }



}