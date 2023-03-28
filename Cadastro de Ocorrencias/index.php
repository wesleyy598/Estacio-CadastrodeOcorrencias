<DOCTYPE! html>
<html lang="pt" dir="ltr">
    <?php
    ini_set('default_charset','UTF-8');
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Chamados ESTACIO</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="js/main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
        <script type="text/javascript">
        window.onload = function() {
			dado = "tab-all";
			mudaPag(dado);
		};
        </script>
        <?php
        include_once('dao/conexao.php');
        $querySetor = "select * from setores order by setor";
        $sqlSetor = $conn->prepare($querySetor);
        $sqlSetor->execute();
        if($sqlSetor->rowCount()>0){
            $dados = $sqlSetor->fetchAll(PDO::FETCH_ASSOC);
        } 
        // Total de ocorrencias no tab
        $queryTotal = "select count(idstatus) as todas from ocorrencias";
        $sqlTotal = $conn->prepare($queryTotal);
        $sqlTotal->execute();
        if($sqlTotal->rowCount()>0){
            $total = $sqlTotal->fetch();
        }
        // Tipo de Ocorrências
        $queryTipoOcorrencias = "select * from tipoocorrencia order by tipocorrencia";
        $sqlTipoOcorrencia = $conn->prepare($queryTipoOcorrencias);
        $sqlTipoOcorrencia->execute();
        if($sqlTipoOcorrencia->rowCount()>0){
            $tipoocorrencias = $sqlTipoOcorrencia->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>
     </head>
     <header>

     </header>
<body class="body">
    <div class="body-allign">
    <div class="body-container">
        <div class="body-header">
                <img class="logo" src="images/logo.png">
                <div class="calendar-info">
                    <img class="calendar" src="images/calendar.png">
                    <div class="sistem-date">
                        <h3>Hoje</h3>
                        <h2><?php echo date("d/m/Y"); ?></h2>
                    </div>
                </div>
                <a href="#myModal" role="button" class="add-button" data-toggle="modal">+ Adicionar</a>
                <div>
                    <img class="sinner" src="images/sinner.png" alt="images/sinner-tik.png">
                    <img class="gear" src="images/gear.png">
                </div>
        </div>

        <div class="table-dimension">
            <div class="tabs">
                <button class="tab1" name="tab1" ID="tab1" value="tab-all" autofocus=1 onclick="mudaPag(this)"><div class="text-tab"><?php echo $total[0] ?> <h4 id="tab-small">Ocorrencias</h4></div></button>
                <!--<button class="tab2" name="tab2" ID="tab2" value="tab-done" onclick="mudaPag(this)"><div class="text-tab">02 <h4 id="tab-small">Concluidos</h4></div></button>
                <button class="tab3" name="tab3" ID="tab3" value="tab-wait"  onclick="mudaPag(this)"><div class="text-tab">01 <h4 id="tab-small">Em espera</h4></div></button>-->
            </div>
            <iframe class="iframe" src="" name="iframes" ID="frame" width="900" height="650"></iframe>
        </div>
    </div> 
    </div>

    <!--MODAL-->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog2">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="myModalLabel">Cadastro de Ocorrência</h1>
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