<div class="col-md-3 col-sm-3 col-xs-12">

    <div class="profile-list">
        <ul>
            <?php
            if($_SESSION["role_id"] == 1)
            { ?>
            <li <?php if($_SESSION["admin_menu"] == "settings"){ echo 'class="active"';} ?>>
                <a href="<?php echo __URL__; ?>/views/admin/admin.php"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</a>
            </li>
            <?php } ?>
            <li <?php if($_SESSION["admin_menu"] == "reviews"){ echo 'class="active"';} ?>>
                <a href="<?php echo __URL__; ?>/views/admin/revisiones_pendientes.php"><i class="fa fa-eye" aria-hidden="true"></i> Revisiones Pendientes <?php if(count($pendentsCounter) > 0){ echo '<span class="label label-warning"> '.count($pendentsCounter).' </span>';}?></a>
            </li>
            <li <?php if($_SESSION["admin_menu"] == "commerces"){ echo 'class="active"';} ?>>
                <a href="<?php echo __URL__; ?>/views/admin/comercios.php"><i class="fa fa-industry" aria-hidden="true"></i> Comercios Pendientes <?php if(count($pendentsCommerceCounter) > 0){ echo '<span class="label label-warning"> '.count($pendentsCommerceCounter).' </span>';}?></a>
            </li>
            <?php
            if($_SESSION["role_id"] == 1)
            { ?>
            <li <?php if($_SESSION["admin_menu"] == "users"){ echo 'class="active"';} ?>>
                <a href="<?php echo __URL__; ?>/views/admin/usuarios.php"><i class="fa fa-user" aria-hidden="true"></i> Administrar Usuarios</a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>