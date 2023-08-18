<?php
    if (isset($this->data)) {
        $values = $this->data;
    }


?>

<div class="wrapper">
    <div class="row">
        <div class="top-list">
            <span class="title-content">Editar Serviços Premium</span>
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
                        <label class="title-input">Titulo</label>
                        <input type="text" name="prem_title" id="prem_title" class="input-adm" value="<?= $values['prem_title'] ?>">
                    </div>
                </div>

                <div class="row-input">
                	<div class="column">
                        <label class="title-input">Subtitulo</label>
                        <input type="text" name="prem_subtitle" id="prem_subtitle" class="input-adm" value="<?= $values['prem_subtitle'] ?>">
                    </div>
                </div>

                <div class="row-input">
                	<div class="column">
                        <label class="title-input">Descrição</label>
                        <textarea name="prem_desc" id="prem_desc" class="input-adm" rows="6"><?=$values['prem_desc']?></textarea>
                    </div>
                </div>

                <div class="row-input">
                	<div class="column">
                        <label class="title-input">Texto do Botao</label>
                        <input type="text" name="prem_btn_text" id="prem_btn_text" class="input-adm" value="<?= $values['prem_btn_text'] ?>">
                    </div>
                	<div class="column">
                        <label class="title-input">Link Botao</label>
                        <input type="text" name="prem_btn_link" id="prem_btn_link" class="input-adm" value="<?= $values['prem_btn_link'] ?>">
                    </div>
                </div>

                <span>Imagem: </span>
                <input type="file" name="prem_image"><br>
                <span>Coloque a imagem só se voçe quiser trocar a image</span><br><br>

                <button type="submit" name="SendEdit" value="Editar" class="btn-success">Salvar</button>
            </form>
        </div>
    </div>
</div>