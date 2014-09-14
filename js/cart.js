function udpateCart(orders) {
  var text = '';
  for (i = 0; i < orders.length; i++) {
      text += "id: " + orders[i].id + " ";
      text += "item_id: " + orders[i].item_id + " ";
      text += "order_by: " + orders[i].order_by + " ";
      text += "quantity: " + orders[i].quantity + " ";
      text += "create_time: " + orders[i].create_time + "<br>";
  }
  $('#cart-content').html(text);
}
