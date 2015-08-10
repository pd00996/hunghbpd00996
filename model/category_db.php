<?php
function get_categories() {
    global $db;
    $query = 'SELECT *,
                (SELECT COUNT(*)
                 FROM sanpham
                 WHERE sanpham.idsanpham = loaisanpham.idloaisanpham)
                 AS productCount
              FROM loaisanpham
              ORDER BY idloaisanpham';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_category($category_id) {
    global $db;
    $query = '
        SELECT *
        FROM loaisanpham
        WHERE idloaisanpham = :category_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_category($name) {
    global $db;
    $query = 'INSERT INTO loaisanpham
                 (tenloaisanpham)
              VALUES
                 (:name)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $statement->closeCursor();

        // Get the last product ID that was automatically generated
        $category_id = $db->lastInsertId();
        return $category_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_category($category_id, $name) {
    global $db;
    $query = '
        UPDATE loaisanpham
        SET tenloaisanpham = :name
        WHERE idloaisanpham = :category_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_category($category_id) {
    global $db;
    $query = 'DELETE FROM loaisanpham WHERE idloaisanpham = :category_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

?>