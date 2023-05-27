<?php


use yii\helpers\VarDumper;

if (!function_exists('dd')) {
    function dd($data, $depth = 10) {
        VarDumper::dump($data, $depth, true);
        die();
    }
}

if (!function_exists('app')) {
    /**
     * @param string|null $component
     * @return \yii\base\Application|object
    */
    function app(?string $component = null) {
        if (!empty($component)) {
            return Yii::$app->get($component);
        }

        return Yii::$app;
    }
}

if (!function_exists('post')) {
    function post() {
        return app()->request->post();
    }
}

if (!function_exists('userAgent')) {
    function userAgent($default = null) {
        return app()->request->headers->get('User-Agent', $default);
    }
}

if (!function_exists('userIp')) {
    function userIp() {
        return app()->request->getUserIP();
    }
}