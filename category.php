<?php 
session_start();
require_once 'includes/config.php';
if (!isset($_GET['name'])){
    header("location:home.php");
}

// $id = $_GET['id'];

// // Update num of views
// $query = "UPDATE news SET views = views + 1 WHERE id = $id";
// $result = mysqli_query($con, $query);

?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/style.css">
    <link type="text/css" rel="stylesheet" href="assets/details.css">
    <link type="text/css" rel="stylesheet" href="assets/includesStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <link rel="shortcut icon" href="assets/img/tab-icon" type="image/x-icon" />
    <script src="JS/commentAJAX.js"></script>
    <title>Details</title>

</head>

<body>
    <div class="container" style="height:fit-content">

        <!-- Header -->
        <?php include('includes/header.php');?>

        <!-- Navbar -->
        <?php include('includes/nav.php');?>

        <!-- Urgent Bar -->
        <?php include('includes/urgent.php');?>

        <!-- Main Content -->
        <div class="row main-content" style="height:fit-content">

            <?php 
                
                $name = $_GET['name'];

                $query = "SELECT title, img, date, content FROM news WHERE category = '$name'";

                $result = mysqli_query($con, $query);
                
                if (mysqli_num_rows($result) == 1) {
                    $thisNews = mysqli_fetch_array($result);
                }
                else {
                    echo "لا يوجد أية خبر";
                    die();
                }
            ?>

            <!-- Home Page -->
            <div class="details main-news col-md-8" style="height:fit-content">
                <div class="item">
                    <a href="" class="eff">
                        <img src="<?php echo $thisNews[1];?>" width="263" height="174" class="img-responsive" >
                        <p class="title"><?php echo $thisNews[0];?></p>
                    </a>
                </div>
            </div>
            <!-- SideNav -->
            <?php include('includes/sidenav.php');?>
        </div>
    </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>