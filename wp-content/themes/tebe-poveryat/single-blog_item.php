<?php
/*
    Template Name: Blog Item Page
*/
get_header();
?>
    <main class="site-main blog-single">
        <div class="container mx-auto">
            <?php echo apply_filters( 'the_content', '<!-- wp:acf/blog-intro /-->' ); ?>
            <?php echo apply_filters( 'the_content', '<!-- wp:acf/slider-text /-->' ); ?>
            <?php echo apply_filters( 'the_content', '<!-- wp:acf/full-video /-->' ); ?>
        </div>
    </main>
<?php the_content();?>
<?php
get_footer();