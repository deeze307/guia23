<?php

?>

<div id="counter-section">
    <div class="container">

        <div class="row number-counters text-center">

            <div class="col-md-3 col-sm-6 col-xs-12">
                <!-- first count item -->
                <div class="counters-item">
                    <i class="fa fa-file" aria-hidden="true"></i>
                    <!-- Set Your Number here. i,e. data-to="56" -->
                    <strong data-to="<?php echo $cities_counter; ?>">0</strong>
                    <p>Ciudades</p>
                    <div class="border-inner"></div>
                </div>

            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <!-- first count item -->
                <div class="counters-item">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <!-- Set Your Number here. i,e. data-to="56" -->
                    <strong data-to="<?php echo $users_counter; ?>">0</strong>
                    <p>Usuarios</p>
                    <div class="border-inner"></div>
                </div>

            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <!-- first count item -->
                <div class="counters-item">
                    <i class="fa fa-th" aria-hidden="true"></i>
                    <!-- Set Your Number here. i,e. data-to="56" -->
                    <strong data-to="<?php echo $categories_counter; ?>">0</strong>
                    <p>Categorias</p>
                    <div class="border-inner"></div>
                </div>

            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <!-- first count item -->
                <div class="counters-item">
                    <i class="fa fa-th-list" aria-hidden="true"></i>
                    <!-- Set Your Number here. i,e. data-to="56" -->
                    <strong data-to="<?php echo $ads_counter; ?>">0</strong>
                    <p>Publicidades</p>
                    <div class="border-inner"></div>
                </div>

            </div>

        </div>

    </div>
</div>