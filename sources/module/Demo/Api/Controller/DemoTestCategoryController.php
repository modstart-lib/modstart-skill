<?php

namespace Module\Demo\Api\Controller;

use Illuminate\Routing\Controller;
use ModStart\Core\Input\Response;
use Module\Demo\Util\DemoTestCategoryUtil;

/**
 * Class TestCategoryController
 * @package Module\Demo\Api\Controller
 *
 * @Api 测试分类
 */
class DemoTestCategoryController extends Controller
{
    /**
     * @return array
     *
     * @Api 获取所有测试分类
     * @ApiResponseData {
     *   "records":[
     *       {"id":1,"title":"分类1"},
     *       {"id":2,"title":"分类2"}
     *    ],
     *   "tree":[
     *       {
     *          "id":1,"title":"分类1",
     *          "_child":[
     *            {"id":3,"title":"分类1-1"}
     *          ]
     *       },
     *       {"id":2,"title":"分类2"}
     *    ]
     * }
     */
    public function all()
    {
        $data = [];
        $data['records'] = DemoTestCategoryUtil::all();
        $data['tree'] = DemoTestCategoryUtil::tree();
        return Response::generateSuccessData($data);
    }
}