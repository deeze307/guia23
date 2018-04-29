 $(function(){
            $('#finddo-wrapper').finddo({
                places: [
				
				
									
                    {title: 'Hospital Regional Ushuaia', address: '12 de Octubre y Maipu, Ushuaia, TDF', phone: '103', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_02'], lat: -54.81373791, lng: -68.32356691, img: 'images/Hospitales/hospital-ush.jpg', icon: 'images/icons/marker.png'},
					
                    {title: 'Mr Billiards', address: ' Pool Confiteria, Patagonia 55, Ushuaia, Tierra del Fuego', phone: '+123 456 789', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_03'], lat: -54.8096148, lng: -68.3169023, img: 'images/thumb.png', icon: 'images/icons/marker-rest.png'},
					
                   {title: 'Museo del Presidio', address: 'Yaganes y Gdor Feliz Paz, Ushuaia, Tierra del Fuego', phone: '+54 1234', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_03'], lat: -54.80348628, lng: -68.29790354, img: 'images/Museos/museo3.jpg', icon: 'images/icons/marker.png'},
					
				   {title: 'Museo del Fin del Mundo', address: 'AV Maipu 173,  C/P9410   Ushuaia  Tierra del Fuego', phone: '+54 1234', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_03'], lat: -54.80607416, lng: -68.30001175, img: 'images/Museos/museo1.jpg', icon: 'images/icons/marker.png'},
					
				   {title: 'Iglesia Nuestra Señora de la Merced', address: 'AV San Martin 966, C/P9410,  Ushuaia, Tierra del Fuego', phone: '+54 1234', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_03'], lat: -54.80816105, lng: -68.31151307, img: 'images/thumb.png', icon: 'images/icons/marker.png'},
					
				   {title: 'Museo de la Legislatura', address: 'AV Maipu 465, C/P9410,  Ushuaia, Tierra del Fuego', phone: '+54 1234', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_03'], lat: -54.80712535, lng: -68.30406189, img: 'images/thumb.png', icon: 'images/icons/marker.png'},
                    
				   {title: 'Colegio Provincial Ramon Alberto Trejo Noel', address: 'Santiago Rapatini, C/P9410, Tolhuin, Tierra del Fuego', phone: '+54 1234', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_03'], lat: -54.50852894, lng: -67.19268858, img: 'images/thumb.png', icon: 'images/icons/marker.png'},
					
				   {title: 'Museo Fueguino de Arte', address: 'Av Manuel Belgrano 940, C/P9420, Rio Grande, Tierra del Fuego', phone: '+54 1234', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_03'], lat: -53.78251843, lng: -67.69734085, img: 'images/thumb.png', icon: 'images/icons/marker.png'},
				   
				   {title: 'Hospital Regional Rio Grande', address: 'Ameguino 709, C/P9420, Rio Grande, Tierra del Fuego', phone: '+54 1234', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_03'], lat: -53.78198911, lng: -67.69891262, img: 'images/Hospitales/hospital-rg.jpg', icon: 'images/icons/marker.png'},
					
				   {title: 'Museo Virginia Choquintel', address: 'Juan Bautista Alberdi 555, C/P9420, Rio Grande, Tierra del Fuego', phone: '+54 1234', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_03'], lat: -53.78819159, lng: -67.70362258, img: 'images/thumb.png', icon: 'images/icons/marker.png'},
					
				  {title: 'Universidad Tecnologica Nacional', address: 'Islas Malvinas 1650, C/P9420, Rio Grande, Tierra del Fuego', phone: '+54 1234', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_03'], lat: -53.78592162, lng: -67.7277866, img: 'images/thumb.png', icon: 'images/icons/marker.png'},
					
				  {title: 'Escuela Superior de Policia', address: ', C/P9420, Rio Grande, Tierra del Fuego', phone: '+54 1234', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_03'], lat: -53.74098912, lng: -67.76385427, img: 'images/thumb.png', icon: 'images/icons/marker.png'},
					
				  {title: 'Polivalente de Arte Prof. Ines Maria Bustelo', address: 'Av Lenadro N Alem 15, C/P9410, Ushuaia, Tierra del Fuego', phone: '+54 1234', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_03'], lat: -54.79906144, lng: -68.30274761, img: 'images/thumb.png', icon: 'images/icons/marker.png'},
					
				  {title: 'Colegio Tecnico Provincial Olga Bronzovich de Arco', address: 'Av Gdor Felix Paz, C/P9410, Ushuaia, Tierra del  Fuego', phone: '+54 1234', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_03'], lat: -54.80921836, lng: -68.32443327, img: 'images/thumb.png', icon: 'images/icons/marker.png'},
					
				 {title: 'CIEU Gral. San Martin', address: 'Av Perito F Moreno, C/P9410, Ushuaia, Tierra del Fuego', phone: '+54 1234', url: 'Mas Detalles', tags: ['resturent_02','resturent_02_03'], lat: -54.79875531, lng: -68.2808876, img: 'images/thumb.png', icon: 'images/icons/marker.png'},
					

                ], 
                icon: 'images/icons/marker.png',
                lat: -53.10000000,       //latitud of the  center
                lng: -66.40000000,       //longitude of the center
                posPanel: 'left',
                showPanel: true,
                radius: 20,
                cluster: true,
                country: 'argentina',
                mapType: 'roadmap',
                request: 'large',
                locationTypes: ['geocode','establishment']
            }); 
        });