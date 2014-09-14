<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/cart.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.1.min.js"></script>

	<script type="text/javascript">
	$(function() {
		$.ajax({
			url: "<?php echo $this->createUrl('cart/getOrders'); ?>",
			type: "POST",
			dataType : "json",
			success: function( data ) {
				udpateCart(data.data);
			},
			error: function( xhr, status, errorThrown ) {
					// alert( "Sorry, there was a problem!" );
					// console.log( "Error: " + errorThrown );
					// console.log( "Status: " + status );
					// console.dir( xhr );
			},
			complete: function( xhr, status ) {
					// alert( "The request is complete!" );
			}
		});
	});
	</script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php

		$admin_menu = array(
				array('label'=>'Carts', 'url'=>array('/cart/index')),
				array('label'=>'Cart History', 'url'=>array('/carthistory/index')),
				array('label'=>'Items', 'url'=>array('/item/index')),
				array('label'=>'Orders', 'url'=>array('/order/index')),
				array('label'=>'Preferences', 'url'=>array('/siteinformation/index')),
		);

		// generate array
		$array = array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Menus', 'url'=>array('/item/menus', 'view'=>'menus')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Admin', 'url'=>array('/siteinformation/index'), 'items'=>$admin_menu),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			)
		);

		$this->widget('zii.widgets.CMenu', $array);

		?>
	</div><!-- mainmenu -->

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
