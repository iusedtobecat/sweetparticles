<?php
/* @var $this CartHistoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cart Histories',
);

$this->menu=array(
	array('label'=>'Create CartHistory', 'url'=>array('create')),
	array('label'=>'Manage CartHistory', 'url'=>array('admin')),
);
?>

<h1>Cart Histories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
