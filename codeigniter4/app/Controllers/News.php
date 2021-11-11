<?php

namespace App\Controllers;

//Request와 Response 객체, 그리고 Logger클래스에 접근하게 해주는 Controller 라이브러리
use CodeIgniter\Controller;
use App\Models\NewsModel;

class News extends BaseController
{
    // 클래스 안에 함수가 있으면 메서드
    public function index()
    {
        $model = model(NewsModel::class);   //인스턴스 생성
        // $model = new NewsModel();    //상동

        $data = [
            'news'  => $model->getNews(),
            'title' => 'News archive',
        ];

        echo view('templates/header', $data);
        echo view('news/overview', $data);
        echo view('templates/footer', $data);
    }

    public function view($slug = null)
    {
        $model = model(NewsModel::class);
        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '.$slug);
        }

        $data['title'] = $data['news']['title'];

        echo view('templates/header', $data);
        echo view('news/view', $data);
        echo view('templates/footer', $data);
    }

    public function create()
    {
        $model = model(NewsModel::class);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body'  => 'required',
        ])) {
            $model->save([
                'title' => $this->request->getPost('title'),
                'slug'  => url_title($this->request->getPost('title'), '-', true),
                'body'  => $this->request->getPost('body'),
            ]);

            echo view('news/success');
        } else {
            echo view('templates/header', ['title' => 'Create a news item']);
            echo view('news/create');
            echo view('templates/footer');
        }
    }
}
