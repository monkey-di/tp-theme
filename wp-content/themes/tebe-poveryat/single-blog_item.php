<?php
/*
    Template Name: Blog Item Page
 */

get_header();
?>
    <main class="site-main blog-single">
        <div class="container">
            test
            <?php echo apply_filters( 'the_content', '<!-- wp:acf/blog-intro /-->' ); ?>
        </div>
    </main>
<?php

get_footer();