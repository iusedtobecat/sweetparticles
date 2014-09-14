<?php
/* @var $this CartHistoryController */
/* @var $model CartHistory */

$this->breadcrumbs=array(
	'Cart Histories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CartHistory', 'url'=>array('index')),
	array('label'=>'Create CartHistory', 'url'=>array('create')),
	array('label'=>'Update CartHistory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CartHistory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CartHistory', 'url'=>array('admin')),
);
?>

<h1>View CartHistory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cart_id',
		'order_status',
		'create_time',
		'update_time',
	),
)); ?>
