<?php

namespace Module\Demo\Web\Controller;

use ModStart\App\Web\Layout\WebPage;
use ModStart\Grid\Displayer\ItemOperate;
use ModStart\Grid\Grid;
use ModStart\Grid\GridFilter;
use ModStart\Repository\Filter\RepositoryFilter;
use ModStart\Widget\TextAjaxRequest;
use Module\Demo\Model\DemoTest;
use Module\Member\Support\MemberLoginCheck;
use Module\Member\Web\Controller\MemberFrameController;

class MemberDemoTestController extends MemberFrameController implements MemberLoginCheck
{
    public function index()
    {
        return $this->view('demo.memberDemoTest');
    }

    public function grid(WebPage $page)
    {
        $grid = Grid::make(DemoTest::class);
        $grid->text('title', '标题');
        $grid->hookItemOperateRendering(function (ItemOperate $itemOperate) {
            $item = $itemOperate->item();
            $itemOperate->getField()->width(150);
            $itemOperate->prepend(
                TextAjaxRequest::make('danger', '<i class="iconfont icon-trash"></i> 删除', modstart_api_url('member_demo/test/delete', ['_id' => $item->id]))
            );
        });
        $grid->repositoryFilter(function (RepositoryFilter $filter) {
            //$filter->where('memberUserId', MemberUser::id());
        });
        $grid->gridFilter(function (GridFilter $filter) {
            $filter->like('title', '标题');
        });
        $page->view($this->viewMemberFrame);
        return $page->body($grid)->handleGrid($grid);
    }
}