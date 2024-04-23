<?php
 // Initialize Composer Autoload
 require_once 'vendor/autoload.php';

 // A second way of Instantiating the Connection Class
 require_once "./pdo-db-connection.php";
 $dbConn = new Connection();
 $search_field = $dbConn->getSearchData();

?>

<section style="height: 400px;" class="mt-5 mh-100 overflow-scroll">

    <!-- Get the number of rows from the Search -->
    <?php if ( count( $search_field ) > 0 ) : ?>

        <?php echo count($search_field); ?>

        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Address</th>
                </tr>
            </thead>

        <?php else : ?>

        <?php echo ""; ?>

    <?php endif; ?>

        <tbody>

            <?php if ( isset( $_POST['search'] ) ) : ?>

                <?php if (count($search_field) > 0) : ?>

                    <?php foreach ( $search_field as $field ) : ?>
                            
                        <tr>
                            <td><?php echo $field['id'] ?></td>
                            <td><?php echo $field['firstname'] ?></td>
                            <td><?php echo $field['lastname'] ?></td>
                            <td><?php echo $field['address'] ?></td>
                        </tr>

                    <?php endforeach; ?>
                    
                    <?php else : ?>

                    <h2>No results Found.</h2>

                <?php endif; ?>

                <?php else : ?>

                <?php foreach ( $dbConn->getSubmitData() as $field ) : ?>
                    <tr>
                        <td><?php echo $field['id'] ?></td>
                        <td><?php echo $field['firstname'] ?></td>
                        <td><?php echo $field['lastname'] ?></td>
                        <td><?php echo $field['address'] ?></td>
                    </tr>
                <?php endforeach; ?>

            <?php endif; ?>
            
        </tbody>
    </table>
</section>