<h2 class="my-4" style="margin-left: 20px; padding-top: 20px;"></h2>
    Update Car <small><?php echo $ime . " " . $prezime; ?> </small>
</h2>

<div class="row">
    <?php
    if (isset($_GET['id'])) {

        $id = $_GET['id'];
        $query = "SELECT * FROM car WHERE carID = {$id}";
        $selected_car = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($selected_car)) {
            $carID = $row['carID'];
            $brandID = $row['brandID'];
            $name = $row['name'];
            $description = $row['description'];
            $image = $row['image'];
            $price = $row['price'];
            $address = $row['address'];
        }
    }

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $description = mysqli_real_escape_string($connection, $description);
        $address = $_POST['address'];
        $brandID = $_POST['brandID'];
        $price = $_POST['price'];
        $image_name = $_FILES['image']['name'];
        $image_name_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_name_tmp, "images/$image_name");

        if (empty($image_name)) {
            $query = "SELECT * FROM car where carID = {$id}";
            $select_image = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_image)) {
                $image_name = $row['image'];
            }
        }

        $query = "UPDATE car SET ";
        $query .= "name = '{$name}', ";
        $query .= "description = '{$description}', ";
        $query .= "address = '{$address}', ";
        $query .= "brandID = {$brandID}, ";
        $query .= "price = '{$price}', ";
        $query .= "image = '$image_name' ";
        $query .= "WHERE carID = {$id}";

        $update_query = mysqli_query($connection, $query);
        header("Location: insert.php");
    }
    ?>

    <div id="formadiv">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" value="<?php echo $name; ?>" name="name">
            </div>

            <div class="form-group">
                <label for="description">Description</label><br>
                <textarea name="description" id="" cols="30" rows="10"><?php echo $description; ?></textarea>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" value="<?php echo $address; ?>" name="address">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" value="<?php echo $price; ?>" name="price">
            </div>

            <div class="form-group">
                <select name="brandID" id="">
                    <option value="<?php echo $brandID; ?>">
                        <?php
                        $query = "SELECT * FROM brand WHERE brandID = $brandID";
                        $select_breed = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_breed)) {
                            $name = $row['name'];
                            echo $name;
                        }
                        ?>
                    </option>

                    <?php
                    $query = "SELECT * FROM brand";
                    $select_breed = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_breed)) {
                        $name = $row['name'];
                        $id = $row['brandID'];
                        echo "<option value='{$id}'>$name</option> ";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image</label><br>
                <img width="100" height="60" src="images/<?php echo $image_name; ?>">
                <input type="file" class="form-control" name="image">
            </div>

            <button class="btn btn-info" type="submit" name="update">Update</button>
        </form>
    </div>