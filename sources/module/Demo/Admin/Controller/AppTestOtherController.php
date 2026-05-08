<?php

namespace Module\Demo\Admin\Controller;

use Illuminate\Routing\Controller;
use ModStart\Admin\Layout\AdminPage;
use ModStart\Core\Input\Response;
use ModStart\Core\Util\SerializeUtil;
use ModStart\Form\Form;
use ModStart\Layout\LayoutTab;
use ModStart\Widget\Box;

class AppTestOtherController extends Controller
{
    public function index(AdminPage $page)
    {
        $form = $this->form();
        return $page->pageTitle('测试Tab切换richHtml内容消失')
            ->body(Box::make($form, '测试表单'))
            ->handleForm($form, function (Form $form) {
                $data = $form->dataForming();
                return Response::generateSuccess('保存成功:' . SerializeUtil::jsonEncode($data));
            });
    }

    public function form()
    {
        $form = Form::make('goods');
        $form->layoutTab(function (LayoutTab $layout) {
            $layout->tab('英语', function (Form $form) {
                $form->text('name', '标题')->required();
                $form->textarea('desc', '简介')->required();
                $form->richHtml('content', '内容');
                $form->richHtml('technical', '技术参数')->required();
                $form->text('seo_title', 'seo标题');
            });
            $layout->tab('西班牙语', function (Form $form) {
                $form->text('s_name', '标题')->required();
                $form->textarea('s_desc', '简介')->required();
                $form->richHtml('s_content', '内容');
                $form->richHtml('s_technical', '技术参数')->required();
                $form->text('s_seo_title', 'seo标题');
            });
            $layout->tab('俄语', function (Form $form) {
                $form->text('r_name', '标题')->required();
                $form->textarea('r_desc', '简介')->required();
                $form->richHtml('r_content', '内容');
                $form->richHtml('r_technical', '技术参数')->required();
                $form->text('r_seo_title', 'seo标题');
            });
        });
        $form->text('sort', '排序')->required()->defaultValue(0);
        $form->switch('enable', '状态')->defaultValue(1);
        return $form;
    }
}