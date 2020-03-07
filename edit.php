<?php include 'connection.php';?>
<?php   
         if(isset($_GET['edit']))
        {
            $edit_id= $_GET['edit'];
         }
          ?>
<?php include 'header.php';?>
<html>

<body class="w3-light-grey">

 <!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1351&q=80" style="width:100%" alt="Avatar">
          <div class="w3-display-bottomleft w3-container w3-text-black">
          <h2 style="color:white;">Selvakkumar S</h2>
          </div>
        </div>
        <div class="w3-container">
        <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-orange"></i>Designer</p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-orange"></i>india,coimbatore</p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-orange"></i>sselvakkumar12@mail.com</p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-orange"></i>9159266344</p>
          <hr>
          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-orange"></i>Skills</b></p>
         <?php   
        $sql= "SELECT * FROM `skills`";

        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) {
          ?>
          <p><?php echo $row["skillname"];?></p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
             <div class="w3-container w3-center w3-round-xlarge w3-orange" style="width:<?php echo $row["skilllevel"]; ?>%"><?php echo $row["skilllevel"]; ?>%</div>
          </div>
     <?php }
     

     ?>
          <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-orange"></i>Languages</b></p>
          <p>English</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-orange" style="height:24px;width:100%"></div>
          </div>
          <p>Spanish</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-orange" style="height:24px;width:55%"></div>
          </div>
          <p>German</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-orange" style="height:24px;width:25%"></div>
          </div>
          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    <?php
      if(isset($_POST['editskills']))
      {
          $name =$_POST['sname'];
          $level=$_POST['level'];
          $sql="UPDATE `skills` SET `skillname` = '$name', `skilllevel` = '$level' WHERE `skills`.`id` = $edit_id ";
          if(mysqli_query($conn, $sql)){
            echo"<script>window.location='index.php'; </script>";
        }
      }
            $sql= "SELECT * FROM `skills` WHERE id=$edit_id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
          
    ?>
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16">
            <i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-orange"></i>
            Edit Skills
        </h2>
        
            <form class="w3-container w3-card-4" action="" method='post'>
            
               
                <p>      
                  <label class="w3-text-blue"><b>Skill Name</b></label>
                  <input class="w3-input w3-border" name="sname" value="<?php echo $row['skillname'];?>" type="text">
                </p>
                <p>      
                  <label class="w3-text-blue"><b>Skill level</b></label>
                  <input class="w3-input w3-border" name="level"  value="<?php echo $row['skilllevel'];?>" type="number">
                </p>
                <p>      
                  <button class="w3-btn w3-blue" name="editskills">Update</button>
                </p>
            </form>
       </div>


    <!-- End Right Column -->
  </div>
    
  <!-- End Grid -->
</div>
  
  <!-- End Page Container -->
</div>

</body>
<?php include 'footer.php';?>

</html>
