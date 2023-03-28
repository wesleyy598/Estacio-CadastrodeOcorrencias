<DOCTYPE! html>
<?php
     include_once('dao/conexao.php');
     $queryTotal = "select o.nome as nome, o.matricula as matricula, s.status as status, se.setor as setor, c.campus as campus, t.tipocorrencia as ocorrencia from ocorrencias as o, status s, setores se, tipoocorrencia t, campus c
     where o.idstatus=s.idstatus and o.idsetoretapa=se.idsetor and o.idtipocorrencia=t.idtipocorrencia and o.idcampus=c.idcampus;";
     $sqlTotal = $conn->prepare($queryTotal);
     $sqlTotal->execute();
     if($sqlTotal->rowCount()>0){
          $total_ocorrencia = $sqlTotal->fetchAll(PDO::FETCH_ASSOC);
     }
    // print_r($total);
?>
    <body>
        <head>
            <meta charset="utf-8">
            <title></title>
            <link rel="stylesheet" href="css/styles.css">
            <script src="js/main.js"></script>
         </head>

<div class="table">
    <table className="content" width="800">
        <tr class="content-line">
            <td>
                
            </td>
            <th width="70">
                
            </th>
            <td align="center" width="150">
                 <h5>Nome</h5>
            </td>
            <td align="center" width="150">
                 <h5>Matricula</h5>
            </td>
            <td align="center"  width="150" >
                 <h5>Setor</h5>
            </td>
            <td  align="center" width="150"> 
                 <h5>Tipo de Ocorrência</h5>
            </td>
            <td align="center" width="150">
                 <h5>Status </h5>
            </td>
            <td align="left" width="100">
                <h5></h5>
           </td>
        </tr>
        <?php
               foreach($total_ocorrencia as $ocorrencias){
                    echo' <tr class="content-line">';
                    echo' <th class="colorline">';
                    echo' </th>';
                    echo' <th width="70">';            
                    echo' </th>';
                    echo' <th align="center">';
                    echo'     <h3 id="tabletext" width="150">'.$ocorrencias['nome'].'</h3>';
                    echo' </th>';
                    echo' <th align="center" width="150">';
                    echo'     <h3 id="tabletext">'.$ocorrencias['matricula'].'</h3>';
                    echo' </th>';
                    echo' <th align="center"  width="150" >';
                    echo'     <h3 id="tabletext">'.$ocorrencias['setor'].'</h3>';
                    echo' </th>';
                    echo' <th  align="center" width="150">'; 
                    echo'     <h3 id="tabletext">'.$ocorrencias['ocorrencia'].'</h3>';
                    echo' </th>';
                    echo' <th align="center"  width="150">';
                    echo'     <h3 id="tabletext">'.$ocorrencias['status'].'</h3>';
                    echo' </th>';
                    echo' <th align="left" width="100">';
                    echo' <a href="#myModal" role="button" class="add-button" data-toggle="modal"><button class="invi-button" onclick=""><img class="edit-img" src="images/edit-on.png"></button></a>';
                    echo' </th>';
                    echo' </tr>';      
               }
            ?>
    </table>
    </div>
      <!--MODAL-->
      <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog2">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="myModalLabel">Editar de Ocorrência</h1>
                </div>
                <div class="modal-body">
                
                <!--FORMULARIO-->
                <form name="form-ocorrencia" id="form" class="form-ocorrencia" >
                    <br>
                    <div class="form-row">
                    <div class="form-label-container">
                        <h3 id="form-labels">Setor de Origem da Ocorrência:<br><br><br>
                            <div class="lined-text">
                            Setor para Redirecionamento: <br><br><br>
                            </div>
                            Campus Responsável:<br><br><br>
                            Matrícula:<br><br><br>
                            Nome:<br><br><br>
                            Tipo de Ocorrência:<br><br><br>
                            Status:<br><br><br>
                            Observação:<br><br><br><br><br><br><br><br><br>
                            Anexar Arquivo:<br><br><br>
                        </h3>
                    </div>
                    <div class="form-content-container">
                     <select name="setor_etapa" id="setor-prox-etapa" required>
                        <option value=""></option>
                       <?php
                            foreach($dados as $setoretapa){
                                echo '<option value="'.$setoretapa['idsetor'].'">'.$setoretapa['setor'].'</option>';
                            }
                       ?>
                    </select>
                    <br><br>
                    <select name="setor_redirecionamento" id="setor-redirec" required>
                        <option value=""></option>
                        <?php
                            foreach($dados as $setoredirecionamento){
                                echo '<option value="'.$setoredirecionamento['idsetor'].'">'.$setoredirecionamento['setor'].'</option>';
                            }
                       ?>
                    </select>
                    <br><br>
                    <select name="campus_responsável" id="campus-resp" required>
                        <option value=""></option>
                        <option value="1">Gilberto Gil</option>
                        <option value="2">Fratelli Vita</option>
                    </select>
                    <br><br>
                   <input type="text" name="matricula" id="matricula" maxlength="12" required pattern="[0-9]{12)" title="" placeholder="" onBlur="">
                    <br><br>
                    <input type="text" name="nome" id="nome" maxlength="200" required placeholder="" onBlur="">
                    <br><br>
                    <select name="tipo_ocorrencia" id="tipo-ocorrencia" required>
                        <option value=""></option>
                        <<?php
                            foreach($tipoocorrencias as $tipo){
                                echo '<option value="'.$tipo['idtipocorrencia'].'">'.$tipo['tipocorrencia'].'</option>';
                            }
                       ?>
                    </select>
                    <br><br>
                    <select name="status" id="status" required>
                        <option value=""></option>
                        <option value="1">Nova</option>
                        <option value="2">Em análise</option>
                        <option value="3">Pendente</option>
                        <option value="4">Resolvida</option>
                    </select>
                    <br><br>
                    <div class="obs-field">
                        <textarea name="observacao" id="observacao" minlength="50" required></textarea>
                    </div>
                    <br>
                    <div class="file-upload-container">
                    <label for="file-upload" class="custom-file-upload">
                        Selecionar Arquivo
                    </label>
                    <input id="file-upload"  name="file-upload" type="file"/>
                    </div>
                    <br><br>
                    <div class="button-field">
                        <button class="cancel-button" data-dismiss="modal" aria-hidden="true" onclick="closeModal()">Cancelar</button>
                        <input class="submit-button" type="button" value="Encaminhar" onclick="validaAll()">
                    </div>
                    </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>