<?php
/* @var $this CartHistoryController */
/* @var $model CartHistory */

$this->breadcrumbs=array(
	'Cart Histories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CartHistory', 'url'=>array('index')),
	array('label'=>'Create CartHistory', 'url'=>array('create')),
	array('label'=>'View CartHistory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CartHistory', 'url'=>array('admin')),
);
?>

<h1>Update CartHistory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>