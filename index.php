<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?> 

<div id="main-container" class="container">   
    <div id="searching">
        <form action="search.php" method="get" autocomplete="off">                
            <div class="input-group">
                <input type="text" name="brand" id="search" class="form-control" placeholder="Unesite marku automobila...">
                <button class="btn btn-info" type="submit">Pretraga</button>
            </div>
            <div id="livesearch" style="background-color: white;"></div>
        </form>     
    </div>

       
    <div class="row"> 
        <?php
            if(isset($_GET['sort'])){
                $source = $_GET['sort'];
            }else{
                $source ="";    
            }
        
            $query = "SELECT * FROM car";
            $select = mysqli_query($connection,$query);
            $count = mysqli_num_rows($select);
            $count = ceil($count/8);

            switch($source){           
                default:
                    include "includes/view_all_cars.php";
                    break;
            } 
        ?>
    </div> 
    <ul class="pagination justify-content-center mb-4" style="margin-top: 10px; margin-bottom: 10px;">
        <?php
            for($i=1; $i <= $count; $i++){
                if($i == $page){
                    echo "<li class='page-item active'>
                        <a class='page-link' href='index.php?page=$i'>$i</a>
                        </li>";
                } else {
                    echo "<li class='page-item'>
                        <a class='page-link' href='index.php?page=$i'>$i</a>
                        </li>";
                }
            }   
        ?>
    </ul>  
</div> <!-- container-->
   
<?php include "includes/footer.php"; ?>