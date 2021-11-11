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

        /* new */
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <div class="container mt-2">
        <table id="customers" class="display">
            <thead>
                <tr>
                    <th>id</th>
                    <th>item</th>
                    <th>srl no</th>
                    <th>Qty</th>
                    <th>Deliver</th>
                    <th>Cancel</th>
                    <!-- <th>status</th> -->
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                include "./conn.php";
                $sql = "SELECT * FROM order_list WHERE status = 1";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {

                        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['item_name'] . "</td>
            <td>" . $row['serial_no'] . "</td><td>" . $row['qty'] . "</td><td>" . $row['delivered_qty'] . "</td><td>" . $row['cancel_qty'] . "</td><td><a class='btn btn-success' href='index.php?id=" . $row['id'] . "'>Edit</a></td>";
                    }

                    echo "</tr>";
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?></tbody>
        </table>
    </div>


</body>

</html>
<?php include_once "./footer.php"; ?>