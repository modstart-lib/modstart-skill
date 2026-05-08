<?php

/* @var \Illuminate\Routing\Router $router */
$middleware = [];
if (class_exists(\Module\Member\Middleware\ApiAuthMiddleware::class)) {
    $middleware[] = \Module\Member\Middleware\ApiAuthMiddleware::class;
}
$router->group([
    'middleware' => $middleware,
], function () use ($router) {

    $router->match(['post'], 'demo/test/get', 'DemoTestController@get');
    $router->match(['post'], 'demo/test/paginate', 'DemoTestController@paginate');

    $router->match(['post'], 'demo/test_category/all', 'DemoTestCategoryController@all');

    $router->match(['post'], 'member_demo/test/delete', 'MemberDemoTestController@delete');
});