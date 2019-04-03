<?php
$city_name = $_SESSION['selected_city_name'];
$bannerClass = $_SESSION['selected_city_class'];
?>

<div class="swiper-container">
    <div class="swiper-wrapper">
      <?php
        foreach($carousel as $car)
        {
          echo'
            <div class="swiper-slide" style="
              background-image: url(../../images/carousel-images/'.$car->filename.');
              background-size: cover;
              background-repeat: no-repeat;
              background-position: center center;">';
              if(isset($car->link)){
                echo'<div class="banner-text text-right"><a href="'.$car->link.'">Visite esta Publicidad</a></div>';
              }
          echo  '</div>';
        }
        
      ?>
      
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>

  <!--<div class="banner-text-mini text-center">
    <h2><span>Bienvenidos a Guía23</span>  <span>(<?php echo $city_name ?>)</span></h2>
    <p>Explore las mejores atracciones turisticas, actividades, comercios y mas..!</p>
    <?php if(!isset($_SESSION['user_id'])){ echo '<a href="views/login/login-registerd.php">REGÍSTRESE AHORA</a>';} ?>
    <a href=views/Ayuda.php>¿COMO PUBLICAR?</a>
  </div>
  <div class="col-md-6 col-sm-12 col-xs-12"></div>
    </div>
  </div>
    <div class="banner-icons">
        <ul>
            <li><a href="https://www.facebook.com/guia23arg/"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
            <li><a href="https://aboutme.google.com/b/108041901462566142472/"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
            <li><a href="https://twitter.com/Guia232"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
            <li><a href="https://instagram.com/guia23.com.ar"><i class="fa fa-instagram" aria-hidden="true"></i></a> </li>
            <li><a href="https://www.youtube.com/channel/UCaFEUeKyFwlCCfMxcGJp-fw/featured?view_as=subscriber"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
            <li><a href="https://api.whatsapp.com/send?phone=542901487488&text=Hola%20necesito%20más%20información"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
        </ul>
    </div>-->


  <!-- Swiper JS -->
  <script src="../../js/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 0,
      centeredSlides: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>

<section id="banner-2">

  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="banner-text-mini text-center">
            <h2><span>Bienvenidos a Guía23</span>  <span>(<?php echo $city_name ?>)</span></h2>
          <p>Explore las mejores atracciones turisticas, actividades, comercios y mas..!</p>
          <?php if(!isset($_SESSION['user_id'])){ echo '<a href="views/login/login-registerd.php">REGÍSTRESE AHORA</a>';} ?>
          <a href=views/Ayuda.php>¿COMO PUBLICAR?</a>
        </div>
      </div>

      <div class="col-md-6 col-sm-12 col-xs-12"></div>
    </div>
  </div>
    <div class="banner-icons">
        <ul>

            <li><a href="https://www.facebook.com/guia23arg/"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
            <li><a href="https://aboutme.google.com/b/108041901462566142472/"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
            <li><a href="https://twitter.com/Guia232"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
            <li><a href="https://instagram.com/guia23.com.ar"><i class="fa fa-instagram" aria-hidden="true"></i></a> </li>
            <li><a href="https://www.youtube.com/channel/UCaFEUeKyFwlCCfMxcGJp-fw/featured?view_as=subscriber"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
            <li><a href="https://api.whatsapp.com/send?phone=542901487488&text=Hola%20necesito%20más%20información"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>


        </ul>
    </div>


</section>


