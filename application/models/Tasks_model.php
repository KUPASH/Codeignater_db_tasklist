<?php

class Tasks_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getAllTasksUser()
    {
        $sql = $this->db->select('*')->from('tasks')->where('user_id', $_SESSION['id'])->get();
        $row = $sql->result();
        return $row;
    }
    public function getTaskById($id)
    {
        $sql = $this->db->select('*')->from('tasks')->where('user_id',$_SESSION['id'])->where('id',$id)->get();
        $row = $sql->result();
        return $row;
    }
    public function insertNewTask($task)
    {
        $data = ['text' => $task, 'user_id' => $_SESSION['id']];
        $sql = $this->db->insert('tasks', $data);
    }
    public function deleteTaskById($num_string)
    {
        $sql = $this->db->delete('tasks',['user_id' => $_SESSION['id'], 'id' => $num_string]);
    }
    public function saveNewTask($newline,$id)
    {
        $data = ['id' => $id, 'user_id' => $_SESSION['id'], 'text' => $newline];
        $sql = $this->db->replace('tasks', $data);
    }
}

