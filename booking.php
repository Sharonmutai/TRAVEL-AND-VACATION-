<?php

    require "includes\\functions.php";
    require "includes\config.php";

    if(!logged_in())
    {
        
       
        redirect("login");
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php
$id = $_GET['id'];
//conditions
if ((!$_GET['id'])) {
    echo "<script>alert('You are Not Suppose to come Here Directly');window.location.href='index.php';</script>";
}

// $movieQuery = "SELECT * FROM movieTable WHERE movieID = $id";
// $movieImageById = mysqli_query($con, $movieQuery);
// $row = mysqli_fetch_array($movieImageById);



// $theaterQuery = "SELECT * from   theater";

// $theaterResult = mysqli_query($con, $theaterQuery);



// $movieID = $_GET['id'] ;
// $theaterQuery = "SELECT * from   bookingtable WHERE movieID = '$movieID'";

// $booking = mysqli_query($con, $theaterQuery);
// $booked = 0;
// $remainRoom = $row['number'];

// if (mysqli_num_rows($booking) > 0)
//  {
//     while ($result = mysqli_fetch_array($booking)) {

//        echo "<pre>";
//        print_r($result);
//        echo "</pre>";

//        echo $result['noOfRooms'];
       
//     }
  
//     $remainRoom = $row['number'] - $booked;
// }
// Fetch movie details
$movieID = $_GET['id'];
$movieQuery = "SELECT * FROM movieTable WHERE movieID = $movieID";
$movieResult = mysqli_query($con, $movieQuery);
$row = mysqli_fetch_array($movieResult);


$theaterQuery = "SELECT * from   theater";

$theaterResult = mysqli_query($con, $theaterQuery);

// Total number of rooms available for the movie
$totalRooms = $row['number'];

// Fetch all bookings for the movie
$theaterQuery = "SELECT * FROM bookingtable WHERE movieID = '$movieID'";
$bookingResult = mysqli_query($con, $theaterQuery);

$booked = 0;

if (mysqli_num_rows($bookingResult) > 0) {
    while ($result = mysqli_fetch_array($bookingResult)) {
        // Accumulate the number of booked rooms
        $booked += $result['noOfRooms'];
    }
}

// Calculate remaining rooms
$remainRoom = $totalRooms - $booked;

// Output remaining rooms
//echo "Remaining Rooms: " . $remainRoom;


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Book <?php echo $row['movieTitle']; ?> Now</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .booking-form-container {
           display: flex;
            flex-direction: column;
            background: #000;
        }

        .datepicker-container {
            display: flex;
            align-items: center;
            position: relative;
        }

        .datepicker-container label {
            position: absolute;
            left: 10px;
        }

        .datepicker-container input[type="text"] {
            flex-grow: 1;
            padding: 10px 40px 10px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>

<body style="background-color:#6e5a11;">
    <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h1>RESERVE YOUR BOOKING</h1>
        </div>
        <div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
            <i class="fas fa-2x fa-times"></i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                <?php
                echo '<img src="' . $row['movieImg'] . '" alt="">';
                ?>
            </div>
        </div>
        <div class="booking-panel-section booking-panel-section4"  style="border: none;padding:1rem; box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
            <div class="title"><?php echo $row['movieTitle']; ?></div>
            <div class="movie-information">
                <table>
                    <tr>
                        <td>More About <?php echo " ".$row['movieTitle']; ?> </td>
                        <td><?php echo $row['movieGenre']; ?></td>
                    </tr>
                    <tr>
                        <td>DURATION(TIME TO OCCUPY)</td>
                        <td  id ="result" ><?php echo $row['movieDuration']; ?>Days</td>
                    </tr>
                    <tr>
                        <td>POSTED ON DATE</td>
                        <td><?php echo $row['movieRelDate']; ?></td>
                    </tr>
                    <tr>
                        <td>AVAILABLE ROOMS</td>
                        <td><?php echo $remainRoom." "; ?>Room(s)</td>
                    </tr>
                    <tr>
                        <td>PRICE</td>
                        <td style="display:flex;"><div id= "price"><?php echo $row['movieDirector']."  "; ?></div><div> Ksh</div></td>
                    </tr>
                    <tr>
                        <td>SPECIFIC LOCATION</td>
                        <td><?php echo $row['movieActors']; ?></td>
                    </tr>
                </table>
            </div>
           
            <div class="booking-form-container ">
                <form action="verify.php" method="POST">
                    <!-- <select  name="theater" required>
                   
                        <?php while($theater = mysqli_fetch_array($theaterResult)){?>
                       
                        <option hidden value="<?php echo $theater['theaterID']?>"><?php echo $theater['name'] ?? "" ?>  </option>
                     
                        <?php }?>
                    </select> -->
                    
                    <!-- <select name="noOfRooms" required>
                        <option value="" disabled selected>SELECT NO. OF ROOMS</option>
                        <option value="3d">3D</option>
                        <option value="2d">2D</option>
                        <option value="imax">IMAX</option>
                        <option value="7d">7D</option>
                    </select>  -->
                    <input kkoninput= "rooms('<?php echo $remainRoom?>')" style="width:30%;" type="number" autofocus class="room" id="room"  name="noOfRooms"  placeholder="SELECT NO. OF ROOM(S)" required>

                    <div class="datepicker-container">
                    <input style="width:100%;" type="date" id="datepicker2"  name="type"  placeholder="Check In Date" required>
                        </div>
                    <div class="datepicker-container">
                        <input style="width:100%;" type="date" id="datepicker"  name="date"  placeholder="Check Out Date" required>
                    </div>
                    <br>
              
                    
                    <input type="hidden" name="movie_id" value="<?php echo $id; ?>" >
                    <input type="hidden" id="amount" name="amount" value="" >
                    <button type="submit" value="save" name="submit" class="form-btn">Book Now</button>
                </form>
            </div>
        </div>
    </div>

    <script src="scripts/jquery-3.3.1.min.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>


// function rooms(nofRoom = "")
// {

//     var no = document.querySelector(".room").value;
//     if(nofRoom < no)
//     {
//         document.querySelector(".room").value = "";
//         alert("Please Check number of Rooms Available("+nofRoom+")");
        
        
//     }

   
    
// }


function getCurrentDate() {
        const today = new Date();
        const year = today.getFullYear();
        let month = today.getMonth() + 1;
        let day = today.getDate();

  
        month = month < 10 ? '0' + month : month;
        day = day < 10 ? '0' + day : day;

        return `${year}-${month}-${day}`;
    }

    document.getElementById('datepicker2').setAttribute('min', getCurrentDate());
    document.getElementById('datepicker').setAttribute('min', getCurrentDate());




        function cal()
        {
     
            var no = document.querySelector(".room").value;
          
            if(no.length < 1)
            {
                no = 0;
                document.getElementById("datepicker2").value = "";
                document.getElementById("datepicker").value = "";
                setTimeout(function(){
                    location.reload();
                },1);
             
               return;
            }
                var nofRoom = "<?php echo $remainRoom?>"
                if(nofRoom < no || no < 1)
                {
                    document.querySelector(".room").value = "";
                    alert("Please Check number of Rooms Available("+nofRoom+")");
                    
                    
                }


            var checkin = document.getElementById("datepicker2").value;
            var checkout = document.getElementById("datepicker").value;
           
            var checkinDate = new Date(checkin);
            var checkOutDate = new Date(checkout);
 
            

            if(isNaN(checkOutDate.getTime()) || isNaN(checkinDate.getTime()))
            {
                 document.getElementById("result").innerHTML = "<span style='color:red;'>Calculating...</span>";
                 //document.getElementById("price").innerHTML = "<span style='color:red';>waiting</span>";
                // return;
            }
       
            else{

       

                var diff = checkOutDate.getTime() - checkinDate.getTime();
                var diffDays = diff /(1000 *3600 *24);

                document.getElementById("result").innerHTML = "<span style='color:blue'>"+ diffDays+" Days</span>";;
                var price = document.getElementById("price").innerHTML;
                console.log(price.length+ "    kkkkkkkkkkk");
                if(isNaN(price))
                {
                    price = "<?php echo $row['movieDirector'] ?>";
                    //alert("price is less than 0");
                }
               


                var noRooms = document.querySelector(".room").value;

                amount = price * diffDays;
             
              
                document.getElementById("price").innerHTML = "<span style='color:blue';>"+  amount * noRooms+"</span>";
                document.getElementById("amount").value = amount * noRooms ;

              // console.log(document.getElementById("amount").value);

                

            }
           
          

         
            
            
            
      
         
        }
       
   


        // $(document).ready(function() {
        //     $('#datepicker').datepicker({
        //         dateFormat: 'mm-dd-yy',
        //         minDate: 0 // Sets the minimum selectable date to today
        //     });
        //     $('#datepicker2').datepicker({
        //         dateFormat: 'mm-dd-yy',
        //         minDate: 0 // Sets the minimum selectable date to today
        //     });

            document.getElementById("datepicker2").addEventListener("input", cal);
        document.getElementById("datepicker").addEventListener("input", cal);
        document.getElementById("room").addEventListener("input", cal);








            
        // });





        // let checkin = "";
        // let checkout = "";
       
    
    
    </script>
</body>

</html>
