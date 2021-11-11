
<footer class="container-fluid bg-dark text-white fixed-bottom">
    <div class="row">
        <div class="col">
            <a href="home.php" class="nav-link text-white text-center ">
                <div><i class="fa fa-home"></i></div>
                Home
            </a>
        </div>
        <div class="col">
            <a href="index.php" class="nav-link text-white text-center ">
                <div><i class="fa fa-plus"></i></div>
                Order
            </a>
        </div>
        <div class="col">
            <a href="account_form.php" class="nav-link text-white text-center ">
                <div><i class="fa fa-user"></i></div>
                User
            </a>
        </div>
        <div class="col">
            <a href="card_form.php" class="nav-link text-white text-center ">
                <div><i class="far fa-credit-card"></i></div>
                Card
            </a>
        </div>
    </div>
</footer>



<script>
    $(document).ready(function() {
        $("select").selectize({
            sortField: "text",
        });
        setTimeout(() => {
            $(".alert").slideUp()
        }, 4000);
    });
</script>
</body>

</html>