<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use rmrevin\yii\fontawesome\FA;
use app\models\ExclusivesProperties;
use wbraganca\dynamicform\DynamicFormWidget;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Exclusives */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exclusives-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), []) ?>

    <div class="properties">
        <?php DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper',
            'widgetBody' => '.container-items',
            'widgetItem' => '.item',
            'min' => 0,
            'insertButton' => '.add-item',
            'deleteButton' => '.remove-item',
            'model' => $model,
            'formId' => 'dynamic-form',
            'formFields' => [
                'name',
                'value',
            ],
        ]); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>
                    <i class="glyphicon glyphicon-tags"></i> Характеристики
                    <button type="button" class="add-item btn btn-success btn-sm pull-right">
                        <?= FA::icon('plus') ?>
                    </button>
                </h4>
            </div>
            <div class="panel-body">
                <div class="container-items"><!-- widgetBody -->
                    <?php if (!empty($model->properties)){
                        $properties = $model->properties;
                    } else {
                        $properties = [new ExclusivesProperties()];
                    } ?>
                    <?php foreach ($properties as $i => $property): ?>
                        <div class="item panel panel-default"><!-- widgetItem -->
                            <div class="panel-heading">
                                <h3 class="panel-title pull-left">Характеристика <?= $i + 1 ?></h3>
                                <div class="pull-right">
                                    <button type="button" class="remove-item btn btn-danger btn-xs">
                                        <?= FA::icon('minus') ?>
                                    </button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                // necessary for update action.
                                if (! $property->isNewRecord) {
                                    echo Html::activeHiddenInput($property, "[{$i}]id");
                                }
                                ?>
                                <?= $form->field($property, "[{$i}]name")->textInput(['maxlength' => true]) ?>
                                <?= $form->field($property, "[{$i}]value")->textInput(['maxlength' => true]) ?>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php DynamicFormWidget::end(); ?>
    </div>
    <?= $form->field($model, 'lot_number')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>