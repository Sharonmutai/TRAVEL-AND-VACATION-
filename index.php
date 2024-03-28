<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Chep Bookin</title>
    <script src="_.jsk "></script>
  
    <style>
       /* l body {
            background-image: url(img/mti);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }

        .movies-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .movie-box {
            width: calc(33.33% - 20px);
            margin-bottom: 20px;
        }

        .movie-info {
            background-color: #ffffff;
            padding: 10px;
        } */

        .hero {
  background-image: url("img/images/panda.jpg");
  background-size: cover;
  background-position: center;
  height: 89vh;
  color: #fff;
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
}

.hero-content {
  padding: 20px;
  border-radius: 10px;
}

    </style>
   
</head>

<body >
    <?php
    
    $sql = "SELECT * FROM movieTable GROUP BY movieTitle order by movieTitle ";
    ?>
    <header> <?php include "includes/header.php"; ?></header>

<section>

    <!-- Hero Section Below Navbar -->
    <div class="hero">
        <div class="hero-content">
            <h1 class="fw-bold text-dark">Travel And Vacation</h1>
            <p class="text-info h4">book hotels and restaurant in our Website</p>
          
       
        </div>
    </div>

</section>



    <div id="home-section-1" class="movie-show-container">
    <h2 style="color:#000000; text-align:center;">
  <a href="showing.php" style="color:#000000; text-decoration:none; font-size:36px;">Hotels and Restaurtant</a>
</h2>
  <h2 style="text-align: center; font-size: 18px;">Book a hotel now</h2>

<!-- ... previous HTML code ... -->

<div style="" class="movies-container">
    <?php
    if ($result = mysqli_query($con, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

               // echo "<pre>";
                //print_r($row);
                // Remove PATH constant from the echo statement
                
                echo '<div style="display:block;">';
                echo '<div class="movie-box" style="">';
               // echo '<a href="categories.php?id=' . $row['movieID'] . '">';
                echo '<img style="object-fit:cover; height:15rem; min-height:5rem;" src="' . $row['movieImg'] . '" alt=" ">'; // Image URL directly from the database
                echo '<div class="movie-info">';
                echo '<h2>' . $row['movieTitle'] . '</h2>';
              
                echo '<a href="categories.php?place=' . $row['movieTitle'] . '"><i class="fas fa-ticket-alt"></i> VIEW OTHER OPTIONS</a>';
              //  echo '<a href="' . $row['trailerLink'] . '"><i class="fab fa-youtube"></i> Watch The Place</a>';
                echo '</div>';
                echo '</div>';
                echo '<div style="font-weight:bold; margin-bottom:10px;">';
                echo $row['movieTitle'];
                //echo '</a>';
                
                echo '</div>';
                echo '<div style="margin-bottom:10px;">';
                echo 'Ksh '.$row['movieDirector'];
                
                
                    echo '</div>';

                echo '<div>';
                    echo $row['movieGenre'];
                    
                echo '</div>';
                echo '</div>';
            }
            mysqli_free_result($result);
        } else {
            echo '<h4 class="no-annot">No Booking to our movies right now</h4>';
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }

    // Close connection
    mysqli_close($con);
    ?>
</div>

<!-- ... remaining HTML code ... -->

    </div>

    <div id="home-section-2" class="services-section">
        <h1>How it works</h1>
        <h2>3 Simple steps to book your favourite place!</h2>

        <div class="services-container">
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-video"></i>
                </div>
                <h2>1. Choose your favourite place</h2>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-credit-card"></i>
                </div>
                <h2>2. Pay for your booking ticket</h2>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-theater-masks"></i>
                </div>
                <h2>3. Pick your place & Enjoy the place</h2>
            </div>
            <div class="service-item"></div>
            <div class="service-item"></div>
        </div>
    </div>

    <footer><?php include "footer.php"; ?></footer>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>
