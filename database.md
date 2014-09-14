Site Configuration
site_id pk
site_name string
site_tag string
site_about string
site_address string
site_phone string
site_fb string
site_twitter
site_office_hours
create_time
update_time

user
user_id int pk
username string
password string
email string requires email
access_level = (1 => admin; 2 => customer)
create_time
update_time

orders
order_id
item_id fk item.item_id
order_by fk user.user_id
quantity
cart_id

cart
cart_id
shipping_address
tax
total_price
cart_status = (
  1 = opened
  2 = acknowledge
  3 = on_transit
  4 = shipped
  5 = closed
  6 = dismissed
  7 = undefined
  8 = return
  )
payment_option = (
  1 = on arrival
  )

cartstatus_history
order_id
order_status = (
  1 = opened
  2 = acknowledge
  3 = on_transit
  4 = shipped
  5 = closed
  6 = dismissed
  7 = undefined
  8 = return
  )
create_time
update_time

item
item_id
name
description
unit = (pcs, kg, bundles)
price
create_time
update_time
promo = (false, true)
promo_discount = percent discount
