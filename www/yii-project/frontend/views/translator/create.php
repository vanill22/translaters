<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Translator */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Create Translator';
$this->params['breadcrumbs'][] = ['label' => 'Translators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="translator-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="translator-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'available_weekdays')->checkbox() ?>

        <?= $form->field($model, 'available_weekends')->checkbox() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
