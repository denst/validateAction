<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 30.10.2018
 * Time: 11:30
 */

namespace webivan\validateAction\tests\controllers;

use webivan\validateAction\ValidateActionBehavior;
use webivan\validateAction\ValidateActionTrait;
use yii\web\Request;
use yii\web\Response;
use yii\caching\FileCache;
use yii\rest\Controller;

class InjectParamController extends Controller
{
    use ValidateActionTrait;

    public function behaviors()
    {
        return [
            'validator' => [
                'class' => ValidateActionBehavior::class
            ]
        ];
    }

    public function actionTestRequest(Request $request)
    {
        return $request;
    }

    public function actionTestResponse(Response $response)
    {
        return $response;
    }

    public function actionTestCache(FileCache $cache)
    {
        return $cache;
    }

    public function actionTestParams(Request $request, int $param1, string $param2 = 'test', Response $response)
    {
        return compact('param1', 'param2', 'request', 'response');
    }
}