<?php


class Empleados
{

	//Coneexion 

	private $conn;
	private $tablename = "empleados";

	public $id;
	public $nombres;
	public $apellidos;
	public $fecha_nacimiento;
	public $sexo;
	public $estado_civil;
    public $pais;

    // Construuctor de Clase
    
    public function __construct($db)
    {
    	$this->conn = $db;
    }

    // Crear un empleados
        public function createEmployee(){
            $sqlQuery = "INSERT INTO
                        ". $this->tablename ."
                    SET
                    nombres = :nombres, 
                    apellidos = :apellidos, 
                    fecha_nacimiento = :fecha_nacimiento, 
                    sexo = :sexo, 
                    estado_civil = :estado_civil, 
                    pais = :pais";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->nombres=htmlspecialchars(strip_tags($this->nombres));
            $this->apellidos=htmlspecialchars(strip_tags($this->apellidos));
            $this->fecha_nacimiento=htmlspecialchars(strip_tags($this->fecha_nacimiento));
            $this->sexo=htmlspecialchars(strip_tags($this->sexo));
            $this->estado_civil=htmlspecialchars(strip_tags($this->estado_civil));
            $this->pais=htmlspecialchars(strip_tags($this->pais));
          
        
            // bind data
            $stmt->bindParam(":nombres", $this->nombres);
            $stmt->bindParam(":apellidos", $this->apellidos);
            $stmt->bindParam(":fecha_nacimiento", $this->fecha_nacimiento);
            $stmt->bindParam(":sexo", $this->sexo);
            $stmt->bindParam(":estado_civil", $this->estado_civil);
            $stmt->bindParam(":pais", $this->pais);
           
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }



}

?>