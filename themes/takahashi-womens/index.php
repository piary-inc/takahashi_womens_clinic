<?php
/**
 * メインテンプレート
 *
 * @package TakahashiWomens
 */

get_header();
?>

<main class="min-h-screen">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class('container mx-auto px-4 py-8'); ?>>
                <h2 class="text-2xl font-bold mb-4 test">
                    Clickするとアラートが出ます。これはjQueryテスト用です
                </h2>
                <div class="prose max-w-none">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <div class="container mx-auto px-4 py-16 text-center">
            <p class="text-gray-500">コンテンツがありません。</p>
        </div>
    <?php endif; ?>
</main>

<?php
get_footer();
