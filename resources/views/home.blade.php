@extends('layouts.main')

@section('container')
<div id="myCarousel" class="carousel slide m-0" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="bd-placeholder-img" width="100%" height="100%" src="/image/banner1.png" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>

        </div>
        <div class="carousel-item">
        <img class="bd-placeholder-img" width="100%" height="100%" src="/image/banner2.png" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>

        </div>
        <div class="carousel-item">
        <img class="bd-placeholder-img" width="100%" height="100%" src="/image/banner3.png" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>

        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<section>
    <div class="d-md-flex flex-md-equal w-100 my-md-3 p-0">
        <div class="bg-blue pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden headline" style="height: 600px">
            <div class="my-3 py-3">
                <h2 class="display-5">Discover Barters</h2>
                <a class="lead text-decoration-none" href="/products">Go to product page >></a>
            </div>
            <div class="bg-light shadow-sm mx-auto overflow-hidden" style="width: 80%; height: 400px; border-radius: 21px 21px 0 0;">
                <img src="/image/product_page.svg" alt="" class="mt-5 headline-image">
            </div>
        </div>
        <div class="bg-light pt-3 px-3 pt-md-5 px-md-5 text-center text-blue overflow-hidden headline" style="height: 600px">
            <div class="my-3 p-3">
                <h2 class="display-5">Discover Us</h2>
                <a class="lead text-decoration-none" href="/aboutUs">Go to about us page >></a>
            </div>
            <div class="bg-blue shadow-sm mx-auto overflow-hidden" style="width: 80%; height: 400px; border-radius: 21px 21px 0 0;">
                <img src="/image/about_us.svg" alt="" class="mt-5 headline-image">
            </div>
        </div>
    </div>
    
</section>

@endsection