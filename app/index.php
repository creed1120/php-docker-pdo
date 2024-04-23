<?php
/*****************
 * PHP Docker PDO
 *****************/

 // Start a Session
 if( !session_id() ) {
    session_start();
 }
 // Initialize Composer Autoload
 require_once 'vendor/autoload.php';

 // Composer installed Flash package
 use function Tamtamchik\SimpleFlash\flash;

 // A second way of Instantiating the Connection Class
 $connection = require_once "./pdo-db-connection.php";
 ?>

<?php require_once "./header.php"; ?>

    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <h1 class="text-primary">Filter with PDO</h1>
                <div class="form-wrapper m-0 p-4 bg-primary-subtle">

                    <form class="row g-3 needs-validation mt-2" action="insert.php" method="POST">
                        <div class="col-12 m-0">
                            <label for="validationCustom01" class="form-label">First name</label>
                            <input type="text" class="form-control" id="validationCustom01" name="firstname" required>
                        </div>
                        <div class="col-12">
                            <label for="validationCustom02" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="validationCustom02" name="lastname" required>
                        </div>
                        <div class="col-12">
                            <label for="validationCustom02" class="form-label">Address</label>
                            <input type="text" class="form-control" id="validationCustom02" name="address" required>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-md-8">
                <h1 class="text-primary">Search</h1>

                <form class="row g-3 needs-validation" action="" method="POST">
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Search</label>
                        <input type="text" class="form-control" id="validationCustom01" name="keyword">
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit" name="search">Search</button>
                    </div>
                </form>

                    <?php include './search.php'; ?>
                
            </div>
        </div>
    </div>

    <?php
        // Flash messages ( success, error, etc )
        echo flash()->display(); 
    ?>

    <script src="./assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>