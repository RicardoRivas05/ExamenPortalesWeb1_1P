<?php 
    //Definimos la clase Calculadora
    class Calculadora {
        //Definimos los metodos de la clase Calculadora
        //Metodo para sumar dos numeros
        public function sumar($a, $b) {
            return $a + $b;
        }
        //Metodo para restar dos numeros
        public function restar($a, $b) {
            return $a - $b;
        }
        //Metodo para multiplicar dos numeros
        public function multiplicar($a, $b) {
            return $a * $b;
        }
        //Metodo para dividir dos numeros
        public function dividir($a, $b) {
            return $a / $b;
        }
        //Metodo para elevar un numero a una potencia
        public function potencia($a, $b) {
            return pow($a, $b);
        }
    }
?>