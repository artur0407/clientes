<?php 
	$readonly = "readonly";
	$action = isset($_GET['action']) ? $_GET['action'] : "";
	$id     = isset($_GET['id'])     ? $_GET['id'] 	   : "";

	if (!empty($action) && !empty($id)) {
		if ($action === 'edit') {
			$readonly = "";
			$titleForm = "Editar Cliente";
		} else if($action === 'view') {
			$titleForm = "Visualizar Cliente";
		}
		$clienteEdit = new model\ClienteModel();
		$cliente = $clienteEdit->get($id);
	} else {
		$readonly = "";
		$titleForm = "Cadastro";
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
	<form class="mt-3 needs-validation" action="?page=clienteController&action=save" method="POST" novalidate>
		<input type="hidden" name="id" value="<?=$id;?>"> 
		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="nome"> Nome <span class="text-danger"> * </span> </label>
				<input type="text" class="form-control" <?=$readonly;?> id="nome" name="nome" value="<?=$nome; ?>" required>
			</div>
			<div class="form-group col-md-6">
				<label for="cpf"> CPF <span class="text-danger"> * </span> </label>
				<input type="text" class="form-control" <?=$readonly;?> id="cpf"  name="cpf" value="<?=$cpf; ?>" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
			</div>
			<div class="form-group col-md-6">
				<label for="data_nasc"> Data de Nascimento <span class="text-danger"> * </span> </label>
				<input class="form-control" type="date" <?=$readonly;?> id="data_nasc" name="data_nasc" value="<?=$data_nasc; ?>" required>
			</div>
			<div class="form-group col-md-6">
				<label for="email"> Email <span class="text-danger"> * </span> </label>
				<input type="text" class="form-control" <?=$readonly;?> id="email" name="email" value="<?=$email; ?>" required>
			</div>
			<div class="form-group col-md-6">
				<label for="telefone"> Telefone <span class="text-danger"> * </span> </label>
				<input class="form-control" type="tel" <?=$readonly;?> id="telefone" name="telefone" value="<?=$telefone; ?>" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}" placeholder="(99) 99999-9999" required>
			</div>
		</div>
		<?php if($action === 'edit' || empty($readonly)) { ?>
			<button type="submit" class="btn btn-primary" role="button" aria-pressed="true">Salvar </button>
		<?php } ?>
		<a href="index.php" class="btn btn-secondary" role="button" aria-pressed="true">Voltar </a>
	</form>
</div>