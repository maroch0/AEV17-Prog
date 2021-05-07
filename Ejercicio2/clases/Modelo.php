<?php

class Modelo extends Conexion
{
  private function getAllProducts()
  {
//Conectamos con la BBDD
    $conn = $this->connect();
//Consulta sql
    $sql = "SELECT * FROM PRODUCTO";
//Pasamos el resultado de la consulta a una variable
    $result = $conn->query($sql);
//Guardamos cada linea resultante de la consulta en un array asociativo
    $lineasDatos = [];
    if ($result->num_rows > 0){
      while ($row = $result->fetch_assoc()) {
        array_push($lineasDatos, $row);
      }
//Mensaje en caso de que la consulta no devuelva ningun resultado
    } else {
      echo "0 resultados";
    }
//cerramos la conexion
    $conn->close();
//Devolvemos el array con los datos extraidos
    return $lineasDatos;
  }

  private function showAllProducts()
  {
//Pasamos los datos resultantes del metodo anterior
    $datos = $this->getAllProducts();
    $output = "";
//Generamos las celdas de la tabla necesarias para mostrar todos los datos de la consulta
    foreach ($datos as $row) {
      $output.="<div class='divTableRow'>";
      $output.="<div class='divTableCell'>".$row['PROD_NUM']."</div>";
      $output.="<div class='divTableCell'>".$row['DESCRIPCION']."</div>";
      $output.="</div>";
    }
//Devolvemos las celdas generadas
    return $output;
  }
//Getter para acceder a los metodos privados y mostrar la tabla de datos
  public function printTable()
  {
    return $this->showAllProducts();
  }

}

 ?>
