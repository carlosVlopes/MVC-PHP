<?php
    if (isset($this->data)) {
        $values = $this->data;
    }


?>

<div class="wrapper">
    <div class="row">
        <div class="top-list">
            <span class="title-content">Editar Home Top</span>
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
                        <label class="title-input">Titulo um</label>
                        <input type="text" name="title_one_top" id="title_one_top" class="input-adm" value="<?= $values['title_one_top'] ?>">
                    </div>
                </div>

                <div class="row-input">
                	<div class="column">
                        <label class="title-input">Titulo dois</label>
                        <input type="text" name="title_two_top" id="title_two_top" class="input-adm" value="<?= $values['title_two_top'] ?>">
                    </div>
                </div>

                <div class="row-input">
                	<div class="column">
                        <label class="title-input">Titulo tres</label>
                        <input type="text" name="title_three_top" id="title_three_top" class="input-adm" value="<?= $values['title_three_top'] ?>">
                    </div>
                </div>

                <div class="row-input">
                	<div class="column">
                        <label class="title-input">Texto do Botao</label>
                        <input type="text" name="txt_btn_top" id="txt_btn_top" class="input-adm" value="<?= $values['txt_btn_top'] ?>">
                    </div>
                	<div class="column">
                        <label class="title-input">Link Botao</label>
                        <input type="text" name="link_btn_top" id="link_btn_top" class="input-adm" value="<?= $values['link_btn_top'] ?>">
                    </div>
                </div>

                <span>Imagem: </span>
                <input type="file" name="image_top"><br>
                <span>Coloque a imagem só se voçe quiser trocar a image</span><br><br>

                <button type="submit" name="SendEdit" value="Editar" class="btn-success">Salvar</button>
            </form>
        </div>
    </div>
</div>