<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use dmstr\bootstrap\Tabs;
use frontend\models\RgnCountry;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use cornernote\returnurl\ReturnUrl;

/**
 * @var yii\web\View $this
 * @var frontend\models\RgnDistrict $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>
			<?= $model->name ?>
		</h4>
    </div>

    <div class="panel-body">

        <div class="rgn-district-form">

			<?php

			$form = ActiveForm::begin([
					'id'					 => 'RgnDistrict',
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
					<?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
					<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
					<?=

						$form
						->field($model, 'city_id')
						->widget(DepDrop::classname(), [
							'data'			 => [],
							'type'			 => DepDrop::TYPE_SELECT2,
							'select2Options' => [
								'pluginOptions' => [
									'multiple'			 => FALSE,
									'allowClear'		 => TRUE,
									'tags'				 => TRUE,
									'maximumInputLength' => 255, /* province name maxlength */
								],
							],
							'pluginOptions'	 => [
								'initialize'	 => TRUE,
								'placeholder'	 => 'Select or type city',
								'depends'		 => ['rgndistrictform-province_id'],
								'url'			 => Url::to([
									'/rgn-city/depdrop-options',
									'selected' => $model->city_id,
								]),
								'loadingText'	 => 'Loading cities ...',
							],
					]);

					?>
					<?=

						$form
						->field($model, 'province_id')
						->widget(DepDrop::classname(), [
							'data'			 => [],
							'type'			 => DepDrop::TYPE_SELECT2,
							'select2Options' => [
								'pluginOptions' => [
									'multiple'			 => FALSE,
									'allowClear'		 => TRUE,
									'tags'				 => TRUE,
									'maximumInputLength' => 255, /* province name maxlength */
								],
							],
							'pluginOptions'	 => [
								'initialize'	 => TRUE,
								'placeholder'	 => 'Select or type province',
								'depends'		 => ['rgndistrictform-country_id'],
								'url'			 => Url::to([
									'/rgn-province/depdrop-options',
									'selected' => $model->province_id,
								]),
								'loadingText'	 => 'Loading provinces ...',
							],
					]);

					?>
					<?=

						$form
						->field($model, 'country_id')
						->widget(Select2::classname(), [
							'data'			 => RgnCountry::asOption(),
							'pluginOptions'	 =>
							[
								'placeholder'		 => 'Select or type Country',
								'multiple'			 => FALSE,
								'allowClear'		 => TRUE,
								'tags'				 => TRUE,
								'maximumInputLength' => 255, /* country name maxlength */
							],
					]);

					?>
                </p>

				<?php $this->endBlock(); ?>

				<?=

				Tabs::widget(
					[
						'encodeLabels'	 => false,
						'items'			 => [
							[
								'label'		 => 'RgnDistrict',
								'content'	 => $this->blocks['main'],
								'active'	 => true,
							],
						],
					]
				);

				?>
                <hr/>
                <?= $model->operation->button('view'); ?>
                <?= Html::a('Cancel', ReturnUrl::getUrl(Url::previous()), ['class' => 'btn btn-default']) ?>
				<?php echo $form->errorSummary($model); ?>
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
