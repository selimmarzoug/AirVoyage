<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mise à Jour du Statut de Réservation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            background-image: url('https://avenues.ca/wp-content/uploads/2020/02/billet-avion-petit-prix-billet-890x350.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.9);
        }
        .logo {
            display: block;
            margin: 0 auto;
            max-width: 200px;
            height: auto;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        p {
            margin-bottom: 10px;
            text-align: left;
        }
        .background-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.3; /* Adjust opacity as needed */
            z-index: -1; /* Place behind other content */
        }
    </style>
</head>
<body>
    <img class="background-img" src="https://blog.bourse-des-vols.com/wp-content/uploads/billet-avion-main.jpg" alt="Background Image">
    <div class="container">
        <img class="logo" src="https://c8.alamy.com/comp/2FA1XXJ/air-travel-logo-vector-icon-design-template-vector-2FA1XXJ.jpg" alt="Logo">

    <h1>Your Account Has Been Rejected</h1>
    <p>Unfortunately, your account has been rejected by the admin.</p>
    <p>Reason: {{ $reason }}</p>
    <p>If you have any questions or concerns, please contact the administrator.</p>
</body>
</html>
