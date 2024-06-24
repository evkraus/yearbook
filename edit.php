<?php
include_once 'crud.php';

// Check if the update button is clicked
if(isset($_POST['update'])) {
    // Perform the update operation as before
    $SQL = $MySQLiconn->query("UPDATE students SET fn='".$_POST['fn']."', ln='".$_POST['ln']."', job='".$_POST['job']."', words='".$_POST['words']."', inspire='".$_POST['inspire']."', dislike='".$_POST['dislike']."'WHERE id=".$_GET['edit']);

    // Check if the update operation was successful
    if($SQL) {
        // Redirect to layout.php after updating
        header("Location: layout.php");
        exit(); 
    }
} elseif (isset($_POST['save'])) {
    // Perform the insert operation for new data
    $fn = $MySQLiconn->real_escape_string($_POST['fn']);
    $ln = $MySQLiconn->real_escape_string($_POST['ln']);
    $job = $MySQLiconn->real_escape_string($_POST['job']);
    $words = $MySQLiconn->real_escape_string($_POST['words']);
    $inspire = $MySQLiconn->real_escape_string($_POST['inspire']);
    $dislike = $MySQLiconn->real_escape_string($_POST['dislike']);

    $SQL = $MySQLiconn->query("INSERT INTO students(fn,ln,job,words,inspire,dislike, photo) VALUES('$fn','$ln','$job','$words','$inspire','$dislike', 'evankraus.jpg')");

    if($SQL) {
        // Redirect to layout.php after inserting
        header("Location: layout.php");
        exit();
    } else {
        echo $MySQLiconn->error;
    }
}

// Fetch data if editing
if(isset($_GET['edit'])) {
    $SQL = $MySQLiconn->query("SELECT * FROM students WHERE id=".$_GET['edit']);
    $getROW = $SQL->fetch_array();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Working with PHP and MySQL</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <center>
        <div id="header">
            <label>C.R.U.D.</label>
        </div>
    <br>
    <div id="form">
    <form method="post">
        <table width="100%" border="1" cellpadding="15">
            <tr>
                <td><input type="text" name="fn" placeholder="First Name" value="<?php if(isset($_GET ['edit'])) echo $getROW['fn']; ?>"></td>
                <td><input type="text" name="ln" placeholder="Last Name" value="<?php if(isset($_GET ['edit'])) echo $getROW['ln']; ?>"></td>
                <td><input type="text" name="job" placeholder="Aspiring to be:" value="<?php if(isset($_GET ['edit'])) echo $getROW['job']; ?>"></td>
                <td><input type="text" name="words" placeholder="Known to Say/Famous Last Words:" value="<?php if(isset($_GET ['edit'])) echo $getROW['words']; ?>"></td>
                <td><input type="text" name="inspire" placeholder="I'm Inspired by" value="<?php if(isset($_GET ['inspire'])) echo $getROW['inspire']; ?>"></td>
                <td><input type="text" name="dislike" placeholder="I Dislike" value="<?php if(isset($_GET ['dislike'])) echo $getROW['dislike']; ?>"></td>
            </tr>
        <tr>
        <td>
        <?php if (isset($_GET['edit'])) : ?>
            <button type="submit" name="update"> Update </button>
        <?php else : ?>
            <button type="submit" name="save"> Save </button>
        <?php endif; ?>
        </td>
    </tr>
    </table>
    </form>
    </div>
</body>
</html>