<?php
/**
 * 高橋ウィメンズクリニック テーマ関数
 *
 * @package TakahashiWomens
 */

// 直接アクセス防止
if (!defined('ABSPATH')) {
    exit;
}

/**
 * テーマの基本設定
 */
function tw_setup(): void
{
    // タイトルタグの自動出力
    add_theme_support('title-tag');

    // アイキャッチ画像
    add_theme_support('post-thumbnails');

    // HTML5マークアップ
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    // ナビゲーションメニュー
    register_nav_menus([
        'primary'   => 'グローバルナビゲーション',
        'footer'    => 'フッターナビゲーション',
    ]);
}
add_action('after_setup_theme', 'tw_setup');

/**
 * Viteマニフェストを読み込む
 *
 * @return array|null マニフェストデータ
 */
function tw_get_vite_manifest(): ?array
{
    $manifest_path = get_theme_file_path('dist/.vite/manifest.json');

    if (!file_exists($manifest_path)) {
        return null;
    }

    $manifest = json_decode(file_get_contents($manifest_path), true);

    return is_array($manifest) ? $manifest : null;
}

/**
 * Vite開発サーバーが稼働中か判定
 *
 * @return bool
 */
function tw_is_vite_dev(): bool
{
    // WP_DEBUGが無効なら本番モード
    if (!defined('WP_DEBUG') || !WP_DEBUG) {
        return false;
    }

    // Vite開発サーバーへの疎通確認（タイムアウト短め）
    $response = @file_get_contents('http://node:5173/@vite/client', false, stream_context_create([
        'http' => ['timeout' => 1],
    ]));

    return $response !== false;
}

/**
 * アセットの読み込み（開発/本番を自動切替）
 */
function tw_enqueue_assets(): void
{
    // jQueryはWordPress同梱のものを使用
    wp_enqueue_script('jquery');

    if (tw_is_vite_dev()) {
        // --- 開発モード: Vite開発サーバーから読み込み ---
        // Viteクライアント
        wp_enqueue_script(
            'vite-client',
            'http://localhost:5173/@vite/client',
            [],
            null,
            false
        );
        // メインCSS (Vite経由)
        wp_enqueue_script(
            'tw-app-css',
            'http://localhost:5173/src/css/app.css',
            [],
            null,
            false
        );
        // メインJS
        wp_enqueue_script(
            'tw-app-js',
            'http://localhost:5173/src/js/app.js',
            ['jquery'],
            null,
            true
        );
    } else {
        // --- 本番モード: ビルド済みアセットを読み込み ---
        $manifest = tw_get_vite_manifest();

        if ($manifest === null) {
            return;
        }

        // CSS
        if (isset($manifest['src/css/app.css'])) {
            $css_entry = $manifest['src/css/app.css'];
            if (isset($css_entry['file'])) {
                wp_enqueue_style(
                    'tw-app-css',
                    get_theme_file_uri('dist/' . $css_entry['file']),
                    [],
                    null
                );
            }
        }

        // JS
        if (isset($manifest['src/js/app.js'])) {
            $js_entry = $manifest['src/js/app.js'];
            wp_enqueue_script(
                'tw-app-js',
                get_theme_file_uri('dist/' . $js_entry['file']),
                ['jquery'],
                null,
                true
            );

            // JSエントリに紐づくCSSチャンク
            if (isset($js_entry['css'])) {
                foreach ($js_entry['css'] as $index => $css_file) {
                    wp_enqueue_style(
                        "tw-app-js-css-{$index}",
                        get_theme_file_uri('dist/' . $css_file),
                        [],
                        null
                    );
                }
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'tw_enqueue_assets');

/**
 * Vite開発サーバーのスクリプトにtype="module"を付与
 */
function tw_vite_script_type(string $tag, string $handle): string
{
    $vite_handles = ['vite-client', 'tw-app-css', 'tw-app-js'];

    if (in_array($handle, $vite_handles, true) && tw_is_vite_dev()) {
        $tag = str_replace(' src=', ' type="module" src=', $tag);
    }

    if ($handle === 'tw-app-js' && !tw_is_vite_dev()) {
        $tag = str_replace(' src=', ' type="module" src=', $tag);
    }

    return $tag;
}
add_filter('script_loader_tag', 'tw_vite_script_type', 10, 2);
