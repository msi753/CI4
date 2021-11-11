<?php

namespace App\Models;

// 모델 라이브러리를 extends 할 수 있게 되어 $this->db 디비 로드가 가능해진다
use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $allowedFields = ['title', 'slug', 'body'];

    public function getNews($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();    // CodeIgniter\Model class 내장함수
        }

        return $this->where(['slug'=>$slug])->first();    // CodeIgniter\Model class 내장함수
    }


}