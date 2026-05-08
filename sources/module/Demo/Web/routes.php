<?php

/* @var \Illuminate\Routing\Router $router */
$middleware = [];
if (class_exists(\Module\Member\Middleware\WebAuthMiddleware::class)) {
    $middleware[] = \Module\Member\Middleware\WebAuthMiddleware::class;
}
$router->group([
    'middleware' => $middleware,
], function () use ($router) {
    $router->match(['get'], 'demo', 'DemoController@index');
    $router->match(['get'], 'demo/member_login_required', 'DemoController@memberLoginRequired');

    $router->match(['get'], 'demo/test', 'DemoTestController@index');
    $router->match(['get'], 'demo/test/{id}', 'DemoTestController@show');

    $router->match(['get'], 'member_demo/test', 'MemberDemoTestController@index');
    $router->match(['get', 'post'], 'member_demo/test/grid', 'MemberDemoTestController@grid');

});