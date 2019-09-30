<?php
  $the_id = $_SESSION['brandID'];
  $query = "SELECT * FROM car WHERE brandID = $the_id AND status = 'published' ORDER BY price ASC";
  $select_all = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($select_all)) {
    $carID = $row['carID'];
    $name = $row['name'];
    $address = $row['address'];
    $image = $row['image'];
    $description = substr($row['description'], 0, 150);
    $price = $row['price'];
    $status = $row['status'];
?>

  <div id="item" class="col-lg-4 col-md-4 col-sm-6 portfolio-item myitem">
    <div class="card h-60">
      <a href="#"><img class="card-img-top" src="images/<?php echo $image;  ?>" width="300" height="300" alt=""></a>
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
?>