<?php

	$values = false;

	if($this->data){
		$values = true;
	}

?>

<div class="wrapper">
    <div class="row">
        <div class="top-list">
            <span class="title-content">Editar View Contato</span>
            <div class="top-list-right">
                <a href="<?= URLADM ?>view-page-home/index" class="btn-info">Voltar</a>
            </div>
        </div>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <span id="msg"></span>
        <div class="content-adm">
            <form method="POST" action="" id="form-add-user" enctype="multipart/form-data" class="form-adm">
                <div class="row-input">
                    <div class="column">
                        <label class="title-input">Titulo Contato</label>
                        <input type="text" name="title_contact" id="title_contact" class="input-adm" value="<?= $this->data['title_contact'] ?>">
                    </div>
                </div>

                <div class="row-input">
                    <div class="column">
                        <label class="title-input">Descrição Contato</label>
                        <textarea name="desc_contact" id="desc_contact" class="input-adm" rows="6"><?=$this->data['desc_contact']?></textarea>
                    </div>
                </div>

                <div class="row-input">
                	<div class="column">
                        <label class="title-input">Icone Empresa</label>
                        <input type="text" name="icon_company" id="icon_company" class="input-adm" value="<?= $this->data['icon_company'] ?>">
                    </div>
                    <div class="column">
                        <label class="title-input">Nome Empresa</label>
                        <input type="text" name="desc_company" id="desc_company" class="input-adm" value="<?= $this->data['desc_company'] ?>">
                    </div>
                </div>

                <div class="row-input">
                	<div class="column">
                        <label class="title-input">Icone Endereço</label>
                        <input type="text" name="icon_address" id="icon_address" class="input-adm" value="<?= $this->data['icon_address'] ?>">
                    </div>
                    <div class="column">
                        <label class="title-input">Endereço Empresa</label>
                        <input type="text" name="desc_address" id="desc_address" class="input-adm" value="<?= $this->data['desc_address'] ?>">
                    </div>
                </div>

                <div class="row-input">
                	<div class="column">
                        <label class="title-input">Icone Email</label>
                        <input type="text" name="icon_email" id="icon_email" class="input-adm" value="<?= $this->data['icon_email'] ?>">
                    </div>
                    <div class="column">
                        <label class="title-input">Email</label>
                        <input type="text" name="desc_email" id="desc_email" class="input-adm" value="<?= $this->data['desc_email'] ?>">
                    </div>
                </div>

                <div class="row-input">
                	<div class="column">
                        <label class="title-input">Titulo Formulario</label>
                        <input type="text" name="title_form" id="title_form" class="input-adm" value="<?= $this->data['title_form'] ?>">
                    </div>
                </div>

                <button type="submit" name="SendEdit" value="Editar" class="btn-success">Salvar</button>
            </form>
        </div>
    </div>
</div>