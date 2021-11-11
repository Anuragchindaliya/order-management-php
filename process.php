<?php
include "./conn.php";
if (isset($_POST['register'])) {
    // echo print_r($_POST);
    // die();
    $fields_str = "";
    $values_str = "";
    foreach ($_POST as $key => $val) {
        if ($key == "register") {
            continue;
        }
        $fields_str = $fields_str . ", `" . $key . "`";
        $values_str = $values_str . ", '" . $val . "'";
    }
    $fields_str =  ltrim($fields_str, ",");
    $values_str =  ltrim($values_str, ",");
    $sql = "INSERT INTO `order_list`($fields_str) VALUES ($values_str)";
    if (mysqli_query($conn, $sql)) {
        header("location: index.php?register=success");
    } else {
        echo "data is not inserted";
    }
}
if (isset($_POST['addUserAccount'])) {
    extract($_POST);
    $sql = "INSERT INTO `order_accounts`( `name`, `mob`, `email`, `remark`) VALUES ('$name','$mob','$email','$remark')";
    if (mysqli_query($conn, $sql)) {
        header("location: account_form.php?addUser=success");
    } else {
        echo "errpr";
    }
}
if (isset($_POST['addCard'])) {
    extract($_POST);
    $sql = "INSERT INTO `order_card`( `card_name`, `card_no`, `mob`, `remark`) VALUES ('$card_name','$card_no','$mob','$remark')";
    if (mysqli_query($conn, $sql)) {
        header("location: card_form.php?addcard=success");
    } else {
        echo "error";
    }
}
if (isset($_POST['orderUpdate'])) {
    $dataid = $_POST['id'];
    $updateSql = "";
    $oldval = $_POST['previousValue'];
    foreach ($_POST as $key => $val) {
        if ($key == "orderUpdate" || $key == "previousValue" || $key == "id") {
            continue;
        } elseif ($key == "cancel_qty" || $key == "error_qty"|| $key == "delivered_qty") {
            $updateSql .= "`" . $key . "`='" . ((int)$val + (int)$oldval) . "',";
            continue;
        }
        $updateSql .= "`" . $key . "`='" . $val . "',";
    }
    $updateSql = rtrim($updateSql, ",");
    echo $sql = "UPDATE `order_list` SET $updateSql WHERE id = '$dataid'";
    if (mysqli_query($conn, $sql)) {
        header("location: home.php?updateOrder=success");
    } else {
        echo "error";
    }
}
