<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function food(){
        $data['title'] = 'Food';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Products_model','product');
        $data['food'] = $this->product->getAllFoods();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('product/food', $data);
        $this->load->view('templates/footer');
    }
    
    public function drink(){
        $data['title'] = 'Drink';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Products_model','product');
        $data['drink'] = $this->product->getAllDrinks();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('product/drink', $data);
        $this->load->view('templates/footer');
    }

    public function favorites(){
        $data['title'] = 'Favorites';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Products_model','product');
        $data['food'] = $this->product->getFoodFavorites();
        $data['drink'] = $this->product->getDrinkFavorites();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('product/favorites', $data);
        $this->load->view('templates/footer');
    }

    public function edit_food_favorites($id){
        $this->load->model('Products_model','product');
        $data['food'] = $this->product->getFoodById($id);
        $this->product->addFavoriteFood($id);

        $this->session->set_flashdata('edit_food_favorites','<div class="alert alert-success alert-dismissible fade show" role="alert">
        New Food successfully added!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('product/favorites');   
    }

    public function edit_drink_favorites($id){
        $this->load->model('Products_model','product');
        $data['drink'] = $this->product->getDrinkById($id);
        $this->product->addFavoriteDrink($id);

        $this->session->set_flashdata('edit_drink_favorites','<div class="alert alert-success alert-dismissible fade show" role="alert">
        New Drink successfully added!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('product/favorites');  
    }

    public function delete_food_favorites($id){
        $this->load->model('Products_model','product');
        $this->product->delete_food_favorites($id);
        $this->session->set_flashdata('delete_food_favorites','<div class="alert alert-success alert-dismissible fade show" role="alert">
        The Food successfully deleted!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('product/favorites');   
    }

    public function delete_drink_favorites($id){
        $this->load->model('Products_model','product');
        $this->product->delete_drink_favorites($id);
        $this->session->set_flashdata('delete_drink_favorites','<div class="alert alert-success alert-dismissible fade show" role="alert">
        The Drink successfully deleted!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('product/favorites');   
    }

}
