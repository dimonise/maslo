<?php

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\StaticPageModel;
use App\Controllers\Search as Search;
use App\Models\ContactModel;

class StaticPage extends Controller {

    public $locale;
    public $search;
    public $model;
    public $contact;

    public function __construct() {
        $this->locale = service('request')->getLocale();
        $this->search = new Search();
        $this->model = new StaticPageModel();
        $this->contact = new ContactModel();
        helper('menu');
    }

    public function about() {

        $data['locale'] = $this->locale;
        $data['page'] = $this->model->getPage(1);


        $data['title'] = lang('Language.about');
        $data['tree'] = menu();

        $data['search'] = $this->search->index();
        $data['contact'] = $this->contact->index();
        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);
        $data['keys'] = $data['page'][0]['keywords_stat_' . $this->locale];
        $data['des'] = $data['page'][0]['description_stat_' . $this->locale];
        echo view('templates/header', $data);
        echo view('static/page', $data);
        echo view('templates/footer');
    }

    public function delivery() {

        $data['locale'] = $this->locale;
        $data['page'] = $this->model->getPage(2);


        $data['title'] = lang('Language.about');
        $data['locale'] = $this->locale;

        $data['tree'] = menu();

        $data['search'] = $this->search->index();
        $data['contact'] = $this->contact->index();
        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);
        $data['keys'] = $data['page'][0]['keywords_stat_' . $this->locale];
        $data['des'] = $data['page'][0]['description_stat_' . $this->locale];
        echo view('templates/header', $data);
        echo view('static/page', $data);
        echo view('templates/footer');
    }

    public function contact() {

        $data['locale'] = $this->locale;

        $data['title'] = lang('Language.contact');
        $data['locale'] = $this->locale;

        $data['tree'] = menu();

        $data['search'] = $this->search->index();
        $data['contact'] = $this->contact->index();
        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);

        echo view('templates/header', $data);
        echo view('static/contact', $data);
        echo view('templates/footer');
    }

    public function oferta() {

        $data['locale'] = $this->locale;
        $data['page'] = $this->model->getPage(3);
        $data['title'] = lang('Language.oferta');
        $data['locale'] = $this->locale;
        $data['contact'] = $this->contact->index();
        $data['tree'] = menu();

        $data['search'] = $this->search->index();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);
        $data['keys'] = $data['page'][0]['keywords_stat_' . $this->locale];
        $data['des'] = $data['page'][0]['description_stat_' . $this->locale];
        echo view('templates/header', $data);
        echo view('static/page', $data);
        echo view('templates/footer');
    }

    public function terms() {

        $data['locale'] = $this->locale;
        $data['page'] = $this->model->getPage(4);
        $data['title'] = lang('Language.terms');
        $data['locale'] = $this->locale;
        $data['contact'] = $this->contact->index();
        $data['tree'] = menu();
        $data['keys'] = $data['page'][0]['keywords_stat_' . $this->locale];
        $data['des'] = $data['page'][0]['description_stat_' . $this->locale];
        $data['search'] = $this->search->index();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);

        echo view('templates/header', $data);
        echo view('static/page', $data);
        echo view('templates/footer');
    }

}
