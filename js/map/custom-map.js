 $(function(){
            $('#finddo-wrapper').finddo({
                places: [
				
				

                    {title: 'Hospital Regional Ushuaia', address: '12 de Octubre y Maipu, Ushuaia, TDF', phone: '103', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_02'], lat: -54.81373791, lng: -68.32356691, img: '../../images/Hospitales/hospital-ush.jpg', icon: '../../images/icons/marker.png'},
					
                    {title: 'Mr Billiards', address: ' Pool Confiteria, Patagonia 55, Ushuaia, Tierra del Fuego', phone: '+123 456 789', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_03'], lat: -54.8096148, lng: -68.3169023, img: 'images/thumb.png', icon: '../../images/icons/marker-rest.png'},
					
                   {title: 'Museo del Presidio', address: 'Yaganes y Gdor Feliz Paz, Ushuaia, Tierra del Fuego', phone: '+54 1234', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_03'], lat: -54.80348628, lng: -68.29790354, img: '../../images/Museos/museo3.jpg', icon: '../../images/icons/marker.png'},

				   {title: 'Museo del Fin del Mundo', address: 'AV Maipu 173,  C/P9410   Ushuaia  Tierra del Fuego', phone: '+54 1234', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_03'], lat: -54.80607416, lng: -68.30001175, img: '../../images/Museos/museo1.jpg', icon: '../../images/icons/marker.png'},




                ], 
                icon: '../../images/icons/marker.png',
                lat: -54.8053998,       //latitud of the  center
                lng: -68.3242061,       //longitude of the center
                posPanel: 'left',
                showPanel: true,
                radius: 15,
                cluster: true,
                country: 'argentina',
                mapType: 'roadmap',
                request: 'large',
                locationTypes: ['geocode','establishment']
            }); 
        });