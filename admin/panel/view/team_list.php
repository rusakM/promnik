<?php
function team_list() {
    require_once('../admin/scripts/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $q = mysqli_query($con, "SELECT * FROM teams");
    echo '<h3>Menadżer drużyn</h3><br><br>';
    if($_SESSION['usr_name'] === 'Mateusz Rusak') {
        echo '<form action="../admin/panel/model/team_add.php" method="post">
            <input type="text" name="team">
            <input type="submit" value="Dodaj drużynę">
            </form>
            <br><hr>';
        $i = 1;
    }
    while($row = mysqli_fetch_array($q)) {
        echo '<span class="row">'.$i.'. '.$row[1].' <a href="../admin/panel.php?strona=zawodnicy&druzyna='.$row[0].'"><button>Kadra</button></a><a href="../admin/panel.php?strona=terminarz&druzyna='.$row[0].'"><button>Terminarz</button></a></span>';
        $i++;
    }
    mysqli_close($con);
}
    
?>