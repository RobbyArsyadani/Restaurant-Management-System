<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->model('Role_model','role');

        $this->form_validation->set_rules('role', 'role', 'required|trim');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        }

        else{
            $this->role->addRole();
            $this->session->set_flashdata('add_role','<div class="alert alert-success alert-dismissible fade show" role="alert">
            The new role is name has been added!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/role');   
        }
        
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');

        $this->session->set_flashdata('role_access','<div class="alert alert-success alert-dismissible fade show" role="alert">
        The access has been changed!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    }

    public function edit_role($id){
        $data['title'] = 'Edit Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Role_model','role');

        $data['role'] = $this->role->getRoleById($id);

        $this->form_validation->set_rules('role', 'role', 'required|trim');
        
        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit_role', $data);
            $this->load->view('templates/footer');
        }

        else{
            $this->role->editRole();
            $this->session->set_flashdata('edit_role','<div class="alert alert-success alert-dismissible fade show" role="alert">
            The role is name has been changed!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/role');   
        }

    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

    }

    public function delete_role($id){
        $this->load->model('Role_model','role');
        $this->role->deleteRole($id);
        $this->session->set_flashdata('delete_role','<div class="alert alert-success alert-dismissible fade show" role="alert">
        The role has been deleted!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/role');   
    }

    public function food(){
        $data['title'] = 'Manage Food';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('price', 'price', 'required|trim');
        $this->form_validation->set_rules('description', 'description', 'required|trim');

        $this->load->model('Products_model','product');
        $data['food'] = $this->product->getAllFoods();

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/food', $data);
            $this->load->view('templates/footer');
        }

        else{

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/img/products/food/';

            $this->load->library('upload', $config);

            if(! $this->upload->do_upload('image')){
                $error = array('error' => $this->upload->display_errors());
            }
            else{
                $image =  $this->upload->data();
                $image =  $image['file_name'];
                $name = $this->input->post('name', TRUE);
                $price = $this->input->post('price', TRUE);
                $description = $this->input->post('description', TRUE);
                
                $data = array(
                    'name' => $name,
                    'price' => $price,
                    'description' => $description,
                    'image' => $image
                );
                $this->db->insert('food', $data);
                $this->session->set_flashdata('add_food','<div class="alert alert-success alert-dismissible fade show" role="alert">
                New Food successfully added!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('admin/food/');
            }
        }
    }

    public function drink(){
        $data['title'] = 'Manage Drink';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('price', 'price', 'required|trim');
        $this->form_validation->set_rules('description', 'description', 'required|trim');

        $this->load->model('Products_model','product');
        $data['drink'] = $this->product->getAllDrinks();

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/drink', $data);
            $this->load->view('templates/footer');
        }

        else{

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/img/products/drink/';

            $this->load->library('upload', $config);

            if(! $this->upload->do_upload('image')){
                $error = array('error' => $this->upload->display_errors());
            }
            else{
                $image =  $this->upload->data();
                $image =  $image['file_name'];
                $name = $this->input->post('name', TRUE);
                $price = $this->input->post('price', TRUE);
                $description = $this->input->post('description', TRUE);
                
                $data = array(
                    'name' => $name,
                    'price' => $price,
                    'description' => $description,
                    'image' => $image
                );
                $this->db->insert('drink', $data);
                $this->session->set_flashdata('add_drink','<div class="alert alert-success alert-dismissible fade show" role="alert">
                New Drink successfully added!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('admin/drink');
            }
        }
    }
    
    public function edit_food($id)
    {
        $data['title'] = 'Edit Food';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');

        $this->load->model('Products_model','product');
        $data['food'] = $this->product->getFoodById($id);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit_food', $data);
            $this->load->view('templates/footer');
        }
        else {

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/img/products/food/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {

                $image =  $this->upload->data();
                $image =  $image['file_name'];

                $pid = $this->input->post('pid', TRUE);
                $name = $this->input->post('name', TRUE);
                $price = $this->input->post('price', TRUE);
                $description = $this->input->post('description', TRUE);
    
                $data = [
                    'id' => $pid,
                    'name' => $name,
                    'price' => $price,
                    'description' => $description,
                    'image' => $image
                ];
                
                $this->db->where('id', $this->input->post('pid'));
                $this->db->update('food', $data);
                    
                $this->session->set_flashdata('edit_food','<div class="alert alert-success alert-dismissible fade show" role="alert">
                The Food Successfully updated!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('admin/food');
            }

            else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function edit_drink($id)
    {
        $data['title'] = 'Edit Drink';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|trim');
        // $this->form_validation->set_rules('description', 'Description', 'required|trim');

        $this->load->model('Products_model','product');
        $data['drink'] = $this->product->getDrinkById($id);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit_drink', $data);
            $this->load->view('templates/footer');
        }
         else {

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/img/products/drink/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {

                $image =  $this->upload->data();
                $image =  $image['file_name'];

                $pid = $this->input->post('pid', TRUE);
                $name = $this->input->post('name', TRUE);
                $price = $this->input->post('price', TRUE);
                $description = $this->input->post('description', TRUE);
    
                $data = [
                    'id' => $pid,
                    'name' => $name,
                    'price' => $price,
                    'description' => $description,
                    'image' => $image
                ];
                
                $this->db->where('id', $this->input->post('pid'));
                $this->db->update('drink', $data);
                    
                $this->session->set_flashdata('edit_drink','<div class="alert alert-success alert-dismissible fade show" role="alert">
                The Drink Successfully updated!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('admin/drink');
            }

            else {
                echo $this->upload->display_errors();
            }
            
        }
    }

    public function deleteFood($id){
        $this->load->model('Products_model','product');
        $this->product->deleteFood($id);
        $this->session->set_flashdata('delete_food','<div class="alert alert-success alert-dismissible fade show" role="alert">
        The Food successfully deleted!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/food');   
    }

    public function deleteDrink($id){
        $this->load->model('Products_model','product');
        $this->product->deleteDrink($id);
        $this->session->set_flashdata('delete_drink','<div class="alert alert-success alert-dismissible fade show" role="alert">
        The Drink successfully deleted!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/drink');   
    }
}
