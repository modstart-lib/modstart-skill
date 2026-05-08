<?php

namespace Module\Demo\Admin\Controller;

use Illuminate\Routing\Controller;
use ModStart\Admin\Layout\AdminConfigBuilder;

class FormConfigController extends Controller
{

    public function index(AdminConfigBuilder $builder)
    {
        $builder->pageTitle('系统配置表单');
        $builder->text('System_SiteName', '网站名称')->required();
        $builder->text('System_SiteUrl', '网站地址')->required();
        $builder->text('System_SiteEmail', '网站邮箱')->required();
        $builder->formClass('wide');
        return $builder->perform();
    }
}