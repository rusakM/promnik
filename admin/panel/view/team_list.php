<?php
function team_list() {
    require_once('../admin/scripts/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $q = mysqli_query($con, "SELECT * FROM teams");
    echo '<br><h3>Menadżer drużyn</h3><br><hr>';
    if($_SESSION['usr_name'] === 'Mateusz Rusak') {
        echo '<form action="../admin/panel/model/team_add.php" method="post" class="row">
            <div class="col-md-1"></div>
            <input type="text" name="team" placeholder="Wpisz nazwę nowej drużyny" class="form-control col-md-6">
            <input type="submit" value="Dodaj drużynę" class="btn">
            </form>
            <br><hr>';
    }
    else {
        echo '<hr><br>';
    }
    $i = 1;
    echo '<div class="row"><div class="col-md-1"></div><div class="col-md-10">';
    while($row = mysqli_fetch_array($q)) {
        if($row[0] == 2) {
            echo "<br><hr><p>Juniorzy:</p><br>";
        }
        echo '<span>'.$i.'. <a href="/promnik/admin/panel.php?strona=edytujdruzyne&id='.$row[0].'">'.$row[1].'</a> <a href="../admin/panel.php?strona=zawodnicy&druzyna='.$row[0].'"><button class="btn">Kadra</button></a><a href="../admin/panel.php?strona=terminarz&druzyna='.$row[0].'"><button class="btn">Terminarz</button></a></span><br><br>';
        $i++;
    }
    echo '</div></div>';
    mysqli_close($con);
}
    
?>