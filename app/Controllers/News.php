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
use App\Controllers\Search as Search;
use App\Models\ContactModel;

class News extends Controller {

    public $locale;
    public $search;
    public $model;
    public $contact;

    public function __construct() {
        $this->locale = service('request')->getLocale();
        $this->search = new Search();
        $this->model = new NewsModel();
        $this->contact = new ContactModel();
        helper('menu');
    }

    public function index() {


        $data['locale'] = $this->locale;
        $data['title'] = lang('Language.news-title');
        $data['tree'] = menu();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);
        $data['search'] = $this->search->index();
        $data['contact'] = $this->contact->index();
        $data['news'] = $this->model->paginate(12);
        $data['pager'] = $this->model->pager;

        echo view('templates/header', $data);
        echo view('news/overview', $data);
        echo view('templates/footer');
    }

    public function view($id_news = null) {

        $data['locale'] = $this->locale;
        $data['news'] = $this->model->getNews($id_news);
        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $id_news);
        }

        $data['title'] = $data['news']['title_news_' . $this->locale];
        $data['locale'] = $this->locale;
        //$data['title'] = 'Главная';
        $data['tree'] = menu();

        $data['search'] = $this->search->index();
        $data['contact'] = $this->contact->index();
        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);

        echo view('templates/header', $data);
        echo view('news/view', $data);
        echo view('templates/footer');
    }

}
