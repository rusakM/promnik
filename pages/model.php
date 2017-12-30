<?php

    
    function main_page($results) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/promnik/admin/panel/connect.php');
        $con = mysqli_connect($host, $usr, $pass, $db);
        $query = mysqli_query($con, "SELECT * FROM posts ORDER BY id_post DESC");
        $rows = mysqli_num_rows($query);
        echo '<h3 class="col-12">Aktualności:</h3><br><br>';
        if($rows <= $results) {
            results($rows, $query);
        }
        else {
            results($results, $query);
        }
        if ($rows > $results) {
            $res = $results + 10;
            echo '<div class="col-12 row">
                    <div class="col-lg-4 col-md-3"></div>
                    <a href="index.php?wyniki='.$res .'" class="col-lg-4 col-md-6 col-12 row clear-decoration">
                        <button class="col-12 btn green_btn">Pokaż starsze posty</button>
                    </a>
                 </div> ';
        }
        
    }


    function results($reps, $query) {
        for($a = 0; $a < $reps; $a++) {
                $row = mysqli_fetch_array($query);
                echo '<article class="col-md-6 col-12"><p><b><a href="index.php?strona=post&id='.$row['id_post'].'">'.$row['title'].'</a></b></p>
                        <sup><p><i class="fa fa-calendar" aria-hidden="true"></i>
                            <cite>'.$row['date'].'</cite></p></sup>';
                $content = [];
                if(strlen($row['content']) > 150) {
                    for($b = 0; $b < 150; $b++) {
                        array_push($content, $row['content'][$b]);
                    }
                    array_push($content, '...');
                    $content = implode("", $content);
                }
                else {
                    $content = $row['content'];
                }
                echo '<cite>'.$content.'</cite></article>';
            }
    } 
?>