<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use frontend\models\access\RgnPostcodeAccess;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var frontend\models\search\RgnPostcodeSearch $searchModel
 */
$this->title = 'Region Postcodes';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="giiant-crud rgn-postcode-deleted">

	<?php //     echo $this->render('_search', ['model' =>$searchModel]);	?>

    


	<?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>

	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="clearfix">

		        <p class="pull-left">
					<?= RgnPostcodeAccess::button('create'); ?>
				</p>

		        <div class="pull-right">
					<?= RgnPostcodeAccess::button('index'); ?>
				</div>

		    </div>
		</div>

		<div class="panel-body">

			<div class="table-responsive">
				<?=

				GridView::widget([
					'layout'			 => '{summary}{pager}{items}{pager}',
					'dataProvider'		 => $dataProvider,
					'pager'				 => [
						'class'			 => yii\widgets\LinkPager::className(),
						'firstPageLabel' => 'First',
						'lastPageLabel'	 => 'Last',
					],
					'filterModel'		 => $searchModel,
					'tableOptions'		 => ['class' => 'table table-striped table-bordered table-hover'],
					'headerRowOptions'	 => ['class' => 'x'],
					'columns'			 => [
						[
							'class'		 => 'yii\grid\SerialColumn',
							"options"	 => [
								"width" => "50px",
							],
						],
						[
							"attribute"	 => "postcode",
							"format"	 => "raw",
							"options"	 => [],
							"value"		 => function($model)
						{
							return $model->linkTo;
						}
						],
						[
							'attribute'	 => 'province_id',
							"format"	 => "raw",
							"options"	 => [],
							'value'		 => function ($model)
						{
							return ($model->province) ? $model->province->linkTo : '<span class="label label-warning">?</span>';
						},
						],
						[
							'attribute'	 => 'city_id',
							"format"	 => "raw",
							"options"	 => [],
							'value'		 => function ($model)
						{
							return ($model->city) ? $model->city->linkTo : '<span class="label label-warning">?</span>';
						},
						],
						[
							'attribute'	 => 'district_id',
							"format"	 => "raw",
							"options"	 => [],
							'value'		 => function ($model)
						{
							return ($model->district) ? $model->district->linkTo : '<span class="label label-warning">?</span>';
						},
						],
					],
				]);

				?>
			</div>

		</div>

	</div>

	<?php \yii\widgets\Pjax::end() ?>


</div>
