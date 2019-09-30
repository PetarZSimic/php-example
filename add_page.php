<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>

<div class="container" id="userAdd">

  <?php
    if (isset($_SESSION['username'])) { } else {
      header("Location: index.php");
    }

    if (isset($_POST['insert'])) {

      $car_brand = $_POST['car_brand'];
      $car_brand = mysqli_real_escape_string($connection, $car_brand);
      $car_brand = strtolower($car_brand);
      if (!empty($car_brand)) {

        $query = "SELECT * FROM brand WHERE name = '$car_brand'";
        $find_brand = mysqli_query($connection, $query);
        $count = mysqli_num_rows($find_brand);

        if ($count == 0) {

          $query = "INSERT INTO brand(name) VALUES('$car_brand')";
          $insert_brand = mysqli_query($connection, $query);

          if (!$insert_brand) {
            die("QUERY FAILED" . mysqli_error($connection));
          }
        }
      }

      $name = $_POST['name'];
      $description = $_POST['description'];
      $description = mysqli_real_escape_string($connection, $description);
      $address = $_POST['address'];
      $price = $_POST['price'];


      if (!empty($name) && !empty($description) && !empty($address) && !empty($price) && !empty($car_brand)) {
        $query = "SELECT * FROM brand WHERE name = '$car_brand'";
        $find_breed = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($find_breed)) {
          $id = $row['brandID'];
        }

        $car_brand_id = $id;
        $image_name = $_FILES['image']['name'];

        $image_name_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_name_tmp, "images/$image_name");

        $owner = $_SESSION['firstname'] . " " . $_SESSION['lastname'];
        $phone = $_SESSION['phoneNumber'];
        $email = $_SESSION['email'];
        $query = "INSERT INTO car(name, description, address, brandID, image, price, addingDate, owner, email, phoneNumber) VALUES('$name','$description','$address',$car_brand_id,'$image_name', $price, now(),'$owner','$email','$phone')";

        $insert_car = mysqli_query($connection, $query);

        if (!$insert_car) {
          die("QUERY FAILED" . mysqli_error($connection));
        }

        $poruka = "You added a car.";
      }
    } else {
      $poruka = "";
    }
  ?>

  <div class="card card-register mx-auto mt-5 col-md-10" style="margin-bottom: 30px;">
    <div class="card-header"><strong>Add your car</strong></div>
    <div class="card-body">
      <form action="" method="post" role="form" enctype="multipart/form-data" autocomplete="off">
        <h6 class="text-center"><?php echo $poruka; ?></h6>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <label for="name">Name of the car</label>
              <input class="form-control" name="name" type="text" aria-describedby="nameHelp" placeholder="Car name" required>
            </div>
            <div class="col-md-6">
              <label for="address">Address</label>
              <input class="form-control" name="address" type="text" aria-describedby="nameHelp" placeholder="Address" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <label for="car_brand">Brand</label>
              <input class="form-control" name="car_brand" type="text" aria-describedby="nameHelp" placeholder="Brand" required>
            </div>
            <div class="col-md-6">
              <label for="price">Price in &euro;</label>
              <input class="form-control" name="price" type="text" aria-describedby="nameHelp" placeholder="Price" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <label for="description">Description:</label><br>
              <textarea name="description" rows="5" cols="50"></textarea>
            </div>
            <div class="col-md-6">
              <label for="image">Image</label>
              <input type="file" class="form-control" name="image" required>
            </div>
          </div>
        </div>
        <div class="form-group">
        </div>
        <button class="btn btn-success btn-lg btn-block" type="submit" name="insert">Add New Car</button>
      </form>
    </div>
  </div>
</div>

<?php include "includes/footer.php"; ?>