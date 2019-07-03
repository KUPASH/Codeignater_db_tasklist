<?php
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
error_reporting(E_ALL);

if(isset($_SESSION['id']) && isset($_SESSION['login'])) {
    echo 'Hello ' . $_SESSION['login'] . '!';?>
    <form method="post" action="createtasks">
        Your new task: <input name="task">
        <button type="submit">Create</button>
    </form>
    <a href="logout">Logout</a> </br> <?

    echo '<table border="1">';
    foreach ($tasks as $file) {
    echo '<tr><td>' . $file[1] . '</td>
        <td><a href="delete?del=' . $file[0] . '">X</a></td>
        <td><a href="modified?edit=' . $file[0] . '">Modified</a></td></tr>';

    };
    echo '</table>';
}



