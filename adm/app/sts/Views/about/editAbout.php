<?php
    if (isset($this->data)) {
        $values = $this->data;
    }

?>

<div class="wrapper">
    <div class="row">
        <div class="top-list">
            <span class="title-content">Editar Sobre</span>
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
                <input hidden name="id" value="<?= $values['id']?>">
                <div class="row-input">
                    <div class="column">
                        <label class="title-input">Titulo</label>
                        <input type="text" name="title" id="title" class="input-adm" value="<?= $values['title'] ?>">
                    </div>
                </div>

                <div class="row-input">
                    <div class="column">
                        <label class="title-input">Descrição</label>
                        <textarea name="description" id="description" class="input-adm" rows="6"><?=$values['description']?></textarea>
                    </div>
                </div>

                <div class="row-input">
                    <span><img src="<?= URLADM?>app/sts/assets/image/about/<?=$values['image']?>" width="200" height="200"></span>
                </div>
                <span>Imagem: </span>
                <input type="file" name="image"><br>
                <span>Coloque a imagem só se voçe quiser trocar a image</span><br><br>
                <button type="submit" name="SendEdit" value="Editar" class="btn-success">Salvar</button>
            </form>
        </div>
    </div>
</div>