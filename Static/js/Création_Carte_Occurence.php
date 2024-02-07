<script>
    var map = L.map('map',{minZoom:2}).setView([51.505, -0.09], 3);

    L.tileLayer('https://tile.gbif.org/3857/omt/{z}/{x}/{y}@1x.png', {
        maxZoom: 19,
        attribution: '&copy; GBIF',
        noWrap:false
    }).addTo(map);

    // Add a PNG image overlay
    var imageUrl = "https://api.gbif.org/v2/map/occurrence/density/0/0/0%404x.png?srs=EPSG%3A3857&hexPerTile=1001&squareSize=4096&taxonKey=<?= $idGbif ?>";
    var imageBounds = [[-90, -180], [90, 180]]; // Replace with actual coordinates
    L.imageOverlay(imageUrl, imageBounds,{opacity:0.7}).addTo(map);
</script>