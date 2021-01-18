<?php

function addUser($pdo, $data){
    $sql = "
        INSERT INTO client (first_name, last_name, email, password, phone)
        VALUES (:firstname, :lastname, :email, :password, :phone);
    ";

    $stmt = $pdo->prepare($sql);

    try {
        return $stmt->execute($data); 
        
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

// ######################## item ##########################


// ######################## user ##########################
function getEmailPassword($pdo, $email) {
    $sql = "
        SELECT email, password, first_name
        FROM client
        WHERE email = :email;
    ";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(
            [
                "email" => $email,
            ]
        );
        return $stmt->fetch();
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

function getClient($pdo, $email){
    $sql = "
        SELECT id, email, password, first_name, last_name, phone
        FROM client
        WHERE email = :email;
    ";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(
            [
                "email" => $email,
            ]
        );
        return $stmt->fetch();
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

function updateClient($pdo, $fromage)
{
    $first_name = $fromage['first_name'];
    $last_name = $fromage['last_name'];
    $email = $fromage['email'];
    $phone = $fromage['phone'];
    $sql = "
        UPDATE client
        SET first_name = :first_name , last_name = :last_name , email = :email , phone = :phone
        WHERE email = :email;
    ";

    $stmt = $pdo->prepare($sql);

    try {
        return $stmt->execute(
            [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "phone" => $phone
            ]
        );
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}



// ######################## order ##########################



##########################################################################
// function getAllUsers($pdo) {
//     $sql = "
//         SELECT *
//         FROM user;
//     "; // on définit la requête sql

//     $stmt = $pdo->prepare($sql); // on la prépare

//     // $stmt->execute();  true or false

//     // while ($data = $stmt->fetch()) {
//     //     var_dump($data);
//     // };
//     // récupère toutes les données avec fetchall
//     // avec fetch on retourne un seul élément, puis l'élément suivant si on répète (et on n'obtient pas "des tableaux dans un tableau")

//     try {
//         $stmt->execute();
//         return $stmt->fetchAll();
//     } catch (Exception $e) {
//         $pdo->rollBack();
//         throw $e;
//     }
// }



// function getUser ($pdo, $id) {
//     $sql = "
//         SELECT *
//         FROM user
//         WHERE id = $id;
//     "; 

//     $stmt = $pdo->prepare($sql); // on la prépare

//     $stmt->execute(); // true or false

//     while ($data = $stmt->fetch()) {
//         var_dump($data);
//     }

//     try {
//         $stmt->execute();
//         return $stmt->fetch();
//     } catch (Exception $e) {
//         $pdo->rollBack();
//         throw $e;
//     }
// }


// function getUserEmail($pdo, $email)
// {
//     $sql = "
//         SELECT *
//         FROM user
//         WHERE email = $email;
//     ";
//     // var_dump($email);
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute();


//     try {
//         return $stmt->fetch();
//     } catch (Exception $e) {
//         $pdo->rollBack();
//         throw $e;
//     }
// }






//     $stmt = $pdo->prepare($sql);

//     try {
//         $stmt->execute(["id" => $id]);
//         return $stmt->fetch();
//     } catch (Exception $e) {
//         $pdo->rollBack();
//         throw $e;
//     }
// }



