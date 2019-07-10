<?php

class Tasks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        session_start();
    }
    public function showtask()
    {
        if(isset($_SESSION['id']) && isset($_SESSION['login'])) {
            $sql = $this->db->select('*')->from('tasks')->where('user_id', $_SESSION['id'])->get();
            $row = $sql->result();

            $this->load->view('header');
            $this->load->view('tasks/showtask', ['tasks' => $row]);
            $this->load->view('footer');
        }
    }
    public function modified()
    {
        if(isset($_SESSION['id']) && isset($_SESSION['login'])) {
            $id = $this->input->get('edit');
            $sql = $this->db->select('*')->from('tasks')->where('user_id',$_SESSION['id'])->where('id',$id)->get();
            $row = $sql->result();

            $this->load->view('header');
            $this->load->view('tasks/modified', ['tasks' => $row]);
            $this->load->view('footer');
        }
    }
    public function createtasks()
    {
        if(isset($_SESSION['id']) && isset($_SESSION['login'])) {
            $task = $this->input->post('task');
            $data = ['text' => $task, 'user_id' => $_SESSION['id']];
            $sql = $this->db->insert('tasks', $data);
            header('location: /tasks/showtask');
        }
    }
    public function delete()
    {
        if(isset($_SESSION['id']) && isset($_SESSION['login'])) {
            $num_string = $this->input->get('del');
            $sql = $this->db->delete('tasks',['user_id' => $_SESSION['id'], 'id' => $num_string]);
        }
        header('Location: /tasks/showtask');
    }
    public function save()
    {
        if(isset($_SESSION['id']) && isset($_SESSION['login'])) {
            $newline = $this->input->get('modified');
            $id = $this->input->get('id');
            $data = ['id' => $id, 'user_id' => $_SESSION['id'], 'text' => $newline];
            $sql = $this->db->replace('tasks', $data);
        }
        header('Location: /tasks/showtask');
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        header('location: /auth');
    }
}