<?php
/**
 * About Section
 * Mobile First.
 * Dynamic content from page
 */

$about_page = get_page_by_path( 'about-block' );
if ( ! $about_page ) {
    return;
}

// Получаем контент страницы
$content_parts = explode( "\n\n", $about_page->post_content );
$title = ! empty( $content_parts[0] ) ? $content_parts[0] : '';
$description = array_slice( $content_parts, 1 );
$description_text = implode( "\n\n", $description );

// Получаем статистику из meta
$stats = array();
for ( $i = 1; $i <= 4; $i++ ) {
    $stats[$i] = array(
        'number' => get_post_meta( $about_page->ID, '_about_stat' . $i . '_number', true ),
        'text'   => get_post_meta( $about_page->ID, '_about_stat' . $i . '_text', true ),
    );
}

// Цвета для карточек статистики
$colors = array( 'bg-primary', 'bg-teal', 'bg-sky', 'bg-secondary' );
$widths = array( 'w-[calc(43%-4px)]', 'w-[calc(51%-4px)]', 'w-[calc(53%-4px)]', 'w-[calc(40%-4px)]' );
?>
<section class="about-section bg-surface relative z-20 pt-12 lg:pt-32 pb-0 [border-radius:50%_50%_0_0_/_40px_40px_0_0] lg:[border-radius:50%_50%_0_0_/_80px_80px_0_0]">
    <div class="about__container">

        <!-- Left Column (Title and Description) -->
        <div class="flex flex-col lg:pt-4 lg:gap-10">
            <?php if ( $title ) : ?>
            <h2 class="about__title"><?php echo esc_html( $title ); ?></h2>
            <?php endif; ?>

            <?php if ( $description_text ) : ?>
            <div class="about__description">
                <?php echo wpautop( $description_text ); ?>
            </div>
            <?php endif; ?>
        </div>

        <!-- Right Column (Statistics Cards) -->
        <div class="about__stats">
            <?php foreach ( $stats as $index => $stat ) : ?>
                <?php if ( $stat['number'] ) : ?>
                <div class="about__stat-card <?php echo $widths[ $index - 1 ]; ?> md:w-[calc(50%-8px)] lg:w-full <?php echo $colors[ $index - 1 ]; ?>">
                    <div class="about__stat-card-number"><?php echo esc_html( $stat['number'] ); ?></div>
                    <?php if ( $stat['text'] ) : ?>
                    <div class="about__stat-card-text"><?php echo wp_kses_post( $stat['text'] ); ?></div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    </div>
</section>
