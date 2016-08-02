<div class="ah-notifications">
    <?php if(isset($_GET['success'])) : ?>
        <p class="ah-notifications__notification ah-notifications__notification--success"><?php echo $successMessage; ?></p>
    <?php elseif(isset($_GET['error'])) : ?>
        <p class="ah-notifications__notification ah-notifications__notification--error"><?php echo $errorMessage; ?></p>
    <?php endif ?>
</div>