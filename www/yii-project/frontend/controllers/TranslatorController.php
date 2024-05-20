<?php

namespace frontend\controllers;

use common\models\Translator;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Response;

class TranslatorController extends Controller
{
    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index'  => ['get'],
                    'create' => ['get', 'post'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
//    public function actionIndex($filter = null): string
//    {
//        $query = Translator::find();
//
//        if ($filter === 'weekdays') {
//            $query->where(['available_weekdays' => 1]);
//        } elseif ($filter === 'weekends') {
//            $query->where(['available_weekends' => 1]);
//        }
//
//        $dataProvider = new ActiveDataProvider([
//            'query' => $query,
//            'pagination' => [
//                'pageSize' => 5,
//            ],
//            'sort' => [
//                'defaultOrder' => [
//                    'name' => SORT_ASC,
//                ],
//                'attributes' => [
//                    'name',
//                    'available_weekdays',
//                    'available_weekends',
//                ],
//            ],
//        ]);
//
//        return $this->render('index', [
//            'dataProvider' => $dataProvider,
//        ]);
//    }

    public function actionCreate(): Response|string
    {
        $model = new Translator();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionList($filter = '', $page = 1)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $query = Translator::find();

        if ($filter === 'weekdays') {
            $query->where(['available_weekdays' => 1]);
        } elseif ($filter === 'weekends') {
            $query->where(['available_weekends' => 1]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return [
            'models' => $dataProvider->getModels(),
            'pagination' => [
                'totalCount' => $dataProvider->getTotalCount(),
                'pageSize' => $dataProvider->pagination->pageSize,
                'pageCount' => $dataProvider->pagination->getPageCount(),
                'currentPage' => $dataProvider->pagination->getPage() + 1,
            ],
        ];
    }
}