<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENDER</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body class="bg-light w-100 vh-100">

    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <div class="card p-5">

            <div class="badge bg-default text-wrap" >
                <h1 class="text-secondary">Enviar Mensagem</h1>
            </div>

            <hr>

            <?php if(isset($_SESSION['result'])){ ?>
                <?php if($_SESSION['result'] == TRUE){?>

                    <div class="alert alert-success" role="alert">
                        <h5>MENSAGEM ENVIADA COM SUCESSO!</h5>
                    </div>
                
                <?php } else if($_SESSION['result'] == false){?>

                    <div class="alert alert-danger" role="alert">
                        <h5>ERRO AO ENVIAR A MENSAGEM!</h5>
                    </div>
                    
                <?php } 
                unset($_SESSION['result']);
            } ?>

            <form action="send.php" method="post">

                <div class="row">

                    <div class="col-sm-12">
                        <label for="title" class="col-form-label">Título:</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="col-sm-12">
                        <label for="message" class="col-form-label">Mensagem:</label>
                        <textarea name="message" id="" cols="30" rows="10" class="form-control" required></textarea>
                    </div>
                   
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <label for="song" class="col-form-label">Disparar Som?</label>
                        <select name="song" class="form-control">
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label for="pulse" class="col-form-label">Pulsar?</label>
                        <select name="pulse" class="form-control">
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label for="typeNotify" class="col-form-label">Tipo Notificação</label>
                        <select name="typeNotify" class="form-control">
                            <option value="INFO-ESO">INFO</option>
                            <option value="SUCCESS-ESO">SUCCESS</option>
                            <option value="WARNING-ESO">WARNING</option>
                            <option value="DANGER-ESO">DANGER</option>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label for="receivers" class="col-form-label">Enviar Para</label>
                        <select name="receivers" class="form-control">
                            <option value="ALL">Todos</option>
                            <option value="adm">adm</option>
                            <option value="managers">managers</option>
                            <option value="sellers">sellers</option>
                            <option value="operation">operation</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-success w-100">ENVIAR</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</body>
</html>