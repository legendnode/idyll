<?php

namespace {
    // 自动加载
    spl_autoload_register(function ($class) {
        $alias = [
            'Content' => 'content',
            'Themes' => 'content/themes',
            'Plugins' => 'content/plugins',
            'Languages' => 'content/languages',
            'Idyll' => 'includes',
            'Helpers' => 'includes/Helpers',
            'Widgets' => 'includes/Widgets',
        ];
        $class = explode('\\', $class);

        $class[0] = $alias[$class[0]] ?? $class[0];

        $file = ROOT_DIR . implode('/', $class) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    });

    // 加载公共函数
    require ROOT_DIR . 'includes/functions.php';

    // 内容渲染
    ob_start(function ($content) {
        \Idyll\Response::instance()->sendHeaders();
        return $content;
    });
}

namespace Idyll {
    class Common
    {
        public static function init()
        {
            // 异常处理
            if (!DEBUG) {
                set_exception_handler(function ($e) {
                    \Idyll\Response::instance()->clean();
                    ob_end_clean();

                    ob_start(function ($content) {
                        \Idyll\Response::instance()->sendHeaders();
                        return $content;
                    });

                    $message = $e->getMessage();
                    $code = $e->getCode() === 0 ? 500 : $e->getCode();
                    \Idyll\Response::instance()->setStatus($code);

                    echo <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Error {$code}</title>
    <style>
        body { height: 100%; padding: 10% 15px 0; background: #fafafa; color: #777; }
        h1 { text-align: center; font-weight: lighter; letter-spacing: normal; font-size: 3rem; margin: 0; color: #222; }
    </style>
</head>
<body>
    <h1>{$message}</h1>
</body>
</html>\n
HTML;
                });
            }

            // 数据库初始化
            \Idyll\Db::init(DB);

            // 获取选项
            $option = \Widgets\Option::alloc();

            // 语言初始化
            \Idyll\I18n::init($option->get('language', ''));

            // 插件初始化
            \Idyll\Plugin::init($option->get('plugin', []));
        }
    }
}
