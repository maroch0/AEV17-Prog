<?php

class Modelo extends Conexion
{
//Metodo que realiza la query a la BBDD y retorna el resultado en un array asociativo
  private function getAllEmp()
  {
    $conn = $this->connect();
    $sql = "SELECT EMP_NO, APELLIDOS, DEPT_NO, SALARIO, FECHA_ALTA FROM EMP";
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
  private function showAllEmp()
  {
    $datos = $this->getAllEmp();
    $output = "";
    foreach ($datos as $row) {
      $output.="<div class='divTableRow'>";
      $output.="<div class='divTableCell'>".$row['EMP_NO']."</div>";
      $output.="<div class='divTableCell'>".$row['APELLIDOS']."</div>";
//Aplicamos el color a cada departamento a partir del CSS
      $output.="<div class=dept".$row['DEPT_NO']."></div>";
//Damos el formato de moneda en euros
      $output.="<div class='divTableCell'>".number_format($row['SALARIO'], 2, ',', '.')." €"."</div>";
//Damos el formato de fecha en dia/mes/año
      $output.="<div class='divTableCell'>".date("d/m/Y", strtotime($row['FECHA_ALTA']))."</div>";
      $output.="</div>";
    }
    return $output;
  }
//Getter para acceder a los metodos privados y mostrar la tabla de datos
  public function printTable()
  {
    return $this->showAllEmp();
  }

}

 ?>
