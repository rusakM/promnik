<?php
    $id = $_GET['id'];
    require_once('../admin/scripts/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $arr = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM posts WHERE id_post='$id'"));
    echo '<br><h3> Edytujesz post z dnia: '.$arr['date'].'</h3><br><hr><br>
            <form action="/promnik/admin/panel/model/edit_post.php?edit=title&id='.$id.'" method="post">
                <label>Tytuł: </label>
                <input type="text" required value="'.$arr['title'].'" name="title" class="form-control col-md-7">
                <input type="submit" value="Zapisz">
            </form>
            <form action="/promnik/admin/panel/model/edit_post.php?edit=content&id='.$id.'" method="post">
                <label>Treść: </label>
                <textarea name="content" class="form-control col-md-7" required>'.$arr['content'].'</textarea>
                <input type="submit" value="Zapisz">
                </form><br>
                <label>Obrazki:</label><br>
                <div id="img-container">
                <div class="row">';
    $query = mysqli_query($con, "SELECT * FROM posts_pictures WHERE id_post='$id'");
    while($pic = mysqli_fetch_assoc($query)) {
        echo '<div class="col-sm-2"><img src="/promnik/img/posts/'.$pic['name'].'" style="width: 100%"><a href="/promnik/admin/panel/model/edit_post.php?id='.$id.'&pic='.$pic['id_picture'].'&edit=delete_img"><button class="btn">X</button></a></div>';
    }
    echo '</div><br><form class="form-control col-md-7" action="/promnik/admin/panel/model/edit_post.php?id='.$id.'&edit=new_picture" enctype="multipart/form-data" method="post">
        <input type="file" name="new_pic">
        <input type="submit" value="Zapisz">
    </form>';
    mysqli_close($con);
?>
