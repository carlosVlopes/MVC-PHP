<?php
    if (isset($this->data)) {
        $values = $this->data;
    }


?>

<div class="wrapper">
    <div class="row">
        <div class="top-list">
            <span class="title-content">Editar Serviços</span>
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
                        <input type="text" name="serv_title" id="serv_title" class="input-adm" value="<?= $values['serv_title'] ?>">
                    </div>
                </div>

                <div class="row-input">
                	<div class="column">
                        <label class="title-input">Icone 1</label>
                        <input type="text" name="serv_icon_one" id="serv_icon_one" class="input-adm" value="<?= $values['serv_icon_one'] ?>">
                        <br><br>
                        <label class="title-input">Titulo Servico 1</label>
                        <input type="text" name="serv_title_one" id="serv_title_one" class="input-adm" value="<?= $values['serv_title_one'] ?>">
                        <br><br>
                        <label class="title-input">Descrição 1</label>
                        <input type="text" name="serv_desc_one" id="serv_desc_one" class="input-adm" value="<?= $values['serv_desc_one'] ?>">
                    </div>

                    <div class="column">
                        <label class="title-input">Icone 2</label>
                        <input type="text" name="serv_icon_two" id="serv_icon_two" class="input-adm" value="<?= $values['serv_icon_two'] ?>">
                        <br><br>
                        <label class="title-input">Titulo Servico 2</label>
                        <input type="text" name="serv_title_two" id="serv_title_two" class="input-adm" value="<?= $values['serv_title_two'] ?>">
                        <br><br>
                        <label class="title-input">Descrição 2</label>
                        <input type="text" name="serv_desc_two" id="serv_desc_two" class="input-adm" value="<?= $values['serv_desc_two'] ?>">
                    </div>

                    <div class="column">
                        <label class="title-input">Icone 3</label>
                        <input type="text" name="serv_icon_three" id="serv_icon_three" class="input-adm" value="<?= $values['serv_icon_three'] ?>">
                        <br><br>
                        <label class="title-input">Titulo Servico 3</label>
                        <input type="text" name="serv_title_three" id="serv_title_three" class="input-adm" value="<?= $values['serv_title_three'] ?>">
                        <br><br>
                        <label class="title-input">Descrição 3</label>
                        <input type="text" name="serv_desc_three" id="serv_desc_three" class="input-adm" value="<?= $values['serv_desc_three'] ?>">
                    </div>
                </div>

                <button type="submit" name="SendEdit" value="Editar" class="btn-success">Salvar</button>
            </form>
        </div>
    </div>
</div>