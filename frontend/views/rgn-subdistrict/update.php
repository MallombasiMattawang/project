<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var frontend\models\RgnSubdistrict $model
 */
$this->title = 'Regioon Subdistrict ' . $model->name . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Regioon Subdistricts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string) $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';

?>
<div class="giiant-crud rgn-subdistrict-update">

    

	<?php

	echo $this->render('_form', [
		'model' => $model,
	]);

	?>

</div>
