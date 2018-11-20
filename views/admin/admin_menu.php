<div class="col-md-3 col-sm-3 col-xs-12">

    <div class="profile-list">
        <ul>
            <?php
            if($_SESSION["role_id"] == 1)
            { ?>
            <li <?php if($_SESSION["admin_menu"] == "settings"){ echo 'class="active"';} ?>>
                <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/views/admin/admin.php"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</a>
            </li>
            <?php } ?>
            <li <?php if($_SESSION["admin_menu"] == "reviews"){ echo 'class="active"';} ?>>
                <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/views/admin/revisiones_pendientes.php"><i class="fa fa-eye" aria-hidden="true"></i> Revisiones Pendientes <?php if(count($pendentsCounter) > 0){ echo '<span class="label label-warning"> '.count($pendentsCounter).' </span>';}?></a>
            </li>
            <?php
            if($_SESSION["role_id"] == 1)
            { ?>
            <li <?php if($_SESSION["admin_menu"] == "users"){ echo 'class="active"';} ?>>
                <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/views/admin/usuarios.php"><i class="fa fa-user" aria-hidden="true"></i> Administrar Usuarios</a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>