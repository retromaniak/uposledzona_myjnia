<?php


namespace App;


class AddClient extends \PDO
{
    public function __Construct(){
        $open = new Connect();
        $baza = $open -> Connect();
        echo("Nowa Rezerwacja\n  [1] - Nowy Klient\n  [2] - Istniejący Klient\nCo chcesz zrobić?\n");
        $newOrder = (int)fgets(STDIN);
        if ($newOrder == 1) {
            echo("Podaj Imię:\n");
            $newName = trim(fgets(STDIN));
            echo("Podaj Nazwisko:\n");
            $newSurname = trim(fgets(STDIN));
            echo("Podaj markę i model pojazdu:\n");
            $newCar = trim(fgets(STDIN));
            echo("Podaj numer telefonu klienta:\n");
            $newPhone = trim(fgets(STDIN));
            $newClient = "INSERT INTO klienci(Imie, Nazwisko, Pojazd, nr_tel, Czarna_Lista) VALUES ('$newName', '$newSurname', '$newCar', '$newPhone', 0)";
            echo($newClient);
            $baza -> exec($newClient);
            $newClientId = "SELECT ID_K FROM klienci WHERE Imie = '$newName' AND Nazwisko = '$newSurname' AND Pojazd = '$newCar' AND nr_tel = '$newPhone'";
            $zap4 = $baza -> query($newClientId) -> fetch();
            $newIdDump = $zap4["ID_K"];
            echo("Proszę podać datę rezerwacji [format RRRR-MM-DD]:\n");
            $date = trim(fgets(STDIN));
            $orderList = "SELECT * FROM rezerwacje WHERE Data_Rez = '$date'";
            $zap5 = $baza -> query($orderList) -> fetchAll();
            if ($zap5 == null) {
                echo ("Wszystkie terminy są wolne\n");
            } else {
                foreach ($zap5 AS $key => $value){
                    echo ($value["Godzina_Rez"]."\n");
                }
            }
            echo("Proszę podać godzinę rezerwacji:\n");
            $time = trim(fgets(STDIN));
            echo("Proszę podać numer usługi wykonywanej [1-5]:\n");
            $service = (int)fgets(STDIN);
            $orderFirst = "INSERT INTO rezerwacje(Klient, Data_Rez, Godzina_Rez, Usluga) VALUES ($newIdDump, '$date', '$time', $service)";
            $baza -> exec($orderFirst);
            echo("Rezerwacja dodana pomyślnie");
        } elseif ($newOrder == 2) {
            echo("Podaj Imię:\n");
            $name = trim(fgets(STDIN));
            echo("Podaj Nazwisko:\n");
            $surname = trim(fgets(STDIN));
            echo("Podaj numer telefonu klienta\n");
            $phone = trim(fgets(STDIN));
            $client = "SELECT * FROM klienci WHERE Imie = '$name' AND Nazwisko = '$surname' AND nr_tel = '$phone'";
            $zap = $baza -> query($client);
            $clientMark = $zap->fetch()["Czarna_Lista"];
            if ($clientMark == 0) {
                echo("Proszę podać datę rezerwacji [format RRRR-MM-DD]:\n");
                $date = trim(fgets(STDIN));
                $orderList = "SELECT * FROM rezerwacje WHERE Data_Rez = '$date'";
                $zap2 = $baza -> query($orderList) -> fetchAll();
                if ($zap2 == null) {
                    echo ("Wszystkie terminy są wolne");
                } else {
                    foreach ($zap2 AS $key => $value){
                        echo ($value["Godzina_Rez"]."\n");
                    }
                }
                echo("Proszę podać godzinę rezerwacji:\n");
                $time = trim(fgets(STDIN));
                echo("Proszę podać numer usługi wykonywanej [1-5]:\n");
                $service = (int)fgets(STDIN);
                $idDump = "SELECT ID_K FROM klienci WHERE Imie = '$name' AND Nazwisko = '$surname' AND nr_tel = '$phone'";
                $zap3 = $baza -> query($idDump) -> fetch();
                $id = $zap3["ID_K"];
                $order = "INSERT INTO rezerwacje(Klient, Data_Rez, Godzina_Rez, Usluga) VALUES ($id, '$date', '$time', '$service')";
                $baza -> exec($order);
                echo("Pomyślnie dodano do bazy");
            } else {
                echo("Proszę poinformować klienta o braku wolnych terminów");
            }
        } else {
            echo("Podaj poprawną liczbę\n");
        }
        $baza = null;
    }
}