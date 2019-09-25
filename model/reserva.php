<?php
class reserva{

private $id;
private $totalPrice;
private $idCliente;
private $idQuarto;
private $category;
private $totalDays;
private $enterDate;
private $leaveDate;
private $qtHospedes;

// Criação dos métodos __Get e __Set
    
    // Get/Set TotalPrice
    public function __setTotalPrice($value){
        $this->totalPrice = $value;
    }
    public function __getTotalPrice(){
        return $this->totalPrice;
    }
    // Get/Set Category
    public function __setCategory($value){
        $this->category = $value;
    }
    public function __getCategory(){
        return $this->category;
    }
    // Get/Set QtHospedes
    public function __setQtHospedes($value){
        $this->qtHospedes = $value;
    }
    public function __getQtHospedes(){
        return $this->qtHospedes;
    }
    // Get/Set EnterDate
    public function __setEnterDate($value){
        $this->enterDate = $value;
    }

    public function __getEnterDate(){
        return $this->enterDate;
    }
        // Get/Set LeaveDate
    public function __setLeaveDate($value){
        $this->leaveDate = $value;
    }
    public function __getLeaveDate(){
        return $this->leaveDate;
    }
    // Get/Set TotalDays
    public function __setTotalDays($value){
        $this->totalDays = $value;
    }
    public function __getTotalDays(){
        return $this->totalDays;
    }

    // Get/Set idQuarto
    public function __setIdQuarto($value){
        $this->idQuarto = $value;
    }
    public function __getIdQuarto(){
        return $this->idQuarto;
    }

    

}
?>