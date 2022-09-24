<?php
session_start();

// If didn't send request, dont change variables
if (!isset($_POST['result'])) {
    $_SESSION['x'] = rand(1, 10);
    $_SESSION['y'] = rand(1, 10);
    $_SESSION['true_result'] = $_SESSION['x'] + $_SESSION['y'];
}

// Bot Control System
if (isset($_POST['verify'])) {
    if (!empty($_POST['result'])) {
        if ($_POST['result'] == $_SESSION['true_result']) {
            header("REFRESH:1;URL=index.php");
            $verified = true;
        } else {
            header("REFRESH:1;URL=index.php");
            $verified = false;
        }
    } else {
        header("Location:index.php?state=empty");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Bot Verify</title>
</head>

<body style="background-color: #e5e5e5;">
    <div class="container">
        
        <?php if (isset($_POST['verify'])) {
        ?>
            <?php if ($verified == true) {
            ?>
                <div class="alert mt-5 alert-success" role="alert">
                    Succes! You Verified Bot Control!
                </div>

            <?php
            exit;
            } elseif ($verified == false) {
            ?>
                <div class="alert mt-5 alert-danger">
                    Error! Please Verify Bot Control!
                </div>
            <?php
            exit;
            } ?>
        <?php
        } ?>

        <h1 class="lead display-2 text-center mb-5 mt-2">Simple Bot Verify System!</h1>
        <div class="card mt-3 bg-secondary">
            <div class="card-body p-3 justify-content-center">
                
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-2">
                            <input type="text" class="form-control" placeholder="<?php echo $_SESSION['x'] ?>" readonly>
                        </div>

                        <div class="col-2">
                            <h4 class="text-center">+</h4>
                        </div>

                        <div class="col-2">
                            <input type="text" class="form-control" placeholder="<?php echo $_SESSION['y'] ?>" readonly>
                        </div>

                        <div class="col-2">
                            <h4 class="text-center">=</h4>
                        </div>

                        <div class="col-2">
                            <input type="number" name="result" class="form-control" placeholder="Please Verify">
                        </div>

                        <div class="col-2">
                            <input type="submit" name="verify" class="form-control btn btn-primary" value="Verify!">
                        </div>
                    </div>
                </form>

            </div>
        </div>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>
