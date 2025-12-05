<?php
/**
 * Media About Us Section
 * Mobile First.
 */
?>
<section class="media-section w-full bg-teal relative overflow-hidden py-12">
    
    <!-- Top Wave -->
    <div class="media-section__wave media-section__wave--top absolute left-0 top-0 z-10 w-full">
        <svg width="100%" height="32" viewBox="0 0 380 32" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M380 0C380 8.48693 359.982 16.6263 324.35 22.6274C288.718 28.6286 240.391 32 190 32C139.609 32 91.2816 28.6286 55.6497 22.6274C20.0178 16.6263 7.60885e-06 8.48693 0 6.18078e-06L190 0H380Z" fill="var(--wp--preset--color--base)"/>
        </svg>
    </div>

    <!-- Bottom Wave -->
    <div class="media-section__wave media-section__wave--bottom absolute left-0 bottom-0 z-10 w-full">
        <svg width="100%" height="32" viewBox="0 0 380 32" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M380 32C380 23.5131 359.982 15.3737 324.35 9.37258C288.718 3.37142 240.391 0 190 0C139.609 0 91.2816 3.37142 55.6497 9.37258C20.0178 15.3737 7.60885e-06 23.5131 0 32L190 32H380Z" fill="var(--wp--preset--color--base)"/>
        </svg>
    </div>

    <!-- Background Decor (Placeholder for white patterns) -->
    <div class="media-section__decor absolute inset-0 z-0 opacity-20 pointer-events-none">
        <svg width="100%" height="100%" viewBox="0 0 380 322" fill="none" xmlns="http://www.w3.org/2000/svg">
             <path d="M-283.975 80.6926C-283.975 80.6926..." fill="white"/> <!-- Placeholder path -->
             <circle cx="50%" cy="50%" r="150" stroke="white" stroke-width="2" fill="none"/>
        </svg>
    </div>

    <div class="media__container container mx-auto px-4 relative z-20 mt-8 mb-8 flex flex-col gap-8">
        
        <!-- Title -->
        <h2 class="media__title text-center text-white text-[32px] font-normal font-ura uppercase leading-9">
            Сми о нас
        </h2>

        <!-- Slider Cards -->
        <div class="media__slider swiper">
            <div class="swiper-wrapper">
                <!-- Card 1: Forbes (ish) -->
                <div class="media__card swiper-slide flex-shrink-0 w-[180px] h-[87px] p-5 bg-white rounded-[20px] flex justify-center items-center">
                    <div class="w-[140px] h-[47px] relative flex items-center justify-center">
                        <!-- SVG Logo Placeholders -->
                        <svg width="100%" height="100%" viewBox="0 0 136 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M80.8764 22.3101V27.3501H82.2295V23.6646H94.4993V27.3501H95.8538V22.3101H93.6906V0.00130254H84.5633C84.5633 9.50047 84.2592 15.1473 82.8728 22.3121H80.8777L80.8764 22.3101Z" fill="#1C5358"/>
                            <rect x="0" y="0" width="136" height="28" fill="#1C5358" fill-opacity="0.1"/> <!-- Placeholder box -->
                            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#1C5358" font-size="12">MEDIA LOGO 1</text>
                        </svg>
                    </div>
                </div>

                <!-- Card 2: The Village (ish) -->
                <div class="media__card swiper-slide flex-shrink-0 w-[180px] h-[87px] p-5 bg-white rounded-[20px] flex justify-center items-center">
                    <div class="w-[95px] h-[27px] relative flex items-center justify-center">
                        <svg width="100%" height="100%" viewBox="0 0 95 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.4505 0.509434V26.5755H16.6036V16.217H6.84685V26.5755H0V0.509434H6.84685V10.1887H16.6036V0.509434H23.4505ZM54.2613 13.5C54.2613 21.2264 49.6396 27 41.0811 27C32.6081 27 27.9009 21.2264 27.9009 13.5C27.9865 5.77358 32.6081 0 41.0811 0C49.6396 0 54.2613 5.77358 54.2613 13.5Z" fill="#1C5358"/>
                            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#1C5358" font-size="12">MEDIA LOGO 2</text>
                        </svg>
                    </div>
                </div>

                <!-- Card 3: Another (ish) -->
                <div class="media__card swiper-slide flex-shrink-0 w-[180px] h-[87px] p-5 bg-white rounded-[20px] flex justify-center items-center">
                    <div class="w-[140px] h-[47px] relative flex items-center justify-center">
                        <svg width="100%" height="100%" viewBox="0 0 136 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M80.8764 22.3101V27.3501H82.2295V23.6646H94.4993V27.3501H95.8538V22.3101H93.6906V0.00130254H84.5633C84.5633 9.50047 84.2592 15.1473 82.8728 22.3121H80.8777L80.8764 22.3101Z" fill="#1C5358"/>
                            <rect x="0" y="0" width="136" height="28" fill="#1C5358" fill-opacity="0.1"/>
                            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#1C5358" font-size="12">MEDIA LOGO 3</text>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Controls -->
        <div class="media__controls flex justify-between items-center">
            <!-- Mobile Progress -->
            <div class="media__progress w-full md:hidden">
                <?php get_template_part('template-parts/components/slider-progress', null, [
                    'track_color' => 'bg-white/20',
                    'bar_color' => 'bg-white'
                ]); ?>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex w-full justify-center mt-4">
                <?php get_template_part('template-parts/components/slider-navigation', null, [
                    'prev_class' => 'media-prev',
                    'next_class' => 'media-next',
                    'color'      => 'text-white'
                ]); ?>
            </div>
        </div>

    </div>
</section>
