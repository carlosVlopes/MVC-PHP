<?php
    if (isset($this->data)) {
        $values = $this->data;
    }


    $name = "";
    if (isset($values['name'])) {
        $name = $values['name'];
    }

    $user = "";
    if (isset($values['user'])) {
        $user = $values['user'];
    }

    $email = "";
    if (isset($values['email'])) {
        $email = $values['email'];
    }

    $password = "";
    if (isset($values['password'])) {
        $password = $values['password'];
    }
?>

<div class="wrapper">
    <div class="row">
        <div class="top-list">
            <span class="title-content">Editar Usuário</span>
            <div class="top-list-right">
                <a href="<?= URLADM ?>list-users/index" class="btn-info">Listar</a>
                <a href="<?= URLADM ?>edit-user/editPass/<?=$values['id']?>" class="btn-warning">Editar Senha</a>
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
                        <label class="title-input">Nome</label>
                        <input type="text" name="name" id="name" class="input-adm" value="<?= $name ?>">
                    </div>

                    <div class="column">
                        <label class="title-input">E-mail</label>
                        <input type="email" name="email" id="email" class="input-adm" value="<?= $email ?>">
                    </div>
                </div>

                <div class="row-input">
                    <div class="column">
                        <label class="title-input">User</label>
                        <input type="text" name="user" id="user" class="input-adm"  value="<?= $user ?>">
                    </div>
                </div>

                <?php if($this->data['perm']): ?>
                    <div class="row-input">
                        <div class="column">
                        <span>Permissões:</span><br><br>
                            <label>Deletar</label>
                            <input type="checkbox" name="perm_delete" id="delete" value="1" <?= ($values['perm_delete']) ? 'checked' : ''?>><br>
                            <label>Editar</label>
                            <input type="checkbox" name="perm_edit" id="edit" value="1" <?= ($values['perm_edit']) ? 'checked' : ''?>><br>
                            <label>Adicionar</label>
                            <input type="checkbox" name="perm_add" id="add" value="1" <?= ($values['perm_add']) ? 'checked' : ''?>><br>
                            <label>Visualizar</label>
                            <input type="checkbox" name="perm_view" id="view" value="1" <?= ($values['perm_view']) ? 'checked' : ''?>><br>
                        </div>
                    </div>
                <?php endif ?>
                <span>Imagem: 300x300</span>
                <input type="file" name="image"><br>
                <span>Coloque a imagem só se voçe quiser mudar a image</span><br><br>

                <button type="submit" name="SendEditUser" value="Editar" class="btn-success">Salvar</button>
            </form>
        </div>
    </div>
</div>