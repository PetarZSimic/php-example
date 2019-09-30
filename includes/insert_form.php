 <h2 class="my-4" style="margin-left: 20px; padding-top: 20px;">
     Insert New Car <small><?php echo $ime . " " . $prezime; ?> </small>
 </h2>

 <div class="row">
    <div id="formadiv">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label for="description">Description</label><br>
                <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price">
            </div>

            <div class="form-group">
                <select name="brandID" id="">
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
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image">
            </div>

            <button class="btn btn-primary" type="submit" name="insert">Add New Car</button>
        </form>
    </div>