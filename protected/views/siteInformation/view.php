<?php
/* @var $this SiteInformationController */
/* @var $model Site */

$this->breadcrumbs=array(
	'Sites'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Site', 'url'=>array('index')),
	array('label'=>'Create Site', 'url'=>array('create')),
	array('label'=>'Update Site', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Site', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Site', 'url'=>array('admin')),
);
?>

<h1>View Site #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'tag',
		'about',
		'address',
		'phone',
		'fb',
		'twitter',
		'office_hours',
		'create_time',
		'update_time',
	),
)); ?>
