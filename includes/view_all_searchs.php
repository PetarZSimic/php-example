<?php
if (isset($_SESSION['brandID'])) {
  $_SESSION['brandID'] = null;
}
if (isset($_GET['brand'])) {

  $name = $_GET['brand'];
  $query = "SELECT * FROM brand WHERE name LIKE '%$name%'";
  $select_brand = mysqli_query($connection, $query);
  $count = mysqli_num_rows($select_brand);

  if ($count != 0) {
    while ($row = mysqli_fetch_assoc($select_brand)) {
      $id = $row['brandID'];
    }

    $_SESSION['brandID'] = $id;
    $query = "SELECT * FROM car WHERE brandID = $id AND status = 'published'";
    $select_all = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all)) {
      $carID = $row['carID'];
      $name = $row['name'];
      $address = $row['address'];
      $image = $row['image'];
      $description = substr($row['description'], 0, 250);
      $price = $row['price'];
      $status = $row['status'];
      ?>

      <div id="item" class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="images/<?php echo $image;  ?>" width="700" height="300" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#"><?php echo $name; ?></a>
            </h4>
            <p class="card-text"> <small><?php echo $address; ?></small> <br> <strong> <?php echo "   " . $price; ?>&euro; </strong></p>
            <p class="card-text"><?php echo $description; ?></p>
          </div>
        </div>
      </div>

    <?php
    }
  }
}
?>