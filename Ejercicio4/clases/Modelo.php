<?php

class Modelo extends Conexion
{
//Metodo que realiza la query a la BBDD y retorna el resultado en un array asociativo
  private function getAllCliente($order)
  {
    $conn = $this->connect();
    $sql = "SELECT CLIENTE_COD, NOMBRE, CIUDAD FROM CLIENTE ORDER BY NOMBRE $order";
    $result = $conn->query($sql);
    $lineasDatos = [];
    if ($result->num_rows > 0){
      while ($row = $result->fetch_assoc()) {
        array_push($lineasDatos, $row);
      }
    } else {
      echo "0 resultados";
    }

    $conn->close();
    return $lineasDatos;
  }
//Metodo que crea la tabla para mostrar los datos y retorna las celdas generadas
  private function showAllCliente($order)
  {
    $datos = $this->getAllCliente($order);
    $output = "";
    foreach ($datos as $row) {
      $output.="<div class='divTableRow'>";
      $output.="<div class='divTableCell'>".$row['CLIENTE_COD']."</div>";
      $output.="<div class='divTableCell'>".$row['NOMBRE']."</div>";
      $output.="<div class='divTableCell'>".$row['CIUDAD']."</div>";
      $output.="</div>";
    }
    return $output;
  }
//Getter para acceder a los metodos privados y mostrar la tabla de datos
  public function printTable($order)
  {
    return $this->showAllCliente($order);
  }

}

 ?>
