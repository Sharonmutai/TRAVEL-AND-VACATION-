<!DOCTYPE html>
<html>
<head>
    <title>Upcoming Movies</title>
    <style>
        body {
            background-image: url("http://www.apnakatta.com/img/movies/movie-bg.jpg");
            background-size: cover;
        }

        /* Navigation Bar Styles */
        .navbar {
            background-color: black; /* Change background color to black */
            color: white; /* Change text color to white */
            padding: 20px;
            display: flex;
            justify-content: space-between;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar ul li {
            margin-right: 20px;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
        }

        .navbar ul li a:hover {
            text-decoration: underline;
        }

        /* Rest of the styles */
        .movie-container {
            display: flex;
            margin-bottom: 20px;
        }

        .movie-poster {
            margin-right: 20px;
        }

        .movie-details {
            flex-grow: 1;
            color: #fff;
        }

        .trailer-button {
            background-color: #fff;
            color: #000;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        /* Added CSS for two columns */
        .movies-wrapper {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .movie-column {
            flex-basis: 45%;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
        </ul>
    </div>

    <h1>Upcoming Movies</h1>

    <?php
        // Define an array of upcoming movies
        $movies = [
            [
                "title" => "The Perfect Parents",
                "release_date" => "September 15, 2023",
                "director" => "John Smith",
                "actors" => ["Emma Thompson", "Tom Hanks", "John Doe"],
                "description" => "When strong-willed Summer Pratt takes a job at a beautiful estate as the new nanny to a sweet but sad little girl named Sophie, she soon starts to suspect something is very wrong with the beautiful, wealthy couple who call themselves her parents.",
                "trailer_link" => "https://www.youtube.com/watch?v=yoEswOp0Kew",
                "poster" => "img/tgn.jpg"
            ],
            [
                "title" => "Never Have I Ever",
                "release_date" => "October 21, 2023",
                "director" => "Jane Johnson",
                "actors" => ["Jennifer Lawrence", "Chris Evans", "Michael B. Jordan"],
                "description" => "The complicated life of a first-generation Indian-American teenage girl, inspired by Mindy Kaling's own childhood.",
                "trailer_link" => "https://www.youtube.com/watch?v=IemUKB4kCWM",
                "poster" => "img/never.jpg"
            ],
            [
                "title" => "Will Trent",
                "release_date" => "November 30, 2023",
                "director" => "Steven Spielberg",
                "actors" => ["Leonardo DiCaprio", "Scarlett Johansson", "Samuel L. Jackson"],
                "description" => "The series revolves around special agent Will Trent of the Georgia Bureau of Investigation who was abandoned at birth and endured a harsh coming-of-age in Atlanta's overwhelmed foster care system. But now, determined to use his unique point of view to make sure no one is abandoned like he was, Will Trent has the highest clearance rate in the GB.",
                "trailer_link" => "https://www.youtube.com/watch?v=Iy9PoT19ujk",
                "poster" => "img/trent.jpg"
            ],
            [
                "title" => "Dynasty",
                "release_date" => "December 10, 2023",
                "director" => "Sarah Johnson",
                "actors" => ["Robert Downey Jr.", "Mila Kunis", "Chris Hemsworth"],
                "description" => "Follows two of America's wealthiest families as they feud for control over their fortune and their children.",
                "trailer_link" => "https://www.youtube.com/watch?v=TlE-hmQHfFI",
                "poster" => "img/dynasty.jpg"
            ],
            [
                "title" => "Red Notice 2",
                "release_date" => "January 25, 2024",
                "director" => "David Anderson",
                "actors" => ["Angelina Jolie", "Brad Pitt", "Natalie Portman"],
                "description" => "Two thousand years ago Marc Antony gifted Cleopatra three bejeweled eggs as a wedding gift symbolizing his devotion. The eggs were lost to time until they were rediscovered by a farmer in 1907. While two of the eggs were recovered, the third remained lost.",
                "trailer_link" => "https://www.youtube.com/watch?v=Pj0wz7zu3Ms",
                "poster" => "img/red.n.jpg"
            ],
            [
                "title" => "The Blacklist",
                "release_date" => "February 14, 2024",
                "director" => "Christopher Nolan",
                "actors" => ["Matthew McConaughey", "Anne Hathaway", "Joaquin Phoenix"],
                "description" => "Elizabeth Keen lives a happy life with her husband Tom. They are even planning to adopt a baby. Elizabeth wants to go to her new job at the FBI when she is picked up by them and driven to a black-site to meet Raymond Reddington, a master criminal who vanished a long time ago and came back as the concierge of crime. After eluding capture for decades, he turns himself in, but only agrees to speak to Elizabeth Keen.",
                "trailer_link" => "https://www.youtube.com/watch?v=SGB5cMf0r4I",
                "poster" => "img/blacklist.jpg"
            ],
            // Add more movie entries as needed
        ];
    ?>

    <div class="movies-wrapper">
        <div class="movie-column">
            <?php
                // Iterate through the first half of movies array and generate HTML for each movie
                $halfCount = ceil(count($movies) / 2);
                for ($i = 0; $i < $halfCount; $i++) {
                    $movie = $movies[$i];
                    echo "<div class=\"movie-container\">";
                    echo "<div class=\"movie-poster\">";
                    echo "<img src=\"{$movie['poster']}\" alt=\"Movie Poster\" width=\"200\">";
                    echo "</div>";
                    echo "<div class=\"movie-details\">";
                    echo "<h2>{$movie['title']}</h2>";
                    echo "<p><strong>Release Date:</strong> {$movie['release_date']}</p>";
                    echo "<p><strong>Director:</strong> {$movie['director']}</p>";
                    echo "<p><strong>Actors:</strong> " . implode(", ", $movie['actors']) . "</p>";
                    echo "<p><strong>Description:</strong> {$movie['description']}</p>";
                    echo "<a class=\"trailer-button\" href=\"{$movie['trailer_link']}\" target=\"_blank\">Watch Trailer</a>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
        <div class="movie-column">
            <?php
                // Iterate through the second half of movies array and generate HTML for each movie
                for ($i = $halfCount; $i < count($movies); $i++) {
                    $movie = $movies[$i];
                    echo "<div class=\"movie-container\">";
                    echo "<div class=\"movie-poster\">";
                    echo "<img src=\"{$movie['poster']}\" alt=\"Movie Poster\" width=\"200\">";
                    echo "</div>";
                    echo "<div class=\"movie-details\">";
                    echo "<h2>{$movie['title']}</h2>";
                    echo "<p><strong>Release Date:</strong> {$movie['release_date']}</p>";
                    echo "<p><strong>Director:</strong> {$movie['director']}</p>";
                    echo "<p><strong>Actors:</strong> " . implode(", ", $movie['actors']) . "</p>";
                    echo "<p><strong>Description:</strong> {$movie['description']}</p>";
                    echo "<a class=\"trailer-button\" href=\"{$movie['trailer_link']}\" target=\"_blank\">Watch Trailer</a>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2023 Emtee Cinema Movies. All rights reserved.</p>
    </footer>
</body>
</html>
