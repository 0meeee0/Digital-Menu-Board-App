<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigiMenu - Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            flex: 1;
        }

        .footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
            margin-top: 50px
        }

        .navbar {
            background-color: #dc1b89;
        }

        .navbar-brand {
            font-weight: bold;
            color: #ffffff;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
        }

        .red-logout .nav-link {
            color: red;
        }

        .jumbotron {
            background: url('your_image_url.jpg') center/cover no-repeat;
            height: 400px;
            color: #ffffff;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-bottom: 30px;
        }

        .jumbotron h1 {
            font-size: 3em;
            font-weight: bold;
            margin-bottom: 15px;
            animation: fadeInUp 1.5s ease;
            color: #dc1b89;
        }

        .jumbotron p {
            font-size: 1.5em;
            animation: fadeInUp 1.5s ease;
            color: #dc1b89;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-deck {
            margin-top: 30px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            max-height: 200px;
            object-fit: cover;
        }

        .card-body {
            text-align: center;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">DigiMenu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <!-- Logout Button -->
                <li class="nav-item red-logout">
                    <a class="nav-link" href="#" style="color: #FFFFFF;">Logout</a>
                </li>
                <!-- End of Logout Button -->
            </ul>
        </div>
    </nav>

    <div class="jumbotron">
        <h1>Welcome to DigiMenu</h1>
        <p>Your Digital Menu Solution</p>
    </div>

    <div class="container">
        <div class="card-deck">
            <div class="card">
                <img src="https://th.bing.com/th/id/OIG1.5fEGvaabuulV8nvXMmfi?pid=ImgGn" class="card-img-top" alt="Card Image 1">
                <div class="card-body">
                    <h5 class="card-title">Menu Category 1</h5>
                    <p class="card-text">Explore our delicious offerings in this category.</p>
                </div>
            </div>
            <div class="card">
                <img src="https://th.bing.com/th/id/OIG1.5fEGvaabuulV8nvXMmfi?pid=ImgGn" class="card-img-top" alt="Card Image 2">
                <div class="card-body">
                    <h5 class="card-title">Menu Category 2</h5>
                    <p class="card-text">Discover more tasty options in this category.</p>
                </div>
            </div>
            <div class="card">
                <img src="https://th.bing.com/th/id/OIG1.5fEGvaabuulV8nvXMmfi?pid=ImgGn" class="card-img-top" alt="Card Image 3">
                <div class="card-body">
                    <h5 class="card-title">Specials</h5>
                    <p class="card-text">Check out our daily specials and offers.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 DigiMenu. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
