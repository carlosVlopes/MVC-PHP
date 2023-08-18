<?php
    if (isset($this->data['form'])) {
        $valorForm = $this->data['form'];
    }

?>



<div class="wrapper">
    <div class="row">
        <div class="top-list">
            <span class="title-content">Cadastrar Sobre</span>
            <div class="top-list-right">
                <a href="<?= URLADM?>view-about/index" class="btn-info">Voltar</a>
            </div>
        </div>
        <span id="msg"></span>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <div class="content-adm">
            <form method="POST" action="" id="form-add-user" enctype="multipart/form-data" class="form-adm">
                <div class="row-input">
                    <div class="column">
                        <label class="title-input">Titulo</label>
                        <input type="text" name="title" id="title" class="input-adm">
                    </div>
                </div>

                <div class="row-input">
                    <div class="column">
                        <label class="title-input">Descrição</label>
                        <textarea name="description" id="description" class="input-adm" rows="6"></textarea>
                    </div>
                </div>

                <span>Imagem: </span>
                <input type="file" name="image"><br>
                <span>Coloque a imagem só se voçe quiser trocar a image</span><br><br>

                <button type="submit" name="SendAdd" value="Cadastrar" class="btn-success">Salvar</button>
            </form>
        </div>
    </div>
</div>
