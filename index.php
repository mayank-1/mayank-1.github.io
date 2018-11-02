<?php
    // start at the top of the page since we start a session
    session_name('mysite_hit_counter');
    session_start();
    //
    $fn = 'hits_counter.txt';
    $hits = 0;
    // read current hits
    if (($hits = file_get_contents($fn)) === false)
    {
        $hits = 0;
    }
    // write one more hit
    if (!isset($_SESSION['page_visited_already']))
    {
        if (($fp = @fopen($fn, 'w')) !== false)
        {
            if (flock($fp, LOCK_EX))
            {
                $hits++;
                fwrite($fp, $hits, strlen($hits));
                flock($fp, LOCK_UN);
                $_SESSION['page_visited_already'] = 1;
            }
            fclose($fp);
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Mayank Kumar</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="bgimg">
            <div class="middle">
                <img src="images/profile.jpg" style="border-radius: 50%; height: 110px; width: 110px;"/>
                <h1>COMING SOON</h1>
                <hr>
                <p id="demo" style="font-size:30px"></p>
                <button class="btn" type="submit" onclick="window.open('https://drive.google.com/uc?export=download&id=1HReNeiIl6k2Pt5P0qCXw7wzEA90_48I4')">Resume</button>
                <p>You are visitor number <span style="color:aqua"><?php $hits; ?></span></p> 
            </div>
        </div>
        <div class="icon-bar">
            <a href="https://www.facebook.com/mayankkumar25" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a> 
            <a href="https://twitter.com/mayank_kumar25" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a> 
            <a href="https://www.instagram.com/mayankkumar100" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a> 
            <a href="https://www.linkedin.com/in/mayank-1" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
            <a href="https://github.com/mayank-1" class="github" target="_blank"><i class="fa fa-github"></i></a>
            <a href="https://www.youtube.com/way2tech" class="youtube" target="_blank"><i class="fa fa-youtube"></i></a> 
        </div>
        <script src="script.js"></script>
    </body>
</html>