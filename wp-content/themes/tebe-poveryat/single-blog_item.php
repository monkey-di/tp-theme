<?php
/*
    Template Name: Blog Item Page
 */

get_header();
?>
    <main class="site-main blog-single">
        <div class="container">
            <div class="post-meta">
                <time>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg">
                    <span><?php echo get_the_date(); ?></span>
                </time>
            </div>
            <h1 class="blog-single-title">
                <?php the_title(); ?>
            </h1>
        </div>
    </main>
<?php
echo apply_filters( 'the_content', '<!-- wp:acf/blog-intro /-->' );
get_footer();