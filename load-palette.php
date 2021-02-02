<?php

    include "dbh.php";
    $paletteNewCount = $_POST['paletteNewCount'];

                $sql = "SELECT * FROM palette LIMIT $paletteNewCount";
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