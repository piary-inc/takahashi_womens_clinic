<?php
/**
 * フッターテンプレート
 *
 * @package TakahashiWomens
 */
?>

<footer class="bg-gray-900 text-white mt-auto">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- クリニック情報 -->
            <div>
                <h3 class="text-lg font-bold mb-4"><?php bloginfo('name'); ?></h3>
                <p class="text-gray-400 text-sm">
                    <?php bloginfo('description'); ?>
                </p>
            </div>

            <!-- フッターナビ -->
            <div>
                <h3 class="text-lg font-bold mb-4">メニュー</h3>
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer',
                    'container'      => false,
                    'menu_class'     => 'space-y-2 text-sm text-gray-400',
                    'fallback_cb'    => false,
                    'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                ]);
                ?>
            </div>

            <!-- アクセス -->
            <div>
                <h3 class="text-lg font-bold mb-4">アクセス</h3>
                <address class="text-gray-400 text-sm not-italic">
                    <!-- 住所・連絡先は後で更新 -->
                </address>
            </div>
        </div>

        <!-- コピーライト -->
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm text-gray-500">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
