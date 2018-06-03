<div class="col-md-3 col-sm-3 col-xs-12">

    <div class="profile-list">
        <ul>
            <li <?php if($_SESSION["admin_menu"] == "settings"){ echo 'class="active"';} ?>>
                <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/guia23/views/admin/admin.php"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</a>
            </li>
            <li <?php if($_SESSION["admin_menu"] == "reviews"){ echo 'class="active"';} ?>>
                <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/guia23/views/admin/revisiones_pendientes.php"><i class="fa fa-eye" aria-hidden="true"></i> Revisiones Pendientes <?php if(count($pendents) > 0){ echo '<span class="label label-warning"> '.count($pendents).' </span>';}?></a>
            </li>
            <li <?php if($_SESSION["admin_menu"] == "users"){ echo 'class="active"';} ?>>
                <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/guia23/views/admin/usuarios.php"><i class="fa fa-user" aria-hidden="true"></i> Administrar Usuarios</a>
            </li>
        </ul>
    </div>
</div>