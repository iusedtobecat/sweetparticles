<?php

class CartController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'additem', 'getOrders'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionGetOrders()
	{
		$user_id=Yii::app()->user->id;

		// find the users cart
		$user = User::model()->find(array(
			'condition'=>'id=:user_id',
			'params'=>array(':user_id'=>$user_id),
		));

		// find the users cart
		$cart = Cart::model()->find(array(
			'condition'=>'cart_owner=:cart_owner',
			'params'=>array(':cart_owner'=>$user_id),
		));

		// find all orders by this user.
		$orders=Order::model()->findAll(
			'cart_id=:cart_id AND order_by=:order_by',
			array(
				':cart_id'=>$cart->id,
				':order_by'=>$user->id,
			)
		);

		$return = array('success'=>true, 'data'=>$orders);
		echo CJavaScript::jsonEncode($return);
		Yii::app()->end();
	}

	/**
	* Displays a particular model.
	* @param integer $id the ID of the model to be displayed
	*/
	public function actionAdditem($item_id)
	{

		$user_id=Yii::app()->user->id;

		// find the users cart
		$user = User::model()->find(array(
	    'condition'=>'id=:user_id',
	    'params'=>array(':user_id'=>$user_id),
		));

		// find the users cart
		$cart = Cart::model()->find(array(
	    'condition'=>'cart_owner=:cart_owner',
	    'params'=>array(':cart_owner'=>$user_id),
		));

		// find the item being reffered to by item_id
		$item = Item::model()->find(array(
	    'condition'=>'id=:item_id',
	    'params'=>array(':item_id'=>$item_id),
		));

		if (is_null ($cart) ) {
			// if the cart is not found. create a cart for the user.
			$cart = new Cart;
			$cart->cart_owner = $user->id;
			$cart->save();
		}

		// check if the same order was already made & increment else, create new
		$order = Order::model()->find(array(
			'condition'=>'item_id=:item_id AND cart_id=:cart_id AND order_by=:order_by',
			'params'=>array(
				':item_id'=>$item_id,
				':cart_id'=>$cart->id,
				':order_by'=>$user->id,
			),
		));

		if (is_null ($order) ) {
			$order = new Order;
			$order->create_time = time();
			$order->quantity = 1;

			$order->item_id = $item->id;
			$order->cart_id = $cart->id;
			$order->order_by = $user->id;
		} else {
			$order->quantity = 1 + $order->quantity;
			$order->update_time = time();
		}

		$order->save();

		// find all orders by this user.
		$orders=Order::model()->findAll(
			'cart_id=:cart_id AND order_by=:order_by',
			array(
				':cart_id'=>$cart->id,
				':order_by'=>$user->id,
			)
		);

		$return = array('success'=>true, 'data'=>$orders);
		echo CJavaScript::jsonEncode($return);
		Yii::app()->end();
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Cart;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cart']))
		{
			$model->attributes=$_POST['Cart'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cart']))
		{
			$model->attributes=$_POST['Cart'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Cart');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('Cart');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		// $model=new Cart('search');
		// $model->unsetAttributes();  // clear any default values
		// if(isset($_GET['Cart']))
		// 	$model->attributes=$_GET['Cart'];
		//
		// $this->render('admin',array(
		// 	'model'=>$model,
		// ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cart the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cart::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Cart $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cart-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
