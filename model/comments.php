<?php
/// GetCommentsByUser
/// Returns all of the comments written by the given user.
/// $userId - the User Id of the user who wrote the comments.
function GetOrderedComments()
{
	$query = "SELECT * FROM comments ORDER BY id DESC";
	return DbSelect($query);
}

/// Saves comments onto an item.
/// $itemId - the Item to save comments for
/// $userId - the Id of the User who wrote the comment.
/// $comment - the text of the comment.
function SaveComment($userId, $comment)
{
	$query = "INSERT INTO comments(userId, comment) VALUES(:userId, :comment)";
	return DbInsert($query, array(':userId' => $userId, ':comment' => $comment));
}

/// Deletes the comments
function DeleteComment($comment) {
    if ($comment) {
        $query = "DELETE FROM comments WHERE userId=:id";
        $result = DbExecute($query, array(':id' => $userId));
    }
}
