<?php
include_once "./conn.php";
include_once "header.php"
// include "./cookieToS.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!--<title>Mohit Electrovision Work Related Portal</title>-->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mobile Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- <link href="./compiled.min.css" rel="stylesheet" /> -->

    <!-- select -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

    <style>
        /* .form-outline {
        border-bottom: 1px solid #000 !important;
      } */
        .selectize-input {
            padding: 0.55rem 0.75rem;
        }

        a {
            text-decoration: none;
        }

        .form-label {
            margin-bottom: 0.1rem;
        }

        .input-group-text {
            padding: .375rem 0.50rem;
        }
    </style>
</head>

<body>
    <div class="container ">
        <!-- <div class="row">
            <div class="col-8">
                <a href="data.php" class="btn btn-primary" onclick="window.history.back()">View Data</a>
                
            </div>
            <div class="col-4"><a href="logout.php" class="btn btn-primary"><i class="fa fa-signout"></i>Sign Out</a></div>
        </div> -->
    </div>
    <div class="container mt-5">
        <h2 class="text-center"><a href="../index.php">Add Card</a></h2>


        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php
                // is_null($var1) ? print_r("True\n") : print_r("False\n")
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM order_list WHERE id = '$id' AND status != 1";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $data = mysqli_fetch_array($result);
                        // echo print_r($data);

                    } else {
                        echo "Don't be oversmart (sql)";
                        die();
                    }
                }

                ?>
                <form action="process.php" method="post" enctype="multipart/form-data">
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="card_name">Card Name<sup class="text-danger">*</sup> </label>
                                <input type="text" id="card_name" class="form-control" name="card_name" value="<?= isset($data['card_name']) ? $data['card_name'] : ''; ?>" required />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="card_no">Card Number <sup class="text-danger">*</sup> </label>
                                <input type="text" id="card_no" class="form-control" name="card_no" value="<?= isset($data['card_no']) ? $data['card_no'] : ''; ?>" required />
                            </div>
                        </div>
                    </div>
                    <!-- Message input -->
                    <div class="form-outline mb-1">
                        <label class="form-label" for="mob">Mobile</label>
                        <input type="text" id="mob" class="form-control" name="mob" value="<?= isset($data['mob']) ? $data['mob'] : ''; ?>" required />
                    </div>

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="remark">Remark</label>
                        <textarea class="form-control" id="remark" rows="2" name="remark"><?= isset($data['remark']) ? $data['remark'] : ''; ?></textarea>
                    </div>


                    <!--update button condition-->
                    <?php if (isset($_GET['id'])) { ?>
                        <button type="submit" name="update" class="btn btn-primary btn-block mb-4 w-100">
                            Update
                        </button>
                    <?php } else { ?>
                        <!-- Submit button -->
                        <button type="submit" name="addCard" class="btn btn-primary btn-block mb-4 w-100">
                            Submit
                        </button>
                    <?php } ?>



                    <?php if (isset($_GET['msg'])) {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Inserted</strong> <?= $_GET['msg'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                </form>

            </div>
        </div>

    </div>
<?php include_once "./footer.php";?>