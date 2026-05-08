<?php

/* @var \Illuminate\Routing\Router $router */

Route::match(['get', 'post'], 'blog_theme_demo/config', 'ConfigController@index');