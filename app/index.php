<?php
/*
 * PHP Docker PDO
 * 
 */

 // A second way of Instantiating the Connection Class
 $connection = require_once "./pdo-db-connection.php";

 include_once "assets/functions.php";
//  require_once "./pdo-db-connection.php";
//  $connection = new Connection;

 // Methods from Connection Class that is required above
 // $tbl_standards = $connection->getStandards();
 // $tbl_streams = $connection->getStreams();
 // $tbl_gender = $connection->getGender();
 // $tbl_data = $connection->getData();


// Adds custom CSS to page
 data_filter_css();
 ?>

<div class="container">
    <h1 class="my-5">Table Data Filter Template</h1>

    <div class="table-responsive mb-5">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($connection->getData()) > 0) : ?>
                    <?php foreach ($connection->getData() as $data) : ?>
                        <tr>
                            <td><?php echo $data['id'] ?></td>
                            <td><?php echo $data['product_name'] ?></td>
                            <td><?php echo $data['product_price'] ?></td>
                        </tr>
                    <?php  endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>