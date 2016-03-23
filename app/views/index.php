<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="apple-mobile-web-app-title" content="Address Book">
        <meta name="application-name" content="Address Book">
        <link rel="icon" type="image/png" href="images/logo.png" sizes="192x192">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-TileImage" content="images/logo.png">
        <meta name="theme-color" content="#ffffff">
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/angular.js"></script>
        <script src="js/angular-route.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/admin.js"></script>
        <script src="js/controllers/loginController.js"></script>
        <script src="js/controllers/mainController.js"></script>
        <script src="js/services/authService.js"></script>
        <script src="js/services/crudService.js"></script>
        <title>Address Book</title>
    </head>
    <body  ng-app="contactApp">
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><img src='images/logo.png'></a>
                </div>

                <div class="text-uppercase text-center titles nav  navbar-nav">
                    <header>Address Book</header>
                </div>

            </div>
        </div>
        <div class="container" id="view" ng-view>

        </div>
    </body>
</html>
