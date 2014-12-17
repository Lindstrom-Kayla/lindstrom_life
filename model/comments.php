<?php

/// GetCommentsByUser
/// Returns all of the comments written by the given user.
/// $userId - the User Id of the user who wrote the comments.
function GetCommentsByUser($userId) {
    $query = "SELECT * FROM comments WHERE userId=:id";
    return DbSelect($query, array(':id' => $userId));
}

/// Saves comments onto an item.
/// $itemId - the Item to save comments for
/// $userId - the Id of the User who wrote the comment.
/// $comment - the text of the comment.
function SaveComment($Id, $userId, $comment) {
    $query = "INSERT INTO comments(userId, Id, comment) VALUES(:userId, :Id, :comment)";
    return DbInsert($query, array(':userId' => $userId, ':Id' => $itemId, ':comment' => $comment));
}

/// Deletes the comments
function DeleteComment($comment) {
    if ($comment) {
        $query = "DELETE FROM comments WHERE comment=:comment";
        $result = DbExecute($query, array(':comment' => $comment));
    }
}

function GetCommentById($id) {
    $query = "SELECT * FROM items WHERE ID=:id";
    $result = DbSelect($query, array(':id' => $id));

    if (array_key_exists(0, $result)) {
        return $result[0];
    }

    return false;
}
