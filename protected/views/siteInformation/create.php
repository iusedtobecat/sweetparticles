<?php
/* @var $this SiteInformationController */
/* @var $model Site */

$this->breadcrumbs=array(
	'Sites'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Site', 'url'=>array('index')),
	array('label'=>'Manage Site', 'url'=>array('admin')),
);
?>

<h1>Create Site</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>