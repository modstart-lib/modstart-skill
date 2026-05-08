<?php

namespace Module\BlogThemeDemo\Admin\Controller;

use Illuminate\Routing\Controller;
use ModStart\Admin\Layout\AdminConfigBuilder;

class ConfigController extends Controller
{
    public function index(AdminConfigBuilder $builder)
    {
        $builder->pageTitle('Blog演示主题');
        $builder->image('BlogThemeDemo_HeaderBackground', '头部背景图');
        $builder->image('BlogThemeDemo_Logo', '博客Logo');
        $builder->text('BlogThemeDemo_Slogan', '博客标语');
        $builder->richHtml('BlogThemeDemo_Footer', '底部信息');
        $builder->formClass('wide');
        return $builder->perform();
    }
}