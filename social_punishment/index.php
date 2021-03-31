<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Social Punishment</title>

  <link rel="stylesheet" href="index.css">

  <!-- FontAwsome-5 CDN -->
  <script src="https://kit.fontawesome.com/22bc305d38.js" crossorigin="anonymous"></script>

</head>
<body>

  <div class="grid-container">
    
    <div id="left-panel">
      <div id="logo">
        <!-- <img id="logo-image" src="assets/punishment.jpg" alt="Social Punishment"> -->
      </div>

      <h3>Social Punishment</h3>

      <form action="database/search_traitor.php">
        <input type="text" name="search" id="search-box" spellcheck="false" autocomplete="off" placeholder="Search Traitors...">
        <input type="submit" value="Submit">
      </form>

      <ul>
        <a href="" class="button"><li>Home</li></a>
        <a href="admin/index.php" class="button"> <li>Admin</li></a>
        <a href="pages/faqs.php" class="button"><li>FAQs</li></a>
        <a href="pages/contacts.php" class="button"><li>Contacts</li></a>
      </ul>
    </div>

    <div id="content-area">
      <h1>Your responsibility to boycott these assholes</h1>

      <?php

      include 'database/db_connect.php';

      // // get the value from form 'name=search'
      // $search_word = $_GET['search'];

      // if sql can connect to the DB
      if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      }

      // get data from table
      $sql = "SELECT traitor_name, traitor_position, traitor_office, traitor_location, traitor_violation, traitor_img FROM Ministry ORDER BY traitor_id DESC";
      $result = $mysqli->query($sql);

      // output data of each row
      echo
       '<div class="content-grid-container">';
     
      while($row = $result->fetch_assoc()) {
        echo 
         '<div class="record-container" id="record">
            <div class="info">
              <img src="assets/'.$row["traitor_img"].'" id="info-img"'.'alt="'.$row["traitor_name"].'">
              <h6>'.$row["traitor_name"].'</h6>
            </div>
            <div class="record-detail">
               <p>Position - '.$row["traitor_position"].'</p>
               <p>Office - '.$row["traitor_office"].'</p>
               <p>Location - '.$row["traitor_location"].'</p>
               <p>'.$row["traitor_violation"].'</p>
             </div>
          </div>';

          echo 
          '
            <div id="myModal" class="modal">
              <span class="close">&times;</span>
              <div class="modal-content" id="modal-record">
                <div class="modal-info">
                  
                </div>
                <div class="modal-detail">
                  
                </div>
              </div>
            </div>
          ';
      }
      
      echo 
       '</div>';

      ?>
    </div>
  </div>

  <script src="index.js"></script>
</body>
</html>