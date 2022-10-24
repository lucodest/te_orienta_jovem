<? php session_start(); ?>

<!doctype html>
<html lang="pt-BR">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="estilo_professores.css">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://plentz.github.io/jquery-maskmoney/javascripts/jquery.maskMoney.min.js" type="text/javascript"></script>

<script>
jQuery(function() {
    
    jQuery("#valor").maskMoney({
	prefix:'R$ ', 
	thousands:'.', 
	decimal:','
})

});
</script>
    
        
        <title>Inserir Professor</title>
    </head>
    <body>

        <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Inserir Professor <a href="cardListView.php" class="btn btn-danger float-end">VOLTAR</a> </h4>
                    </div>
                    <div class="card-body">
                        <form action="crudProfessor.php" method="POST">
                        <div class="mb-3">        
                        <label>ID</label>
                                <input type="number" name="id"class="form-control" require>
                            </div>    
                        <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome"class="form-control" maxlength="50" require>
                            </div>
                            <div class="mb-3">
                                <label>CPF</label>
                                <input type="number" name="cpf"class="form-control" data-mask="000.000.000.00" maxlength="11" require>
                            </div>
                            <div class="mb-3">
                                <label>Formação</label>
                                <input type="text" name="formacao" class="form-control" max="100" require>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" maxlength="50" require>
                            </div>
                            <div class="mb-3">
                                <label>Telefone</label>
                                <input type="text" name="telefone" class="telefone form-control" data-mask="(00) 0 0000-0000" placeholder="(00) 0 0000-0000" style="width: 200px;" autocomplete="off" maxlength="16">
                            </div>
                            <div class="mb-3 jet-form__field text-field">
                            <label>Valor p/Hora</label>
                              <label for="dinheiro">R$</label>
                              <input type="number" id="valor" name="valor" class="dinheiro form-control" style="display:inline-block" />
                            </div>
                                <label>Foto</label>
                                <input type="file" name="foto"class="form-control" require>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="inserir_professor" class="btn btn-primary">Inserir Professor</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>