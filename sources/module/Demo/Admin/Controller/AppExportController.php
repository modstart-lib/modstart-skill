<?php

namespace Module\Demo\Admin\Controller;

use Illuminate\Routing\Controller;
use Module\Vendor\QuickRun\Export\ExportHandle;

class AppExportController extends Controller
{

    public function index()
    {
        return view('module::Demo.View.admin.app.export', [
            'pageTitle' => '数据导出',
        ]);
    }

    public function export(ExportHandle $handle)
    {
        $names = ['张三', '李四', '王五', '赵六', '钱七', '孙八', '周九', '吴十', '郑一', '王二'];
        $total = 50;

        return $handle
            ->withPageTitle('导出示例数据')
            ->withDefaultExportName('示例数据')
            ->withHeadTitles(['序号', '姓名', '分类', '分数', '创建时间'])
            ->handleFetch(function ($page, $pageSize, $search, $param) use ($names, $total) {
                $offset = ($page - 1) * $pageSize;
                $list = [];
                for ($i = $offset + 1; $i <= min($offset + $pageSize, $total); $i++) {
                    $list[] = [
                        $i,
                        $names[($i - 1) % count($names)],
                        $i % 3 === 0 ? '分类C' : ($i % 2 === 0 ? '分类B' : '分类A'),
                        rand(60, 100),
                        date('Y-m-d H:i:s', time() - rand(0, 86400 * 30)),
                    ];
                }
                return [
                    'list' => $list,
                    'total' => $total,
                ];
            })
            ->performCommon();
    }
}