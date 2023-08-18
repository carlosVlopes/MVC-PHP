<?php

	$values = false;

	if($this->data){
		$values = true;
	}

	// var_dump($this->data)

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width='device-width', initial-scale=1.0">
	<title>Document</title>
</head>
<body>

	<?php if($values): ?>

		<div class="wrapper">
            <div class="row">
                <div class="top-list">
                    <span class="title-content">Listar</span>
                    <div class="top-list-right">
                        <a href="<?=URLADM?>add-about/index" class="btn-success">Cadastrar</a>
                    </div>
                </div>
            	<?php
					if(isset($_SESSION['msg'])){
					    echo $_SESSION['msg'];
					    unset($_SESSION['msg']);
					}
				?>
                <table class="table-list">
                    <thead class="list-head">
                        <tr>
                            <th class="list-head-content">ID</th>
                            <th class="list-head-content">Titulo</th>
                            <th class="list-head-content table-sm-none">Descricao</th>
                            <th class="list-head-content">Imagem</th>
                            <th class="list-head-content" style="width: 200px;">Ações</th>

                        </tr>
                    </thead>
                    <tbody class="list-body">
						<?php foreach ($this->data['abouts'] as $about): ?>
	                        <tr>
	                            <td class="list-body-content"><?=$about['id']?></td>
	                            <td class="list-body-content"><?=$about['title']?></td>
	                            <td class="list-body-content table-sm-none"><?=$about['description']?></td>
	                            <td class="list-body-content table-sm-none"><img src="<?= URLADM?>app/sts/assets/image/about/<?=$about['image']?>" width="200" height="200"></td>
	                            <td class="list-body-content">


								<a href="<?= URLADM?>edit-about/index/<?=$about['id']?>" class="btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>

								<a href="<?= URLADM?>edit-about/delete/<?=$about['id']?>" class="btn-danger" onclick="return confirm('Deseja excluir esse registro?')"><i class="fa-solid fa-trash-can"></i></a>

	                            </td>
	                        </tr>
						<?php endforeach?>
                    </tbody>
                </table>


            </div>
        </div>
        <!-- Fim do conteudo do administrativo -->

	<?php else: ?>

		<h1>Nenhum Sobre encontrado!</h1>

	<?php endif ?>

</body>
</html>