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
function estaEnArrayInt($array, $numero){
  return in_array($numero, $array); //in_array busca un valor dentro del array y devuelve true si está y false si no está.
}

// 6. posicionEnArray: Busca un número en un array y devuelve la posición (el índice) en la que se encuentra.
function posicionEnArray($array, $numero,){
  $posicion = array_search($numero, $array); //array_search busca un valor y devuelve la PRIMERA posición en la que se encuentra.

  if ($posicion == false){
    return "El número " . $numero . " no está en el array.";
  } else {
    return "El número " . $numero . " está en la posición número " . $posicion;
  }
}

// 7. volteaArrayInt: Le da la vuelta a un array
function volteaArrayInt($array){
  return array_reverse($array);//array_reverse voltea un array (de 1, 2, 3, 4 a 4, 3, 2, 1).
}

// 8. rotaDerechaArrayInt: Rota n posiciones a la derecha los números de un array.
function rotaDerechaArrayInt($array, $n){
  for($i = 0; $i < $n; $i++){
    array_unshift($array, array_pop($array)); //array_pop quita el último elemento del array y array_unshift lo mete al principio.
  }
  return $array;
}

// 9. rotaIzquierdaArrayInt: Rota n posiciones a la izquierda los números de un array.
function rotaIzquierdaArrayInt($array, $n){
  for ($i = 0; $i < $n; $i++){
    array_push($array, array_shift($array));//array_shift quita el primer elemento del array y array_push lo pone en el final.
  }
  return $array;
}
?>