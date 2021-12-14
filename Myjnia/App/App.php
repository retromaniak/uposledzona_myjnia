<?php


namespace App;


class App
{

        public function startProgram()
        {
            echo("Myjnia Ręczna\nWybierz opcję:\n  [1] - Dodaj Rezerwację\n  [2] - Wyświetl Rezerwację\n  [3] - Usuń Rezerwację\nCo chcesz zrobić? Podaj numer opcji: ");
            $mainOption = (int)trim(fgets(STDIN));
            if ($mainOption == 1) {
                new AddClient();
            } elseif ($mainOption == 2) {
                new ViewOrder();
            } elseif ($mainOption == 3) {
                new DeleteOrder();
            } else {
                echo("Podaj poprawną liczbę\n");
                $this -> startProgram();
            }
        }
}