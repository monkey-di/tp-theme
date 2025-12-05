<?php
/**
 * Template Name: Front Page
 * 
 * Classic PHP template using Tailwind CSS and template-parts.
 */

get_header(); 
?>

<main class="site-main">
    <?php
    // Подключаем секции по порядку
    get_template_part( 'template-parts/home/hero' );
    get_template_part( 'template-parts/home/donation' );
    get_template_part( 'template-parts/home/about' );
    get_template_part( 'template-parts/home/about-part2' ); // New part
    get_template_part( 'template-parts/home/projects' );
    get_template_part( 'template-parts/home/friends' );
    get_template_part( 'template-parts/home/media' );

    // Materials
    get_template_part( 'template-parts/home/materials' );
    get_template_part( 'template-parts/home/histories' );
    get_template_part( 'template-parts/home/team' );
    ?>
</main>

<?php
get_footer();