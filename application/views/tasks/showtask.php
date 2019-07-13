<?php

echo 'Hello, ' . $_SESSION['login'] . '!';?>
<form method="post" action="createtasks">
    Your new task: <input name="task">
    <button type="submit">Create</button>
</form>
<a href="/auth/logout">Logout</a> </br> <?

echo '<table border="1">';
foreach ($tasks as $file) {
echo '<tr><td>' . $file->text . '</td>
    <td><a href="delete?del=' . $file->id . '">X</a></td>
    <td><a href="modified?edit=' . $file->id . '">Modified</a></td></tr>';
};
echo '</table>';





