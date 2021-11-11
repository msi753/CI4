# 유저 가이드
https://codeigniter.com/user_guide/

## 기본 함수
https://codeigniter.com/user_guide/general/common_functions.html

### esc($data[, $context = 'html'[, $encoding]])

XSS공격을 막기 위해 사용

### model($name[, $getShared = true[, &$conn = null]])
모델 인스턴스 생성

### service('validation')->listErrors()
report errors related to form validation. 

### csrf_field()
creates a hidden input with a CSRF token that helps protect against some common attacks.

## 수정사항
.env파일의 
CI_ENVIRONMENT = development

- Config/Routes.php
- Config/Filters.php

### 뉴스 전체 보기, 하나만 보기, 입력하기
- App\Controllers\News.php
- App\Models\NewsModel.php
- App\Views\news\create overview success view.php

## writable\debugbar
여기에 에러로그가 쌓인다
.gitignore파일에서 커밋 안하게 설정했다
