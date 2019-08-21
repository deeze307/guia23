jQuery(document).ready(function() {

});

// Publicidades
function delete_advertsing(id){

    $.ajax({
        type: "POST",
        url: "../../app/controller/AdvertsingsController.php",
        data: { adv_id : id, delete : true },
        success: function(response){
            console.log(response);
            location.reload(true);
        },
        error: function(response){
            console.log("error "+response);
        }
    });
}

function edit_advertsing(id,plan_id){
    $.ajax({
        type: "POST",
        url: "../../app/controller/AdvertsingsController.php",
        data: { edit : true ,adv : id },
        success: function(response){
            if(response != "error")
            {
                var url = "../advertsings/require_advertsing.php";
                console.log('redirecting to...'+url);
                var expires = new Date();
                // expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000)); ORIGINAL
                expires.setTime(expires.getTime() + (3600));
                document.cookie = 'PLAN=' + plan_id + ';expires=' + expires.toUTCString()+ ';path=/';
                document.cookie = 'EDIT=true;expires=' + expires.toUTCString()+ ';path=/';
                document.cookie = 'ADV_ID='+ id +';expires=' + expires.toUTCString()+ ';path=/';
                window.location.href = url;
            }
        },
        error: function(response){
        }
    });
}

function view_advertsing(listing_detail_adv_id,cat_name){

    $.ajax({
        type: "POST",
        url: "../../app/controller/AdvertsingsController.php",
        data: { listing_detail_adv_id : listing_detail_adv_id, cat_name : cat_name},
        success: function(response){
            if(response != "error")
            {
                var url = "../listing-details.php";
                console.log('redirecting to...'+url);
                window.location.href = url;
            }
        },
        error: function(response){
        }
    });
    // console.log("clickeando para ver...");
}

function handle_advertsing(adv_id,action){
    $.get( "../../app/controller/AdvertsingsController.php", { adv_id: adv_id, toggle: action },
        function(){
            // location.reload(true);
        });

}

// Comercios

function delete_commerce(id){

    $.ajax({
        type: "POST",
        url: "../../app/controller/AdvertsingsCommerceController.php",
        data: { commerce_id : id, delete : true },
        success: function(response){
            console.log(response);
            location.reload(true);
        },
        error: function(response){
            console.log("error "+response);
        }
    });
}

function edit_commerce(id,plan_id){
    $.ajax({
        type: "POST",
        url: "../../app/controller/AdvertsingsCommerceController.php",
        data: { edit : true ,commerce_id : id },
        success: function(response){
            if(response != "error")
            {
                var url = "../advertsings/advertsing_commerce.php";
                console.log('redirecting to...'+url);
                var expires = new Date();
                // expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000)); ORIGINAL
                expires.setTime(expires.getTime() + (3600));
                document.cookie = 'PLAN=' + plan_id + ';expires=' + expires.toUTCString()+ ';path=/';
                document.cookie = 'EDIT=true;expires=' + expires.toUTCString()+ ';path=/';
                document.cookie = 'COMM_ID='+ id +';expires=' + expires.toUTCString()+ ';path=/';
                window.location.href = url;
            }
        },
        error: function(response){
        }
    });
}

function view_commerce(commerce_detail_id,cat_name){

    $.ajax({
        type: "POST",
        url: "../../app/controller/AdvertsingsCommerceController.php",
        data: { commerce_detail_id : commerce_detail_id, cat_name : cat_name},
        success: function(response){
            if(response != "error")
            {
                var url = "../listing-details.php";
                console.log('redirecting to...'+url);
                window.location.href = url;
            }
        },
        error: function(response){
        }
    });
}

function handle_commerce(commerce_id,action){
    $.ajax({
        type:"GET",
        url: "../../app/controller/AdvertsingsCommerceController.php",
        data: { commerce_id: commerce_id, toggle: action },
        success: function(response){
            console.log(response);
            location.reload();
        },
        error: function(error){
            console.log("Ocurrió un error",error);
            location.reload();
        }
    });
}