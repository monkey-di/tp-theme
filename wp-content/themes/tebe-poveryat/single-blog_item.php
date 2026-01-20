<?php
/*
    Template Name: Blog Item Page
 */

get_header();
?>
    <main class="site-main blog-single">
        <div class="container">

        </div>
    </main>
<?php
echo apply_filters( 'the_content', '<!-- wp:acf/blog-intro /-->' );
get_footer();