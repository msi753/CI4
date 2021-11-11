<?php

namespace App\Controllers;

// System/Controller.php 에 있는 메서드와 변수에 접근할 수 있다
use CodeIgniter\Controller;

class Pages extends BaseController
{
    // 클래스 안에 함수가 있으면 메서드
    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
    
        $data['title'] = ucfirst($page); // Capitalize the first letter
    
        echo view('templates/header', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/footer', $data);
    }
}
