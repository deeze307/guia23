jQuery(document).ready(function() {


});

function delete_advertsing(id){

    $.ajax({
        type: "POST",
        url: "../../app/controller/AdvertsingsController.php",
        data: { id : id },
        success: function(response){
        },
        error: function(response){
        }
    });
    location.reload(true);
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