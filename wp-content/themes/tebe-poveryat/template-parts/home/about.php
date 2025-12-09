<?php
/**
 * About Section
 * Mobile First.
 * Dynamic content from theme settings
 */
?>
<section class="about-section">
    <div class="about__container">

        <!-- Left Column (Title and Description) -->
        <div class="flex flex-col lg:gap-10">
            <h2 class="about__title"><?php echo esc_html( get_option( 'tp_about_title', 'О «Тебе поверят»' ) ); ?></h2>

            <div class="about__description">
                <?php echo wpautop( get_option( 'tp_about_description', 'Каждый 8-й ребёнок в мире сталкивается с сексуализированным насилием.

С 2018 года мы работаем над тем, чтобы заменить страх перед темой сексуализированного насилия над детьми на готовность решать эту серьёзную проблему. Если мы боимся и совсем не говорим об этом, то когда ситуация происходит, просто прячем голову в песок.' ) ); ?>
            </div>
        </div>

        <!-- Right Column (Statistics Cards) -->
        <div class="about__stats">

            <!-- Stat 1 -->
            <div class="about__stat-card w-[calc(40%-4px)] md:w-full bg-primary">
                <div class="about__stat-card-number"><?php echo esc_html( get_option( 'tp_about_stat1_number', '6' ) ); ?></div>
                <div class="about__stat-card-text"><?php echo wp_kses_post( get_option( 'tp_about_stat1_text', 'лет&nbsp;оказываем<br>помощь' ) ); ?></div>
            </div>

            <!-- Stat 2 -->
            <div class="about__stat-card w-[calc(60%-4px)] md:w-full bg-teal">
                <div class="about__stat-card-number"><?php echo esc_html( get_option( 'tp_about_stat2_number', '8 228' ) ); ?></div>
                <div class="about__stat-card-text"><?php echo wp_kses_post( get_option( 'tp_about_stat2_text', 'консультаций<br>проведено' ) ); ?></div>
            </div>

            <!-- Stat 3 -->
            <div class="about__stat-card w-[calc(60%-4px)] md:w-full bg-sky">
                <div class="about__stat-card-number"><?php echo esc_html( get_option( 'tp_about_stat3_number', '2 091' ) ); ?></div>
                <div class="about__stat-card-text"><?php echo wp_kses_post( get_option( 'tp_about_stat3_text', 'человек получили<br>помощь' ) ); ?></div>
            </div>

            <!-- Stat 4 -->
            <div class="about__stat-card w-[calc(40%-4px)] md:w-full bg-secondary">
                <div class="about__stat-card-number"><?php echo esc_html( get_option( 'tp_about_stat4_number', '26' ) ); ?></div>
                <div class="about__stat-card-text"><?php echo wp_kses_post( get_option( 'tp_about_stat4_text', 'человек<br>в команде' ) ); ?></div>
            </div>

        </div>

    </div>
</section>
