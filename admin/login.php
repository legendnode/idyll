<?php require __DIR__ . '/modules/header.php'; ?>
<div class="login">
    <div class="board card mt-5 border-0">
        <div class="card-body pt-0">
            <h2 class="card-title text-center my-4">
                <?= _t('田园生活') ?>
            </h2>
            <form action="/user/login" method="POST">
                <div class="mb-3">
                    <input class="form-control form-control-lg" name="account" type="text" placeholder="<?= _t('用户名或邮箱') ?>" autofocus>
                </div>
                <div class="mb-3">
                    <input class="form-control form-control-lg" name="password" type="text" placeholder="<?= _t('密码') ?>">
                </div>
                <div class="mb-3 d-grid">
                    <button class="btn btn-primary btn-lg" type="submit"><?= _t('登录') ?></button>
                </div>
            </form>
            <div class="d-flex justify-content-between">
                <a class="link-secondary text-decoration-none" href="/"><?= _t('返回首页') ?></a>
                <a class="link-secondary text-decoration-none" href="/admin/register.php"><?= _t('用户注册') ?></a>
            </div>
        </div>
    </div>
</div>
<?php require __DIR__ . '/modules/footer.php'; ?>
