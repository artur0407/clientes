<?php
   require_once("../source/config.php");
   require_once("../source/funcoes.php");
   require_once("../source/autoload.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Controle de Clientes</title>
		<link rel="stylesheet" href="<?=ABSPATH ?>css/bootstrap.min.css">
	</head>
    <body>
		<div class="w-auto p-1 bg-dark">
			<h1 class="text-white text-center">Controle de Clientes</h1>
		</div>
     
		<?php 
			$action = isset($_GET['action']) ? $_GET['action'] : "";
			$id     = isset($_GET['id'])     ? $_GET['id'] 	   : "";
			
			$titleForm = "Cadastro";

			if (!empty($action) && $action === 'edit' && !empty($id)) {
				$titleForm = "Edição";
				$clienteEdit = new \Source\Model\ClienteModel();
				$cliente = $clienteEdit->get($id);
			}
						
			$id 		 = !empty($cliente["id"]) 		 ? $cliente["id"] 		 : "";
			$nome 		 = !empty($cliente["nome"]) 	 ? $cliente["nome"] 	 : "";
			$cpf 		 = !empty($cliente["cpf"]) 		 ? $cliente["cpf"] 		 : "";
			$data_nasc   = !empty($cliente["data_nasc"]) ? $cliente["data_nasc"] : "";
			$email 		 = !empty($cliente["email"]) 	 ? $cliente["email"] 	 : "";
			$telefone 	 = !empty($cliente["telefone"])  ? $cliente["telefone"]  : "";
		?>

    <div class="container">
		<h2 class="mt-3"> <?=$titleForm;?> </h2>
		
		<?php
			if (!empty($_SESSION["erroForm"])) { 
				viewError($_SESSION["erroForm"]);
				$_SESSION["erroForm"] = ""; 
			}
		?>

		<form class="mt-3 needs-validation" action="../controller/clienteController.php" method="POST" novalidate>
			<input type="hidden" name="id" value="<?=$id;?>"> 
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="nome"> Nome <span class="text-danger"> * </span> </label>
    				<input type="text" class="form-control" id="nome" name="nome" value="<?=$nome; ?>" required>
				</div>
				<div class="form-group col-md-6">
					<label for="cpf"> CPF <span class="text-danger"> * </span> </label>
    				<input type="text" class="form-control" id="cpf" name="cpf" value="<?=$cpf; ?>" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
				</div>
				<div class="form-group col-md-6">
					<label for="data_nasc"> Data de Nascimento <span class="text-danger"> * </span> </label>
					<input class="form-control" type="date" id="data_nasc" name="data_nasc" value="<?=$data_nasc; ?>" required>
				</div>
				<div class="form-group col-md-6">
					<label for="email"> Email <span class="text-danger"> * </span> </label>
    				<input type="text" class="form-control" id="email" name="email" value="<?=$email; ?>" required>
				</div>
				<div class="form-group col-md-6">
					<label for="telefone"> Telefone <span class="text-danger"> * </span> </label>
					<input class="form-control" type="tel" id="telefone" name="telefone" value="<?=$telefone; ?>" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}" placeholder="(99) 99999-9999" required>
				</div>
			</div>
			<button type="submit" class="btn btn-primary" role="button" aria-pressed="true">Salvar </button>
			<a href="../index.php" class="btn btn-secondary" role="button" aria-pressed="true">Voltar </a>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="<?=ABSPATH ?>js/jquery.mask.min.js"></script>
	<script type="text/javascript">
		$("#cpf").mask("000.000.000-00");
		$("#telefone").mask("(00) 00000-0000");
	</script>
</body>
</html>