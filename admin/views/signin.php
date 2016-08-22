<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../favicon.ico">

        <title>Kirjaudu sisään</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/signin.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container">

            <!-- login form box -->
            <form method="post" action="index.php" name="loginform" class="form-signin">

                <h2 class="form-signin-heading">Kirjaudu sisään</h2>

                <label for="login_input_username" class="sr-only">Käyttäjätunnus</label>
                <input id="login_input_username" class="form-control" type="text" name="user_name" placeholder="Käyttäjätunnus" required autofocus>

                <label for="login_input_password" class="sr-only">Salasana</label>
                <input id="login_input_password" class="form-control" type="password" name="user_password" placeholder="Salasana" autocomplete="off" required />

                <input type="submit"  name="login" value="Kirjaudu" class="btn btn-lg btn-primary btn-block" />

            </form>

        </div> <!-- /container -->

        <div class="container">
            
            <div class="col-sm-4"></div><!-- empty column -->

            <div class="col-sm-4 text-center">
                <?php
                // show potential errors / feedback (from login object)
                if (isset($login)) {
                    if ($login->errors) {
                        foreach ($login->errors as $error) {
                            echo    '<div class="alert alert-danger">' .
                                        $error . 
                                    '</div>';
                        }
                    }
                    if ($login->messages) {
                        foreach ($login->messages as $message) {
                            echo    '<div class="alert alert-success">' .
                                        $message . 
                                    '</div>';
                        }
                    }
                }
                ?>
            </div>
            
            <div class="col-sm-4"></div><!-- empty column -->
            
        </div>

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>