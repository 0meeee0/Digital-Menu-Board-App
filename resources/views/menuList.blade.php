<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigitalMenu</title>
    @include('layouts.head')
</head>
<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="navbar-brand mx-auto" href="index.php">
                        <span>DigitalMenu</span>
                    </a>
                    <a class="navbar-brand mx-auto" href="create">
                        <span class="text-warning">+</span>
                    </a>
                </nav>
            </div>
        </header>
        <!-- end header section -->

        <!-- slider section -->
        <section class="slider_section ">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <!-- Your slider content goes here -->
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- recipe section -->
    <section class="recipe_section layout_padding-top">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Our Menus</h2>
            </div>
            <div class="row">
                @foreach($menus as $menu)
                <div class="col-sm-6 col-md-4 mx-auto">
                    <div class="box">
                        <div class="img-box">
                            <!-- <img src="{{ asset('path_to_your_image_folder/' . $menu->image) }}" class="box-img" alt="{{ $menu->name }}"> -->
                            {!! QrCode::size(250)->generate(
                                "Name :" . $menu->name . "\n" . 
                                "Description: " . $menu->description . "\n" . 
                                "Ingredients: " . $menu->ingredients . "\n" . 
                                "Instructions: " . $menu->instructions . "\n" . 
                                "Category: " . $menu->category . "\n" . 
                                "Price: " . $menu->price
                            ) !!}

                        </div>
                        <div class="detail-box">
                            <h4>{{ $menu->name }}</h4>
                            <a href="#" data-toggle="modal" data-target="#recipeModal">👁️</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end recipe section -->

    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="recipeModal" tabindex="-1" role="dialog" aria-labelledby="recipeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="recipeModalLabel">✨🍽️<em>{{ $menu->name }}</em>🍽️✨</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="" class="img-fluid" alt="">
                            {!! QrCode::size(250)->generate(
                                "Name :" . $menu->name . "\n" . 
                                "Description: " . $menu->description . "\n" . 
                                "Ingredients: " . $menu->ingredients . "\n" . 
                                "Instructions: " . $menu->instructions . "\n" . 
                                "Category: " . $menu->category . "\n" . 
                                "Price: " . $menu->price
                            ) !!}
                        </div>
                        <div class="col-md-6">
                            <p>{{ $menu->description }}</p>
                            <p><b>Ingredients:</b><br>{{ $menu->ingredients }}</p>
                            <p><b>Instructions:</b><br>{{ $menu->instructions }}</p>
                            <p><b>Category:</b> {{ $menu->category }}</p>
                            <p><b>Price:</b> {{ $menu->price }}</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div>
                        <a class="btn btn-outline-primary" href="{{ route('menus.edit', $menu) }}">✍ Edit</a>
                        <form method="POST" action="{{ route('menus.destroy', $menu) }}" onsubmit="return confirm('Are you sure you want to delete this menu item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">❌ Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- about section -->
    <section class="about_section layout_padding">
        <div class="container">
            <div class="col-md-11 col-lg-10 mx-auto">
                <div class="heading_container heading_center">
                    <h2>About Us</h2>
                </div>
                <div class="box">
                    <div class="col-md-7 mx-auto">
                        <div class="img-box">
                            <img src="images/about-img.jpg" class="box-img" alt="">
                        </div>
                    </div>
                    <div class="detail-box">
                        <p>
                            Welcome to DigitalMenu, your online haven for sharing and discovering delightful recipes! Whether you're a seasoned chef or a novice in the kitchen, our platform is a community-driven space where culinary enthusiasts come together to exchange, inspire, and indulge in the art of cooking. Join us on this flavorful journey, where every recipe tells a unique story, and each shared dish adds a pinch of joy to our collective cookbook. Cheers to a community united by a love for great food!
                        </p>
                        <a href="">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->

    <!-- footer section -->
    <div class="footer_container">
        <footer class="footer_section">
            <div class="container">
                <p>
                    <br>DigitalMenu &copy; <span id="displayYear"></span> All Rights Reserved
                </p>
            </div>
        </footer>
    </div>
    <!-- end footer section -->

    @include('layouts.scripts')
</body>
</html>
