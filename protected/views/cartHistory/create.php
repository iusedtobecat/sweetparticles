<?php
/* @var $this CartHistoryController */
/* @var $model CartHistory */

$this->breadcrumbs=array(
	'Cart Histories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CartHistory', 'url'=>array('index')),
	array('label'=>'Manage CartHistory', 'url'=>array('admin')),
);
?>

<h1>Create CartHistory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>