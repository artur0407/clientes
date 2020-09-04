<?php

require_once 'Conexao.php';

class ClienteModel
{    
    private $pdo = NULL;

    public function __construct()
    {
        $this->pdo = Conexao::getInstance();
    }
     
    public function list() 
    {
        $clientes = array();

        try {

            $sql = "SELECT * FROM cliente";
            $result = $this->pdo->prepare($sql);
            $result->execute();
    
            if ($result->execute()) {
                $clientes = $result->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $clientes["erro"] = "Erro: Não foi possível recuperar os dados do banco de dados";
            }

        } catch (PDOException $erro) {
            $clientes["erro"] = $erro->getMessage();
        }

        return $clientes; 
    }

    public function get($id) 
    {
        $cliente = array();

        try {
				
            $sql = "SELECT * FROM cliente WHERE id = :id";
            $result = $this->pdo->prepare($sql);
            $result->execute(['id' => $id]); 

            if ($result->rowCount() == 0 && is_numeric($id)) {
                $cliente["erro"] = "Registro não encontrado para <b> edição </b>";
            }

            $cliente = $result->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $erro) {
            $cliente["erro"] . $erro->getMessage();
        }

        return $cliente; 
    }

    public function save($post) 
    {
        $cliente = array();

        extract($post);
               
        try {

            $sql = "INSERT INTO cliente 
            (id, nome, cpf, data_nasc, email, telefone) 
            VALUES 
            (:id, :nome, :cpf, :data_nasc, :email, :telefone)";
    
            $exec = $this->pdo->prepare($sql); 

            $data = [
                ':id'           => NULL,
                ':nome'         => $nome,
                ':cpf'          => $cpf,
                ':data_nasc'    => $data_nasc,
                ':email'        => $email,
                ':telefone'     => $telefone
            ];

            $result = $exec->execute($data);

            if (!$result) {  
                $cliente["erro"] = $exec->errorInfo();
            }

        } catch (PDOException $erro) {
            $clientes["erro"] = $erro->getMessage();
        }

        return $cliente;
    }
         
    public function update($post, $id) 
    {
        $cliente = array();

        extract($post);
        
        try{

            $sql = "UPDATE cliente SET 
                nome = :nome, 
                cpf = :cpf, 
                data_nasc = :data_nasc, 
                email = :email, 
                telefone = :telefone
                WHERE id = :id
            ";

            $exec = $this->pdo->prepare($sql); 

            $data = [
                ':id'           => $id,
                ':nome'         => $nome,
                ':cpf'          => $cpf,
                ':data_nasc'    => $data_nasc,
                ':email'        => $email,
                ':telefone'     => $telefone
            ];

            $result = $exec->execute($data);

            if (!$result) {  
                $cliente["erro"] = $exec->errorInfo();
            }

        } catch (PDOException $erro) {
            $clientes["erro"] = $erro->getMessage();
        }

        return $cliente;
    }
         
    public function remove($id) 
    {
        $cliente = array();

        try {
            $exec = $this->pdo->prepare('DELETE FROM cliente WHERE id = :id');
            $exec->bindParam(':id', $id, PDO::PARAM_INT); 
            $exec->execute();
               
            if($exec->rowCount() == 1) {
                $cliente["sucesso"] = "Cliente <b> removido </b> com sucesso";
            } else {
                $cliente["erro"] = "Erro ao tentar <b> remover </b> cliente";
            }
        } catch(PDOException $e) {
            $cliente["erro"] = $e->getMessage();
        }

        return $cliente;
    }

    public function validate($fields)
    {
        $cliente = array();

        extract($fields);

        if (empty($nome)) {
            $cliente['erroForm'] = "Atenção, campo <b> Nome </b> não foi informado";
        } else if (empty($cpf)) {
            $cliente['erroForm'] = "Atenção, campo <b> CPF </b> não foi informado";
        } else if (empty($data_nasc)) {
            $cliente['erroForm'] = "Atenção, campo <b> Data de Nascimento </b> não foi informado";
        } else if (empty($email)) {
            $cliente['erroForm'] = "Atenção, campo <b> Email </b> não foi informado";
        } else if (empty($telefone)) {
            $cliente['erroForm'] = "Atenção, campo <b> Telefone </b> não foi informado";
        }

        return $cliente;
    }
}