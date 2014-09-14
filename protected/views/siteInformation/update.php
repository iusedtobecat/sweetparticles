<?php
/* @var $this SiteInformationController */
/* @var $model Site */

$this->breadcrumbs=array(
	'Sites'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Site', 'url'=>array('index')),
	array('label'=>'Create Site', 'url'=>array('create')),
	array('label'=>'View Site', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Site', 'url'=>array('admin')),
);
?>

<h1>Update Site <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>