<?php

namespace Module\BlogThemeDemo\Core;

use Module\Vendor\Provider\SiteTemplate\AbstractSiteTemplateProvider;

class BlogSiteTemplateProvider extends AbstractSiteTemplateProvider
{
    const NAME = 'demo';

    public function name()
    {
        return self::NAME;
    }

    public function title()
    {
        return '博客演示主题';
    }

    public function root()
    {
        return 'module::BlogThemeDemo.View';
    }

}