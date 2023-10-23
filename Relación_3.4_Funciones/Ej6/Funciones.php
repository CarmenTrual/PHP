<?php
//FUNCIONES

/* 1. generaArrayInt: Genera un array de tamaño n con números aleatorios cuyo
intervalo (mínimo y máximo) se indica como parámetro.*/
function generaArrayInt($n, $minimo, $maximo){
  $array = array();
  for($i = 0; $i < $n; $i++){
    $array[] = rand($minimo, $maximo);
  }
  return $array;
}

// 2. minimoArrayInt: Devuelve el mínimo del array que se pasa como parámetro
function minimoArrayInt($array){
  return min($array); // min busca el valor mínimo en los parámetros especificados, en este caso en el array.
}

// 3. maximoArrayInt: Devuelve el máximo del array que se pasa como parámetro.
function maximoArrayInt($array){
  return max($array); //max igual que el min anterior pero con el valor máximo.
}

// 4. mediaArrayInt: Devuelve la media del array que se pasa como parámetro.
function mediaArrayInt($array){
  $suma = 0; 
  $numElementos = 0;

  foreach ($array as $numero){
    $suma = $suma + $numero;
    $numElementos++; 
  }
  $media = $suma / $numElementos; 

  return $media;
}

// 5. estaEnArrayInt: Dice si un número está o no dentro de un array
function estaEnArrayInt(){
  
}

?>



