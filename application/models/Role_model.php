<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{
    public function editRole()
    {
        $data = [
            "id" => $this->input->post('id',true),
            "role" => $this->input->post('role',true)
        ];

        $this->db->where('id',$this->input->post('id'));
        $this->db->update('user_role',$data);
    }

    public function addRole()
    {
        $data = [
            "id" => '',
            "role" => $this->input->post('role',true)
        ];

        $this->db->insert('user_role', $data);
    }

    public function getRoleById($id)
    {
        return $this->db->get_where('user_role',['id' => $id])->row_array();
    }

    public function deleteRole($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('user_role');
    }
}
