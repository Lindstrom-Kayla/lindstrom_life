<?php
?>

<ul>
	<li><a href="/?action=myinfo">Update my info</a></li>
</ul>


<?php if(LoggedInUserIsAdmin()) : ?>

	Admin Items:<br />
	<ul>
		<li><a href="/?action=editusers">Edit Users</a></li>
	</ul>

<?php endif; ?>
