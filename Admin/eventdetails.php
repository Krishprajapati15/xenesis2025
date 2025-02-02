<?php
    require '../includes/scripts/connection.php';  
    session_start();
    if(isset($_SESSION['xenesis_logedin_user_id']) && (trim ($_SESSION['xenesis_logedin_user_id']) !== '')){
        $user_id = $_SESSION['xenesis_logedin_user_id'];
        $query = "SELECT * FROM user_master WHERE user_id = $user_id";
        $result = mysqli_query($conn, $query);
        $userdata = mysqli_fetch_assoc($result);
        $user_role = $userdata["user_role"];
        if($user_role != 1){
            header("Location: ../404.php");
        }
    }else{
        header("Location: ../sign-in.php");
    }
?>
<?php 
    $id = $_GET['id'];
    // echo "$id";
    // require "../includes/scripts/connection.php";

    $query = "SELECT * FROM `event_master` WHERE event_id = '$id'";
    $result = mysqli_query($conn, $query);

    if($result){
    $eventdata = mysqli_fetch_assoc($result);
    
    $event_name = $eventdata['event_name'];
    $tagline = $eventdata['tagline'];
    $mobile = $eventdata['event_leader_no'];
    $dept_id = $eventdata['department_id'];
    $team_name = $eventdata['team_name'];
    
    $dept_fetch_query = "SELECT * FROM `department_master` WHERE department_id = '$dept_id'";
    $dept_result = mysqli_query($conn, $dept_fetch_query);
    
    $deptdata = mysqli_fetch_assoc($dept_result);
    $dept_name = $deptdata['department_name'];
    
    $participant_price = $eventdata['participation_price'];
    $team_price = $eventdata['participation_price_team'];
    $total_members = $eventdata['team_member_count'];
    $win_price1 = $eventdata['winner_price1'];
    $win_price2 = $eventdata['winner_price2'];
    $win_price3 = $eventdata['winner_price3'];
    $location = $eventdata['location'];
    $date = $eventdata['date'];
    $event_desc = $eventdata['event_description'];
    $rules = $eventdata['rules'];
    $round1_title = $eventdata['round1_title'];
    $round1_desc = $eventdata['round1_description'];
    $round2_title = $eventdata['round2_title'];
    $round2_desc = $eventdata['round2_description'];
    $round3_title = $eventdata['round3_title'];
    $round3_desc = $eventdata['round3_description'];
    $round4_title = $eventdata['round4_title'];
    $round4_desc = $eventdata['round4_description'];
    $round5_title = $eventdata['round5_title'];
    $round5_desc = $eventdata['round5_description'];
    $image_path = $eventdata['image_path'];
    $max_tickets = $eventdata['max_tickets'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Event Details</title>

    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/Xenesis2025_logo.png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/plugins/icons/ionic/ionicons.css">

    <link rel="stylesheet" href="../assets/plugins/icons/feather/feather.css">

    <link rel="stylesheet" href="../assets/css/animate.css">

    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="main-wrapper">

        <div class="header bord">

        <div class="header-left active">
                <a href="index.php" class="logo" style="font-size:35px; color: rgb(150, 0, 150); font-weight:bold; margin-left:23px;">
                    <span style="color: rgb(0, 0, 102)">X</span>enesis
                </a>
                <a href="index.php" class="logo-small" style="font-size:32px; font-weight:bold;">
                    <img src="../assets/img/Xenesis2025_logo.png" alt="Xenesis_logo">
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">


                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img"><img src="../assets/img/Xenesis2025_logo.png" alt="img">
                            <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img"><img src="../assets/img/Xenesis2025_logo.png" alt="img">
                                    <span class="status online"></span></span>
                                <div class="profilesets">
                                    <h6>
                                        Priyanshu
                                    </h6>
                                    <h5>
                                        Frontend
                                    </h5>
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item" href="profile.php"> <i class="me-2" data-feather="user"></i> My
                                Profile</a>
                            <a class="dropdown-item logout pb-0" href="#"><img
                                    src="../../assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>


            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.php">My Profile</a>
                    <!-- <a class="dropdown-item" href="generalsettings.php">Settings</a> -->
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="index.php"><img src="../assets/img/icons/dashboard.svg" alt="img"><span>
                                    Dashboard</span> </a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="../assets/img/icons/product.svg" alt="img"><span>
                                    Events</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="eventlist.php" class="active">Events</a></li>
                                <li><a href="grouplist.php">Organizer Groups</a></li>
                                <li><a href="studentlist.php">Students</a></li>
                                <li><a href="volunteerlist.php">Volunteer</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="../assets/img/icons/product.svg" alt="img"><span>
                                Events Participers</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="soloevents.php">Solo Events</a></li>
                                <li><a href="groupevents.php">Group Events</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="content">
                <!-- alert-box -->
                <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Je lakhvu hoy</strong> te lakho.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> -->
                <!-- alert-box End -->
                <div class="page-header">
                    <div class="page-title">
                        <h4>Event Details</h4>
                        <h6>Full details of a Event</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="productdetails">
                                    <ul class="product-bar">
                                        <li>
                                            <h4>Event Name</h4>
                                            <h6>
                                                <?php echo $event_name; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Tagline</h4>
                                            <h6>
                                                <?php echo $tagline; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Department</h4>
                                            <h6>
                                                <?php echo $dept_name; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Team Name</h4>
                                            <h6>
                                                <?php echo $team_name ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>LEADER_MO.</h4>
                                            <h6>
                                                <?php echo $mobile ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Participation Price</h4>
                                            <h6>
                                                <?php echo $participant_price; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Team Participation Price</h4>
                                            <h6>
                                                <?php echo $team_price; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Total Members</h4>
                                            <h6>
                                                <?php echo $total_members; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>1st Winner Price</h4>
                                            <h6>
                                                <?php echo $win_price1; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>2nd Winner Price</h4>
                                            <h6>
                                                <?php echo $win_price2; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>3rd Winner Price</h4>
                                            <h6>
                                                <?php echo $win_price3; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Location</h4>
                                            <h6>
                                                <?php echo $location; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Date</h4>
                                            <h6>
                                                <?php echo $date; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Event description</h4>
                                            <h6>
                                                <?php echo $event_desc; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Event Rules</h4>
                                            <h6>
                                                <?php echo $rules; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Round 1 Title</h4>
                                            <h6>
                                                <?php echo $round1_title; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Round 1 description</h4>
                                            <h6>
                                                <?php echo $round1_desc; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Round 2 Title</h4>
                                            <h6>
                                                <?php echo $round2_title; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Round 2 description</h4>
                                            <h6>
                                                <?php echo $round2_desc; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Round 3 Title</h4>
                                            <h6>
                                                <?php echo $round3_title; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Round 3 description</h4>
                                            <h6>
                                                <?php echo $round3_desc; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Round 4 Title</h4>
                                            <h6>
                                                <?php echo $round4_title; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Round 4 description</h4>
                                            <h6>
                                                <?php echo $round4_desc; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Round 5 Title</h4>
                                            <h6>
                                                <?php echo $round5_title; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Round 5 description</h4>
                                            <h6>
                                                <?php echo $round5_desc; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Maximum Tickets</h4>
                                            <h6>
                                                <?php echo $max_tickets; ?>
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="slider-product-details">
                                    <div class="owl-carousel owl-theme ">
                                        <div class="slider-product">
                                            <?php echo "<img src=".$image_path." alt='img'>";?>
                                            <h4>Event Image</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../assets/js/feather.min.js"></script>

    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/plugins/owlcarousel/owl.carousel.min.js"></script>

    <script src="../assets/plugins/select2/js/select2.min.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>