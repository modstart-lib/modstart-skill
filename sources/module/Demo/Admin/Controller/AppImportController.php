<?php

namespace Module\Demo\Admin\Controller;

use Illuminate\Routing\Controller;
use ModStart\Admin\Auth\AdminPermission;
use ModStart\Core\Exception\BizException;
use ModStart\Core\Input\InputPackage;
use ModStart\Core\Input\Request;
use ModStart\Core\Input\Response;

class AppImportController extends Controller
{

    public function index()
    {

        if (Request::isPost()) {
            AdminPermission::demoCheck();
            $input = InputPackage::buildFromInput();
            $data = $input->getJson('importData');
            BizException::throwsIfEmpty('导入数据不能为空', $data);
            $results = [];
            foreach ($data as $dataItem) {
                // 处理 $dataItem，这里假设处理成功
                $ret = Response::generateSuccessData([
                    'dataItem' => $dataItem,
                ]);
                $results[] = $ret;
            }
            return Response::generateSuccessData([
                'results' => $results,
            ]);
        }
        return view('module::Demo.View.admin.app.import', [
            'pageTitle' => '复杂数据导入',
        ]);
    }
}