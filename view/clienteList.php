<?php
    $clienteList = new ClienteModel();
    $clientes = $clienteList->list();
?>

<h2 class="mt-3"> Listagem </h1>
<table class="mt-3 table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Codigo		</th>
            <th scope="col">Nome	  	</th>
            <th scope="col">CPF	  		</th>
            <th scope="col">Data Nasc.	</th>
            <th scope="col">Email	  	</th>
            <th scope="col">Telefone	</th>
            <th scope="col">Ações		</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($clientes as $cli) { ?>
        <tr>
            <th scope="row"> <?=$cli["id"]; ?> 			 </th>
            <td> <?=$cli["nome"]; ?>				     </td>
            <td> <?=$cli["cpf"]; ?>			 	         </td>
            <td> <?=convertDataBr($cli["data_nasc"]); ?> </td>
            <td> <?=$cli["email"]; ?>		 		     </td>
            <td> <?=$cli["telefone"]; ?>			 	 </td>
            <td>
                <a class="btn btn-info btn-sm" href="index.php?page=clienteForm&id=<?=$cli['id']; ?>&action=view" role="button">
                    Visualizar
                </a>
                <a class="btn btn-warning btn-sm" href="index.php?page=clienteForm&id=<?=$cli['id']; ?>&action=edit" role="button">
                    Editar
                </a>
                <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#modal<?=$cli['id'];?>">
                    Remover
                </button>
            </td>
            <!-- Inicio Modal Exclusão -->
            <div class="modal fade bd-example-modal-sm" id="modal<?=$cli['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="title"> Deseja realmente excluir este cliente? </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?=printModal($cli["id"], $cli["nome"], $cli["data_nasc"]); ?>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                            <a class="btn btn-primary" href="controller/clienteController.php?id=<?=$cli['id']; ?>&action=remove" role="button">Sim</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fim Modal Exclusão -->
        </tr>
        <?php } ?>
    </tbody>
</table>
<a href="index.php?page=clienteForm" class="btn btn-primary" role="button" aria-pressed="true">Adicionar</a>