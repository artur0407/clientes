<?php

    function convertDataBr($data) {
        $date = new DateTime($data);
        return $date->format('d/m/Y');
    }

    function printModal($id, $nome, $data) {
       return $id . " - " . $nome . " de " . convertDataBr($data);
    }

    function viewSuccess($string) { ?>
        <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
            <?=$string; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }

    function viewError($string) { ?>
        <div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">
            <?=$string; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }
?>