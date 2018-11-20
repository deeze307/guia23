 $(function(){

     // Obtengo las publicaciones por cat_id
     $.get("../../app/controller/AdvertsingsController.php",{cat : $.urlParam('cat_id'),only_data : true})
         .done(function(response){
             var resultado = $.parseJSON(response);

             var db_places = [];

             $.each(resultado, function(index,advertsing){
                 // Si la publicación no tiene ninguna imagen, pongo una imagen por defecto
                 var img = '1@.png';

                 // Si la publicación tiene alguna imagen, pongo la primera
                 if(advertsing.commercial_image !== "" && advertsing.commercial_image !== null) {
                     img = advertsing.commercial_image.split(",",1);
                 }

                 // Formateo la dirección para que tambien muestre la Ciudad y la Provincia
                 if(advertsing.address !== "" && advertsing.address !== null){
                     advertsing.address = advertsing.address+", " + advertsing.city_name + " (" + advertsing.province_name + ")";
                 }else{
                     advertsing.address = advertsing.city_name + " (" + advertsing.province_name + ")";
                 }

                 var arr = {
                     title : advertsing.title,
                     category_name: advertsing.cat_name,
                     adv_cat_id: advertsing.advertsing_id,
                     adv_detail_id: advertsing.advertsing_detail_id,
                     address : advertsing.address,
                     phone : advertsing.phone,
                     url: advertsing.website,
                     tags : ['resturent_02','resturent_02_03'],
                     lat : advertsing.latitude,
                     lng : advertsing.longitude,
                     img : '../../images/'+img,
                     icon : '../../images/icons/marker.png'
                 };

                 db_places.push(arr);
             });

             // Datos de las ubicaciones en el mapa
             $('#finddo-wrapper').finddo({
                 places: db_places, // array de publicaciones por categoría
                 icon: '../../images/icons/marker.png',
                 lat: -54.8053998,       //latitud of the  center
                 lng: -68.3242061,       //longitude of the center
                 posPanel: 'left',
                 showPanel: true,
                 radius: 0,
                 cluster: true,
                 country: 'argentina',
                 mapType: 'roadmap',
                 request: 'large',
                 locationTypes: ['geocode','establishment']
             });

         }).fail(function(response) {
             console.log( "Error: " + response );
         });


});

 $.urlParam = function(name){
     var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
     return results[1] || 0;
 }