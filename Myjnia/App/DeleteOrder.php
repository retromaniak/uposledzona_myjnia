<?php


namespace App;


class DeleteOrder extends \PDO
{
    public function __Construct(){
        $open = new Connect();
        $baza = $open -> Connect();
        echo("Podaj numer telefonu klienta:\n");
        $orderPhone = trim(fgets(STDIN));
        echo("Podaj datę rezerwacji [RRRR-MM-DD]:\n");
        $orderDate = trim(fgets(STDIN));
        $orderDeleteId = "SELECT ID_K FROM klienci WHERE nr_tel = '$orderPhone'";
        $zap = $baza -> query($orderDeleteId);
        $id = $zap->fetch()["ID_K"];
        $orderDelete = "DELETE FROM rezerwacje WHERE Klient = $id AND Data_Rez = '$orderDate'";
        $baza -> exec($orderDelete);
        $baza = null;
    }
}