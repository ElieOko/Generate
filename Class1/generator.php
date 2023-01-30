<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css'>
    <link rel="stylesheet" href="../fpdf/style/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="jumbotron">
        <h1 class="display-4">Hello, Generator</h1>
        <p class="lead">Certificat </p>
        <hr class="my-4">
        <p>Oui .</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Begin generator
            </a>
        </p>
    </div>
    <div class="row section">
        <div class="col">
            <!-- Modal Trigger -->
            <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>
            <p>
        </div>
    </div>
    <!-- Modal Structure -->
    <div id="modal1" class="modal">

        <h2>Generator certificat</h2>
        <form action="MulitPageODC.php" method="post" enctype="multipart/form-data">
            <div class="modal-content">


                <div class="input-file-container">
                    <input class="input-file" id="my-file" type="file" name="myfile">
                    <label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
                </div>
                <p class="file-return"></p>


            </div>
            <button type="submit" class="waves-effect waves-light btn" name="validate">Validation</button>
        </form>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Fermer</a>
        </div>
    </div>
    <!-- partial -->
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js'></script>
    <script src="./script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="../fpdf/action/script.js"></script>
</body>

</html>