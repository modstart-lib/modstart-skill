<?php

namespace Module\Demo\View;

use ModStart\Core\Util\RenderUtil;

class DemoView
{
    public static function testWidget()
    {
        return RenderUtil::view('module::Demo.View.inc.TestWidget', [
            'title' => 'This is a Test Widget',
            'content' => 'Hello, this is a sample content for the test widget.'
        ]);
    }
}