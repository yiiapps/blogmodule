<?php

use funson86\blog\models\BlogCatalog;
use funson86\blog\Module;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\BlogPost */
/* @var $form yii\widgets\ActiveForm */
?>

<style type="text/css">
.col-lg-3 {
    width: 80%;
}
</style>
<div class="blog-post-form">

    <?php $form = ActiveForm::begin([
    'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-2 control-label'],
    ],
]);?>

    <?=$form->field($model, 'catalog_id')->dropDownList(ArrayHelper::map(BlogCatalog::get(0, BlogCatalog::find()->all()), 'id', 'str_label'));?>

    <?=$form->field($model, 'title')->textInput(['maxlength' => 128]);?>

    <?=$form->field($model, 'brief')->textarea(['rows' => 6]);?>

    <?=$form->field($model, 'content')->widget(CKEditor::className(), [
    'editorOptions' => [
        'preset' => 'full',
        'inline' => false,
    ],
]);?>

    <?=$form->field($model, 'tags')->textInput(['maxlength' => 128]);?>
    <?=$form->field($model, 'surname')->textInput(['maxlength' => 128]);?>
    <?=$form->field($model, 'source_url')->textInput(['maxlength' => 255]);?>
    <?=$form->field($model, 'banner')->fileInput();?>
    <?=$form->field($model, 'status')->dropDownList(\funson86\blog\models\Status::labels());?>

    <div class="form-group">
        <label class="col-lg-2 control-label" for="">&nbsp;</label>
        <?=Html::submitButton($model->isNewRecord ? Module::t('blog', 'Create') : Module::t('blog', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);?>
    </div>

    <?php ActiveForm::end();?>

</div>
