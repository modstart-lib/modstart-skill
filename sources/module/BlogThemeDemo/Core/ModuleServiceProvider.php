<?php

namespace Module\BlogThemeDemo\Core;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use ModStart\Admin\Config\AdminMenu;
use Module\Vendor\Provider\SiteTemplate\SiteTemplateProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        SiteTemplateProvider::register(BlogSiteTemplateProvider::class);
        AdminMenu::register(function () {
            return [
                [
                    'title' => '博客管理',
                    'icon' => 'description',
                    'sort' => 150,
                    'children' => [
                        [
                            'title' => '模板设置',
                            'children' => [
                                [
                                    'title' => 'Blog演示主题',
                                    'url' => '\Module\BlogThemeDemo\Admin\Controller\ConfigController@index',
                                ],
                            ]
                        ]
                    ]
                ]
            ];
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}