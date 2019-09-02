<?php
if (!isset($_SESSION))
{ session_start(); }
?>

<section id="our-blog" class="p_t70 p_b70">
    <div class="container">

        <div class="row">

            <div class="col-md-8 col-sm-8 col-xs-12">

                <div class="row">
                    <div class="col-md-12 heading">
                        <h2><span>Proximamente</span></h2>
                    </div>
                </div>

                <div id="latest_news-slider" class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="latest_box">
                            <h3>Describa su experiencia en Tierra del Fuego</h3>
                            <p>Proximamente se habillitará ésta sección para que los usuarios de Guía23 puedan contarnos sus experiencias de navegación.</p>
                            <div class="lates_border m-b-25"></div>
                            <img src="<?php __URL__ ?>/images/icons/marker.png" alt="image">
                            <span>Por NJM</span>
                            <span><i class="fa fa-calculator" aria-hidden="true"></i>10 Dic 2017</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="latest_box">
                            <h3>Describa su experiencia en Tierra del Fuego</h3>
                            <p>Proximamente se habillitará ésta sección para que los usuarios de Guía23 puedan contarnos sus experiencias de navegación.</p>
                            <div class="lates_border m-b-25"></div>
                            <img src="<?php __URL__ ?>/images/icons/marker.png" alt="image">
                            <span>Por Usuario</span>
                            <span><i class="fa fa-calculator" aria-hidden="true"></i>14 Abr 2018</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="latest_box">
                            <h3>Describa su experiencia en Tierra del Fuego</h3>
                            <p>Proximamente se habillitará ésta sección para que los usuarios de Guía23 puedan contarnos sus experiencias de navegación.</p>
                            <div class="lates_border m-b-25"></div>
                            <img src="<?php __URL__ ?>/images/icons/marker.png" alt="image">
                            <span>por Usuario x</span>
                            <span><i class="fa fa-calculator" aria-hidden="true"></i>04 Mar 2018</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="latest_box">
                            <h3>Describa su experiencia en Tierra del Fuego</h3>
                            <p>Proximamente se habillitará ésta sección para que los usuarios de Guía23 puedan contarnos sus experiencias de navegación.</p>
                            <div class="lates_border m-b-25"></div>
                            <img src="<?php __URL__ ?>/images/icons/marker.png" height="30px" width="30px" alt="image">
                            <span>Por:Usuario 2</span>
                            <span><i class="fa fa-calculator" aria-hidden="true"></i> 02 Feb 2018</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="latest_box">
                            <h3>Describa su experiencia en Tierra del Fuego</h3>
                            <p>Proximamente se habillitará ésta sección para que los usuarios de Guía23 puedan contarnos sus experiencias de navegación.</p>
                            <div class="lates_border m-b-25"></div>
                            <img src="<?php __URL__ ?>/images/icons/marker.png" alt="image">
                            <span>Por:Usuario 3</span>
                            <span><i class="fa fa-calculator" aria-hidden="true"></i>11 Ene 2018</span>
                        </div>
                    </div>

                    <div class="item">
                        <div class="latest_box">
                            <h3>Describa su experiencia en Tierra del Fuego</h3>
                            <p>Proximamente se habillitará ésta sección para que los usuarios de Guía23 puedan contarnos sus experiencias de navegación.</p>
                            <div class="lates_border m-b-25"></div>
                            <img src="<?php __URL__ ?>/images/icons/marker.png" alt="image">
                            <span>Por:NJM</span>
                            <span><i class="fa fa-calculator" aria-hidden="true"></i>22 Feb 2018</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">

                <div class="row">
                    <div class="col-md-12 heading">
                        <h2><span>Mantengase al dia</span></h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="updates">
                            <div class="over_image"><img src="images/update_bg.png" alt="image" />
                            </div>

                            <p class="p_b20">Suscribase y recibira las noticias mas recientes. </p>
                            <form class="p-t-25" action="app/controller/Mailchimp.php">
                                <div class="col-md-12">
                                    <input type="text" name="nombre" placeholder="Nombre">
                                </div>
                                <div class="col-md-12">
                                    <input type="email" name="email" class="email" placeholder="E-mail">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group"> 
                                        <button type="submit" class="" name="submit" value="send">Suscribirse</button>
                                    </div>
                                    <!-- <button type="submit" class="submit" value="">Suscribir</button>
                                    <span><i class="fa fa-envelope-o" aria-hidden="true"></i></span> -->
                                    
                                </div>
                            </form>
                            
                        </div>
                    </div>

                </div>
            </div>
           

        </div>
    
    </div>
</section>

<?php
// Para enviar a Mailchimp

?>
