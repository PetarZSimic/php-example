<?php
    if (!isset($_GET["unos"])) {
        echo "Indicator not sent";
    } else {
        $pomocna = $_GET["unos"];
        include "includes/db.php";
        $query = "SELECT * FROM brand WHERE name LIKE '$pomocna%'ORDER BY name";
        $select = mysqli_query($connection, $query);
        $count = mysqli_num_rows($select);
        
        if ($count == 0) {
            echo "There is no brands in database which starts with " . $pomocna;
        } else {
            while ($row = mysqli_fetch_assoc($select)) {
                $the_name = $row['name'];
                ?>
                <a style="margin-left: 15px; color: red; font-weight: bold;" href="#" onclick="place(this)"><?php echo $the_name; ?></a>
                <br />
            <?php
            }
        }
    }
?>