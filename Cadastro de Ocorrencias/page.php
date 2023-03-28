<?php include("dao/conexao.php"); 

    $setores = "SELECT * FROM `setores`";
    $con= $mysqli->query($setores) or die($mysqli->erro);
    $campus = "SELECT * FROM `campus`";
    $con2 = $mysqli->query($campus) or die($mysqli->erro);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    
    <title>Cadastro</title>
</head>
<body>
Setor:
    <select class="form-control form-control-lo">
    <option >Nenhum</option>
    <?php while($dado = $con->fetch_array()) { ?>
        
        <option value="<?php echo $dado["idsetor"] ?>" ><?php echo $dado["setor"] ?> </option>
        
        
        <?php } ?>

       </select> <br>
        Campus:
       <select class="form-control form-control-lo">
         <option >Nenhum</option>
        <?php while($dado2 = $con2->fetch_array()) { ?>
        
        <option value="<?php echo $dado2["idcampus"] ?>" ><?php echo $dado2["campus"] ?> </option>
        
        <?php } ?>
       </select>

     

</body>
</html>