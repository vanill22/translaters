<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Translators';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="translator-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Translator', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Show All', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Weekdays Only', ['index', 'filter' => 'weekdays'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Weekends Only', ['index', 'filter' => 'weekends'], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'available_weekdays:boolean',
            'available_weekends:boolean',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>