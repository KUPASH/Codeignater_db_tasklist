<?php

class Tasks extends CI_Controller
{
    public function showtask()
    {
        $this->load->view('header');
        $this->load->view('tasks/showtask');
        $this->load->view('footer');
    }
    public function modified()
    {
        $this->load->view('header');
        $this->load->view('tasks/modified');
        $this->load->view('footer');
    }
    public function createtasks()
    {
        ini_set('display_errors', true);
        ini_set('display_startup_errors', true);
        error_reporting(E_ALL);
        session_start();

        if (isset ($_POST['task'])) {
            $task = $_POST['task'];
            $conn = mysqli_connect(
                'localhost',
                'root',
                '',
                'localhost_table'
            );
            $sql = 'INSERT INTO tasks (text, user_id) VALUES ("' . $task . '",' . $_SESSION['id'] . ')';
            mysqli_query($conn, $sql);
            header('location: showtask');
        }

    }
    public function delete()
    {
        ini_set('display_errors', true);
        ini_set('display_startup_errors', true);
        error_reporting(E_ALL);
        session_start();

        if(isset($_SESSION['id']) && isset($_SESSION['login'])) {
            if (isset($_GET['del'])) {
                $num_string = $_GET['del'];
                $conn = mysqli_connect(
                    'localhost',
                    'root',
                    '',
                    'localhost_table'
                );
                $sql = 'DELETE FROM tasks WHERE user_id="' . $_SESSION['id'] . '"AND id=' . $num_string;
                mysqli_query($conn, $sql);
            }
        }
        header('Location: showtask');
    }
    public function save()
    {

        ini_set('display_errors', true);
        ini_set('display_startup_errors', true);
        error_reporting(E_ALL);
        session_start();

        if(isset($_SESSION['id']) && isset($_SESSION['login'])) {
            if (isset($_GET['modified']) & isset($_GET['id'])) {
                $newline = $_GET['modified'];
                $id = $_GET['id'];
                $conn = mysqli_connect(
                    'localhost',
                    'root',
                    '',
                    'localhost_table'
                );
                $sql = 'UPDATE tasks SET text="' . $newline . '" WHERE user_id="' . $_SESSION['id'] . '"AND id=' . $id;
                mysqli_query($conn, $sql);
                mysqli_close($conn);
            }
        }
        header('Location: showtask');
    }

}