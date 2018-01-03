<?php

    function main_page($con ,$results) {
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
                    $content = implode('', $content);
                }
                else {
                    $content = $row['content'];
                }
                echo '<cite>'.$content.'</cite></article>';
            }
    } 
    
    function show_post($con, $id) {
        $post = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM posts WHERE id_post='$id'"));
        echo '<h5 class="col-12 title">'.$post['title'].'</h5>
            <sup><p><i style="padding-left: 1.5em" class="fa fa-calendar" aria-hidden="true"></i>
            <cite>'.$post['date'].' '.$post['author'].'</cite></p></sup>
            <div class="col-lg-10 col-12 row" id="post"><p class="col-12" style="padding-bottom: 2em">'.$post['content'].'</p>';
        $pictures = mysqli_query($con, "SELECT * FROM posts_pictures WHERE id_post='$id'");
        while ($picture = mysqli_fetch_array($pictures)) {
            echo '<figure class="col-lg-9 col-md-10 col-12"><img class="post_photo" src="/promnik/img/posts/'.$picture[2].'"></figure>';
        }
        echo '</div>';
    }

    function players($con, $id) {
        $team_name = mysqli_fetch_array(mysqli_query($con, "SELECT name FROM teams WHERE team_id='$id'"));
        $players = mysqli_query($con, "SELECT * FROM players WHERE team_id='$id' ORDER BY number ASC");
        echo '<h3 class="col-12">Tabela zawodników '.$team_name[0].'</h3>';
    }
?>