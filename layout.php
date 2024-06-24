<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Working with PHP and MySQL</title>
    <link rel="stylesheet" href="layout.css">
</head>
<body>
    <br>
    <center>
    <div id="form">
        <?php
        include_once 'crud.php';
        
        // Fetch all data from the database
        $res = $MySQLiconn->query("SELECT * FROM students");
        ?>
        <!-- Output Database Form -->
        <table width="100%" border="1" cellpadding="15" align="center">
            <?php
            // Loop through each row of data and display it
            while($row = $res->fetch_array()) {
            ?>
            <div class=card>
                <div class="image"><img src="<?php echo $row['photo']; ?>"></div>
                <div class="details">
                    <div class="name"><?php echo $row['fn']; ?></div>
                    <div class="name"><?php echo $row['ln']; ?></div>
                    <p class="job-txt">Aspiring to be:</p><div class="job"><?php echo $row['job']; ?></div>
                    <p class="word-txt">Known to Say:</p><div class="words"><?php echo $row['words']; ?></div>
                    <p class="insp-txt">Inspiration:</p><div class="inspire"><?php echo $row['inspire']; ?></div>
                    <p class="dis-txt">Dislikes:</p><div class="dislike"><?php echo $row['dislike']; ?></div>
                </div>
                    <div class="edit"><a href="edit.php?edit=<?php echo $row['id']?>" onclick="return confirm('Would you like to edit this entry?'); " >edit</a></div>
                    <div class="del"><a href="crud.php?del=<?php echo $row['id']?>" onclick="return confirm('Would you like to delete this record?'); " >delete</a></div>
            </div>
            <?php
            }
            ?>
        </table>
        </center>
    </div>
</body>
</html>