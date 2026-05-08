<?php

namespace Module\Demo\Util;

class UrlUtil
{
    public static function test()
    {
        return modstart_web_url('demo/test');
    }

    public static function testShow($r)
    {
        if (is_array($r)) {
            $r = $r['id'];
        }
        return modstart_web_url('demo/test/' . $r);
    }

}