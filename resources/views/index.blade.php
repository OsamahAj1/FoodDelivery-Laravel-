<!DOCTYPE html>
<html lang="en">

<head>
    <title>Food Delivery</title>
    <x-bootstrap.css />
    <x-carousel.style />
</head>

<body>
        <div id="pixs" class="carousel slide" data-bs-ride="carousel">
            <x-carousel.indicators />

            <div class="carousel-inner">
                <x-carousel.item class="active fw-bolder" :image="asset('storage/index_images/image1.jpg')"/>
                <x-carousel.item :image="asset('storage/index_images/image2.jpg')"/>
                <x-carousel.item :image="asset('storage/index_images/image3.png')"/>
            </div>

            <x-carousel.buttons />

        </div>
    <x-bootstrap.js />
</body>
