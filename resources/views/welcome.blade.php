<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>James Test Maps</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.8.0/mapbox-gl.css' rel='stylesheet'/>

    <script src='https://api.mapbox.com/mapbox-gl-js/v1.8.0/mapbox-gl.js'></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Styles -->
    <style>
        body {
            margin: 30px 0 100px;
        }

        h1 {
            margin: 30px 0 15px;
            text-align: center;
            text-shadow: 0px 1px 3px #888888;
        }

        #googlemap {
            height: 400px;
            width: 800px;
            text-align: center;
            box-shadow: 5px 5px 5px #888888;
            margin: auto;
        }

        #mapbox {
            height: 400px;
            width: 800px;
            box-shadow: 5px 5px 5px #888888;
            margin: auto;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <h1>Google Map</h1>
    <div id="googlemap"></div>
    <h1>Mapbox Map</h1>
    <div id='mapbox'></div>
</div>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['map'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': '{{ env('GOOGLE_API_KEY') }}'
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Lat', 'Long', 'Name'],
            [37.4232, -122.0853, 'Work'],
            [37.4289, -122.1697, 'University'],
            [37.6153, -122.3900, 'Airport'],
            [37.4422, -122.1731, 'Shopping']
        ]);

        var options = {
            icons: {
                default: {
                    normal: 'https://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Marker-Outside-Azure-icon.png',
                    selected: 'https://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Ball-Right-Azure-icon.png'
                }
            }
        };

        var map = new google.visualization.Map(document.getElementById('googlemap'));
        map.draw(data, options);
    }

</script>
<script>
    mapboxgl.accessToken = '{{env('MAPBOX_API_KEY')}}';
    var map = new mapboxgl.Map({
        container: 'mapbox',
        center: [-122.10, 37.47],
        zoom: 9,
        style: 'mapbox://styles/mapbox/satellite-v9'
    });
    new mapboxgl.Marker()
        .setLngLat([-122.0853, 37.4232])
        .addTo(map);
    new mapboxgl.Marker()
        .setLngLat([-122.1697, 37.4289])
        .addTo(map);
    new mapboxgl.Marker()
        .setLngLat([-122.3900, 37.6153])
        .addTo(map);
    new mapboxgl.Marker()
        .setLngLat([-122.1731, 37.4422])
        .addTo(map);
</script>
</body>
</html>
