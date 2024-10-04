<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Маршрут доставки</title>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=56b6307e-1bed-4442-8e12-be41303e5155" type="text/javascript"></script>
    <script type="text/javascript">
        ymaps.ready(init);

        function init() {
            // Точки маршрута из переданных данных
            var points = [
                    @foreach($components as $component)
                [{{ $component['coordinates'][1] }}, {{ $component['coordinates'][0] }}], // Долгота и широта
                @endforeach
            ];

            // Создание маршрута
            var multiRoute = new ymaps.multiRouter.MultiRoute({
                referencePoints: points,
                params: {
                    routingMode: 'auto'
                }
            }, {
                boundsAutoApply: true
            });

            // Создание карты
            var myMap = new ymaps.Map('map', {
                center: [55.7558, 37.6173], // Центр карты (Москва)
                zoom: 5
            });

            // Добавляем маршрут на карту
            myMap.geoObjects.add(multiRoute);
        }
    </script>
</head>
<body>
<h1>Оптимальный маршрут доставки</h1>
<div id="map" style="width: 100%; height: 600px;"></div>
</body>
</html>
