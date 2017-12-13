<?php
    require_once('../admin/scripts/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $team = $_GET['druzyna'];
    $team_name = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM teams WHERE team_id='$team'"));
    echo '<h3>Terminarz dla: '.$team_name[1].'</h3><br><br><hr>
        <a href="/promnik/admin/panel/model/add_queue.php?team='.$team.'">
        <button>Dodaj kolejkę</button></a>';
    if(mysqli_num_rows(mysqli_query($con, "SELECT * FROM queues WHERE team_id='$team'")) > 0) {
        echo '<a href="/promnik/admin/panel.php?strona=dodajmecz&team='.$team.'">
            <button>Dodaj mecz</button></a>'; 
    }
    echo '<br><br>';
    $queues = mysqli_query($con, "SELECT * FROM queues WHERE team_id='$team'");
    while($row = mysqli_fetch_array($queues)) {
        $q_id = $row[0];
        $schedule = mysqli_query($con, "SELECT * FROM schedules WHERE queue_id='$q_id'");
        $tasks = mysqli_num_rows($schedule);
            echo '<div class="row"><h4>Kolejka nr: '.$row[2].'</h4> (<a href="/promnik/admin/panel/model/del_q.php?id='.$q_id.'&team='.$team.'">Usuń</a>)<br>';
        if($tasks > 0) {
            echo '<table>
                    <tr><th>Gospodarze:</th><th>Wynik:</th><th>Goście:</th><th>Data:</th><th>Godzina:</th><tr>';
            while($s = mysqli_fetch_assoc($schedule)) {
                echo '<tr><form action="/promnik/admin/panel/model/edit_task.php?id='.$s['schedule_id'].'&team='.$team.'" method="post">
                        <td><input type="text" name="hosts" value="'.$s['hosts'].'"></td>
                        <td><input type="number" name="score_h" value="'.$s['score_hosts'].'"> : 
                        <input type="number" name="score_g" value="'.$s['score_guests'].'"></td>
                        <td><input type="text" name="guests" value="'.$s['guests'].'"></td>
                        <td><input type="date" name="date" value="'.$s['date'].'"></td>
                        <td><input type="time" name="hour" value="'.$s['hour'].'"></td>
                        <td><input type="submit" value="Zapisz"></td></form><td>
                        <a href="/promnik/admin/panel/model/del_task.php?id='.$s['schedule_id'].'&team='.$team.'">
                        <button>Usuń</button></a></td></tr>';
            
            }
            echo '</table></div>';
        }
    }
    mysqli_close($con);

?>