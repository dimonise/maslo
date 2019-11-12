<?php
/**
 * Created by PhpStorm.
 * User: димон
 * Date: 13.10.2019
 * Time: 10:31
 */

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\NewsModel;


class News extends Controller
{
    public $locale;

    public function __construct()
    {
        $this->locale = service('request')->getLocale();
    }

    public function index()
    {

        $model = new NewsModel();
        $data = [
            'locale' => $this->locale,
            'news' => $model->getNews(),
            'title' => 'News archive',
        ];

        echo view('templates/header', $data);
        echo view('news/overview', $data);
        echo view('templates/footer');
    }

    public function view($id_news = null)
    {

        $data['locale'] = $this->locale;
        $model = new NewsModel();
        $data['news'] = $model->getNews($id_news);
        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $id_news);
        }

        $data['title'] = $data['news']['title_news_' . $this->locale];

        echo view('templates/header', $data);
        echo view('news/view', $data);
        echo view('templates/footer');
    }
}