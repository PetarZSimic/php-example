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
      
    <?php include "includes/sortingnavsearch.php"; ?>
       
    <div class="row"> 
        <?php   
            if(isset($_GET['sort'])){
                $source = $_GET['sort'];
            }else{
                $source ="";    
            }

            switch($source){    
                case 'high':
                    include "includes/price_down_search.php";
                    break;
                case 'low':
                    include "includes/price_up_search.php";
                    break;
                default:
                    include "includes/view_all_searchs.php";
                    break;
            }
        ?>     
    </div>             
</div> <!-- container-->
   
<?php include "includes/footer.php"; ?>