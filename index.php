<?php
	require_once("app/lib/config.php");
	require_once("app/lib/funcoes.php");
	require_once("autoload.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="<?=ABSPATH ?>css/bootstrap.min.css">
		<title>Controle de Clientes</title>
	</head>
	<body>

	<div class="w-auto p-1 bg-dark">
		<h1 class="text-white text-center"> Controle de Clientes </h1>
	</div>

    <div class="container">
		<?php
			//Alerts Success e Errors
			if (!empty($_SESSION["sucesso"])) { 
				viewSuccess($_SESSION["sucesso"]);
				$_SESSION["sucesso"] = ""; 
			} 

			if (!empty($_SESSION["erro"])) { 
				viewError($_SESSION["erro"]);
				$_SESSION["erro"] = ""; 
			}
			
			$page = isset($_GET['page']) ? $_GET['page'] : '';

			if (empty($page)) {
				include('view/clienteList.php');
			} else {
				if($page == 'clienteForm') {
					include('view/clienteForm.php');
				}

				if($page == 'clienteController') {
					$post   = count($_POST) > 0      ? $_POST 		   : [];
					$action = isset($_GET['action']) ? $_GET['action'] : "";
					$id     = isset($_GET['id'])     ? $_GET['id']     : "";

					$controller = new controller\ClienteController($post, $action, $id);
				}
			}
		?>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="<?=ABSPATH ?>js/jquery.mask.min.js"></script>
	<script type="text/javascript">
		$("#cpf").mask("000.000.000-00");
		$("#telefone").mask("(00) 00000-0000");
	</script>
	</body>
</html>