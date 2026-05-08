<?php

namespace Module\Demo\Api\Controller;

use Illuminate\Routing\Controller;
use ModStart\Core\Dao\ModelUtil;
use ModStart\Core\Exception\BizException;
use ModStart\Core\Input\InputPackage;
use ModStart\Core\Input\Response;
use ModStart\Core\Util\CRUDUtil;
use Module\Demo\Model\DemoTest;

/**
 * Class TestController
 * @package Module\Demo\Api\Controller
 *
 * @Api 测试
 */
class DemoTestController extends Controller
{
    /**
     * @return array
     * @throws BizException
     *
     * @Api 获取测试
     * @ApiBodyParam id int 测试ID
     * @ApiResponseData {
     *  "record":{
     *      "id":1,
     *      "categoryId":1,
     *      "title":"标题",
     *      "summary":"摘要",
     *      "content":"内容"
     *  }
     * }
     */
    public function get()
    {
        $record = ModelUtil::get(DemoTest::class, CRUDUtil::id());
        BizException::throwsIfEmpty('记录不存在', $record);
        return Response::generateSuccessData([
            'record' => $record,
        ]);
    }

    /**
     * @return array
     *
     * @Api 测试分页
     * @ApiBodyParam search.categoryId int 测试分类ID
     * @ApiResponseData {
     *  "total": 1,
     *  "page" : 1,
     *  "pageSize": 10,
     *  "records": [
     *      {
     *        "id":1,
     *        "categoryId":1,
     *        "title":"标题",
     *        "summary":"摘要",
     *        "content":"内容"
     *      }
     *  ]
     * }
     */
    public function paginate()
    {
        $input = InputPackage::buildFromInput();
        $page = $input->getPage();
        $pageSize = $input->getPageSize();
        $query = DemoTest::query();
        $categoryId = $input->getInteger('categoryId');
        if ($categoryId) {
            $query = $query->where('categoryId', $categoryId);
        }
        $query = $query->orderBy('id', 'desc');
        $resultData = $query->paginate($pageSize, ['*'], 'page', $page)->toArray();
        $records = $resultData['data'];
        $total = $resultData['total'];
        return Response::generateSuccessData([
            'page' => $page,
            'pageSize' => $pageSize,
            'total' => $total,
            'records' => $records,
        ]);
    }
}