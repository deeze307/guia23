jQuery(document).ready(function() {

});

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
            location.reload(true);
        });

}