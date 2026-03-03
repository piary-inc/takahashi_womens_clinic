<?php
/**
 * ヘッダーテンプレート
 *
 * @package TakahashiWomens
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('antialiased'); ?>>
<?php wp_body_open(); ?>

<header class="bg-white shadow-sm" x-data="{ mobileMenu: false }">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <!-- サイトロゴ -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="text-xl font-bold text-gray-900">
                <?php bloginfo('name'); ?>
            </a>

            <!-- ナビゲーション (デスクトップ) -->
            <nav class="hidden md:block">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'flex space-x-8',
                    'fallback_cb'    => false,
                    'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                ]);
                ?>
            </nav>

            <!-- ハンバーガーメニュー (モバイル) -->
            <button
                class="md:hidden p-2"
                @click="mobileMenu = !mobileMenu"
                :aria-expanded="mobileMenu"
                aria-label="メニューを開く"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        x-show="!mobileMenu"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                    <path
                        x-show="mobileMenu"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
            </button>
        </div>

        <!-- モバイルメニュー -->
        <div x-show="mobileMenu" x-cloak class="md:hidden pb-4">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'space-y-2',
                'fallback_cb'    => false,
                'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
            ]);
            ?>
        </div>
    </div>
</header>
