<?php

namespace controller;

use model\ClienteModel;

class ClienteController
{
    public function __construct($post, $action, $id)
    {
        if (count($post) > 0) {
            $this->validate($post);
            if (empty($post["id"])) {
                $resultMessage = $this->save($post);
            } else {
                $resultMessage = $this->update($post, $id);
            }
        } else {
            if ($action == 'remove' && !empty($id)) {
                $resultMessage = $this->delete($id);
            }
        }

        if ($resultMessage["sucesso"]) {
            $_SESSION["sucesso"] = $resultMessage["sucesso"];
        } else {
            $_SESSION["erro"] = $resultMessage["erro"];
        }

        header("Location: index.php");
    }

    private function validate($post)
    {
        $clienteValidate = new ClienteModel();
        $cliente = $clienteValidate->validate($post);
    
        if(isset($cliente['erroForm'])) {
            $_SESSION['erroForm'] = $cliente['erroForm'];
        }
    }

    private function save($post)
    {
        $retorno = [];
        
        $clienteInsert = new ClienteModel();
        $cliente = $clienteInsert->save($post);

        if (isset($cliente["erro"])) {
            $retorno["erro"] = "Erro ao cadastrar cliente";
        } else {
            $retorno["sucesso"] = "Cliente <b> cadastrado </b> com sucesso!";
        }

        return $retorno;
    }

    private function update($post, $id)
    {
        $retorno = [];

        $clienteUpdate = new ClienteModel();
        $cliente = $clienteUpdate->update($post, $id);
        
        if (isset($cliente["erro"])) {
            $retorno["erro"] = "Erro ao atualizar cliente";
        } else {
            $retorno["sucesso"] = "Cliente <b> alterado </b> com sucesso!";
        }

        return $retorno;
    }

    private function delete($id)
    {
        $retorno = [];

        $clienteRemove = new ClienteModel();
        $cliente = $clienteRemove->remove($id);

        if (isset($cliente["erro"])) {
            $retorno["erro"] = "Erro ao tentar <b> remover </b> cliente";
        } else {
            $retorno["sucesso"] = "Cliente <b> removido </b> com sucesso";
        }
        
        return $retorno;
    }
}