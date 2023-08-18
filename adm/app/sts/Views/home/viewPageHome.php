<div class="wrapper">
    <div class="row">
        <div class="top-list">
            <span class="title-content">Detalhes da Página Home</span>
            <div class="top-list-right">
            </div>
        </div>

        <div class="content-adm-alert">
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
        </div>

        <div class="top-list">
            <span class="title-content">Detalhes do Topo</span>
            <div class="top-list-right">
                <?php
                if (!empty($this->data['viewHomeTop'])) {
                    echo "<a href='" . URLADM . "edit-home-top/index' class='btn-warning'>Editar</a> ";
                }
                ?>
            </div>
        </div>

        <div class="content-adm">
            <?php
            if (!empty($this->data['viewHomeTop'])) {
                extract($this->data['viewHomeTop'][0]);
            ?>

                <div class="view-det-adm">
                    <span class="view-adm-title">Foto: </span>
                    <span class="view-adm-info">
                        <?php
                        if ((!empty($image_top)) and (file_exists("app/sts/assets/image/home_top/$image_top"))) {
                            echo "<img src='" . URLADM . "app/sts/assets/image/home_top/$image_top' width='250'><br><br>";
                        } else {
                            echo "<img src='" . URLADM . "app/sts/assets/image/home_top/icon_home_top.jpg' width='250'><br><br>";
                        }
                        ?>
                    </span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">ID: </span>
                    <span class="view-adm-info"><?= $id; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Título Um: </span>
                    <span class="view-adm-info"><?= $title_one_top; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Título Dois: </span>
                    <span class="view-adm-info"><?= $title_two_top; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Título Três: </span>
                    <span class="view-adm-info"><?= $title_three_top; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Link Botão: </span>
                    <span class="view-adm-info"><?= $link_btn_top; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Texto Botão: </span>
                    <span class="view-adm-info"><?= $txt_btn_top; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Cadastrado: </span>
                    <span class="view-adm-info"><?= date('d/m/Y H:i:s', strtotime($created)); ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Editado: </span>
                    <span class="view-adm-info">
                        <?php
                        if (!empty($modified)) {
                            echo date('d/m/Y H:i:s', strtotime($modified));
                        } ?>
                    </span>
                </div>
            <?php
            } else {
                echo "<p class='alert-danger'>Erro: Conteúdo do topo da página home não encontrado!</p>";
            }
            ?>
        </div>
    </div><br>
    <div class="row">
        <div class="top-list">
            <span class="title-content">Detalhes dos Serviços</span>
            <div class="top-list-right">
                <?php
                if (!empty($this->data['viewHomeServ'])) {
                    echo "<a href='" . URLADM . "edit-home-serv/index' class='btn-warning'>Editar</a> ";
                }
                ?>
            </div>
        </div>

        <div class="content-adm">
            <?php
            if (!empty($this->data['viewHomeServ'])) {
                extract($this->data['viewHomeServ'][0]);
            ?>

                <div class="view-det-adm">
                    <span class="view-adm-title">ID: </span>
                    <span class="view-adm-info"><?= $id; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Título: </span>
                    <span class="view-adm-info"><?= $serv_title; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Título Um: </span>
                    <span class="view-adm-info"><?= $serv_title_one; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Ícone Um: </span>
                    <span class="view-adm-info"><i class="icon <?= $serv_icon_one; ?>"></i><?= " - " . $serv_icon_one; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Descrição Um: </span>
                    <span class="view-adm-info"><?= $serv_desc_one; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Título Dois: </span>
                    <span class="view-adm-info"><?= $serv_title_two; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Ícone Dois: </span>
                    <span class="view-adm-info"><i class="icon <?= $serv_icon_two; ?>"></i><?= " - " . $serv_icon_two; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Descrição Dois: </span>
                    <span class="view-adm-info"><?= $serv_desc_two; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Título Três: </span>
                    <span class="view-adm-info"><?= $serv_title_three; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Ícone Três: </span>
                    <span class="view-adm-info"><i class="icon <?= $serv_icon_three; ?>"></i><?= " - " . $serv_icon_three; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Descrição Três: </span>
                    <span class="view-adm-info"><?= $serv_desc_three; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Cadastrado: </span>
                    <span class="view-adm-info"><?= date('d/m/Y H:i:s', strtotime($created)); ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Editado: </span>
                    <span class="view-adm-info">
                        <?php
                        if (!empty($modified)) {
                            echo date('d/m/Y H:i:s', strtotime($modified));
                        } ?>
                    </span>
                </div>
            <?php
            } else {
                echo "<p class='alert-danger'>Erro: Conteúdo dos serviçps da página home não encontrado!</p>";
            }
            ?>
        </div>
    </div><br>
    <div class="row">
        <div class="top-list">
            <span class="title-content">Detalhes de Serviços Premium</span>
            <div class="top-list-right">
                <?php
                if (!empty($this->data['viewHomePrem'])) {
                    echo "<a href='" . URLADM . "edit-home-prem/index' class='btn-warning'>Editar</a> ";
                }
                ?>
            </div>
        </div>

        <div class="content-adm">
            <?php
            if (!empty($this->data['viewHomePrem'])) {
                extract($this->data['viewHomePrem'][0]);
            ?>

                <div class="view-det-adm">
                    <span class="view-adm-title">Foto: </span>
                    <span class="view-adm-info">
                        <?php
                        if ((!empty($prem_image)) and (file_exists("app/sts/assets/image/home_prem/$prem_image"))) {
                            echo "<img src='" . URLADM . "app/sts/assets/image/home_prem/$prem_image' width='250'><br><br>";
                        } else {
                            echo "<img src='" . URLADM . "app/sts/assets/image/home_prem/icon_premium_serv.jpg' width='250'><br><br>";
                        }
                        ?>
                    </span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">ID: </span>
                    <span class="view-adm-info"><?= $id; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Título: </span>
                    <span class="view-adm-info"><?= $prem_title; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Subtítulo: </span>
                    <span class="view-adm-info"><?= $prem_subtitle; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Descrição: </span>
                    <span class="view-adm-info"><?= $prem_desc; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Texto Botão: </span>
                    <span class="view-adm-info"><?= $prem_btn_text; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Link Botão: </span>
                    <span class="view-adm-info"><?= $prem_btn_link; ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Cadastrado: </span>
                    <span class="view-adm-info"><?= date('d/m/Y H:i:s', strtotime($created)); ?></span>
                </div>

                <div class="view-det-adm">
                    <span class="view-adm-title">Editado: </span>
                    <span class="view-adm-info">
                        <?php
                        if (!empty($modified)) {
                            echo date('d/m/Y H:i:s', strtotime($modified));
                        } ?>
                    </span>
                </div>
            <?php
            } else {
                echo "<p class='alert-danger'>Erro: Conteúdo do serviço premium da página home não encontrado!</p>";
            }
            ?>
        </div>
    </div>
</div>
<!-- Fim do conteudo do administrativo -->