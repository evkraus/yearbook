<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//include 'file.php' add content from one to another
include_once 'db.php';

/* code for data insert*/
// isset() determines if a variable contains a value, returns 'true'
if(isset($_POST['save']))
{
    //records the data that a user filled in the form, into a php variable
    $fn = $MySQLiconn->real_escape_string($_POST['fn']);
    $ln = $MySQLiconn->real_escape_string($_POST['ln']);
    $job = $MySQLiconn->real_escape_string($_POST['job']);
    $words = $MySQLiconn->real_escape_string($_POST['words']);
    $inspire = $MySQLiconn->real_escape_string($_POST['inspire']);
    $dislike = $MySQLiconn->real_escape_string($_POST['dislike']);

    //Writes the data from those variables, into the table fields
    //query("INSERT  INTO tablename (fieldname1, fieldname2) VALUES ('data','data')");
    $SQL = $MySQLiconn->query("INSERT INTO students(fn,ln,job,words,inspire,dislike, photo) VALUES('$fn','$ln','$job','$words','$inspire','$dislike', 'evankraus.jpg')");


    if(!$SQL){
        echo $MySQLiconn->error;
    }
}

if(isset($_GET['edit']))
{
    $SQL = $MySQLiconn->query("SELECT * FROM students WHERE id=".$_GET['edit']);
    $getROW = $SQL->fetch_array();
}
/* CODE DATA FOR DELETE */
//isset() determines if the user has clicked a delete button
if(isset($_GET['del']))
{
    //query("DELETE FROM table_name WHERE id="id#1");
    $SQL = $MySQLiconn->query("DELETE FROM students WHERE id=".$_GET['del']);
    // header(); PHP method that redirects the user back to the index.php or main document for results
    header("Location: edit.php");
    }

if(isset($_POST['update']))
{
    // after the user edits the data, UPSATE writes those changes to the form fields
    // UPDATE table_name SET dbField1='formField1', dbField2='formField2' WHERE id="fieldButtonEdit)
    $SQL = $MySQLiconn->query("UPDATE students SET fn='".$_POST['fn']."', ln='".$_POST['ln']."', job='".$_POST['job']."', words='".$_POST['words']."', inspire='".$_POST['inspire']."', dislike='".$_POST['dislike']."'WHERE id=".$_GET['edit']);
    header("Location: edit.php");
    }

?>