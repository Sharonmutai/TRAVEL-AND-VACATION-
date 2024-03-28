<?php
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Emtee Cinema</title>
    <script src="_.js "></script>
    <style>
        body {
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
        }
    </style>
</head>

<body>
    <?php

    $sql = "SELECT * FROM movieTable";
    ?>
    <header></header>

    <div id="home-section-1" class="movie-show-container">
    <h2 style="color:#000000; text-align:center;">
  <a href="showing.php" style="color:#000000; text-decoration:none; font-size:36px;">CURRENTLY SHOWING</a>
</h2>
        <h3>Book a movie now</h3>

        <div class="movies-container">

            <?php
            if ($result = mysqli_query($con, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<div class="movie-box">';
                        echo '<img src="' . $row['movieImg'] . '" alt=" ">';
                        echo '<div class="movie-info">';
                        echo '<h3>' . $row['movieTitle'] . '</h3>';
                        echo '<a href="booking.php?id=' . $row['movieID'] . '"><i class="fas fa-ticket-alt"></i> Book a seat</a>';
                        echo '<a href="' . $row['trailerLink'] . '"><i class="fab fa-youtube"></i> Watch Trailer</a>';
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
    </div>
    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>
