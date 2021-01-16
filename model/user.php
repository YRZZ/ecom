<?php

function addUser($pdo, $data)
{
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

function getClient($pdo, $email)
{
    $sql = "
        SELECT id, email, password, first_name, last_name
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

// ######################## order ##########################
function openOrder($pdo, $data){
    $sql = "
        INSERT INTO `order` (id_client, paid)
        VALUES (:id_client, :paid);
    ";

    $stmt = $pdo->prepare($sql);

    try {
        return $stmt->execute(
            [
                'id_client'=> $_SESSION['id'],
                'paid'=>0
            ]
        ); 
        
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }



}
function addToCart($pdo, $post, $dataOrder){
    $sql = "
        INSERT INTO content_order (id_order, id_item, quantity)
        VALUES (:id_order, :id_item, :quantity);
    ";

    $stmt = $pdo->prepare($sql);

    try {
        return $stmt->execute(
            [
                'id_order'=>$dataOrder['id'],
                'id_item'=> $post['id_item'],
                'quantity'=>$post['quantity']
            ]
        ); 
        
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }



}
function orderByIdClient($pdo, $id){
    $sql = "
        SELECT *
        FROM `order`
        WHERE id_client = :id;
    "; 
    $stmt = $pdo->prepare($sql); 
    try {
        $stmt->execute(
            [
                'id'=>$id,
            ]
        ); 
        return $stmt->fetch();
    
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}
function getContentOrder($pdo, $id){
    $sql = "
        SELECT *
        FROM content_order
        WHERE id_order = :id;
    "; 
    $stmt = $pdo->prepare($sql); 
    try {
        $stmt->execute(
            [
                'id'=>$id,
            ]
        ); 
        return $stmt->fetch();
    
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }

}
function scanOrderContent($pdo, $dataOrder, $post){
    $sql = "
        SELECT *
        FROM content_order
        WHERE id_order = :id_order AND id_item = :id_item  ;
    "; 
    $stmt = $pdo->prepare($sql); 
    try {
        $stmt->execute(
            [
                'id_order'=>$dataOrder['id'],
                'id_item'=> $post['id_item']
            ]
        ); 
        return $stmt->fetch();
    
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}
function modifyItemQuantity($pdo, $updatedQuantity,$dataOrder, $post ){
    $sql ="
        UPDATE content_order
        SET quantity = :qts
        WHERE id_order = :id_order AND id_item = :id_item  ;
    "; 
    $stmt = $pdo->prepare($sql); 
    try {
        $stmt->execute(
            [
                'qts'=> $updatedQuantity,
                'id_order'=>$dataOrder['id'],
                'id_item'=> $post['id_item']
            ]
        ); 
        

    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }

}




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





// function deleteUser ($pdo, $id) {
//     $sql = "
//         DELETE FROM user
//         WHERE id = :id;
//     ";

//     $stmt = $pdo->prepare($sql);

//     try {
//         $stmt->execute(["id" => $id]);
//         return $stmt->fetch();
//     } catch (Exception $e) {
//         $pdo->rollBack();
//         throw $e;
//     }
// }

// function updateUser ($pdo, $data, $id) {
//     $sql = "
//         UPDATE user
//         SET first_name = :firstname, last_name = :lastname, email = :email
//         WHERE id = :id;
//     ";

//     // foreach ($data as $key => $value) {
//     //     if ($key === 'firstname') {
//     //         $sql.= 'fistname = '
//     //     }
//     // }

//     $stmt = $pdo->prepare($sql);
    

//     try {
//         return $stmt->execute([
//             "id" => $id]);

            
//     } catch (Exception $e) {
//         $pdo->rollBack();
//         throw $e;
//     }


// }


