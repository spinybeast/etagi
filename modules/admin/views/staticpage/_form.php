<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\StaticPage */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="static-page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pagekey')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(), []) ?>

    <?= $form->field($model, 'enabled')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style>
    .sceditor-container {width: 100% !important; min-height: 250px;}
    .sceditor-container iframe, .sceditor-container textarea {width: 99% !important; min-height: 250px;}
</style>
