<?php
get_header();
?>

<main class="site-main container mx-auto px-4 py-8">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="text-3xl font-bold mb-4"><?php the_title(); ?></h1>
                <div class="entry-content prose">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
        endwhile;
    else :
        ?>
        <p>Ничего не найдено.</p>
        <?php
    endif;
    ?>
</main>

<?php
get_footer();