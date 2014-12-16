<div class="container">
        <main>
            <h1>Recipes</h1>
<p>Here will be my recipe database</p>
        </main>

    
    
    <?php foreach ($comments as $comment) : ?>
		<div id="commentdiv">
			<fieldset>
				<legend><?php echo $comment['firstname']; ?> : <?php echo $comment['updated']; ?></legend>
				<?php echo $comment['comment']; ?>	
			</fieldset>
		</div>
	<?php endforeach; ?>
	
	<?php if (CheckSession()) : ?>
        Post a new comment:<br />
			<form id="commentform" method="POST" action="/?action=postcomment">
				<input type="hidden" name="itemId" value="<?php echo $id; ?>" />
				<textarea cols="40" rows="5" name="comment" id="commentarea"></textarea><br />
				<input type="submit" name="Submit" value="Submit" />
			</form>
	<?php else : ?>
		<p>
			Please log in to post a comment.
		</p>
	<?php endif; ?>