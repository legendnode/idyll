<?php require __DIR__ . '/modules/header.php'; ?>
<div class="login">
    <div class="board card mt-5 border-0">
        <div class="card-body pt-0">
            <h2 class="card-title text-center my-4">
                <?= _t('田园生活') ?>
            </h2>
            <form action="/user/register" method="POST">
                <div class="mb-3">
                    <input class="form-control form-control-lg" name="username" type="text" placeholder="<?= _t('用户名') ?>" autofocus>
                </div>
                <div class="mb-3">
                    <input class="form-control form-control-lg" name="email" type="email" placeholder="<?= _t('邮箱') ?>" autofocus>
                </div>
                <div class="mb-3">
                    <input class="form-control form-control-lg" name="password" type="text" placeholder="<?= _t('密码') ?>">
                </div>
                <div class="mb-3 d-grid">
                    <button class="btn btn-primary btn-lg" type="submit"><?= _t('注册') ?></button>
                </div>
            </form>
            <div class="d-flex justify-content-between">
                <a class="link-secondary text-decoration-none" href="/"><?= _t('返回首页') ?></a>
                <a class="link-secondary text-decoration-none" href="/admin/login.php"><?= _t('用户登录') ?></a>
            </div>
        </div>
    </div>
</div>
<?php require __DIR__ . '/modules/footer.php'; ?>
