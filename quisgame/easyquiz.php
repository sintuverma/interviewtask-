<?php
   include 'connection.php';////database connection file
   //session_start();

   include 'header.php';
   
   
   // fetching data from database.
   $sql = "select * from questions where level_id = 1 ";
   $query = mysqli_query($conn,$sql) or die("Query is failed");
   if($query)
   {
       if(mysqli_num_rows($query)>0)
       {
               //print_r($row);
   ?>
<div class="row">
<div class="col-sm-3">
</div>
<div class="col-sm-6 bg-dark text-light">
   <form  name="myForm" id="myForm"method="post" action="result.php">
      <?php
         $i=1;
         while($row = mysqli_fetch_assoc($query))
         //print_r($row);
         {
           
           ?>
      <input type="hidden" value="<?php echo $row['level_id'];?>" name="level_id">
      <h5 class=" text-warning  mt-2 "> <?php echo "($i) ".$row['questions'];?></h5>
      <div class="row">
         <div class="col-sm-6">
            <div class="form-check">
               <input type="hidden" name="quiz" value="<?php echo $row['quis_id'];?>" > 
               <input type="radio" class="form-check-input text-light " id="" name="<?php echo $row['quis_id'];?>" value="<?php echo $row['option1'];?>" ><?php echo $row['option1'];?>
            </div>
            <div class="form-check">
               <input type="hidden" name="quiz2" value="<?php echo $row['quis_id'];?>" > 
               <input type="radio" class="form-check-input text-light " id="<?php echo $row['option2'];?>" name="<?php echo $row['quis_id'];?>" value="<?php echo $row['option2'];?>" ><?php echo $row['option2'];?>
            </div>
         </div>
         <div class="col-sm-6">
            <div class="form-check">
               <input type="hidden" name="quiz3" value="<?php echo $row['quis_id'];?>" > 
               <input type="radio" class="form-check-input text-light " id="<?php echo $row['option3'];?>" name="<?php echo $row['quis_id'];?>" value="<?php echo $row['option3'];?>" ><?php echo $row['option3'];?>
            </div>
            <div class="form-check">
               <input type="hidden" name="qui4" value="<?php echo $row['quis_id'];?>" > 
               <input type="radio" class="form-check-input text-light " id="<?php echo $row['option4'];?>" name="<?php echo $row['quis_id'];?>" value="<?php echo $row['option4'];?>" ><?php echo $row['option4'];?>
            </div>
         </div>
      </div>
      <?php
         $i++;}
         
           }
         }
         
         ?>
      <input type="submit" class="btn btn-success mt-3" name="submit" value="submit">
   </form>
</div>
<div class="col-sm-3">
<p id="alert">You Have 30 Seconds Only For All Questions.</p>
<div id="js_timer">
   <div id="timer">
      00:00
   </div>
   <div>
   </div>
</div>
<script>
   //timing in  code start here
   var timer;
   var ele = document.getElementById('timer');
   
   (function (){
     var sec = 0;
     timer = setInterval(()=>{
       ele.innerHTML = '00:'+sec;
       sec ++;
       if(sec==32)
         {
          //submitform();
          alert('sorry your time is over');
          window.location.replace("index.php");//redirect index page
         }
     }, 1000) // each 1 second
   })()
  //  function submitform()
  //   {
  //     alert('sorry your time is over');
  //     document.getElementById("myForm").submit();
  //   }
    
   
</script>