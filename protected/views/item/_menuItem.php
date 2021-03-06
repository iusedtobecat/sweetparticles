<?php
/* @var $this ItemController */
/* @var $data Item */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit')); ?>:</b>
	<?php echo CHtml::encode($data->unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />


	<?php
	// //$url=$this->createUrl('cart/additem',$params);
	// echo CHtml::ajaxButton('Buy', array('submit' => array('cart/additem', 'item_id'=>$data->id)),
	// 	array(
	// 		'async'=>true,
	// 	)
	// );

	echo CHTML::ajaxSubmitButton('Buy',
		Yii::app()->createUrl('cart/additem',
			array("item_id" => $data->id)
		),
		array(
			'success' => 'js:function(data){console.log(data);udpateCart(data.data)}',
			'contentType ' => 'application/json',
			'dataType' => 'json',
		)
	);


	?>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('promo')); ?>:</b>
	<?php echo CHtml::encode($data->promo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promo_discount')); ?>:</b>
	<?php echo CHtml::encode($data->promo_discount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	*/ ?>

</div>
