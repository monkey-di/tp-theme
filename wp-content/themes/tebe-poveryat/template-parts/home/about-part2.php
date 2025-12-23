<?php
/**
 * About Section - Part 2
 * Mobile First with Desktop version.
 * Dynamic content from page
 */

$about_page = get_page_by_path( 'about-part2-block' );
if ( ! $about_page ) {
    return;
}

// Разбираем контент страницы по строкам
$content_parts = explode( "\n\n", $about_page->post_content );
$name = ! empty( $content_parts[0] ) ? $content_parts[0] : '';
$position = ! empty( $content_parts[1] ) ? $content_parts[1] : '';
$description_parts = array_slice( $content_parts, 2 );
$description = implode( "\n\n", $description_parts );

// Получаем изображение
$image_url = get_the_post_thumbnail_url( $about_page->ID, 'full' );
?>
<section class="about-section-part2 w-full bg-surface px-4 relative overflow-hidden z-20 pt-0 pb-12 lg:pb-32 [border-radius:0_0_50%_50%_/_0_0_40px_40px] lg:[border-radius:0_0_50%_50%_/_0_0_80px_80px]">
    <div class="about-section-part2__container">

        <!-- Left Column: Image -->
        <?php if ( $image_url ) : ?>
        <div class="about-section-part2__image-wrapper">
            <img class="w-full h-full object-cover" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $name ); ?>" />

            <!-- Mobile-only Overlay: Name and Title -->
            <div class="about-section-part2__overlay-text lg:hidden absolute left-0 bottom-4 w-full px-4 text-white">
                <?php if ( $name ) : ?>
                <h3 class="text-h3 font-extrabold font-akrobat uppercase leading-10 mb-0"><?php echo esc_html( $name ); ?></h3>
                <?php endif; ?>
                <?php if ( $position ) : ?>
                <p class="text-[16px] font-normal font-geologica leading-[1.5]"><?php echo esc_html( $position ); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Right Column: Text -->
        <div class="w-full lg:w-auto flex flex-col gap-8 mt-6 lg:mt-0">
            <!-- Desktop-only Title -->
            <?php if ( $name || $position ) : ?>
            <div class="hidden lg:block">
                <?php if ( $name ) : ?>
                 <h3 class="text-[40px] font-extrabold font-akrobat uppercase leading-none"><?php echo esc_html( $name ); ?></h3>
                <?php endif; ?>
                <?php if ( $position ) : ?>
                 <p class="text-[20px] font-light font-geologica"><?php echo esc_html( $position ); ?></p>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <!-- Description Text -->
            <?php if ( $description ) : ?>
            <div class="about-section-part2__description">
                <p class="text-[16px] sm:text-[23px] font-light font-geologica leading-[1.5] line-clamp-5 xl:line-clamp-none"><?php echo esc_html( $description ); ?></p>
            </div>
            <?php endif; ?>

            <!-- Mobile-only Read More Link -->
            <div class="about-section-part2__read-more lg:hidden">
                <?php get_template_part('template-parts/components/link-more', null, [
                    'text' => 'Читать далее',
                    'url' => '#',
                    'style' => 'default',
                    'icon_classes' => 'hidden'
                ]); ?>
            </div>
        </div>

    </div>
</section>
