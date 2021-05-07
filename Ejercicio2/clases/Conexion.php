<?php

class Conexion
{
  protected $serverName;
  protected $userName;
  protected $password;
  protected $dbName;

//El constructor abre el archivo csv, indicado en la instanciacion del objeto, en modo lectura y de él se extraen los datos de cada atributo
  public function __construct($myfile)
  {
    $myfile = fopen($myfile, "r");
    $datosServer = fgetcsv($myfile);

    $this->serverName = $datosServer[0];
    $this->userName = $datosServer[1];
    $this->password = $datosServer[2];
    $this->dbName = $datosServer[3];

    fclose($myfile);
  }
//Metodo para la conexion a la base de datos
  protected function connect(){
    $conn = new mysqli($this->getServerName(), $this->getUserName(), $this->getPassword(), $this->getDbName());

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
  }
//Getters para el acceso a los atributos privados
    /**
     * Get the value of Server Name
     *
     * @return mixed
     */
    public function getServerName()
    {
        return $this->serverName;
    }

    /**
     * Get the value of User Name
     *
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Get the value of Password
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of Db Name
     *
     * @return mixed
     */
    public function getDbName()
    {
        return $this->dbName;
    }

}


 ?>
