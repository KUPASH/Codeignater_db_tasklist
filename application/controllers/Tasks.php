<?php

class Tasks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('tasks_model');
        session_start();
    }
    public function showtask()
    {
        if(isset($_SESSION['id']) && isset($_SESSION['login'])) {
            $row = $this->tasks_model->getAllTasksUser();

            $this->load->view('header');
            $this->load->view('tasks/showtask', ['tasks' => $row]);
            $this->load->view('footer');
        }
    }
    public function modified()
    {
        if(isset($_SESSION['id']) && isset($_SESSION['login'])) {
            $id = $this->input->get('edit');
            $row = $this->tasks_model->getTaskById($id);

            $this->load->view('header');
            $this->load->view('tasks/modified', ['tasks' => $row]);
            $this->load->view('footer');
        }
    }
    public function createtasks()
    {
        if(isset($_SESSION['id']) && isset($_SESSION['login'])) {
            $task = $this->input->post('task');
            $sql = $this->tasks_model->insertNewTask($task);
            header('location: /tasks/showtask');
        }
    }
    public function delete()
    {
        if(isset($_SESSION['id']) && isset($_SESSION['login'])) {
            $num_string = $this->input->get('del');
            $sql = $this->tasks_model->deleteTaskById($num_string);
        }
        header('Location: /tasks/showtask');
    }
    public function save()
    {
        if(isset($_SESSION['id']) && isset($_SESSION['login'])) {
            $newline = $this->input->get('modified');
            $id = $this->input->get('id');
            $sql = $this->tasks_model->saveNewTask($newline,$id);
        }
        header('Location: /tasks/showtask');
    }
}