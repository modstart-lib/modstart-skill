<?php

namespace Module\Demo\Admin\Controller;

use Illuminate\Routing\Controller;
use ModStart\Core\Input\Response;

class FrontPageController extends Controller
{
    public function page404()
    {
        return Response::page404();
    }

    public function page500()
    {
        // 实际使用时，页面抛出异常，系统会自动捕获并显示 500 页面
        return view('errors.500');
    }
}