<?php

namespace Module\Demo\Api\Controller;

use Illuminate\Routing\Controller;
use ModStart\Core\Dao\ModelUtil;
use ModStart\Core\Exception\BizException;
use ModStart\Core\Input\Response;
use ModStart\Core\Util\CRUDUtil;
use Module\Demo\Model\DemoTest;
use Module\Member\Auth\MemberUser;
use Module\Member\Support\MemberLoginCheck;

class MemberDemoTestController extends Controller implements MemberLoginCheck
{
    public function delete()
    {
        $record = ModelUtil::get(DemoTest::class, [
            'memberUserId' => MemberUser::id(),
            'id' => CRUDUtil::id(),
        ]);
        BizException::throwsIfEmpty('记录不存在', $record);
        // Demo test delete logic here
        // ModelUtil::delete(DemoTest::class, $record['id']);
        return Response::redirect(CRUDUtil::jsGridRefresh());
    }
}