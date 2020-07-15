<?php
require_once("../source/config.php");
require_once("../source/funcoes.php");
require_once("../source/autoload.php");

$action = isset($_GET['action']) ? $_GET['action'] : "";
$id     = isset($_GET['id'])     ? $_GET['id']     : "";

//Tratamento para DELETE
if (!empty($action) && $action === 'remove' && !empty($id)) {
    $clienteRemove = new \Source\Model\ClienteModel();
    $cliente = $clienteRemove->remove($id);

    if(isset($cliente["sucesso"])) {
        $_SESSION["sucesso"] = "Cliente <b> removido </b> com sucesso";
    } else {
        $_SESSION["erro"] = "Erro ao tentar <b> remover </b> cliente";
    }
}

//Tratamento para INSERT ou UPDATE
if (!empty($_POST)) {
    $clienteValidate = new \Source\Model\ClienteModel();
    $cliente = $clienteValidate->validate($_POST);

    if(isset($cliente['erroForm'])) {
        $_SESSION['erroForm'] = $cliente['erroForm'];
        header("Location: ../view/clienteForm.php");
        exit;
    }

    if (empty($_POST["id"])) {
        $clienteInsert = new \Source\Model\ClienteModel();
        $cliente = $clienteInsert->save($_POST);

        if(!isset($cliente["erro"])) {
            $_SESSION["sucesso"] = "Cliente <b> cadastrado </b> com sucesso!";
        } else {
            $_SESSION["erro"] = "Erro ao cadastrar cliente";
        }
    } else {
        $clienteUpdate = new \Source\Model\ClienteModel();
        $cliente = $clienteUpdate->update($_POST, $_POST["id"]);
        
        if(!isset($cliente["erro"])){
            $_SESSION["sucesso"] = "Cliente <b> alterado </b> com sucesso!";
        } else {
            $_SESSION["erro"] = "Erro ao atualizar cliente";
        }
    }
}

header("Location: ../index.php");
exit;