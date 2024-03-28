<?php
    include "includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Contact Us</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="_.js"></script>
    <?php include "header.php"; ?> <!-- Include header.php -->
</head>

<body>
    <?php //include "connection.php"; ?>
    <div class="contact-us-container">
        <div class="contact-us-section contact-us-section1">
            <h1>Contact</h1>
            <p>Feel Free to Contact Us</p>
            <form action="" method="POST">
                <?php if(isset($_SESSION['USER_DATA']) && !empty($_SESSION['USER_DATA']['email'])):?>
                <input disabled placeholder="E-mail Address"value="<?php echo $_SESSION['USER_DATA']['email'] ?? ""?>" required>
                <?php else:?>
                    <div>Please login</div>
                <?php endif;?>
                <br>
                <textarea placeholder="Enter your message !" name="feedback" rows="10" cols="30" required></textarea><br>
                <button type="submit" name="submit" value="submit">Send your Message</button>
                <?php
                if (isset($_POST['submit'])) {

                  
                    $insert_query = "INSERT INTO 
                        feedbackTable ( 
                                        
                                        user_id,
                                        senderfeedback)
                        VALUES (        
                                        '" .$_SESSION['USER_DATA']['user_id']  . "',
                                        '" . $_POST["feedback"] . "')";
                    $add = mysqli_query($con, $insert_query);

                    if ($add) {
                        echo "<script>alert('Succesfully Submitted');</script>";
                    }
                }
                ?>
            </form>
        </div>
        <div class="contact-us-section contact-us-section2">
            <h1>Address & Info</h1>
            <h3>Phone Numbers</h3>
            <p><a href="tel:+25471234567">+25471234567</a><br>
                <a href="tel:+254711391148">+254711391148</a></p>
            <h3>Address</h3>
            <p>Nairobi</p>
            <h3>E-mail</h3>
            <p><a href="mailto:ticketreservation@emteecinema.com">ticketreservation@emteecinema.com</a></p>
        </div>
    </div>

    <?php include "footer.php"; ?> <!-- Include footer.php -->
    <script src="scripts/jquery-3.3.1.min.js"></script>
    <script src="scripts/owl.carousel.min.js"></script>
    <script src="scripts/script.js"></script>
</body>

</html>
