<div class="col-md-3 col-sm-3 col-xs-12">
    <div class="profile-leftbar">
        <?php
        if (!isset($_SESSION["HA::STORE"]))
        {
            echo '<div id="profile-picture" class="profile-picture dropzone dz-clickable">';
            echo '<img src="../../media/avatar/'.$_SESSION["avatar"].'" alt="" height="40" width="40">';
            echo '<input name="file" type="file">';
            echo '<div class="dz-default dz-message"><span> Click <br>para subir la imagen</span></div>';
            echo '</div>';
        }
        else
        {
            echo '<img src="'.$_SESSION["avatar"].'" alt="" height="60" width="60"> ';
        }
        ?>


    </div>

    <div class="profile-list">
        <ul>
            <li class="active">
                <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/views/user_profile/index.php"><i class="fa fa-user-o" aria-hidden="true"></i> Mi Perfil</a>
            </li>
            <li>
                <a href="advertsings.php"><i class="fa fa-sliders" aria-hidden="true"></i> Publicidades</a>
            </li>
            <li>
                <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/views/advertsings/packages.php"><i class="fa fa-plus-square" aria-hidden="true"></i>Publicar</a>
            </li>
            <li>
                <a href="commerces.php"><i class="fa fa-suitcase" aria-hidden="true"></i> Mis Comercios</a>
            </li>
           <!-- <li>
                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> Revision</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-server" aria-hidden="true"></i> Tablero</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-cogs" aria-hidden="true"></i> Setting</a>
            </li>
            <li>-->
    <!--        <a href="#"><i class="fa fa-lock" aria-hidden="true"></i> Salir</a>-->
    <!--    </li>-->
        </ul>
    </div>
</div>