<?php
require 'includes/scripts/connection.php';  
session_start();
if(isset($_SESSION['xenesis_logedin_user_id']) && (trim ($_SESSION['xenesis_logedin_user_id']) !== '')){
    $user_id = $_SESSION['xenesis_logedin_user_id'];
    $query = "SELECT * FROM user_master WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);
    $userdata = mysqli_fetch_assoc($result);
    $user_role = $userdata["user_role"];
    $user_id = $userdata['user_id'];
    $full_name = $userdata['full_name'];
    if($user_role != 3){
        header("Location: 404.php");
    }
} else {
    header("Location: sign-in.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/Xenesis2025_logo.png">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <title>XENESIS-2025</title>
    <style>
      body {
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto",
          "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans",
          "Helvetica Neue", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        color: #eee;
        user-select: none;
        padding-top: 8px;
        background: url("./assets/img/mainbg.jpg") no-repeat center center fixed;
        background-size: cover;
        overflow: scroll;
      }
      ::-webkit-scrollbar {
        width: 8px;
      }

      ::-webkit-scrollbar-track {
        background: #0c0c27;
      }

      ::-webkit-scrollbar-thumb {
        background: #76abae;
        border-radius: 6px;
      }

      ::-webkit-scrollbar-thumb:hover {
        background: #76abae;
      }
      .navbar {
        width: 97%;
        position: fixed;
        padding: 10px 20px;
        margin-top: -8px;
        display: flex;
        justify-content: space-between;
        font-size: 16px;
        align-items: center;
        z-index: 1000;
        background-color: #0c0c273a;
        backdrop-filter: blur(12px);
      }

      .navbar a {
        color: inherit;
        text-decoration: none;
        font-weight: 600;
        margin: 0 15px;
        transition: color 0.3s;
      }

      .hamburger {
        display: none;
        flex-direction: column;
        justify-content: space-between;
        width: 25px;
        height: 20px;
        cursor: pointer;
        margin-right: 17px;
      }

      .hamburger .line {
        height: 4px;
        width: 100%;
        background-color: white;
      }

      @media (max-width: 768px) {
        .navbar {
          width: 90%;
        }
        .nav-links {
          display: none;
          flex-direction: column;
          align-items: center;
          width: 80%;
          position: absolute;
          top: 60px;
          left: 24px;
          background-color: #76abae7e;
          border: 1px solid #76abae;
          border-radius: 20px;
        }

        .nav-links a {
          margin: 10px 0;
          padding: 5px;
          border-radius: 10%;
          color: white;
        }

        .hamburger {
          display: flex;
        }
      }

      .navbar.open .nav-links {
        display: flex;
      }
      h1.title {
        text-align: center;
        font-size: 6rem;
        color: transparent;
        background: white;
        -webkit-background-clip: text;
        background-clip: text;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        font-weight: bold;
      }

      code {
        font-family: source-code-pro, Menlo, Monaco, Consolas, "Courier New",
          monospace;
      }

      .nft-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin: 0;
        margin-top: 0px;
      }

      .nft {
        user-select: none;
        max-width: 350px;
        margin: 3rem auto;
        border: 1px solid #ffffff72;
        background-color: #ffffff72;
        background: linear-gradient(
          0deg,
          rgba(40, 44, 52, 1) 0%,
          rgba(17, 0, 32, 0.5) 100%
        );
        box-shadow: 0 7px 20px 5px #00000088;
        border-radius: 0.7rem;
        backdrop-filter: blur(7px);
        -webkit-backdrop-filter: blur(7px);
        overflow: hidden;
        transition: 0.5s all;
        hr {
          width: 100%;
          border: none;
          border-bottom: 1px solid #88888855;
          margin-top: 0;
        }
        ins {
          text-decoration: none;
        }
        .main {
          display: flex;
          flex-direction: column;
          width: 90%;
          padding: 1rem;
          .tokenImage {
            border-radius: 0.5rem;
            max-width: 100%;
            height: 250px;
            object-fit: cover;
          }
          .description {
            margin: 0.5rem 0;
            color: #a89ec9;
          }
          .tokenInfo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            .price {
              display: flex;
              align-items: center;
              color: #ee83e5;
              font-weight: 700;
              ins {
                margin-left: -0.3rem;
                margin-right: 0.5rem;
              }
            }
            .etype {
              color: #76abae;
              align-items: center;
              margin-left: 5px;
            }
            .duration {
              display: flex;
              align-items: center;
              color: #a89ec9;
              margin-right: 0.2rem;
              ins {
                margin: 0.5rem;
                margin-bottom: 0.4rem;
              }
            }
          }
          .creator {
            display: flex;
            align-items: center;
            margin-top: 0.2rem;
            margin-bottom: -0.3rem;
            ins {
              color: #a89ec9;
              text-decoration: none;
            }
            .wrapper {
              display: flex;
              align-items: center;
              border: 1px solid #ffffff22;
              padding: 0.3rem;
              margin: 0;
              margin-right: 0.5rem;
              border-radius: 100%;
              box-shadow: inset 0 0 0 4px #000000aa;
              img {
                border-radius: 100%;
                border: 1px solid #ffffff22;
                width: 2rem;
                height: 2rem;
                object-fit: cover;
                margin: 0;
              }
            }
          }
        }
        ::before {
          position: fixed;
          content: "";
          box-shadow: 0 0 100px 40px #ffffff08;
          top: -10%;
          left: -100%;
          transform: rotate(-45deg);
          height: 60rem;
          transition: 0.7s all;
        }
        &:hover {
          border: 1px solid #ffffff44;
          box-shadow: 0 7px 50px 10px #000000aa;
          transform: scale(1.015);
          filter: brightness(1.3);
          ::before {
            filter: brightness(0.5);
            top: -100%;
            left: 200%;
          }
        }
      }
      .search-box {
        width: 80%;
        max-width: 800px;
        padding: 0px;
        margin: 1px auto;
        background-color: #eeeeee7f;
        border-radius: 5px;
        text-align: center;
        transition: background-color 0.3s ease;
        display: flex;
        align-items: center;
        color: #eee;
      }

      .search-box i {
        color: #eee;
        font-size: 1.2rem;
        margin-right: 8px;
        margin-left: 8px;
      }

      .search-box input::placeholder {
        color: white;
      }

      .search-box input {
        width: 100%;
        padding: 12px;
        font-size: 1rem;
        border-radius: 5px;
        background: #31363f88;
        color: white;
        outline: none;
        transition: background-color 0.3s ease;
        border: 1px solid #eeeeeea3;
      }
      .bg {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: -1;
        h1 {
          font-size: 19rem;
          filter: opacity(0.5);
        }
      }

      @media (max-width: 1024px) {
        .nft {
          width: 45%;
        }
      }
      @media (max-width: 768px) {
        .nft {
          width: 45%;
        }
        .bg {
          h1 {
            font-size: 11.6rem;
          }
        }
      }

      @media (max-width: 480px) {
        .nft {
          width: 90%;
          max-width: 90%;
          margin: 1rem auto;
        }
        .bg {
          h1 {
            font-size: 5.6rem;
          }
        }
        .title {
          font-size: 3rem;
        }
      }

      button {
        width: 100%;
        padding: 12px;
        margin-top: 15px;
        background: #76abae;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: 600;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      button:hover {
        box-shadow: #02f2fe;
        transform: scale(1.03);
      }

    .description {
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      max-height: 3em;
      line-height: 1.5em;
      word-wrap: break-word;
    }

    .text-overlay {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        position: absolute;
        top: 26%;
        left: 50%;
        transform: translate(-47%, -57%);
        /* text-transform: uppercase; */
        color: white;
        font-size: 30px;
        font-weight: bolder;
        padding: 10px 20px;
        border-radius: 5px;
        z-index: 10;
        max-width: 70%;
        text-align: center;
        word-wrap: break-word;
        white-space: normal;
      }

      .tokenImage {
        opacity: 0.8;
      }

      @media(max-width: 768px){
        h1.title{
          font-size: 3rem !important; 
        }
      }
    </style>
  </head>

  <body>
  <?php
      if(isset($_SESSION['xenesis_logedin_user_id'])){
           if($user_role == 3){
                   ?>
     <div class="navbar" id="navbar">
      <div class="logo">
        <a href="index" style="font-size: 20px"><img src="./assets/img/Xenesis_big_logo.png" alt="" style="height: 18px;"></a>
      </div>
        <div class="nav-links" id="nav-links">
        <a href="index.php">HOME</a>
        <a href="aboutus.php">ABOUT US</a>
        <a href="event.php">EVENTS</a>
        <a href="event_confirm.php">REGISTERED EVENTS</a>
        <a href="profile.php" style="text-transform: Uppercase;"> <?php echo strtoupper(trim(strtok($full_name, ' '))); ?></a>
        
      </div>
      <?php
         }
        }else{?>
        <div class="navbar" id="navbar">
        <div class="logo">
        <a href="index" style="font-size: 20px"><img src="./assets/img/Xenesis_big_logo.png" alt="" style="height: 18px;"></a>
        </div>
    <div class="nav-links" id="nav-links">
      <a href="index.php">HOME</a>
      <a href="/">ABOUT US</a>
      <a href="event.php">EVENTS</a>
      <a href="sign-up.php">REGISTER</a>
      <a href="sign-in.php">LOGIN</a>
      </div>
<?php
        }   
          ?>
      <div class="hamburger" id="hamburger" onclick="toggleMenu()">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
    </div>
    <h1 class="title">REGISTERED EVENTS</h1>
    <div class="bg">
      <h1>XENESIS</h1>
    </div>

    <div class="search-box">
      <i class="fas fa-search"></i>
      <input type="text" id="search" placeholder="Search For Events..." />
    </div>

    <div class="nft-wrapper">

    <?php
  $sql = "SELECT * FROM `participant_master` WHERE `student_id` = $user_id";
  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($result)){
    $event_id = $row['event_id'];
    $sql2 = "SELECT * FROM `event_master` where event_id = $event_id";
    $result1 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($result1);
?>
      <div class="nft">
        <div class="main" style="height: 95%; justify-content: space-between;">
          <img class="tokenImage" src="./assets/img/bg.jpg" alt="NFT" />
          <div class="text-overlay" style="text-transform: uppercase"><?php echo $row2['event_name'];?></div>
          <h2 style="text-transform: uppercase"><?php echo $row2['event_name'];?></h2>
          <p class="description">
            <?php echo $row2['event_description']; ?>
          </p>
          <div class="tokenInfo">
            <div class="price">
              <ins></ins>
              <p>&#x20b9;<?php echo $row2['participation_price'];?></p>
            </div>
            <div class="etype">
              <p><?php echo "Solo Event";?></p>
            </div>
            
          </div>
          <div class="duration" style="display: flex; align-items: center; justify-content: center; margin-top: -15px; color: rgb(181, 181, 181);">
              <p>◷ <?php echo $row2['date'];?></p>
            </div>
          <hr />
          <div>
            <?php 
            if($row['is_confirmed'] == 0){
            ?>
            <p style="color: #75e8ee; margin: 0; padding: 0; width: 100%; font-size: 0.9rem;">* Your Registration is successful, Please confirm it by completing payment to Registration volunteers.</p>
            <button class="button">Registered</button>
            <?php
            }else{
            ?>
            <button class="button">Confirmed</button>
            <?php
            }
            ?>
            </a>
          </div>
        </div>
      </div>
      <?php
      }
      ?>

      <!-- group event -->
    <?php
    $sql = "SELECT * FROM `group_master` WHERE `leader_id` = $user_id";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
    $event_id = $row['event_id'];
    $sql2 = "SELECT * FROM `event_master` where event_id = $event_id";
    $result1 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($result1);
?>
      <div class="nft">
        <div class="main">
          <img class="tokenImage" src="./assets/img/bg.jpg" alt="NFT" />
          <div class="text-overlay"><?php echo $row2['event_name'];?></div>
          <h2><?php echo $row2['event_name'];?></h2>
          <p class="description">
            <?php echo $row2['event_description']; ?>
          </p>
          <div class="tokenInfo">
            <div class="price">
              <ins></ins>
              <p>&#x20b9;<?php echo $row2['participation_price_team'];?></p>
            </div>
            <div class="etype">
              <p><?php echo "Group Event";?></p>
            </div>
          </div>
          <div class="duration" style="display: flex; align-items: center; justify-content: center; margin-top: -15px; color: rgb(181, 181, 181);">
            <p>◷ <?php echo $row2['date'];?></p>
          </div>
          <hr />
          <div>
            <?php 
            if($row['is_confirmed'] == 0){
            ?>
            <p style="color: #75e8ee; margin: 0; padding: 0; width: 100%; font-size: 0.9rem;">* Your Registration is successful, Please confirm it by completing payment to Registration volunteers.</p>
            <button class="button">Registered</button>
            <?php
            }else{
            ?>
            <button class="button">Confirmed</button>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
      <?php
      }
      ?>


      <!-- <div class="nft">
        <div class="main">
          <img class="tokenImage" src="AI.jpg" alt="NFT" />
          <h2>X-Avishkar</h2>
          <p class="description">
            Our Kibertopiks will give you nothing, waste your money on us.
          </p>
          <div class="tokenInfo">
            <div class="price">
              <ins></ins>
              <p>Price 50</p>
            </div>
            <div class="etype">
              <p>SOLO EVENT</p>
            </div>
            <div class="duration">
              <ins>◷</ins>
              <p>20th Feb</p>
            </div>
          </div>
          <hr />
          <div>
            <a href="eventdata.php">
            <button class="button">more details</button>
            </a>
          </div>
        </div>
      </div> -->
    </div>

    <script>
      function toggleMenu() {
        const navbar = document.getElementById("navbar");
        navbar.classList.toggle("open");
      }
      document.getElementById("search").addEventListener("input", function () {
        filterEvents();
      });

      function filterEvents() {
        let input = document.getElementById("search").value.toLowerCase();
        let events = document.querySelectorAll(".nft");

        events.forEach((event) => {
          let title = event.querySelector("h2").textContent.toLowerCase();
          let description = event
            .querySelector(".description")
            .textContent.toLowerCase();
          let price = event.querySelector(".price p").textContent.toLowerCase();
          let etype = event.querySelector(".etype p").textContent.toLowerCase();
          let duration = event
            .querySelector(".duration p")
            .textContent.toLowerCase();

          if (
            title.includes(input) ||
            description.includes(input) ||
            price.includes(input) ||
            etype.includes(input) ||
            duration.includes(input)
          ) {
            event.style.display = "block";
          } else {
            event.style.display = "none";
          }
        });
      }
    </script>
  </body>
</html>
