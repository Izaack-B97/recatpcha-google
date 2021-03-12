<?php require_once 'keys.php'?>
<?php
    if ( isset( $_POST['token'] ) ) {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [ // Data a mandar en la peticion
            'secret' => SECRET_KEY,
            'response' => $_POST['token']
        ];

        $options = array( // Opciones para la peticion
                'http' => array(
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => "POST",
                    'content' => http_build_query( $data )
                )
        );

        $context = stream_context_create( $options ); // Crea un contexto para la peticion
        $response = file_get_contents( $url, false, $context );
        $res = json_decode( $response, true );

        var_dump( $res );

        if ( $res['success'] == true && $res['score'] > 0.5 ) {
            echo 'Eres humano';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recaptcha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body class="container py-5">
    <form name="form" method="post" action="./" id="demoForm">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nombre</label>
            <input name="name" type="text" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="mb-3">
            <input name="token" type="hidden" class="form-control" id="token">
        </div>
        <button class="btn btn-success multiline-text-2">Submit</button>

    </form>
    <script src="https://code.jquery.com/git/jquery-3.x-git.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('<?php echo SITE_KEY ?>', { action: 'submit' })
                .then(function(token) {
                    $('#token').val( token );
                });
        });
    </script>
</body>
</html>
