<?php
/**
 * Template Name: Front Page
 *
 * Classic PHP template using Tailwind CSS and template-parts.
 * Supports both Russian and English versions.
 */

get_header();
?>

<main class="site-main">
    <?php
    // Load sections based on current language
    if ( tp_is_english() ) {
        // English version - currently shows hero section only with static content
        get_template_part( 'template-parts/home/hero-en' );
        // Note: Other sections to be localized
    } else {
        // Russian version - full site
        get_template_part( 'template-parts/home/hero' );
        get_template_part( 'template-parts/home/donation' );
        get_template_part( 'template-parts/home/about' );
        get_template_part( 'template-parts/home/about-part2' );
        get_template_part( 'template-parts/home/projects' );
        get_template_part( 'template-parts/home/friends' );
        get_template_part( 'template-parts/home/media' );
        get_template_part( 'template-parts/home/materials' );
        get_template_part( 'template-parts/home/histories' );
        get_template_part( 'template-parts/home/team' );
    }
    ?>
</main>

<?php
get_footer();