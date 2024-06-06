<?php 
    require_once "Calculadora.php"; //Incluimos la clase Calculadora
    require_once "ConversorTemperatura.php"; //Incluimos la clase ConversorTemperatura

    //Validamos si se envio informacion por el metodo POST
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Obtenemos los valores enviados por el metodo POST
        //Se evalua cada valor enviado por el metodo POST, si no se envio ningun valor, se asigna null
        $num1 = isset($_POST["num1"]) ? $_POST["num1"] : null; 
        $num2 = isset($_POST["num2"]) ? $_POST["num2"] : null;
        $operacion = isset($_POST["opciones"]) ? $_POST["opciones"] : null;
        $temp1 = isset($_POST["temp1"]) ? $_POST["temp1"] : null;
        $temp2 = isset($_POST["temp1"]) ? $_POST["temp1"] : null;
        $unidad = isset($_POST["unidad"]) ? $_POST["unidad"] : null;

        $calculadora = new Calculadora();//Creamos un objeto de la clase Calculadora

        //Validamos si se selecciono una operacion matematica
        if($operacion){
            //Dependiendo de la operacion seleccionada, se realiza la operacion matematica
            switch($operacion){
                case "sumar":
                    $resultado = $calculadora->sumar($num1, $num2);
                    echo "El resultado de la suma es: $resultado";
                    break;
                case "restar":
                    $resultado = $calculadora->restar($num1, $num2);
                    echo "El resultado de la resta es: $resultado";
                    break;
                case "multiplicar":
                    $resultado = $calculadora->multiplicar($num1, $num2);
                    echo "El resultado de la multiplicacion es: $resultado";
                    break;
                case "dividir":
                    //Validamos si se esta dividiendo entre 0
                    if($num2 == 0){
                        echo "No se puede dividir entre 0";
                        break;
                    }else{ //Si no se esta dividiendo entre 0, se realiza la division
                        $resultado = $calculadora->dividir($num1, $num2);
                        echo "El resultado de la division es: $resultado";
                        break;
                    }
                case"potencia":
                    $resultado = $calculadora->potencia($num1, $num2);
                    echo "El resultado de la potencia es: $resultado";
                    break;
            }
        }else{ //Si no se selecciono una operacion matematica, se realiza la conversion de temperatura
            //Dependiendo de la unidad seleccionada, se realiza la conversion de temperatura
            if($unidad == "cToF"){
                $conversor = new ConversorTemperatura();
                $resultado = $conversor->celsiusToFahrenheit($temp1);
                echo "La conversion de Celsius a Fahrenheit es: $resultado";
            }else if($unidad == "fToC"){
                $conversor = new ConversorTemperatura();
                $resultado = $conversor->fahrenheitToCelsius($temp2);
                echo "La conversion de Fahrenheit a Celsius es: $resultado";
            }
        }

    }
?>
<!-- Final del codigo php -->

<!-- Inicio del codigo html y sus formularios -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Matematica</title>
</head>
<body>
    <!-- Formulario para seleccionar la operacion matematica a realizar -->
    <h2>Calculadora Matematica de Operaciones Basicas</h2>
    <br>
    <form method="post">
        <!-- Select que muestras las opciones de operaciones matematicas -->
        <label for="opciones">Selecciones la operacion a realizar: </label>
        <select name="opciones" id="opciones">
            <option value="sumar">Sumar</option>
            <option value="restar">Restar</option>
            <option value="multiplicar">Multiplicar</option>
            <option value="dividir">Dividir</option>
            <option value="potencia">Potencia</option>
        </select>
        <br><br>
    
        <!-- Inputs para ingresar los numeros a operar -->
        <label for="n1">Ingrese el primero numero: </label>
        <input type="number" name="num1" required><br><br>
        <label for="n2">Ingrese el segundo numero: </label>
        <input type="number" name="num2" required><br>
    
        <br><br>
        <!-- Boton para enviar los datos del formulario y hacer el calculo matematico -->
        <input type="submit" value="Calcular">

        <br><br><br>    
    </form>

    <!-- Formulario para seleccionar la conversion de temperatura a realizar -->
    <form method="post">
        <h2>Conversor de Temperatura</h2>
        <br>
        <!-- Input para ingresar la temperatura a convertir -->
        <label for="n1">Ingrese la Temperatura: </label>
        <input type="number" name="temp1" required>
        <br><br>

        <!-- Radio buttons para seleccionar el tipo de conversion que se desea realizar -->
        <input type="radio" value="cToF" name="unidad" checked>Celsius -> Fahrenheit <br>
        <input type="radio" value="fToC" name="unidad">Fahrenheit -> Celsius
    
        <br><br>
        <!-- Boton para enviar los datos del formulario y hacer la conversion de temperatura -->
        <input type="submit" value="Calcular Temperatura"> 
    </form>
</body>
</html>