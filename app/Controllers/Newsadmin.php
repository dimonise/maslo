<?php

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\NewsAdminModel;
 
class Newsadmin extends Controller{

    public $model;
    public $locale;

    function __construct()
    {
        $this->locale = service('request')->getLocale();
        $this->model = new NewsAdminModel();
        helper('menu');
    } 

    /*
     * Listing of news
     */
    function index()
    {
        $data = [
            'news' => $this->model->paginate(20),//$this->model->get_all_product(),
            'pager' => $this->model->pager
        ];

        echo view('admin/header', $data);
        echo view('admin/news/index', $data);
        echo view('admin/footer');
    }

    /*
     * Adding a new news
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'keywords_news_ua' => service('request')->getVar('keywords_news_ua'),
				'keywords_news_ru' => service('request')->getVar('keywords_news_ru'),
				'description_news_ua' => service('request')->getVar('description_news_ua'),
				'description_news_ru' => service('request')->getVar('description_news_ru'),
				'title_news_ua' => service('request')->getVar('title_news_ua'),
				'title_news_ru' => service('request')->getVar('title_news_ru'),
				'text_news_ua' => service('request')->getVar('text_news_ua'),
				'text_news_ru' => service('request')->getVar('text_news_ru'),
            );
            
            $news_id = $this->model->add_news($params);

            $file = $this->request->getFile('upload');



            if($file->getName() !=''):

                // Move the file to it's new home
                $name = $file->getName();
                $PATH = getcwd();
                $file->move( $PATH .'\img', $name );

                $img = [
                    'img_news'=>'/img/'.$name
                ];
                $this->model->save_img($news_id,$img);

            endif;

            return redirect()->to('/newsadmin/index');
        }
        else
        {
            echo view('admin/header');
            echo view('admin/news/add');
            echo view('admin/footer');
        }
    }  

    /*
     * Editing a news
     */
    function edit($id_news)
    {   
        // check if the news exists before trying to edit it
        $data['news'] = $this->model->get_news($id_news);
        
        if(isset($data['news'][0]['id_news']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'keywords_news_ua' => service('request')->getVar('keywords_news_ua'),
					'keywords_news_ru' => service('request')->getVar('keywords_news_ru'),
					'description_news_ua' => service('request')->getVar('description_news_ua'),
					'description_news_ru' => service('request')->getVar('description_news_ru'),
					'title_news_ua' => service('request')->getVar('title_news_ua'),
					'title_news_ru' => service('request')->getVar('title_news_ru'),
					'text_news_ua' => service('request')->getVar('text_news_ua'),
					'text_news_ru' => service('request')->getVar('text_news_ru'),
                );
                $file = $this->request->getFile('upload');

                $this->model->update_news($id_news,$params);

                if($file->getName() !=''):

                    // Move the file to it's new home
                    $name = $file->getName();
                    $PATH = getcwd();
                    $file->move( $PATH .'\img', $name );

                    $img = [
                        'img_news'=>'/img/'.$name
                    ];
                    $this->model->save_img($id_news,$img);

                endif;

               return redirect()->to('/newsadmin/index');
            }
            else
            {
                echo view('admin/header', $data);
                echo view('admin/news/edit', $data);
                echo view('admin/footer');
            }
        }
//        else
//            echo 'The news you are trying to edit does not exist.';
    } 

    /*
     * Deleting news
     */
    function remove($id_news)
    {
        $news = $this->model->get_news($id_news);

        // check if the news exists before trying to delete it
        if(isset($news[0]['id_news']))
        {
            $this->model->delete_news($id_news);
            return redirect()->to('/newsadmin/index');
        }
        else
            echo 'The news you are trying to delete does not exist.';
    }
    
}
