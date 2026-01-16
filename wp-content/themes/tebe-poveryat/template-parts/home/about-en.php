<?php
/**
 * English About Section - About Us + Our Impact
 * Mobile First with Desktop version
 * Static content
 */

?>

<style>
    .about-en-section {
        background-image: url("<?php echo get_theme_file_uri('assets/images/stars/en-stars.png'); ?>");
        background-position: center center;
    }
    @media (min-width: 1280px) {
        .about-en-section {
            background-image: url("<?php echo get_theme_file_uri('assets/images/stars-bg.webp'); ?>");
            background-position: center 8%;
        }
    }
</style>
<section class="about-en-section">
    <div class="about-en__container">

        <!-- Left Column (About Us - Desktop only) -->
        <div class="about-en__left hidden lg:flex flex-col gap-10 pt-12 xl:pt-0 flex-[3]">
            <?php block_template_part( 'about-en-title' ); ?>
            <?php block_template_part( 'about-en-desc' ); ?>
        </div>

        <!-- Right Column / Mobile Full Width -->
        <div class="w-full  flex-[2.5]">
            <!-- Mobile: About Us Section -->
            <div class="lg:hidden">
                <?php block_template_part( 'about-en-title' ); ?>
                <?php block_template_part( 'about-en-desc' ); ?>
            </div>

            <!-- Our Impact Section -->
            <div class="about-en__impact mt-[22px] lg:mt-0 xl:pl-[66px]">
                <?php block_template_part( 'about-en-impact-title' ); ?>

                <!-- Statistics Cards -->
                <div class="about-en__stats">
                    <!-- Card 1: Years -->
                    <div class="about-en__stat-card about-en__stat-card--1 bg-primary">
                        <?php block_template_part( 'about-en-stat1-num' ); ?>
                        <?php block_template_part( 'about-en-stat1-text' ); ?>
                    </div>

                    <!-- Card 2: Consultations -->
                    <div class="about-en__stat-card about-en__stat-card--1 bg-teal">
                        <?php block_template_part( 'about-en-stat2-num' ); ?>
                        <?php block_template_part( 'about-en-stat2-text' ); ?>
                    </div>

                    <!-- Card 3: People -->
                    <div class="about-en__stat-card about-en__stat-card--2 bg-sky">
                        <?php block_template_part( 'about-en-stat3-num' ); ?>
                        <?php block_template_part( 'about-en-stat3-text' ); ?>
                    </div>

                    <!-- Card 4: Team -->
                    <div class="about-en__stat-card about-en__stat-card--2 bg-peach">
                        <?php block_template_part( 'about-en-stat4-num' ); ?>
                        <?php block_template_part( 'about-en-stat4-text' ); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
