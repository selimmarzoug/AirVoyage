<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up AirTravel</title>


    <!-- Font Icon -->
    <link rel="stylesheet" href="/css01/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Favicon -->
 
    <link href="/welcome/img/AirTravelLogo.png" rel="icon">
    <!-- Main css -->
    <link rel="stylesheet" href="/css01/css/style.css">

    <style>
    /* Modal Styling */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 60%; /* Adjust width as needed */
        text-align: center; /* Center text */
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Additional Styles */
    #signup-modal-trigger {
        cursor: pointer;
    }

    button {
        background-color:#6dabe4;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
    }

    button:hover {
        background-color: #6dabe4;
    }

    </style>

</head>
<body>

    <div class="main">
        <!-- Sing in  Form -->
    <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                <div class="signin-image">
                        <figure><img src="/css01/images/signin-image.jpg" alt="sing up image"></figure>
                        <button id="signup-modal-trigger" class="signup-image-link">Create an account</button>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                      <!-- Inside your Blade view -->
<!-- Inside your Blade view -->
<!-- Error message box -->
@if ($errors->any())
    <div class="error-alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
    @csrf
    <div class="form-group">
        <label for="email"><i class="zmdi zmdi-email"></i></label>
        <input type="email" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}" required autofocus autocomplete="email" />
    </div>
    <div class="form-group">
        <label for="password"><i class="zmdi zmdi-lock"></i></label>
        <input type="password" name="password" id="password" placeholder="Password" class="form-control" value="{{ old('password') }}" required autocomplete="new-password" />
    </div>
    <div class="form-group">
        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
        <label for="remember-me" class="label-agree-term"><span><span></span></span>{{ __('Remember me') }}</label>
    </div>
    <div class="form-group form-button">
        <input type="submit" name="signin" id="signin" class="form-submit" value="{{ __('Log in') }}"/>
    </div>
</form>

<style>
    /* CSS styles for error message alert */
    .error-alert {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
        text-align: center;
    }
</style>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="social-css01">
                            <span class="social-label">Or with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

        <!-- Modal -->
        <div id="signup-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Choose your sign-up type:</h3>
            <button id="signup-company-btn">Sign up as Airline Company</button>
            <button id="signup-client-btn">Sign up as client</button>
        </div>
    </div>

    <!-- Script JavaScript for the modal -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Selecting the "Create an account" button
            var modalTrigger = document.getElementById('signup-modal-trigger');
            var modal = document.getElementById('signup-modal');
            var closeModal = document.querySelector('.close');

            // Displaying the modal when the button is clicked
            modalTrigger.addEventListener('click', function () {
                modal.style.display = "block";
            });

            // Closing the modal when the user clicks on the close button
            closeModal.addEventListener('click', function () {
                modal.style.display = "none";
            });

            // Redirecting to the company sign-up page
            document.getElementById('signup-company-btn').addEventListener('click', function () {
                window.location.href = '/sign-up-compagnie';
            });

            // Redirecting to the client sign-up page
            document.getElementById('signup-client-btn').addEventListener('click', function () {
                window.location.href = '/sign-up-client';
            });
        });
    </script>

    <!-- JS -->
    <script src="/css01/vendor/jquery/jquery.min.js"></script>
    <script src="/css01/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>