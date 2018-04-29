<?php ?>

    <div class="container">


        <div class="row number-counters text-center">

            <div class="col-md-3 col-sm-3 col-xs-12">

                <!-- first count item -->
                <div class="counters-item">
<!--                    <i class="fa fa-th-list" aria-hidden="true"></i>-->
                    <!-- Set Your Number here. i,e. data-to="56" -->
                    <strong data-to="<?php echo count($advertsings->advertsings); ?>">0</strong>
                    <p>Publicidades</p>
                    <div class="border-inner"></div>
                    <strong data-to="<?php echo $advertsings->actives;?>">0</strong>
                    <p>Activas</p>
                    <strong data-to="<?php echo $advertsings->pendents;?>">0</strong>
                    <p>Pendientes</p>
                    <div class="border-inner"></div>
                </div>

            </div>

        </div>

    </div>
