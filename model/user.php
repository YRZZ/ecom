<?php

function addUser($pdo, $data)
{
    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $email = $data['email'];


    $sql = "
        INSERT INTO user (first_name, last_name, email)
        VALUES (:firstname, :lastname, :email);
    ";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(
            [
                "firstname" => $firstname,
                "lastname" => $lastname,
                "email" => $email
            ]
        );
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}


function getAllUsers($pdo){
    $sql = "
        SELECT *
        FROM user;
    "; // on définit la requête sql

    $stmt = $pdo->prepare($sql); // on la prépare

    // $stmt->execute();  true or false

    // while ($data = $stmt->fetch()) {
    //     var_dump($data);
    // };
    // récupère toutes les données avec fetchall
    // avec fetch on retourne un seul élément, puis l'élément suivant si on répète (et on n'obtient pas "des tableaux dans un tableau")

    try {
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }

}



function getUser ($pdo, $id) {
    $sql = "
        SELECT *
        FROM user
        WHERE id = $id;
    "; // on définit la requête sql

    $stmt = $pdo->prepare($sql); // on la prépare

    $stmt->execute(); // true or false

    while ($data = $stmt->fetch()) {
        var_dump($data);
    }
    // récupère toutes les données avec fetchall
    // avec fetch on retourne un seul élément, puis l'élément suivant si on répète (et on n'obtient pas "des tableaux dans un tableau")

    try {
        $stmt->execute();
        return $stmt->fetch();
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }


}

function deleteUser ($pdo, $id) {
    $sql = "
        DELETE FROM user
        WHERE id = :id;
    ";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(["id" => $id]);
        return $stmt->fetch();
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

function updateUser ($pdo, $data, $id) {
    $sql = "
        UPDATE user
        SET first_name = :firstname, last_name = :lastname, email = :email
        WHERE id = :id;
    ";

    // foreach ($data as $key => $value) {
    //     if ($key === 'firstname') {
    //         $sql.= 'fistname = '
    //     }
    // }

    $stmt = $pdo->prepare($sql);
    

    try {
        return $stmt->execute([
            "id" => $id]);

            
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}
