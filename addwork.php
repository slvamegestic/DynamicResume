<?php include 'connection.php';?>
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
          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-orange"></i>Skills</b><a href="add.php">
          <i class="fa fa-plus fa-fw w3-right w3-large w3-text-orange"></i></a></p>
         <?php   
        $sql= "SELECT * FROM `skills`";
        
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) {
          ?>
            <p>
              <?php echo $row["skillname"];?> 
                <a href="edit.php?edit=<?php echo $row["id"];?>">
                  <i class="fa fa-edit fa-fw w3-right w3-large w3-text-orange"></i>
                </a>
                <a href="index.php?del=<?php echo $row["id"];?>">
                  <i class="fa fa-remove fa-fw w3-right w3-large w3-text-orange"></i>
                </a>
            </p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
             <div class="w3-container w3-center w3-round-xlarge w3-orange" style="width:<?php echo $row["skilllevel"]; ?>%"><?php echo $row["skilllevel"]; ?>%</div>
          </div>
     <?php }
        if(isset($_GET['del']))
        {
           $del_id= $_GET['del'];
           $sql="DELETE FROM `skills` WHERE id=$del_id";
           if(mysqli_query($conn, $sql)){
            echo "<script>window.location='index.php'; </script>";
        }
        }

     ?>
 
 <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-orange"></i>Languages</b><a href="langadd.php">
          <i class="fa fa-plus fa-fw w3-right w3-large w3-text-orange"></i></a></p>
 <?php   
        $sql= "SELECT * FROM `language`";
        
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) {
  ?>
          <p><?php echo $row["name"];?>
              <a href="langedit.php?edit=<?php echo $row["id"];?>">
                 <i class="fa fa-edit fa-fw w3-right w3-large w3-text-orange"></i>
              </a>
              <a href="index.php?del=<?php echo $row["id"];?>">
                  <i class="fa fa-remove fa-fw w3-right w3-large w3-text-orange"></i>
              </a>
          </p>   
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-orange" style="height:24px;width:<?php echo $row["level"];?>%"></div>
          </div>
    <?php    }
         if(isset($_GET['del']))
         {
              $del_id= $_GET['del'];
              $sql="DELETE FROM `language` WHERE id=$del_id";
              if(mysqli_query($conn, $sql)){
                echo "<script>window.location='index.php'; </script>";
            }
         }
    ?>

        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    
    <div class="w3-twothird">
  
    <?php
      if(isset($_POST['addwork']))
      {
          $name =$_POST['p-name'];
          $duration=$_POST['du-tion'];
          $discription=$_POST['dis-tion'];

          if($name == "" || $duration == "" || $discription== ""){
            $nameErr = "* All Information is required";
          }
      else{
          $sql="INSERT INTO `experience` (`id`, `profile_name`, `duration`, `description`) VALUES (NULL, '$name', '$duration','$discription')";
          if(mysqli_query($conn, $sql)){
            echo"<script>window.location='index.php'; </script>";
             }
          }
       }
    ?>
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-orange"></i>Add Your Experience</h2>
            <form class="w3-container w3-card-4" action="" method='post'>
            
               
                <p>      
                  <label class="w3-text-green"><b>Profilename</b></label>
                  <input class="w3-input w3-border" name="p-name" type="text">
                </p>
                <p>      
                  <label class="w3-text-green"><b>Duration</b></label>
                  <input class="w3-input w3-border" name="du-tion" type="text">
                </p>
                <p>      
                  <label class="w3-text-green"><b>Description</b></label>
                  <input class="w3-input w3-border" name="dis-tion" type="text">
                </p>
                <span class="error" style="color:red;"> <?php echo $nameErr;?></span>

                <p>      
                  <button class="w3-btn w3-green" name="addwork">Add</button>
                </p>
            </form>
       </div>
       <div class="w3-container w3-card w3-white w3-margin-bottom">
              <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-orange"></i>Work Experience <a href="addwork.php">
          <i class="fa fa-plus fa-fw w3-right w3-large w3-text-orange"></i></a></h2>
              <?php   
                    $sql= "SELECT * FROM `experience`";
                    
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($result)) {
              ?>
              <div class="w3-container">
                <h5 class="w3-opacity"><b><?php echo $row["profile_name"];?></b></h5>
                <h6 class="w3-text-orange"> <span class="w3-tag w3-orange w3-round"><?php echo $row["duration"];?></span>
                    <?php if($row['status'])
                    echo '- <span class="w3-tag w3-orange w3-round"> Current </span>';
                    ?>
                </h6>
                <h5 class="w3-opacity"><b><?php echo $row["description"];?></b></h5>
                <hr>
              </div>
         <?php }
          ?>
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
