<script>
    const images = 

    <?php
    if ($dataimage) {
        $imageUrls = [];
        foreach ($dataimage as $image) {
            // Push the image URL to the array
            $imageUrls[] = $image;
        }
        echo json_encode($imageUrls);
    }else {
        echo '[]'; // Provide an empty array if no images are available
    }
    ?>
    ;

    let currentIndex = 0;
    const currentImage = document.getElementById('current-image');

    function updateImage() {
    currentImage.src = images[currentIndex];
    console.log('Updated image source to:', currentImage.src);
    }
    function showNextImage() {
    currentIndex = (currentIndex + 1) % images.length;
    updateImage();
    }

    function showPreviousImage() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    updateImage();
    }

    // Display the first image when the page loads
    updateImage();
</script>