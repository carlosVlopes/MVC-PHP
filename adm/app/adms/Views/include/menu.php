<?php

    $checkPermissions = new \App\adms\Models\helper\AdmsValPermissions();

    $checkPermissions->valPermissions($_SESSION['user_id']);

    $permissions = $checkPermissions->getResults();


    $sidebarActive = '';

    if(isset($this->data['sidebarActive'])){
        $sidebarActive = $this->data['sidebarActive'];
    }
?>

<div class="content">
        <!-- Inicio da Sidebar -->
        <div class="sidebar">
            <a href="<?= URLADM?>dashboard/index" class="sidebar-nav <?= ($sidebarActive === 'dashboard') ? 'active' : ''?>"><i class="icon fa-solid fa-house"></i><span>Dashboard</span></a>

            <a href="<?= URLADM?>list-users/index" class="sidebar-nav <?= ($sidebarActive === 'list-users') ? 'active' : ''?>"><i class="icon fa-solid fa-users"></i><span>Usuários</span></a>

            <?php if($permissions['add']): ?>
                <a href="<?= URLADM?>add-user/index" class="sidebar-nav <?= ($sidebarActive === 'add-user') ? 'active' : ''?>"><i class="icon fa-solid fa-user-plus"></i><span>Cadastrar Usuário</span></a>
            <?php endif?>

            <a href="<?= URLADM?>view-page-home/index" class="sidebar-nav <?= ($sidebarActive === 'view-page-home') ? 'active' : ''?>"><i class="icon fa-solid fa-home"></i><span>Home Site</span></a>


            <a href="<?= URLADM?>logout/index" class="sidebar-nav"><i class="icon fa-solid fa-arrow-right-from-bracket"></i><span>Sair</span></a>

        </div>
        <!-- Fim da Sidebar -->

<!-- <a href="<?= URLADM?>dashboard/index">Dashboard</a><br>
<a href="<?= URLADM?>list-users/index">Usuários</a><br>
<a href="<?= URLADM?>logout/index">Sair</a><br>
<a href="<?= URLADM?>user-profile/index">Perfil</a><br>
<?php if($permissions['add']): ?>
    <a href="<?= URLADM?>add-user/index">Cadastrar Usuário</a><br>
<?php endif?> -->