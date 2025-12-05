<?php
/**
 * Histories Section
 * Mobile First.
 */
?>
<section class="histories-section w-full bg-sky relative overflow-hidden py-12">
    
    <!-- Top Wave -->
    <div class="histories-section__wave histories-section__wave--top absolute left-0 top-0 z-10 w-full">
        <svg width="100%" height="32" viewBox="0 0 380 32" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M380 0C380 8.48693 359.982 16.6263 324.35 22.6274C288.718 28.6286 240.391 32 190 32C139.609 32 91.2816 28.6286 55.6497 22.6274C20.0178 16.6263 7.60885e-06 8.48693 0 6.18078e-06L190 0H380Z" fill="var(--wp--preset--color--base)"/>
        </svg>
    </div>

    <!-- Bottom Wave -->
    <div class="histories-section__wave histories-section__wave--bottom absolute left-0 bottom-0 z-10 w-full">
        <svg width="100%" height="32" viewBox="0 0 380 32" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M380 32C380 23.5131 359.982 15.3737 324.35 9.37258C288.718 3.37142 240.391 0 190 0C139.609 0 91.2816 3.37142 55.6497 9.37258C20.0178 15.3737 7.60885e-06 23.5131 0 32L190 32H380Z" fill="var(--wp--preset--color--base)"/>
        </svg>
    </div>

    <!-- Background Decor (Simplified Placeholder) -->
    <div class="histories-section__decor absolute inset-0 z-0 pointer-events-none opacity-30">
        <svg width="100%" height="100%" viewBox="0 0 380 982" fill="none" xmlns="http://www.w3.org/2000/svg">
             <path d="M290.139 34.2705C290.139 34.2705 277.001 32.6752 276.995 31.7087..." fill="white"/> <!-- Placeholder path -->
             <!-- Abstract shapes representing the complex background -->
             <circle cx="10%" cy="20%" r="50" fill="white" />
             <circle cx="90%" cy="80%" r="80" fill="white" />
             <path d="M-24.5565 0.212505L-17.953 62.0222L-15.6837 61.8096L-22.2817 -0.000202728L-24.5565 0.212505Z" fill="white"/>
        </svg>
    </div>

    <div class="histories__container container mx-auto px-4 relative z-20 mt-8 mb-8 flex flex-col gap-8">
        
        <!-- Title -->
        <h2 class="histories__title text-left text-white text-[32px] font-normal font-ura uppercase leading-9">
            Истории переживших
        </h2>

        <!-- Slider Card -->
        <div class="histories__slider swiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="histories__card swiper-slide w-full bg-white rounded-[20px] overflow-hidden flex flex-col items-center pt-1">
                    <!-- Image Container -->
                    <div class="histories__card-image relative w-[calc(100%-8px)] h-[400px] mt-1 rounded-[20px] overflow-hidden bg-gray-200">
                        <img class="w-full h-full object-cover" src="https://placehold.co/340x400" alt="Татьяна Цветкова" />
                        <!-- Name Overlay -->
                        <div class="absolute left-0 bottom-0 w-full p-4 bg-gradient-to-t from-black/60 to-transparent pt-20">
                            <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-10">
                                Татьяна<br>Цветкова
                            </h3>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="histories__card-content w-full px-4 pt-4 pb-6 flex flex-col gap-4">
                        <p class="text-contrast text-base font-light font-geologica leading-6">
                            Для маленьких детей весь мир с одной стороны огромный и удивительный. С другой стороны — сужается до родных и близких. И их предательство или неадекватное отношение искажает всю картинку, будто разбитое зеркало. Я пережила инцест в детстве. Это разбило моё зеркало мира.<br>
                            Я смотрела в него и себя видела уродливой, ненужной, использованной, разобранной на кусочки.
                        </p>
                        <!-- Read More -->
                        <div class="histories__card-read-more">
                            <?php get_template_part('template-parts/components/link-more', null, [
                                'text' => 'Читать далее',
                                'url' => '#',
                                'style' => 'default'
                            ]); ?>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 (Duplicate for now) -->
                <div class="histories__card swiper-slide w-full bg-white rounded-[20px] overflow-hidden flex flex-col items-center pt-1">
                    <div class="histories__card-image relative w-[calc(100%-8px)] h-[400px] mt-1 rounded-[20px] overflow-hidden bg-gray-200">
                        <img class="w-full h-full object-cover" src="https://placehold.co/340x400" alt="Мария Иванова" />
                        <div class="absolute left-0 bottom-0 w-full p-4 bg-gradient-to-t from-black/60 to-transparent pt-20">
                            <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-10">
                                Мария<br>Иванова
                            </h3>
                        </div>
                    </div>
                    <div class="histories__card-content w-full px-4 pt-4 pb-6 flex flex-col gap-4">
                        <p class="text-contrast text-base font-light font-geologica leading-6">
                            Вторая история: Мой путь к исцелению был долгим, но благодаря поддержке я смогла найти силы жить дальше.
                        </p>
                        <div class="histories__card-read-more">
                            <?php get_template_part('template-parts/components/link-more', null, [
                                'text' => 'Читать далее',
                                'url' => '#',
                                'style' => 'default'
                            ]); ?>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 (Duplicate for now) -->
                <div class="histories__card swiper-slide w-full bg-white rounded-[20px] overflow-hidden flex flex-col items-center pt-1">
                    <div class="histories__card-image relative w-[calc(100%-8px)] h-[400px] mt-1 rounded-[20px] overflow-hidden bg-gray-200">
                        <img class="w-full h-full object-cover" src="https://placehold.co/340x400" alt="Елена Петрова" />
                        <div class="absolute left-0 bottom-0 w-full p-4 bg-gradient-to-t from-black/60 to-transparent pt-20">
                            <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-10">
                                Елена<br>Петрова
                            </h3>
                        </div>
                    </div>
                    <div class="histories__card-content w-full px-4 pt-4 pb-6 flex flex-col gap-4">
                        <p class="text-contrast text-base font-light font-geologica leading-6">
                            Третья история: Никогда не думала, что смогу говорить об этом вслух, но теперь я готова помогать другим.
                        </p>
                        <div class="histories__card-read-more">
                            <?php get_template_part('template-parts/components/link-more', null, [
                                'text' => 'Читать далее',
                                'url' => '#',
                                'style' => 'default'
                            ]); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Controls -->
        <div class="histories__controls flex justify-between items-center">
            <!-- Mobile Progress -->
            <div class="histories__progress w-full md:hidden">
                <?php get_template_part('template-parts/components/slider-progress', null, [
                    'track_color' => 'bg-white/20',
                    'bar_color' => 'bg-white'
                ]); ?>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex w-full justify-end">
                <?php get_template_part('template-parts/components/slider-navigation', null, [
                    'prev_class' => 'histories-prev',
                    'next_class' => 'histories-next',
                    'color'      => 'text-white'
                ]); ?>
            </div>
        </div>

        <!-- "All Histories" Button -->
        <div class="histories__view-all">
            <?php get_template_part('template-parts/components/button', null, [
                'text' => 'Все истории', 
                'url' => '#', 
                'style' => 'primary', 
                'class' => 'w-full'
            ]); ?>
        </div>

    </div>
</section>