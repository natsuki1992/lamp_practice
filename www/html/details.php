<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'history.php';

session_start();

if(is_logined() === false){
    redirect_to(LOGIN_URL);
}

$history_id = get_post('history_id');
$db = get_db_connect();
$user = get_login_user($db);
$details = get_all_details($db, $history_id);
$details_history = get_details_history($db, $history_id);

include_once VIEW_PATH . 'details_view.php';