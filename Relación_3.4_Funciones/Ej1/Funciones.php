<?php
//FUNCIONES

//6. voltea: Le da la vuelta a un número.
function voltea($num){
  return strrev($num); //strrev invierte una cadena dada (Hola - aloH, 456 - 654).
}

/*1. esCapicua: Devuelve verdadero si el número que se pasa como parámetro es
capicúa y falso en caso contrario.*/
function esCapicua($num){
  $numCap = strrev($num);

  if ($numCap == $num){
    return true;
  }
  else {
    return false;
  }
}

/*2. esPrimo: Devuelve verdadero si el número que se pasa como parámetro es primo
y falso en caso contrario.*/
function esPrimo($num){
  if ($num == 1) {
    return false;
  }
  for($i = 2; $i < $num; $i++){
    if($num % $i == 0){
      return false;
    }
  }
  return true;
}

/*3. siguientePrimo: Devuelve el menor primo que es mayor al número que se pasa
como parámetro.*/ 
function siguientePrimo($num){
  $num++;
  while(!esPrimo($num)){
    $num++;
  }
  return $num;
}

//4. potencia: Dada una base y un exponente devuelve la potencia.
function potencia($base, $exponente){
  return pow($base, $exponente); //pow calcula una potencia. acepta como parámetros una base y un exponente.
}

//5. digitos: Cuenta el número de dígitos de un número entero.
function digitos($num){
  return strlen($num); //strlen cuenta la longitud de una cadena (números o letras).
}

/*7. digitoN: Devuelve el dígito que está en la posición n de un número entero. Se
  empieza contando por el 0 y de izquierda a derecha.*/
function digitoN($num, $posicion){
  $num = strval($num); //strval convierte un valor a una cadena (123 - "123", 45.67 - "45.67").
  if($posicion < strlen($num)){
    return $num[$posicion];
  }
  else{
    return "La posición es mayor que la longitud del número.";
  }
}

/*8. posicionDeDigito: Da la posición de la primera ocurrencia de un dígito dentro de
un número entero. Si no se encuentra, devuelve -1.*/
function posicionDeDigito($num, $digito){
  $num = strval($num);
  $posicion = strpos($num, strval($digito)); //strpos encuentra la posición de la primera ocurrencia de una subcadena en una cadena.
  if($posicion == false){
    return -1;
  }
  else{
    return $posicion;
  }
}

//9. quitaPorDetras: Le quita a un número n dígitos por detrás (por la derecha).*/
function quitaPorDetras($num, $n){
  $num_str = (string)$num; //num_str Cadena del número $num. (string)$num convierte el número $num a una cadena de texto.
  $num_str = substr($num_str, 0, -$n); //substr hace una subcadena de una cadena ("abcdef", 1, 3 - devolvería "bcd"). Te quita los últimos dígitos.
  return (int)$num_str; //(int)$num_str convierte la cadena $num_str a un número entero.
}

//10. quitaPorDelante: Le quita a un número n dígitos por delante (por la izquierda).*/
function quitaPorDelante($num, $n){
  $num_str = (string)$num;
  $num_str = substr($num_str, $n);
  return (int)$num_str;
}

//11. pegaPorDetras: Añade un dígito a un número por detrás.*/ 
function pegaPorDetras($num, $digito){
  return $num . $digito;
}

//12. pegaPorDelante: Añade un dígito a un número por delante.
function pegaPorDelante($num, $digito){
  return $digito . $num;
}

/*13. trozoDeNumero: Toma como parámetros las posiciones inicial y final dentro de
un número y devuelve el trozo correspondiente.*/ 
function trozoDeNumero($num, $primera, $ultima){
  $num_str = (string)$num;
  $longitud = $ultima - $primera + 1;
  $resultado = substr($num_str, $primera, $longitud);
  return (int)$resultado;
}

//14. juntaNumeros: Pega dos números para formar uno.
function juntaNumeros($num1, $num2){
  return $num1 . $num2;
}
?>



