<?php
/* @var $this CartController */
/* @var $model Cart */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cart-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cart_owner'); ?>
		<?php echo $form->textField($model,'cart_owner'); ?>
		<?php echo $form->error($model,'cart_owner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shipping_address'); ?>
		<?php echo $form->textArea($model,'shipping_address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'shipping_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tax'); ?>
		<?php echo $form->textField($model,'tax'); ?>
		<?php echo $form->error($model,'tax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_price'); ?>
		<?php echo $form->textField($model,'total_price'); ?>
		<?php echo $form->error($model,'total_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cart_status'); ?>
		<?php echo $form->textField($model,'cart_status'); ?>
		<?php echo $form->error($model,'cart_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_option'); ?>
		<?php echo $form->textField($model,'payment_option'); ?>
		<?php echo $form->error($model,'payment_option'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->