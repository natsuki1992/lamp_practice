<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_historys($db){
    $sql = '
      SELECT
        history.history_id,
        history.user_id,
        history.total,
        history.total,
        history.created,
        users.type
      FROM
        history
      JOIN
        users
      ON
        history.user_id = users.user_id
    ';
  
    return fetch_all_query($db, $sql);
  }

function get_all_historys($db){
    return get_historys($db);
}

function get_history($db, $user_id){
    $sql = '
      SELECT
          history.history_id,
          history.user_id,
          history.total,
          history.created,
          users.type
      FROM
          history
      JOIN
          users
      ON
          history.user_id = users.user_id
      WHERE
          history.user_id = ?
      ORDER BY
          history.history_id
    ';
    return fetch_all_query($db, $sql, [$user_id]);
}

function get_type_history($db, $user_id){
    return get_history($db, $user_id);
}

function get_details($db, $history_id){
    $sql = '
      SELECT
          details.details_id,
          details.history_id,
          details.item_id,
          details.price,
          details.amount,
          items.item_id,
          items.name
      FROM
          details
      JOIN
          items
      ON
          details.item_id = items.item_id
      WHERE
          details.history_id = ?
      ORDER BY
          details.details_id
    ';
    return fetch_all_query($db, $sql, [$history_id]);
}

function get_all_details($db, $history_id){
    return get_details($db, $history_id);
}

function details_history($db, $history_id){
    $sql = '
      SELECT
        history_id,
        user_id,
        total,
        created
      FROM
        history
      WHERE
        history_id = ?
    ';

    return fetch_query($db, $sql, [$history_id]);
}

function get_details_history($db, $history_id){
    return details_history($db, $history_id);
}