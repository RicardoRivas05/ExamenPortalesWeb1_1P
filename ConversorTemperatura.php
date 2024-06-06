<?php 
    //Definimos la clase ConversorTemperatura
    class ConversorTemperatura {
        //Definimos los metodos de la clase ConversorTemperatura
        //Metodo para convertir de Celsius a Fahrenheit
        public function celsiusToFahrenheit($celsius) {
            //Creamos un objeto de la clase Calculadora
            $calculadora = new Calculadora();
            //Realizamos las operaciones necesarias para convertir de Celsius a Fahrenheit
            $resultDiv = $calculadora->dividir(9, 5);
            $resultMul = $calculadora->multiplicar($celsius, $resultDiv);
            $resultSum = $calculadora->sumar($resultMul, 32);
            //Retornamos el resultado de la conversion
            return $resultSum;
        }
        //Metodo para convertir de Fahrenheit a Celsius
        public function fahrenheitToCelsius($fahrenheit) {
            //Creamos un objeto de la clase Calculadora
            $calculadora = new Calculadora();
            //Realizamos las operaciones necesarias para convertir de Fahrenheit a Celsius
            $resultRes = $calculadora->restar($fahrenheit, 32);
            $resultDiv = $calculadora->dividir(5, 9);
            $resultMul = $calculadora->multiplicar($resultRes, $resultDiv);
            //Retornamos el resultado de la conversion
            return $resultMul;
        }

    }
?>