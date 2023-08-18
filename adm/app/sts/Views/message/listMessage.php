<?php

	$values = false;

	if($this->data){
		$values = true;
	}

    // echo '<pre>';
    // print_r($this->data);
    // echo '</pre>';

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
                    <span class="title-content">Listar Mensagens</span>
                </div>

                <div class="top-list">
					<form method="POST" action="">
						<div class="row-input-search">
							<div class="column">
								<label class="title-input-search">Nome: </label>
								<input type="text" name="search_name" id="search_name" class="input-search">
							</div>
							<div class="column">
								<label class="title-input-search">Email: </label>
								<input type="text" name="search_email" id="search_email" class="input-search">
							</div>
							<div class="column margin-top-search">
								<button type="submit" name="search_message" class="btn-info" value="pesquisa">Pesquisar</button>
							</div>
						</div>
					</form>
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
                            <th class="list-head-content">Nome</th>
                            <th class="list-head-content table-sm-none">Email</th>
                            <th class="list-head-content">Assunto</th>
                            <th class="list-head-content">Mensagem</th>
                            <th class="list-head-content">Data</th>
                            <th class="list-head-content" style="width: 200px;">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="list-body">
						<?php foreach ($this->data['messages'] as $message): ?>
	                        <tr>
	                            <td class="list-body-content"><?=$message['id']?></td>
	                            <td class="list-body-content"><?=$message['name']?></td>
	                            <td class="list-body-content table-sm-none"><?=$message['email']?></td>
	                            <td class="list-body-content table-sm-none"><?=$message['subject']?></td>
	                            <td class="list-body-content table-sm-none"><?=$message['content']?></td>
	                            <td class="list-body-content table-sm-none"><?=date( 'd-m-Y H:i:s' , strtotime($message['created']))?></td>
	                            <td class="list-body-content">
									<a href="<?= URLADM?>view-message/delete/<?=$message['id']?>" class="btn-danger" onclick="return confirm('Deseja excluir esse registro?')"><i class="fa-solid fa-trash-can"></i></a>
	                            </td>
	                        </tr>
						<?php endforeach?>
                    </tbody>
                </table>

               	<?= $this->data['pagination'] ?>

            </div>
        </div>
        <!-- Fim do conteudo do administrativo -->

	<?php else: ?>

		<h1>Nenhum Sobre encontrado!</h1>

	<?php endif ?>

</body>
</html>