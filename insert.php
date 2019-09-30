<?php include "includes/headera.php" ?>
<?php include "includes/navigation.php" ?> 
  
  <?php if(isset($_SESSION['username'])){
        
          if($_SESSION['role'] == 'admin'){
            $ime =  $_SESSION['firstname'];
            $prezime =  $_SESSION['lastname'];
          } else {
            header("Location: index.php");  
          }
        }
   ?>
   
   <div id="adminContainer" class="container">
      <?php
            if(isset($_POST['insert'])){
                $name = $_POST['name'];
                $description = $_POST['description'];
                $description = mysqli_real_escape_string($connection,$description);
                $address = $_POST['address'];
                $brandID = $_POST['brandID'];
                $price = $_POST['price'];
                $image_name = $_FILES['image']['name'];
                $image_name_tmp =$_FILES['image']['tmp_name'];
                move_uploaded_file($image_name_tmp,"images/$image_name");
                
                $query ="INSERT INTO car(name, description, address, brandID, image, price, addingDate) VALUES('$name','$description','$adress',$brandID,'$image_name', $price, now())";
                
                $insert_car = mysqli_query($connection,$query);
                
                if(!$insert_car){
                    die("QUERY FAILED" . mysqli_error($connection));
                }
            }

            if(isset($_GET['source'])){
                $source = $_GET['source'];
            }else{
                $source = "";
            }
      
            switch($source)
            {
                case "edit":        
                    include "includes/edit.php";
                    break;
                default:
                    include "includes/insert_form.php";
                    break;
            }      
        ?>
            
        <table id="list" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $query = "SELECT * FROM car ORDER BY carID DESC";
                $select_car_admin = mysqli_query($connection, $query);
              
                while($row = mysqli_fetch_assoc($select_car_admin)){
                    $carID = $row['carID'];
                    $brandID = $row['brandID'];
                    $name = $row['name'];
                    $description = $row['description'];
                    $image = $row['image'];
                    $price = $row['price'];
                    $address = $row['address'];
                    $status = $row['status'];
                    $addingDate = $row['addingDate'];
                    $owner = $row['owner'];
                    $owner_phone = $row['phoneNumber'];
                    $owner_email = $row['email'];
                        
                    echo "<tr><td>{$carID}</td>";
                    echo "<td>{$name}</td>";
                    
                    $query = "SELECT * FROM brand WHERE brandID = $brandID ";
                    $select_brand = mysqli_query($connection,$query);
              
                    while($row = mysqli_fetch_assoc($select_brand)){
                        $name = $row['name'];
                        
                        echo "<td>{$name}<br>$address<br>$owner<br>$owner_phone<br>$owner_email</td>";
                    }
                  
                    echo "<td><img width='100' height='50' src='images/{$image}'></td>";
                    echo "<td>{$price}&euro;</td>";
                    echo "<td><a href='insert.php?source=edit&id={$carID}'>Edit</a></td>";
                    echo "<td><a href='insert.php?delete={$carID}'>Delete</a></td>";
                    echo "<td>{$addingDate}</td>";
                    echo "<td>{$status}</td>";
                    echo "<td><a href='insert.php?statusp={$carID}'>Publish</a></td>";
                    echo "<td><a href='insert.php?statusd={$carID}'>Draft</a></td>";
                    echo "</tr>";   
                }                   
            ?>     
            </tbody>
        </table>
    
        <?php  
          
            if(isset($_GET['delete'])){                
                $the_id = $_GET['delete'];
                $query ="DELETE FROM car WHERE carID = {$the_id}";
                $delete = mysqli_query($connection,$query);
                
                header("Location: insert.php");
            }
       
       
            if(isset($_GET['statusp'])){           
                $the_id = $_GET['statusp'];                
                $query ="UPDATE car SET status = 'published' WHERE carID = {$the_id}";
                $update_status = mysqli_query($connection,$query);
               
                header("Location: insert.php");
            }
       
            if(isset($_GET['statusd'])){
                $the_id = $_GET['statusd'];
                $query ="UPDATE car SET status = 'draft' WHERE carID = {$the_id}";
                $update_status = mysqli_query($connection,$query);
                
                header("Location: insert.php");  
            }           
        ?>
     </div>                         
 </div> <!-- container-->
   
<?php include "includes/footer.php"; ?>