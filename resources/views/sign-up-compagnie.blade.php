<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up AirTravel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="air travel, flights, booking, travel tips" name="keywords">
    <meta content="Explore the best air travel options with AirTravel. Book your flights easily and get travel tips for a seamless journey." name="description">

    <!-- Favicon -->


    <!-- Font Icon -->
    <link rel="stylesheet" href="/css01/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/css01/css/style.css">
</head>
<body>

<div class="main">

       <!-- Sign up form -->
       <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form action="{{ route('registercompagnie') }}" method="post" autocomplete="off" class="sign-in-form" id="login-form">
                            @csrf
                            @if (session('success'))
                            <div class="alert alert-success" style="background-color: #2ecc71;">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if (session('fail'))
                            <div class="alert alert-danger">
                                {{ session('fail') }}
                            </div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="lastname"><i class="zmdi zmdi-account"></i></label>
                                <input type="text" name="lastname" id="lastname" placeholder="Your Last Name" value="{{ old('lastname') }}">
                                @error('lastname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nom_compagnie_aerienne"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nom_compagnie_aerienne" id="nom_compagnie_aerienne" placeholder="Airline Company Name" value="{{ old('nom_compagnie_aerienne') }}">
                                @error('nom_compagnie_aerienne')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="adresse"><i class="zmdi zmdi-pin"></i></label>
                                <input type="text" name="adresse" id="adresse" placeholder="Your Address" value="{{ old('adresse') }}">
                                @error('adresse')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required autofocus autocomplete="email">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                            <input type="text" name="phone" id="phone" placeholder="Phone (8 digits)" value="{{ old('phone') }}" required autofocus autocomplete="off" pattern="[0-9]{8}">
                            @error('phone')
                            <span class="text-danger">Phone number must be exactly 8 digits</span>
                            @enderror
                             </div>

                            <div class="form-group">
                                <label for="ville"><i class="zmdi zmdi-city"></i></label>
                                <input type="text" name="ville" id="ville" placeholder="Your City" value="{{ old('ville') }}">
                                @error('ville')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pays"><i class="zmdi zmdi-flag"></i></label>
                                <input type="text" name="pays" id="pays" placeholder="Your Country" value="{{ old('pays') }}">
                                @error('pays')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term">
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register">
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="/css01/images/signup-image.jpg" alt="sign up image"></figure>
                        <a href="/Login" class="signup-image-link">I am already a member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="/css01/vendor/jquery/jquery.min.js"></script>
    <script src="/css01/js/main.js"></script>
</body>
</html>