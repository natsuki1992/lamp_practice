<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_all_historys($db){
    $sql = '
      SELECT
        history.history_id,
        history.user_id,
        history.total,
        history.created
      FROM
        history
      ORDER BY
        created desc
    ';
  
    return fetch_all_query($db, $sql);
  }

function get_type_history($db, $user_id){
    $sql = '
      SELECT
          history.history_id,
          history.user_id,
          history.total,
          history.created
      FROM
          history
      WHERE
          history.user_id = ?
      ORDER BY
          created desc
    ';
    return fetch_all_query($db, $sql, [$user_id]);
}

function get_all_details($db, $history_id){
    $sql = '
      SELECT
          details.item_id,
          details.price,
          details.amount,
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

function get_details_history($db, $history_id){
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

function get_user_details($db, $history_id, $user_id){
    $sql = '
      SELECT
          details.item_id,
          details.price,
          details.amount,
          items.name
      FROM
          details
      JOIN
          items
      ON
          details.item_id = items.item_id
      WHERE
          details.history_id = ?
      AND
          exists(SELECT * FROM history WHERE history_id = ? AND user_id = ?)
      ORDER BY
          details.details_id
    ';
    return fetch_all_query($db, $sql, [$history_id, $history_id, $user_id]);
}

function get_user_details_history($db, $history_id, $user_id){
    $sql = '
      SELECT
        history_id,
        user_id,
        total,
        created
      FROM
        history
      WHERE
        history_id = ? AND user_id = ?
    ';

    return fetch_query($db, $sql, [$history_id, $user_id]);
}