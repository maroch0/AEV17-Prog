<?php

function funcion1($clase) {
  $fichero = "clases/{$clase}.php";
  if (file_exists($fichero)) {
    require_once $fichero;
  }
}

spl_autoload_register("funcion1");

 ?>
