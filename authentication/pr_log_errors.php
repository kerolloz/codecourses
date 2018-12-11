<?php if(count($log_errors) > 0) : ?>
    <div>
        <?php foreach ($log_errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
