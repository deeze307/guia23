jQuery(document).ready(function() {


});

function delete_commerce(id){

    $.ajax({
        type: "POST",
        url: "../../app/controller/AdvertsingsCommerceController.php",
        data: { id : id },
        success: function(response){
        },
        error: function(response){
        }
    });
    location.reload(true);
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
                document.cookie = 'COMMERCE_ID='+ id +';expires=' + expires.toUTCString()+ ';path=/';
                window.location.href = url;
            }
        },
        error: function(response){
        }
    });
}