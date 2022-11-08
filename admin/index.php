<?php require __DIR__ . '/modules/header.php'; ?>
<?php require __DIR__ . '/modules/navbar.php'; ?>
<div class="container">
    <h1 class="title"><?= _t('仪表盘') ?></h1>
    <button class="btn">立即登录</button>
    <button class="btn btn-circle">
        <span class="material-symbols-rounded icon">settings</span>
    </button>
    <input class="input" type="text">
    <?php site_url() ?>
</div>
<?php require __DIR__ . '/modules/footer.php'; ?>
