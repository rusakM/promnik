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

    function team($con, $id) {
        $team = mysqli_fetch_array(mysqli_query($con, "SELECT name, team_photo FROM teams WHERE team_id='$id'"));
        $players = mysqli_query($con, "SELECT * FROM players WHERE team_id='$id' ORDER BY number ASC");
        echo '<script src="../promnik/js/chg_bg.js"></script>
                <script>chg_bg("'.$team[1].'")</script>
            <h3 class="col-12 set_heading_position">Lista zawodników '.$team[0].':</h3>
                <div class="col-md-1"></div>
                <article class="col-md-10 col-12 row" style="padding-left: 0; padding-right: 0; margin-left: 0; margin-right: 0;">';
        while($player = mysqli_fetch_assoc($players)) {
            echo '<div class="col-lg-4 col-md-6 col-12 row" style="margin-left: 0; margin-right: 0;">
                    <figure class="player_container text-center">
                        <img src="/promnik/img/players/'.$player['photo'].'" class="player_photo">
                        <h6>'.$player['number'].'. '.$player['name'].' '.$player['surname'].'</h6>
                        <cite>Data urodzenia: '.$player['birth_date'].'</cite></small>
                    </figure>
                </div>';
           
        }
        echo '</article>';
    }

    function scheduler($con, $id) {
        $queues = [];
        $queue_q = mysqli_query($con, "SELECT queue_id, number FROM queues WHERE team_id='$id' ORDER BY number ASC");
        while($queue = mysqli_fetch_array($queue_q)) {
            array_push($queues, $queue);
        }
        $team_name = mysqli_fetch_array(mysqli_query($con, "SELECT name FROM teams WHERE team_id='$id'"));
        $nearest_match = mysqli_fetch_array(mysqli_query($con, "SELECT schedules.hosts, schedules.guests, schedules.date, schedules.hour FROM schedules, queues WHERE schedules.score_hosts = '-' AND schedules.score_guests='-' AND schedules.queue_id = queues.queue_id AND queues.team_id=1 ORDER BY schedules.date ASC, schedules.hour ASC LIMIT 1"));
        
        echo '<h3 class="col-12 set_heading_position" style="margin-right: 0; padding-right: 0">Terminarz '.$team_name[0].':</h3>
                <div class="col-md-1"></div>
                <article class="col-md-10 col-12 row" style="padding-left: 0; padding-right: 0; margin-left: 0; margin-right: 0;">';
        if($nearest_match != '') {
            echo '<div class="col-12" id="important_pop">
                    <h5 class="col-12">Najbliższy mecz:</h5>
                    <p>
                        '.$nearest_match[0].' : '.$nearest_match[1].' <i class="fa fa-calendar" aria-hidden="true"></i> '.$nearest_match[2].' <i class="fa fa-clock-o" aria-hidden="true"></i> '.$nearest_match[3].
                    '</p>
                </div>';
        }
        
        for($a = 0; $a < count($queues); $a++) {
            $curr_q = $queues[$a][0];
            $schedule_q = mysqli_query($con, "SELECT * FROM schedules WHERE queue_id='$curr_q' ORDER BY date ASC, hour ASC");
            $num_schedules = mysqli_num_rows($schedule_q);
            echo '<div class="col-12 row form-control reset">
                    <h5 class="col-12">Kolejka: '.$queues[$a][1].'</h5>';
            if($num_schedules > 0) {
                echo'<table class="col-12 row text-center reset">
                        <tbody class="col-12 row reset">';
                while($schedule = mysqli_fetch_array($schedule_q)) {
                    echo '<tr class="col-12 row reset"><td class="col-4 reset">'.$schedule[2].'</td><td class="col-2 reset">'.$schedule[6].' : '.$schedule[7].'</td><td class="col-4 reset">'.$schedule[3].'</td><td class="reset col-2"><i class="fa fa-calendar" aria-hidden="true"></i> '.$schedule[4].'<br><i class="fa fa-clock-o" aria-hidden="true"></i> '.$schedule[5].'</td></tr>';
                }
                echo '</tbody></table>';
            }
            else {
                echo '<p>Brak meczy w tej kolejce</p>';
            }
            echo '</div>';
        }
        echo '</article>';
    }

    function contact() {
        echo '<h3 class="col-12 set_heading_position">Kontakt:</h3>
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <i class="fa fa-phone" aria-hidden="true"></i> 501 857 504<br>
                    <i class="fa fa-facebook-square" aria-hidden="true"></i> 
                        <a href="https://www.facebook.com/UKSPromnik/"> Facebook</a>
                </div>
';
    }

    function sponsors($con) {
        $sponsors = mysqli_query($con, "SELECT photo FROM sponsors");
        echo '<h3 class="col-12 set_heading_position">Sponsorzy</h3>
            <div class="col-md-2"></div>
            <div class="col-md-8 row">';
        while($sponsor = mysqli_fetch_array($sponsors)) {
            echo '<img src="/promnik/img/sponsors/'.$sponsor[0].'" class="col-12 sponsor_img" width="100%" height="100%">';
        }
        echo '</div><div class="col-md-2"></div>';
    }
?>