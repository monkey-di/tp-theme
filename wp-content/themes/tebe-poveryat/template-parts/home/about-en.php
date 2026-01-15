<?php
/**
 * English About Section - About Us + Our Impact
 * Mobile First with Desktop version
 * Static content
 */

?>

<style>
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
            <h2 class="about-en__title text-white">About Us</h2>
            <p class="about-en__description text-white">
                We are a non-profit organization. We provide free psychological and legal support to people who
                experienced sexual violence in childhood. We are also actively engaged in prevention to protect children
                and make society safer.
            </p>
        </div>

        <!-- Right Column / Mobile Full Width -->
        <div class="w-full  flex-[2.5]">
            <!-- Mobile: About Us Section -->
            <div class="lg:hidden">
                <h2 class="about-en__title text-white">About Us</h2>
                <p class="about-en__description text-white mt-4">
                    We are a non-profit organization. We provide free psychological and legal support to people who
                    experienced sexual violence in childhood. We are also actively engaged in prevention to protect
                    children and make society safer.
                </p>
            </div>

            <!-- Our Impact Section -->
            <div class="about-en__impact mt-12 lg:mt-0 xl:pl-[66px]">
                <h2 class="about-en__impact-title text-white">Our Impact</h2>

                <!-- Statistics Cards -->
                <div class="about-en__stats">
                    <!-- Card 1: Years -->
                    <div class="about-en__stat-card about-en__stat-card--1 bg-primary">
                        <div class="about-en__stat-number">6</div>
                        <p class="about-en__stat-text">years of <br> dedicated work</p>
                    </div>

                    <!-- Card 2: Consultations -->
                    <div class="about-en__stat-card about-en__stat-card--1 bg-teal">
                        <div class="about-en__stat-number">8 228</div>
                        <p class="about-en__stat-text">consultations held with <br> survivors and families</p>
                    </div>

                    <!-- Card 3: People -->
                    <div class="about-en__stat-card about-en__stat-card--2 bg-sky">
                        <div class="about-en__stat-number">2 091</div>
                        <p class="about-en__stat-text">people received psychological and legal support</p>
                    </div>

                    <!-- Card 4: Team -->
                    <div class="about-en__stat-card about-en__stat-card--2 bg-peach">
                        <div class="about-en__stat-number">26</div>
                        <p class="about-en__stat-text">team members working together to make change possible</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
