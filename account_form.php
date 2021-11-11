<?php include_once "header.php";?>
    <div class="container ">
        <!-- <div class="row">
            <div class="col-8">
                <a href="data.php" class="btn btn-primary" onclick="window.history.back()">View Data</a>
                
            </div>
            <div class="col-4"><a href="logout.php" class="btn btn-primary"><i class="fa fa-signout"></i>Sign Out</a></div>
        </div> -->
    </div>
    <div class="container mt-5">
        <h2 class="text-center"><a href="../index.php">Add User Account</a></h2>


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
                                <label class="form-label" for="name">Name<sup class="text-danger">*</sup> </label>
                                <input type="text" id="name" class="form-control" name="name" value="<?= isset($data['name']) ? $data['name'] : ''; ?>" required />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="mob">Mobile no.<sup class="text-danger">*</sup> </label>
                                <input type="text" id="mob" class="form-control" name="mob" value="<?= isset($data['mob']) ? $data['mob'] : ''; ?>" required />
                            </div>
                        </div>
                    </div>
                    <!-- Message input -->
                    <div class="form-outline mb-1">
                        <label class="form-label" for="email">Email Address</label>
                        <input type="text" id="email" class="form-control" name="email" value="<?= isset($data['email']) ? $data['email'] : ''; ?>" required />
                    </div>

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form6Example7">Remark</label>
                        <textarea class="form-control" id="form6Example7" rows="2" name="remark"><?= isset($data['remark']) ? $data['remark'] : ''; ?></textarea>
                    </div>


                    <!--update button condition-->
                    <?php if (isset($_GET['id'])) { ?>
                        <button type="submit" name="update" class="btn btn-primary btn-block mb-4 w-100">
                            Update
                        </button>
                    <?php } else { ?>
                        <!-- Submit button -->
                        <button type="submit" name="addUserAccount" class="btn btn-primary btn-block mb-4 w-100">
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