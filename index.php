<?php include "dbh.php"; ?>
<style>
    <?php include "style.css"; ?>
</style>

<!DOCTYPE html>
<html>
    <head>
        <title>Color Palette</title>
        <link rel="icon" type="image/png" href="logo.png"/>
        <script src="jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <script>   
            $(document).ready(function() {
                var paletteCount = 5;
                $("button").click(function() {
                    paletteCount = paletteCount + 5;
                    $("#palette").load("load-palette.php", {
                        paletteNewCount: paletteCount
                    });
                    if(paletteCount >= 120){
                        $("#load-btn").hide();
                    }
                });
            });
        </script>
    </head>
    <body>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-10">
                        <nav>
                            <img src="logo.png" alt="Colors">
                            <button>Download</button>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div id="hero">
                            <h1>Beautiful colors for<br>Designers and Artists</h1>
                            <p>Create the perfect palette or get inspired by thousands of beautiful color schemes.</p>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div id="palette">
                        <?php
                            $sql = "SELECT * FROM palette LIMIT 5";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $colorName = $row['colorName'];
                                    echo "<div style='background: $colorName' class='palette-item'>
                                        <p>$colorName</p>
                                    </div>";
                                }
                            }else{
                                echo "There are no palettes!";
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>

            <button id="load-btn">Load More</button>
    </body>
</html>