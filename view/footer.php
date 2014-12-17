<?php
$fnav = GetFootNavItems();
?>
<footer>
    <div class="fnav">
        <ul>
            <?php foreach ($fnav as $action => $text) : ?>
                <li>
                    <a href='/index.php?action=<?php echo $action ?>'><?php echo $text ?></a>
                </li>
            <?php endforeach; ?>
            <li><a href="/powerPoint/TeachingPresentation.pptx">Teaching Presentation</a></li>
        </ul>
        <p id="copy">&copy; <?php echo date('Y', getlastmod()); ?> lindstromlife.com, All rights reserved.</p>
    </div>
</footer>
</div>
</body>
</html>

