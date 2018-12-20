<?php if(count($reg_errors) > 0) : ?>
    <div>
        <?php foreach ($reg_errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
