<?php
include 'connection.php';
include 'header.php';
?>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
        <form method="post" action="questions_page.php">
        <select class="form-select" name="select_level">
            <option>Select The Level Of Game </option>
           <?php
            $sql = "select * from level ";
            $query = mysqli_query($conn,$sql) or die("Query is failed");
            if($query)
            {
                if(mysqli_num_rows($query)>0)
                {
                    while($row = mysqli_fetch_assoc($query))
                    {?>
                       <option value="<?php echo $row['level_id']?>"><?php echo $row['level']?></option>
                        <?php
                    }
                }
            }
            ?>
        </select> 
        <input type="submit" class="btn btn-primary mt-3" name="submit" >
        </form></div>
            <div class="col-sm-4"></div>
        </div>
        
    <?php
    include 'footer.php';
    ?>  
   




   



  