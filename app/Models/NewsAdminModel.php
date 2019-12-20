<?php
namespace App\Models;


use CodeIgniter\Model;
 
class NewsAdminModel extends Model
{
    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('news');
//        $this->link = $this->db->table('product_cat_link');
//        $this->har = $this->db->table('product_feature_val');
//        $this->img = $this->db->table('product_img');
    }
    
    /*
     * Get news by id_news
     */
    function get_news($id_news)
    {
        return $this->builder->where('id_news',$id_news)->get()->getResultArray();
    }
        
    /*
     * Get all news
     */
    function get_all_news()
    {
        $this->db->order_by('id_news', 'desc');
        return $this->db->get('news')->result_array();
    }
        
    /*
     * function to add new news
     */
    function add_news($params)
    {
        $this->builder->insert($params);
        return $this->db->insertID();
    }
    
    /*
     * function to update news
     */
    function update_news($id_news,$params)
    {
        $this->builder->where('id_news',$id_news);
        return $this->builder->update($params);
    }
    
    /*
     * function to delete news
     */
    function delete_news($id_news)
    {
        return $this->builder->delete(['id_news'=>$id_news]);
    }

    /*
     * function update image
     */
    function save_img($news_id, $img)
    {
        $data = $this->builder->where('id_news',$news_id)->get()->getResultArray();
        if (count($data[0]) > 0) {
            $this->builder->where('id_news', $news_id);
            $this->builder->update($img);
        }

    }
}
