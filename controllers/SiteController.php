<?php

namespace app\controllers;

use app\models\Shop;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        print "<pre>";
        return Shop::echoList();
//        return $this->render('index');
    }

}
