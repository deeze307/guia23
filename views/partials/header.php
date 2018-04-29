
<!--Incluyo principales funciones de inicio de la aplicación-->
<?php
if (!isset($_SESSION))
{ session_start(); }
$main = new Main();
$head = $main->getGeneraData();
?>
<header id="main_header_2">
    <div id="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="top-contact">
                        <p>Mas info: phone: <span> <?php echo $head->phone ?></span> email: <span><?php echo $head->mail ?></span>
                        </p>
                    </div>
                </div>

                <form class="registerd" action="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/guia23/app/core/login.php" method="post" data-ajax="false">
                    <div class="col-md-6 col-sm-8 col-xs-12">
                        <div class="top_right_links2">
                            <ul class="top_links">
                                <?php if(isset($_SESSION['username']) && ($_SESSION["username"]!="")){?>
                                        <li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/guia23/views/user_profile/index.php"><i class="fa fa-user-o" aria-hidden="true"></i><?php echo $_SESSION["name"]." ".$_SESSION["lastname"];?></a> </li>
                                        <div class="add-listing"><button type="submit" name="logout" value="logout"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</button></div>
                                    <div class="add-listing"> <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/guia23/views/advertsings/packages.php"><i class="fa fa-plus" aria-hidden="true"></i> Publicar</a> </div>
                                <?php
                                }
                                else
                                {
                                 ?>
                                    <div class="add-listing"> <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/guia23/views/login/login-registerd.php"><i class="fa fa-lock" aria-hidden="true"></i> Iniciar Sesion</a> </div>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </form>
                <div class="top_right_links2-bg"></div>

            </div>
        </div>
    </div>
    <nav class="navbar navbar-default navbar-sticky bootsnav">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Menu -->
                    <?php require "menu.php"; ?>
                    <!-- End Menu-->
                </div>
            </div>
        </div>
    </nav>
</header>