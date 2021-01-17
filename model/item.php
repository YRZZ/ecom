<?php
function getItemByCategory ($pdo, $id) {
    $sql = "
        SELECT *
        FROM item
        WHERE id_category = :id;
    "; 

    $stmt = $pdo->prepare($sql); 

    $stmt->execute(
        [
            'id'=>$id,
        ]
    ); 

    try {
       return $stmt->fetchAll();
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

function getAllItem($pdo) {
    $sql = "
        SELECT *
        FROM item;
        
    "; // on définit la requête sql

    $stmt = $pdo->prepare($sql); // on la prépare
    $stmt->execute(); // true or false
    return $stmt->fetchAll();
    try {
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

function getItemById ($pdo, $id) {
    $sql = "
        SELECT *
        FROM item
        WHERE id = :id;
    "; 

    $stmt = $pdo->prepare($sql); 

    $stmt->execute(
        [
            'id'=>$id,
        ]
    ); 

    try {
       return $stmt->fetchAll();
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}