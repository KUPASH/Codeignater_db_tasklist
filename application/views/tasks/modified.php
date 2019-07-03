<?php
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['login'])) {
    if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'localhost_table'
    );
    $sql = 'SELECT * FROM tasks WHERE user_id="' . $_SESSION['id'] . '"AND id=' . $id;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    }
}?>
<form action="save">
    <input type="text" name="modified" value="<?=$row['text']?>">
    <input type="hidden" name="id" value="<?=$id?>">
    <button type="submit">Save</button>
</form>