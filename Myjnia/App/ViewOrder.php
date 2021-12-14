<?php


namespace App;


class ViewOrder extends \PDO
{
    public function __Construct(){
        $open = new Connect();
        $baza = $open -> Connect();
        echo("Co chcesz zrobić:\n  [1] - Wyświetl rezerwacje na dzisiejszy dzień\n  [2] - Wyświetl rezerwacje na wybrany dzień\n  [3] - Wyświetl rezerwacje danego klienta\n Wybierz opcję: \n");
        $selectOrder = (int)fgets(STDIN);
        if ($selectOrder == 1) {
            $todayOrder = "SELECT Imie, Nazwisko, Pojazd, nr_tel, Godzina_Rez, Nazwa FROM klienci, rezerwacje, uslugi WHERE Data_Rez = CURRENT_DATE AND ID_K = Klient AND ID_U = Usluga";
            $zap = $baza -> query($todayOrder) -> fetchAll();
            if ($zap == null) {
                echo ("Brak Rezerwacji");
            } else {
                foreach ($zap AS $key => $value){
                    echo ($value["Imie"].", ".$value["Nazwisko"].", ".$value["Pojazd"].", ".$value["nr_tel"].", ".$value["Godzina_Rez"].", ".$value["Nazwa"]."\n");
                }
            }
        } elseif ($selectOrder == 2) {
            echo("Podaj datę [RRRR-MM-DD]:\n");
            $selectDate = trim(fgets(STDIN));
            $dateOrder = "SELECT Imie, Nazwisko, Pojazd, nr_tel, Godzina_Rez, Nazwa FROM klienci, rezerwacje, uslugi WHERE Data_Rez = '$selectDate' AND ID_K = Klient AND ID_U = Usluga";
            $zap2 = $baza -> query($dateOrder) -> fetchAll();
            if ($zap2 == null) {
                echo ("Brak Rezerwacji");
            } else {
                foreach ($zap2 AS $key => $value){
                    echo ($value["Imie"].", ".$value["Nazwisko"].", ".$value["Pojazd"].", ".$value["nr_tel"].", ".$value["Godzina_Rez"].", ".$value["Nazwa"]."\n");
                }
            }
        } elseif ($selectOrder == 3) {
            echo("Podaj Imię:\n");
            $selectName = trim(fgets(STDIN));
            echo("Podaj Nazwisko:\n");
            $selectSurname = trim(fgets(STDIN));
            $personOrder = "SELECT Imie, Nazwisko, Pojazd, nr_tel, Godzina_Rez, Nazwa FROM klienci, rezerwacje, uslugi WHERE Imie = '$selectName' AND Nazwisko = '$selectSurname' AND ID_K = Klient AND ID_U = Usluga";
            $zap3 = $baza -> query($personOrder) -> fetchAll();
            if ($zap3 == null) {
                echo ("Brak Rezerwacji");
            } else {
                foreach ($zap3 AS $key => $value){
                    echo ($value["Imie"].", ".$value["Nazwisko"].", ".$value["Pojazd"].", ".$value["nr_tel"].", ".$value["Godzina_Rez"].", ".$value["Nazwa"]."\n");
                }
            }
        } else {
            echo("Podaj poprawną liczbę\n");
        }
    }
}