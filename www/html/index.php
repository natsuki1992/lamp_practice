<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);
$token = get_csrf_token();
$pull_down_item = form_get('pull_down_item');

if(isset($pull_down_item) === false){
  $pull_down_item = "new_items";
}
if($pull_down_item === 'cheap_price'){
  $items = get_open_cheap_price_items($db);
} else if($pull_down_item === 'high_price'){
  $items = get_open_high_price_items($db);
} else if($pull_down_item === 'new_items'){
  $items = get_open_items($db);
}

include_once VIEW_PATH . 'index_view.php';