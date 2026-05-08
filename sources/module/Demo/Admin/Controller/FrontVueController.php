<?php

namespace Module\Demo\Admin\Controller;

use Illuminate\Routing\Controller;
use ModStart\Admin\Layout\AdminPage;

class FrontVueController extends Controller
{

    public function index(AdminPage $page)
    {
            'codes' => [
                [
                    'name' => 'Blade文件',
                    'type' => 'html',
                    'path' => 'module/Demo/View/admin/front/vue.blade.php',
                ]
            ]
        ]);
        $page->view('module::Demo.View.admin.front.vue');
        return $page->pageTitle('Vue+ElementUI 集成');
    }
}