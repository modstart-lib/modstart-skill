<?php

namespace Module\Demo\Core;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use ModStart\Admin\Config\AdminMenu;
use Module\Member\Config\MemberMenu;
use Module\Vendor\Admin\Widget\AdminWidgetLink;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        AdminMenu::register(function () {
            return [
                [
                    'title' => '开发示例',
                    'icon' => 'cube',
                    'sort' => 150,
                    'children' => [
                        [
                            'title' => '数据表格 Grid',
                            'icon' => 'table',
                            'sort' => 150,
                            'children' => [
                                [
                                    'title' => '默认数据表格',
                                    'url' => '\Module\Demo\Admin\Controller\GridController@index',
                                ],
                                [
                                    'title' => '独立控制表格',
                                    'url' => '\Module\Demo\Admin\Controller\GridRawController@index',
                                ],
                                [
                                    'title' => '多个数据表格',
                                    'url' => '\Module\Demo\Admin\Controller\GridMultiController@index',
                                ],
                                [
                                    'title' => '树状数据表格',
                                    'url' => '\Module\Demo\Admin\Controller\GridTreeController@index',
                                ],
                                [
                                    'title' => '自定义视图',
                                    'url' => '\Module\Demo\Admin\Controller\GridCustomItemController@index',
                                ],
                                [
                                    'title' => '表格自定义',
                                    'url' => '\Module\Demo\Admin\Controller\GridOperateController@index',
                                ],
                            ]
                        ],
                        [
                            'title' => '数据表单 Form',
                            'icon' => 'description',
                            'sort' => 151,
                            'children' => [
                                [
                                    'title' => '默认数据表单',
                                    'url' => '\Module\Demo\Admin\Controller\FormController@index',
                                ],
                                [
                                    'title' => '系统配置表单',
                                    'url' => '\Module\Demo\Admin\Controller\FormConfigController@index',
                                ],
                                [
                                    'title' => '复杂布局表单',
                                    'url' => '\Module\Demo\Admin\Controller\FormLayoutController@index',
                                ],
                                [
                                    'title' => '表单动态显示',
                                    'url' => '\Module\Demo\Admin\Controller\FormDynamicController@index',
                                ],
                                [
                                    'title' => '弹窗表单',
                                    'url' => '\Module\Demo\Admin\Controller\FormDialogController@index',
                                ],
                                [
                                    'title' => '表单所有组件',
                                    'url' => '\Module\Demo\Admin\Controller\FormFieldController@index',
                                ],
                            ]
                        ],
                        [
                            'title' => '组件支持 Widget',
                            'icon' => 'chart',
                            'sort' => 152,
                            'children' => [
                                [
                                    'title' => '数据统计卡片',
                                    'url' => '\Module\Demo\Admin\Controller\WidgetController@index',
                                ],
                                [
                                    'title' => '静态 Widget',
                                    'url' => '\Module\Demo\Admin\Controller\WidgetStaticController@index',
                                ],
                                [
                                    'title' => 'Vue 单文件 Widget',
                                    'url' => '\Module\Demo\Admin\Controller\WidgetVueController@index',
                                ],
                            ]
                        ],
                        [
                            'title' => '基础示例页面',
                            'icon' => 'cube',
                            'sort' => 153,
                            'children' => [
                                [
                                    'title' => '页面布局',
                                    'url' => '\Module\Demo\Admin\Controller\FrontLayoutController@index',
                                ],
                                [
                                    'title' => 'Icon 图标',
                                    'url' => '\Module\Demo\Admin\Controller\FrontIconController@index',
                                ],
                                [
                                    'title' => 'Tailwind CSS',
                                    'url' => '\Module\Demo\Admin\Controller\FrontTwController@index',
                                ],
                                [
                                    'title' => 'Vue+ElementUI 集成',
                                    'url' => '\Module\Demo\Admin\Controller\FrontVueController@index',
                                ],
                                [
                                    'title' => 'ECharts 集成',
                                    'url' => '\Module\Demo\Admin\Controller\FrontEchartController@index',
                                ],
                                [
                                    'title' => '404页面',
                                    'url' => '\Module\Demo\Admin\Controller\FrontPageController@page404',
                                ],
                                [
                                    'title' => '500页面',
                                    'url' => '\Module\Demo\Admin\Controller\FrontPageController@page500',
                                ],
                            ]
                        ],
                        [
                            'title' => '常见示例页面',
                            'icon' => 'cube',
                            'sort' => 154,
                            'children' => [
                                [
                                    'title' => '复杂数据导入',
                                    'url' => '\Module\Demo\Admin\Controller\AppImportController@index',
                                ],
                                [
                                    'title' => '数据导出',
                                    'url' => '\Module\Demo\Admin\Controller\AppExportController@index',
                                ],
                                [
                                    'title' => '后台任务调度',
                                    'url' => '\Module\Demo\Admin\Controller\AppTestJobController@index',
                                ],
                                //[
                                //    'title' => '测试其他',
                                //    'url' => '\Module\Demo\Admin\Controller\AppTestOtherController@index',
                                //]
                            ]
                        ],
                        [
                            'title' => '开发者文档',
                            'icon' => 'code',
                            'sort' => 155,
                            'url' => '\Module\Demo\Admin\Controller\DocController@index',
                        ],
                    ]
                ],
            ];
        });
        AdminWidgetLink::register(function () {
            return AdminWidgetLink::build('Demo模块', [
                ['链接', modstart_web_url('demo')],
            ]);
        });

        if (modstart_module_enabled('Member')) {
            MemberMenu::register(function () {
                return [
                    [
                        'icon' => 'home',
                        'title' => '一级菜单',
                        'sort' => 500,
                        'children' => [
                            [
                                'title' => '测试界面',
                                'url' => modstart_web_url('member_demo/test'),
                            ],
                            [
                                'title' => '测试界面Grid',
                                'url' => modstart_web_url('member_demo/test/grid'),
                            ],
                        ],
                    ],
                ];
            });
        }
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