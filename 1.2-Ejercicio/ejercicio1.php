<?php 
  include_once 'database.php';
  include_once 'Empleados.php';
   $database = new database();
   $db = $database->getConnection();
   $item = new Empleados($db);   
    if (isset($_POST['Enviar'])&&isset($_POST['txtnombre'])&&isset($_POST['txtapellido'])) {
        $nombres = $_POST['txtnombre'];
        $apellidos = $_POST['txtapellido'];
        $fecha_nacimiento = $_POST['txtfechanacimiento'];
        $sexo = $_POST['sexo'];
        $estado_civil = $_POST['estado'];
        $pais = $_POST['pais'];

         $item->nombres = $nombres;
       $item->apellidos = $apellidos;
       $item->fecha_nacimiento = $fecha_nacimiento;
       $item->sexo = $sexo;
       $item->estado_civil = $estado_civil;
       $item->pais = $pais ;

       if($item->createEmployee()){
           
       }
       else{
            echo "Empleado no creado";
       }
    }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Programacion WEB</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>


<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
         <div class="container mt-3"  >


      <h2 style="text-align: center;">INGRESO DE EMPLEADOS</h2>

      <form action="empleado.php" method="POST">

         <div class="mb-3 mt-3">
            <label>ID</label>
            <input type="text"  name="txtid" class="form-control" placeholder="Ingrese el id de empleado">
         </div>

         <div class="mb-3 mt-3">
            <label>Nombres</label>
            <input type="text" name="txtnombre" class="form-control" placeholder="Ingrese los nombres">
         </div>


         <div class="mb-3 mt-3">
            <label>Apellidos</label>
            <input type="text" name="txtapellido" class="form-control" placeholder="Ingrese los apellidos">
         </div>
          <div class="mb-3 mt-3">
            <label>Fecha de nacimiento</label>
            <input type="date" name="txtfechanacimiento" class="form-control" placeholder="Ingrese la fecha de nacimiento">
         </div>

          <div class="mb-3 mt-3">
            <label>Sexo</label>
            <select name="sexo">
            <option >-Seleccione-</option>    
              <?php

                $conn = new mysqli('localhost', 'root', '', 'proweb') or die ('Cannot connect to db');
                $result = $conn->query("SELECT * FROM sex");
              
               while ($row = $result->fetch_assoc()) {
                    unset($sexo);
                    $sexo= $row['sexo']; 
                    echo '<option value="'.$sexo.'">'.$sexo.'</option>';         
                }

                ?>
         </select>
         </div>
          <div class="mb-3 mt-3">
            <label>Estado Civil</label>
            <select name="estado">
                <option >-Seleccione-</option>
                <?php

                $conn = new mysqli('localhost', 'root', '', 'proweb') or die ('Cannot connect to db');
                $result = $conn->query("SELECT * FROM estado");
              
               while ($row = $result->fetch_assoc()) {
                    unset($civil);
                    $civil = $row['civil']; 
                    echo '<option value="'.$civil.'">'.$civil.'</option>';         
                }

                ?>
               
            </select>
            
         </div>

        <div class="mb-3 mt-3" style="margin-left:0;">
            <label>Pais</label>
            <select name="pais">
            <option >-Seleccione-</option>
            <?php

                $conn = new mysqli('localhost', 'root', '', 'proweb') or die ('Cannot connect to db');
                $result = $conn->query("SELECT * FROM pais");
              
               while ($row = $result->fetch_assoc()) {
                    unset($pais);
                    $pais = $row['pais']; 
                    echo '<option value="'.$pais.'">'.$pais.'</option>';         
                }

                ?>  
            
            </select>
            
         </div>
         
         <input type="submit" name="Enviar" class="btn btn-primary">

     </form>

   

    </form>

  
</body>

</html>


