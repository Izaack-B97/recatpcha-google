<?php 
    
    define('SITE_KEY', '6LcVzXsaAAAAAJxekEl21P6klzGEs4tbCVAj01E4');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recaptcha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>"></script>
</head>
<body class="container py-5">
    <form name="form" method="post" action="./process_data.php">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nombre</label>
            <input name="name" type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY ?>"></div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
