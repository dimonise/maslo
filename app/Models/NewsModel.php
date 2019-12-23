<?php
/**
 * Created by PhpStorm.
 * User: димон
 * Date: 13.10.2019
 * Time: 10:36
 */

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class NewsModel extends Model
{
    protected $table = 'news';

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('news');
    }

    public function getNews($id_news = false)
    {
        if ($id_news === false)
        {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id_news' => $id_news])
            ->orderBy('id_news')
            ->first();
    }

    public function lastFour(){
        return $this->builder->limit(4)->orderBy('id_news','desc')->get()->getResultArray();
    }
}