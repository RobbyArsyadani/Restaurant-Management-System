<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Products_model extends CI_Model
{
    public function getAllFoods()
    {
        return $this->db->get('food')->result_array();
    }

    public function getAllDrinks()
    {
        return $this->db->get('drink')->result_array();
    }

    public function getFoodFavorites(){
        return $this->db->get_where('favorites_products',['product_id' => 1])->result_array();
    }

    public function getDrinkFavorites(){
        return $this->db->get_where('favorites_products',['product_id' => 2])->result_array();
    }

    public function getFoodById($id){
        return $this->db->get_where('food',['id' => $id])->row_array();
    }

    public function getDrinkById($id){
        return $this->db->get_where('drink',['id' => $id])->row_array();
    }
    
    
    public function addFavoriteFood($id){       
        $result = $this->db->get_where('food',['id' => $id])->row_array();

        $name = $result["name"];
        $price = $result["price"];
        $description = $result["description"];
        $image = $result["image"];

        $data = [
            'product_id' => 1,
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'image' => $image
        ];

        $this->db->insert('favorites_products', $data);
    }

    public function addFavoriteDrink($id){       
        $result = $this->db->get_where('drink',['id' => $id])->row_array();

        $name = $result["name"];
        $price = $result["price"];
        $description = $result["description"];
        $image = $result["image"];

        $data = [
            'product_id' => 2,
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'image' => $image
        ];

        $this->db->insert('favorites_products', $data);
    }

    public function deleteFood($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('food');
    }

    public function deleteDrink($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('drink');
    }

    public function delete_food_favorites($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('favorites_products');
    }

    public function delete_drink_favorites($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('favorites_products');
    }

}
