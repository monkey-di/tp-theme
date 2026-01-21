<?php
/*
    Template Name: Blog Item Page
*/
get_header();
?>
    <main class="site-main blog-single">
        <div class="container mx-auto">
            <?php the_content();?>
        </div>
    </main>
<?php get_footer();