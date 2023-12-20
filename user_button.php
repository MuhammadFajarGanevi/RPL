<?php
if (isset($username)):
    if ($role == 1):
        ?>
        <a id="show-login" class="btn btn-primary">
            <?php echo "$username" ?>
        </a>
    <?php elseif ($role == 2): ?>
        <a id="show-login" class="btn btn-primary">
            <?php echo "$username" ?>
        </a>

    <?php elseif ($role == 0): ?>
        <a id="show-login" class="btn btn-primary">
            <?php echo "$username" ?>
        </a>
    <?php endif; ?>

<?php else: ?>
    <a href="tampilan/login.html" class="btn">Login</a>
<?php endif; ?>