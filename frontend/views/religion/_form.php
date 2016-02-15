<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dmstr\bootstrap\Tabs;
use cornernote\returnurl\ReturnUrl;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var frontend\models\Religion $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>
			<i class="fa fa-edit"></i><?= $model->name ?>
		</h4>
		
    </div>

    <div class="panel-body">

        <div class="religion-form">

			<?php

			$form = ActiveForm::begin([
					'id'					 => 'Religion',
					'layout'				 => 'horizontal',
					'enableClientValidation' => true,
					'errorSummaryCssClass'	 => 'error-summary alert alert-error'
					]
			);

			?>

            <div class="">
				<?php $this->beginBlock('main'); ?>

                <p>

					<?= $form->field($model, 'id')->textInput(['disabled' => 'disabled', 'placeholder' => 'autonumber']) ?>
					<?=

					$form->field($model, 'recordStatus')->dropDownList(
						frontend\models\Religion::optsRecordStatus()
					);

					?>
					<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </p>
				<?php $this->endBlock(); ?>

				<?=

				Tabs::widget(
					[
						'encodeLabels'	 => false,
						'items'			 => [
							[
								'label'		 => 'Religion',
								'content'	 => $this->blocks['main'],
								'active'	 => true,
							],
						],
					]
				);

				?>
                <hr/>
				<?php echo $form->errorSummary($model); ?>
				<?= Html::a('Cancel', ReturnUrl::getUrl(Url::previous()), ['class' => 'btn btn-default']) ?>
				<?=

				Html::submitButton(
					'<span class="glyphicon glyphicon-check"></span> ' .
					($model->isNewRecord ? 'Create' : 'Save'), [
					'id'	 => 'save-' . $model->formName(),
					'class'	 => 'btn btn-success'
					]
				);

				?>


				<?php ActiveForm::end(); ?>

            </div>

        </div>

    </div>

</div>
