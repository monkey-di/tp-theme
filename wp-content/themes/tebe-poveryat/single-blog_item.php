<?php
/*
    Template Name: Blog Item Page
*/
get_header();
?>
    <main class="site-main blog-single">
        <div class="container mx-auto">
            <?php the_content();?>
            <div class="back-blog-button">
                <a href="/bloglist/">Вернуться к списку новостей</a>
            </div>
        </div>
    </main>
<?php get_footer();