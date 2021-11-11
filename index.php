<?php
include_once "./conn.php";
$accountSql = "SELECT id,name FROM `order_accounts`";
$accountData = $conn->query($accountSql);
$accountData->fetch_all(MYSQLI_ASSOC);
$cardSql = "SELECT id,card_no FROM `order_card`";
$cardsData =  mysqli_query($conn, $cardSql);
include_once "header.php";
?>

<div class="container ">
</div>
<div class="container mt-5 mb-5">
    <h2 class="text-center"><a href="../index.php">Order Transaction</a></h2>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM order_list WHERE id = '$id' AND status = 1";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $data = mysqli_fetch_array($result);
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
                            <label class="form-label" for="firm_name">Item Name<sup class="text-danger">*</sup> </label>
                            <input type="text" id="item_name" class="form-control" name="item_name" value="<?= isset($data['item_name']) ? $data['item_name'] : ''; ?>" <?= isset($data['item_name']) ? "disabled" : ""; ?> required />
                        </div>
                    </div>
                </div>
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-1">
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="platform">Platform<sup class="text-danger">*</sup> </label>
                            <!-- <input type="text" id="platform" class="form-control" name="platform" value="<?= isset($data['platform']) ? $data['platform'] : ''; ?>" required /> -->
                            <select id="platform" class="form-control" name="platform" <?= isset($data['platform']) ? "disabled" : ''; ?>>
                                <option value="1">pinelab</option>
                                <option value="2">Kotak</option>
                            </select>


                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="account_id">Account ID<sup class="text-danger">*</sup> </label>
                            <!-- <input type="text" id="account_id" class="form-control" name="account_id" value="<?= isset($data['account_id']) ? $data['account_id'] : ''; ?>" required /> -->
                            <select id="account_id" class="form-control" name="account_id" <?= isset($_GET['id']) ? "disabled" : ''; ?>>
                                <?php
                                foreach ($accountData as $row) {
                                ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-1">

                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="price">Price<sup class="text-danger">*</sup> </label>
                            <input type="number" id="price" class="form-control" name="price" value="<?= isset($data['price']) ? $data['price'] : ''; ?>" <?= isset($_GET['id']) ? "disabled" : ''; ?> required />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="card_id">Card Id<sup class="text-danger">*</sup> </label>
                            <select id="card_id" class="form-control" name="card_id" <?= isset($_GET['id']) ? "disabled" : ''; ?>>
                                <?php
                                foreach ($cardsData as $row) {
                                ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['card_no'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- 2 column grid layout with text inputs for the first and last names -->
                <?php if (isset($_GET['id'])) {
                ?>
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="delivered_date">Delivered Date<sup class="text-danger">*</sup> </label>
                                <input type="date" id="delivered_date" class="form-control" name="delivered_date" value="<?= isset($data['delivered_date']) ? $data['delivered_date'] : date('Y-m-d'); ?>" required />
                            </div>
                        </div>
                        <?php if (isset($_GET['id'])) { ?>
                            <div class="col">
                                <div class="form-outline">
                                    <label class="form-label" for="status">Status<sup class="text-danger">*</sup> </label>
                                    <select id="status" class="form-control" required>
                                        <option selected></option>
                                        <option value="2">Cancel</option>
                                        <option value="3">Deliver</option>
                                        <option value="4">Error</option>
                                    </select>


                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="col">
                                <div class="form-outline">
                                    <label class="form-label" for="date">Dates<sup class="text-danger">*</sup> </label>
                                    <input type="date" id="date" class="form-control" name="date" value="<?= isset($_GET['id']) ? $data['date'] : date('Y-m-d') ?>" required />
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                <?php } ?>


                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-1">
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="qty">Quantity<sup class="text-danger">*</sup> </label>
                            <?php if (isset($_GET['id'])) { ?>
                                <input type="number" id="qty" class="form-control" value="<?= isset($_GET['id']) ? ($data['qty'] - $data['delivered_qty'] - $data['cancel_qty'] - $data['error_qty']) : ''; ?>" <?= isset($data['qty']) ? "disabled" : ''; ?> required />
                            <?php } else {
                            ?>
                                <input type="number" id="qty" class="form-control" name="qty" required />
                            <?php } ?>
                        </div>
                    </div>
                    <?php if (isset($_GET['id'])) { ?>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="delivered_qty">Quantity Delivered<sup class="text-danger">*</sup> </label>
                                <input type="number" id="delivered_qty" class="form-control" name="delivered_qty" min="1" max="<?= isset($_GET['id']) ? ($data['qty'] - $data['delivered_qty'] - $data['cancel_qty'] - $data['error_qty']) : ''; ?>" required />
                                <input type="hidden" class="prevQty" id="dq" value="<?= $data['delivered_qty'] ?>" name="previousValue">
                                <input type="hidden" class="prevQty" id="cq" value="<?= $data['cancel_qty'] ?>" name="previousValue" disabled>
                                <input type="hidden" class="prevQty" id="eq" value="<?= $data['error_qty'] ?>" name="previousValue" disabled>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="date">Dates<sup class="text-danger">*</sup> </label>
                                <input type="date" id="date" class="form-control" name="date" value="<?= isset($data['date']) ? $data['date'] : date('Y-m-d'); ?>" required />
                            </div>
                        </div>
                    <?php } ?>
                </div>


                <?php if (isset($data['serial_no'])) { ?>
                    <div class="col">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="serial_no">Serial No.<sup class="text-danger">*</sup> </label>
                            <!-- <input type="text" id="serial_no" class="form-control" name="serial_no" value="<?= isset($data['serial_no']) ? $data['serial_no'] : ''; ?>" required /> -->
                            <textarea class="form-control" id="serial_no" rows="3" name="serial_no"><?= isset($data['serial_no']) ? $data['serial_no'] : ''; ?></textarea>
                        </div>
                    </div>
                <?php } ?>
                <!-- Message input -->
                <?php if (!isset($_GET['id'])) { ?>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form6Example7">Remark</label>
                        <textarea class="form-control" id="form6Example7" rows="2" name="remark"><?= isset($data['remark']) ? $data['remark'] : ''; ?></textarea>
                    </div>
                <?php } ?>

                <?php if (isset($_GET['id'])) { ?>
                    <input type="hidden" name="id" value="<?= isset($data['id']) ? $data['id'] : ''; ?>"><?php } ?>
                <!--update button condition-->
                <?php if (isset($_GET['id'])) { ?>
                    <button type="submit" name="orderUpdate" class="btn btn-primary btn-block mb-4 w-100">
                        Update
                    </button>
                <?php } else { ?>
                    <!-- Submit button -->
                    <button type="submit" name="register" class="btn btn-primary btn-block mb-4 w-100">
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
<?php if (isset($_GET['id'])) {
?>
    <script>
        window.onload = () => {
            $("#status").change((e) => {
                var prevVal = document.querySelectorAll(".prevQty");
                // var quantityDel = document.querySelector("#qty_delivered");
                prevVal.forEach((el) => {
                    el.setAttribute("disabled", "true");
                })

                if (e.target.value == 2) {
                    // quantityDel.setAttribute("name", "cancel_qty");
                    $("#delivered_qty").attr("name", "cancel_qty");
                    $("#cq").removeAttr("disabled");
                } else if (e.target.value == 4) {
                    $("#delivered_qty").attr("name", "error_qty");
                    $("#eq").removeAttr("disabled");
                } else {
                    $("#delivered_qty").attr("name", "delivered_qty");
                    $("#dq").removeAttr("disabled");
                }

            })

            // $("#qty_delivered").on("input",(e)=>{
            //     // if($("#qty")[0].defaultValue)

            //     // if($("#qty")[0].defaultValue>e.target.value){
            //     //     alert("please check quantity")

            //     // }
            //     if(e.target.value > $("#qty")[0].defaultValue){
            //         console.log(e.target.value, $("#qty")[0].defaultValue)
            //         alert("please check quantity")
            //     }

            // })
        }
    </script>
<?php
} ?>

<?php include_once "./footer.php"; ?>