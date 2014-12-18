<?php ?>
<script src="/js/commentdetails.js"></script>
<main>
    <h1>Family Discussion</h1>
    <p>Family and non family members will be able to get together and make comments to one another.</p>
<?php foreach ($comments as $comment) : ?>
        <div id="commentdiv">
            <fieldset>
                <legend><?php echo $comment['updated']; ?></legend>
                <?php echo $comment['comment']; ?>	
            </fieldset>
        </div>
    <?php endforeach; ?>

    <?php if (CheckSession()) : ?>
    <div id="formcomment">
        <form id="commentform" method="POST" action="/?action=postcomment">
            <fieldset>
                <legend>Post a new comment:</legend>
            <textarea cols="40" rows="5" name="comment" id="commentarea"></textarea><br />
            <input type="submit" name="Submit" value="Submit" />
            </fieldset>
        </form>
    </div>
    <?php else : ?>
        <p>
            Please log in to post a comment.
        </p>
    <?php endif; ?>
</main>