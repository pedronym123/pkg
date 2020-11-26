<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../css/estilos2.css">
    </head>
    <body>
    
    <section class="modelo">   
    <form  method="post" class="formulario">
        <h1 class="titulo">Solicitud de Cotización</h1>
            <div class="container">
                <label class="labele">Código</label>
                <input class="inpue"type="text" name="  Codigo">
            </div>
            <div class="container">
                
                <input type="radio" name="comun">
                <label class="labe"> Persona Juridica</label>
                <input type="radio" name="comun">
                <label class="labe"> Persona Natural</label>
            </div>
            <div class="container">
                <label class="labele">Nombre</label>
                <input class="inpue" type="text" name="nombres" >
            </div>
            <div class="container">
                <label class="labele" >Apellido</label>
                <input class="inpue" type="text" name="apellido" >
            </div>
            <div class="container">
                <label class="labele" >Razón Social</label>
                <input class="inpue" type="text" name="razon" >
            </div>
            <div class="container">
                <label class="labele" for="documento">D.N.I / R.U.C</label>
                <input class="inpue" type="number" name="documento" id="documento" required>
            </div>
            <div class="container">
                <label class="labele">Correo</label>
                <input class="inpue" type="email" name="correo" required>
            </div>
            <div class="container">
                <label class="labele">Descripción del Producto</label>
                <select class="inpue" name="producto">
                    <option value="" selected=>Seleccione</option>
                    <option value="Enbalaje Industrial">Enbalaje Industrial</option>
                    <option value="Pallets">Pallets</option>
                    <option value="Jabas y Bimes">Jabas y Bimes</option>
                    <option value="Parihualas">Parihualas</option>
                </select>
            </div>
            <div class="container">
                <label class="labele">Cantidad</label>
                <input class="inpue" type="number" name="cantidad" required>
            </div>
            
            <input class="boton" type="submit" name="insertar" value="Cotizar">
 
    </form>
        </section>
      <?php
        session_start();
        
        if(!isset($_SESSION['personas'])){
            $_SESSION['personas'] = array();
        
        }
       
           
        if(isset($_POST['insertar'])){
            
            $documento=$_POST['documento'];
            $correo=$_POST['correo'];
            $producto=$_POST['producto'];
            $cantidad=$_POST['cantidad'];
            
            $embalaje = 500;
            $bimes = 18;
            $pallets= 42;
            $parihuelas= 100;
            
            switch ($producto){
                case "Enbalaje Industrial":
                    $total =$embalaje*$cantidad;
                    $precioU= $embalaje;
                    break;
                case "Pallets":
                    $total =$pallets*$cantidad;
                    $precioU= $pallets;
                    break;
                case "Jabas y Bimes":
                    $total =$bimes*$cantidad;
                    $precioU= $bimes;
                    break;
                case "Parihualas":
                    $total = $parihuelas*$cantidad;
                    $precioU=  $parihuelas;
                    break;
                default :
                    echo "Error";
                    break;
            }
            
            $persona = array(
                
                "documento" => $documento,
                "correo" => $correo,
                "producto" => $producto,
                "cantidad" => $cantidad,
                "precioU" => $precioU,
                "total" => $total,
                
            );
            
         
           
           $_SESSION['personas'][$documento] = $persona;
           
          
          
        if(count($_SESSION['personas'])===0){
             echo '<p> No hay personas añadidas</p>';
             
         }else{?>
        
        
        <div class="contenido">
        <table class='tabla' id="tabla" border="1" >
            <thead>
            <tr>
                <th>Código</th>
                <th>D.N.I / R.U.C</th>
                <th>Correo</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th> 
            </tr>
            </thead>
            <?php foreach ($_SESSION['personas'] as $key => $value) {


            ?>
            <tbody>
            <tr>
                <td></td>
                <td><?php echo $value['documento']?></td>
                <td><?php echo $value['correo']?></td>
                <td><?php echo $value['producto']?></td>
                <td><?php echo $value['cantidad']?></td>
                <td><?php echo $value['precioU']?></td>
                <td><?php echo $value['total']?></td>
            </tr>
            </tbody>
            
            <?php }?>
        </table>
        
            <?php }
        }?>
            </div>
    </body>
</html>