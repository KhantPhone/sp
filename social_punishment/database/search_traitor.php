<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Social Punishment</title>

  <!-- Fontawsome CDN -->
  <script src="https://kit.fontawesome.com/30faeb9fae.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../index.css">

</head>
  <body>
    <div class="grid-container">

    <!-- <?php include 'left_panel.php' ?> -->

    <div id="left-panel">
      <div id="logo">
        <!-- <img id="logo-image" src="assets/punishment.jpg" alt="Social Punishment"> -->
      </div>

      <h3>Social Punishment</h3>

      <form action="">
        <input type="text" name="search" id="search-box" spellcheck="false" autocomplete="off" placeholder="Search Traitors...">
        <input type="submit" value="Submit">
      </form>

      <ul>
        <a href="index.php" class="button"><li>Home</li></a>
        <a href="pages/admin.php" class="button"> <li>Admin</li></a>
        <a href="pages/faqs.php" class="button"><li>FAQs</li></a>
        <a href="pages/contacts.php" class="button"><li>Contacts</li></a>
      </ul>
    </div>

    <div id="content-area">
      <h1>Your responsibility to boycott these assholds</h1>

      <?php

      include 'db_connect.php';

      // get the value from form 'name=search'
      $search_word = $_GET['search'];

      // if sql can connect to the DB
      if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      }

      // get data from table
      $sql = "SELECT traitor_name, traitor_position, traitor_office, traitor_location, traitor_violation, traitor_img FROM Ministry WHERE traitor_name LIKE '%$search_word%'";
      $result = $mysqli->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        echo
         '<div class="content-grid-container">';
        
        while($row = $result->fetch_assoc()) {
          echo 
           '<div class="record-container">
              <div class="info">
                <img src="../'.$row["traitor_img"].'"'.'alt="'.$row["traitor_name"].'">
                <p>'.$row["traitor_name"].'</p>
              </div>
            </div>';
            echo 
            '
              <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <div class="modal-content" id="record">
                  <div class="modal-info">
                    <img src="../'.$row["traitor_img"].'" id="info-img"'.'alt="'.$row["traitor_name"].'">
                    <h5>'.$row["traitor_name"].'</h5>
                  </div>
                  <div class="detail">
                    <p>Position - '.$row["traitor_position"].'</p>
                    <p>Office - '.$row["traitor_office"].'</p>
                    <p>Location - '.$row["traitor_location"].'</p>
                    <p>'.$row["traitor_violation"].'</p>
                  </div>
                </div>
              </div>
            ';
        }
      } 
      else {
        echo 
         '<h2>ရှာလို့ မတွေ့ပါ</h2>'; 
      }
      
      echo 
       '</div>';
      ?>
      <!-- <a href="javascript:history.back()" class="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> နောက်သို့</a> -->
    </div>
  </div>

  <!-- <div class="detail">
              <h6>Position- '.$row["traitor_position"].'</h6>
              <h6>Office- '.$row["traitor_office"].'</h6>
              <h6>Location- '.$row["traitor_location"].'</h6>
              <p>'.$row["traitor_violation"].'</p>
            </div> -->
    <script src="../index.js"></script>
  </body>
</html>

