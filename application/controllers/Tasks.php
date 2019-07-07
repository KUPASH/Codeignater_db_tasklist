<?php

class Tasks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function showtask()
    {
        session_start();

        $sql = $this->db->select('*')->from('tasks')->where('user_id',$_SESSION['id'])->get();
        $row = $sql->result();

        $this->load->view('header');
        $this->load->view('tasks/showtask', ['tasks' => $row]);
        $this->load->view('footer');
    }
    public function modified()
    {
        session_start();

        if(isset($_SESSION['id']) && isset($_SESSION['login'])) {
            $id = $this->input->get('edit');
            $sql = $this->db->select('*')->from('tasks')->where('user_id',$_SESSION['id'])->where('id',$id)->get();
            $row = $sql->result();
        }

        $this->load->view('header');
        $this->load->view('tasks/modified', ['tasks' => $row]);
        $this->load->view('footer');
    }
    public function createtasks()
    {
        session_start();
        $task = $this->input->post('task');
        $data = ['text' => $task, 'user_id' => $_SESSION['id']];
        $sql = $this->db->insert('tasks',$data);
        header('location: /tasks/showtask');
    }
    public function delete()
    {
        session_start();

        if(isset($_SESSION['id']) && isset($_SESSION['login'])) {
            $num_string = $this->input->get('del');
            $sql = $this->db->delete('tasks',['user_id' => $_SESSION['id'], 'id' => $num_string]);
        }
        header('Location: /tasks/showtask');
    }
    public function save()
    {
        session_start();

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
        session_start();
        session_unset();
        session_destroy();
        header('location: /auth');
    }
}