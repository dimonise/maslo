<?php

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Helpers\Menu;
use App\Models\CatalogModel;
use App\Controllers\Search as Search;
use App\Models\NewsModel;
use App\Models\StaticPageModel;
use App\Models\SliderModel;
use App\Models\ContactModel;
use App\Models\BrandModel;

class Home extends Controller {

    public $locale;
    public $search;
    public $contact;
    public $brand;

    public function __construct() {

        $this->locale = service('request')->getLocale();
        $this->search = new Search();
        $this->contact = new ContactModel();
        $this->brand = new BrandModel();
        helper('menu');
    }

    public function index() {

        $data['locale'] = $this->locale;
        $data['title'] = 'Главная';
        $data['tree'] = menu();

        $data['search'] = $this->search->index();
        $data['contact'] = $this->contact->index();
        $data['brand'] = $this->brand->index();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);

        $rekomm = new CatalogModel();
        $news = new NewsModel();
        $about = new StaticPageModel();
        $slider = new SliderModel();
        $data['rekomm'] = $rekomm->getRekomm();
        $data['last'] = $rekomm->getLastNine();
        $data['akc'] = $rekomm->getAkc();
        $data['lastn'] = $news->lastFour();
        $data['about'] = $about->getPage(1);
        $data['slider'] = $slider->get_all_slider();

        echo view('templates/header', $data);
        echo view('index', $data);
        echo view('templates/footer', $data);
    }

    public function admin() {
        echo view('admin/admin');
    }

    //--------------------------------------------------------------------
}
