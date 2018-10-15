ymaps.ready(function () {
    var myMap = new ymaps.Map('map', {
            center: [44.556750, 33.537589],
            zoom: 11
        }, {
            searchControlProvider: 'yandex#search'
        }),
        
        myPlacemark1 = new ymaps.Placemark(['44.617991', '33.516956'], {
            hintContent: 'Береговая линия Севастополя',
            balloonContent: '<b>Береговая линия Севастополя.</b> растянулась на 152 км. Преобладает скалистый обрывистый рельеф, чередующийся с песочной и галечной прибрежной зоной. В городской черте находится 30 пляжей.'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'http://hotelhersones.ru/wp-content/themes/hersones/js/maps_attractions/images/1.png',
            // Размеры метки.
            iconImageSize: [53, 53],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [0, 0]
        }),
        
        myPlacemark2 = new ymaps.Placemark(['44.618346', '33.524293'], {
            hintContent: 'Памятник затопленным кораблям',
            balloonContent: '<b>Памятник затопленным кораблям.</b> — главный монумент Севастополя, установленный  в 1905 году, в честь 50-летия Первой героической обороны города.  Скульпторы  композиции— А.Г. Адмсон, В.А. Фельдман, военный инженер — Ф.О. Энберг.'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'http://hotelhersones.ru/wp-content/themes/hersones/js/maps_attractions/images/2.png',
            // Размеры метки.
            iconImageSize: [53, 53],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [0, 0]
        }),
        
        
        myPlacemark3 = new ymaps.Placemark(['44.504911', '33.598158'], {
            hintContent: 'Балаклава',
            balloonContent: '<b>Балаклава.</b> — обособленно расположенный административный район города Севастополя. До 1990 года здесь находилась база подводных лодок Черноморского флота, в наши дни — это  популярная зона туристического отдыха.'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'http://hotelhersones.ru/wp-content/themes/hersones/js/maps_attractions/images/3.png',
            // Размеры метки.
            iconImageSize: [53, 53],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [0, 0]
        }),
        
        
         myPlacemark4 = new ymaps.Placemark(['44.610944', '33.492997'], {
            hintContent: 'Херсонес Таврический',
            balloonContent: '<b>Херсонес Таврический.</b>– город-государство,  основанный в V I веке до н.э. выходцами из Гераклеи. На территории национального музея-заповедника находится Владимирский собор, построенный на предполагаемом месте Крещения князя Владимира.'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'http://hotelhersones.ru/wp-content/themes/hersones/js/maps_attractions/images/4.png',
            // Размеры метки.
            iconImageSize: [53, 53],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [0, 0]
        }),
        
        
         myPlacemark5 = new ymaps.Placemark(['44.616914', '33.526902'], {
            hintContent: 'Графская пристань',
            balloonContent: '<b>Графская пристань.</b> — часть архитектурной композиции на площади адмирала Нахимова в городе Севастополе. Исторический памятник, построенный в 1846 году, является одним из главных символов города-героя, и объектом культурного наследия федерального значения.'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'http://hotelhersones.ru/wp-content/themes/hersones/js/maps_attractions/images/5.png',
            // Размеры метки.
            iconImageSize: [53, 53],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [0, 0]
        }),
        
        
         myPlacemark6 = new ymaps.Placemark(['44.613462', '33.518566'], {
            hintContent: 'Артиллерийская бухта (Артбухта)',
            balloonContent: '<b>Артиллерийская бухта (Артбухта).</b> расположена в центре Севастополя, и является частью исторического градостроительного комплекса. Между Артбухтой и Северной стороной действует паромное сообщение.'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'http://hotelhersones.ru/wp-content/themes/hersones/js/maps_attractions/images/6.png',
            // Размеры метки.
            iconImageSize: [53, 53],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [0, 0]
        }),
        
        
        
     myPlacemark7 = new ymaps.Placemark(['44.611498', '33.520059'], {
            hintContent: 'Площадь Лазарева',
            balloonContent: '<b>Площадь Лазарева.</b> — центральная площадь Севастополя (Ленинский район), получившая название  в 1993 году в честь адмирала М.П. Лазарева. Является началом  улицы  Большая Морская и проспекта Нахимова.'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'http://hotelhersones.ru/wp-content/themes/hersones/js/maps_attractions/images/7.png',
            // Размеры метки.
            iconImageSize: [53, 53],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [0, 0]
        }),
        
        
        
         myPlacemark8 = new ymaps.Placemark(['44.614767', '33.521286'], {
            hintContent: 'Севастопольский Дельфинарий',
            balloonContent: '<b>Севастопольский Дельфинарий.</b> расположен в Артбухте. В весенне-летний сезон здесь проводятся шоу-представления с участием морских животных. Под руководством инструктора организуется совместное купание с дельфинами.'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'http://hotelhersones.ru/wp-content/themes/hersones/js/maps_attractions/images/8.png',
            // Размеры метки.
            iconImageSize: [53, 53],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [0, 0]
        }),
        
        
        
         myPlacemark9 = new ymaps.Placemark(['44.613249', '33.525779'], {
            hintContent: 'Музей Панорама',
            balloonContent: '<b>Музей Панорама.</b> — уникальная художественная экспозиция, отражающая ход военных действий во время первой героической обороны Севастополя. Художник Ф.А. Рубо, запечатлел на масштабном полотне (14 метров) бой на Малаховом кургане 6 июня 1855 года.'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'http://hotelhersones.ru/wp-content/themes/hersones/js/maps_attractions/images/9.png',
            // Размеры метки.
            iconImageSize: [53, 53],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [0, 0]
        }),
        
        
         myPlacemark10 = new ymaps.Placemark(['44.610423', '33.523455'], {
            hintContent: 'Владимирский собор (адмиралтейский)',
            balloonContent: '<b>Владимирский собор (адмиралтейский).</b> — старейший храм Севастополя, строительством которого руководил М.П. Лазарев  в период 1848-1851 гг. Сегодня  это действующий Православный храм и музей, где находится усыпальница Адмиралов и офицеров, героев военных событий.'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'http://hotelhersones.ru/wp-content/themes/hersones/js/maps_attractions/images/10.png',
            // Размеры метки.
            iconImageSize: [53, 53],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [0, 0]
        }),
        
        
         myPlacemark11 = new ymaps.Placemark(['44.602640', '33.476723'], {
            hintContent: 'ЧВВМУ имени Нахимова  в Севастополе',
            balloonContent: '<b>ЧВВМУ имени Нахимова  в Севастополе.</b>— высшее военно-морское училище, занимающее территорию 50 га, между Стрелецкой и Карантинной бухтой. Год основания — 1937, первый выпуск — 1952 год.'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'http://hotelhersones.ru/wp-content/themes/hersones/js/maps_attractions/images/11.png',
            // Размеры метки.
            iconImageSize: [53, 53],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [0, 0]
        }),
        
         myPlacemark12 = new ymaps.Placemark(['44.610280', '33.503349'], {
            hintContent: 'Карантинная бухта',
            balloonContent: '<b>Карантинная бухта.</b>—  часть акватории Севастополя, на берегу которой  в VI веке до н.э. был  основан город Херсонес. Современное название дано при Екатерине II, когда бухту использовали для стоянки судов, проходивших карантин.'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'http://hotelhersones.ru/wp-content/themes/hersones/js/maps_attractions/images/12.png',
            // Размеры метки.
            iconImageSize: [53, 53],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [0, 0]
        }),
        
         myPlacemark13 = new ymaps.Placemark(['44.601966', '33.475221'], {
            hintContent: 'Стрелецкая бухта',
            balloonContent: '<b>Стрелецкая бухта.</b> распложена в Гагаринском районе города Севастополя, к юго-западу от Южного мола городской акватории. Место постоянного базирования кораблей боевого и вспомогательного флота.'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'http://hotelhersones.ru/wp-content/themes/hersones/js/maps_attractions/images/13.png',
            // Размеры метки.
            iconImageSize: [53, 53],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [0, 0]
        }),
        
         myPlacemark14 = new ymaps.Placemark(['44.498834', '33.597065'], {
            hintContent: 'Музей ремонта подводных лодок',
            balloonContent: '<b>Музей ремонта подводных лодок.</b> — рассекреченный военный объект, построенный для арсенала ЧФ от ядерного удара. Экскурсия проходит по скрытым в горном массиве помещениям, и сопровождается осмотром уникальных инженерно-технических сооружений.'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'http://hotelhersones.ru/wp-content/themes/hersones/js/maps_attractions/images/14.png',
            // Размеры метки.
            iconImageSize: [53, 53],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [0, 0]
        }),
        
        
         myPlacemark15 = new ymaps.Placemark(['44.552943', '33.583280'], {
            hintContent: 'Диорама',
            balloonContent: '<b>Диорама.</b> —  масштабный музейно-исторический комплекс, расположенный на Сапун-горе, в 12 км от центра города. Экспозиция музея посвящена героическому штурму укрепленного пункта немецко-фашистских захватчиков, завершившегося  полным освобождением Севастополя.'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'http://hotelhersones.ru/wp-content/themes/hersones/js/maps_attractions/images/15.png',
            // Размеры метки.
            iconImageSize: [53, 53],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [0, 0]
        }),
        
         myPlacemark16 = new ymaps.Placemark(['44.597878', '33.523552'], {
            hintContent: 'Исторический бульвар',
            balloonContent: '<b>Исторический бульвар.</b> — культурно-исторический комплекс, расположенный на возвышенности  в центре города. Место, где находится музей Панорама «Оборона Севастополя 1854-1855 гг.» и другие памятники, посвященные военным событиям.'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'http://hotelhersones.ru/wp-content/themes/hersones/js/maps_attractions/images/16.png',
            // Размеры метки.
            iconImageSize: [53, 53],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [0, 0]
        }),
        
        
         myPlacemark17 = new ymaps.Placemark(['44.613324', '33.525652'], {
            hintContent: 'Музей истории Черноморского флота России',
            balloonContent: '<b>Музей истории Черноморского флота России,</b> расположенный на ул. Ленина (бывшая Екатерининская ул.) построен в 1895. В музейных залах представлены уникальные коллекции  исторических материалов, экспонатов и картин, связанных с развитием Черноморского флота.'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'http://hotelhersones.ru/wp-content/themes/hersones/js/maps_attractions/images/17.png',
            // Размеры метки.
            iconImageSize: [53, 53],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [0, 0]
        }),
        
        
        myPlacemark18 = new ymaps.Placemark(['44.607686', '33.495055'], {
            hintContent: 'Апартаменты Херсонес',
            balloonContent: '<b>Апартаменты Херсонес.</b>'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'http://hotelhersones.ru/wp-content/themes/hersones/js/maps_attractions/images/her.png',
            // Размеры метки.
            iconImageSize: [67, 53],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [0, 0]
        });
        
        
        
    myMap.geoObjects.add(myPlacemark1);
    myMap.geoObjects.add(myPlacemark2);
    myMap.geoObjects.add(myPlacemark3);
    myMap.geoObjects.add(myPlacemark4);
    myMap.geoObjects.add(myPlacemark5);
    myMap.geoObjects.add(myPlacemark6);
    myMap.geoObjects.add(myPlacemark7);
    myMap.geoObjects.add(myPlacemark8);
    myMap.geoObjects.add(myPlacemark9);
    myMap.geoObjects.add(myPlacemark10);
    myMap.geoObjects.add(myPlacemark11);
    myMap.geoObjects.add(myPlacemark12);
    myMap.geoObjects.add(myPlacemark13);
    myMap.geoObjects.add(myPlacemark14);
    myMap.geoObjects.add(myPlacemark15);
    myMap.geoObjects.add(myPlacemark16);
    myMap.geoObjects.add(myPlacemark17);
    myMap.geoObjects.add(myPlacemark18);

});