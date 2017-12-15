<?php
    require_once('../admin/scripts/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $team = $_GET['team'];
    $team_name = mysqli_fetch_array(mysqli_query($con, "SELECT name FROM teams WHERE team_id='$team'"));
    echo '<h3>Dodaj mecz</h3><br><br><hr><br>
        <form action="/promnik/admin/panel/model/add_task.php?team='.$team.'" method="post">
        <label>Kolejka:</label>
        <select name="queue">';
    $queues = mysqli_query($con, "SELECT * FROM queues WHERE team_id='$team'");
    while($q = mysqli_fetch_assoc($queues)) {
        echo '<option value="'.$q['queue_id'].'">'.$q['number'].'</option>';
    }
    echo '</select><br>
        <label>Gospodarze:</label>
        <input type="text" value="'.$team_name[0].'" name="hosts" class="form-control col-md-4" required><br>
        <label>Goście:</label>
        <input type="text" name="guests" class="form-control col-md-4" required><br>
        <label>Data:</label>
        <input type="date" name="date" class="form-control col-md-4" required><br>
        <label>Godzina:</label>
        <input type="time" name="hour" class="form-control col-md-4" required><br>
        <input type="submit" value="Wyślij" class="btn btn-primary">
        </form>';
    mysqli_close($con); 
?>