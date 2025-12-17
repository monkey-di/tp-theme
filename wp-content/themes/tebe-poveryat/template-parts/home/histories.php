<?php
/**
 * Histories Section
 * Mobile First.
 */

?>
<section class="histories-section w-full bg-sky relative overflow-hidden z-10 mt-[-40px] mb-[-40px] lg:mt-[-80px] lg:mb-[-80px] pt-[80px] lg:pt-[160px] pb-[80px] lg:pb-[160px]">

    <div class="hidden lg:block absolute inset-0 z-0 pointer-events-none px-[96px]">
        <img src="<?php
        echo get_template_directory_uri(); ?>/assets/images/bg3.png" alt="" class="w-full h-full"/>

    </div>

    <!-- Background Decor (Stars/Sparks) -->
    <div class="histories-section__decor absolute inset-0 z-0 pointer-events-none lg:hidden">
        <div class="absolute bottom-0 left-[-28px] w-[423px] h-[423px] flex items-center justify-center">
            <img src="<?php echo get_theme_file_uri('assets/images/history-decor-1.svg'); ?>" alt=""
                 class="w-full h-full object-contain opacity-45 rotate-[270deg]"/>
        </div>
        <div class="absolute top-[5%] right-[-6%] w-[432px] h-[432px] flex items-center justify-center">
            <img src="<?php echo get_theme_file_uri('assets/images/history-decor-2.svg'); ?>" alt=""
                 class="w-full h-full object-contain opacity-45 rotate-[270deg] scale-y-[-1]"/>
        </div>
    </div>

    <div class="histories__container container mx-auto px-4 relative z-20 mt-8 mb-8 flex flex-col gap-8">

        <!-- Title -->
        <h2 class="histories__title text-white text-[32px] lg:text-[64px] font-normal font-ura uppercase leading-[1.1] lg:leading-[0.95] mb-2 lg:text-center">
            Истории <br class="lg:hidden">переживших
        </h2>

        <!-- Slider Card -->
        <div class="histories__slider swiper w-full lg:max-w-[1170px] lg:mx-auto min-w-0">
            <div class="swiper-wrapper">
                <!-- Slide 1: Tatiana Tsvetkova -->
                <div class="swiper-slide">
                    <div class="histories__card w-full bg-white rounded-[20px] overflow-hidden flex flex-col lg:flex-row items-center lg:items-stretch pt-1 lg:p-1 lg:gap-[40px]">
                        <!-- Image Container -->
                        <div class="histories__card-image relative w-[calc(100%-8px)] lg:w-[340px] h-[400px] lg:h-auto mt-1 lg:mt-0 rounded-[20px] overflow-hidden flex-shrink-0">
                            <img class="w-full h-full object-cover"
                                 src="<?php echo get_theme_file_uri('assets/images/history-tatiana.jpg'); ?>"
                                 alt="Татьяна Цветкова"/>
                            <div class="absolute inset-0 bg-black/20"></div>

                            <!-- Name Overlay (Mobile Only) -->
                            <div class="absolute left-0 bottom-0 w-full p-4 lg:hidden">
                                <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                    Татьяна<br>Цветкова
                                </h3>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="histories__card-content w-full px-4 pt-4 pb-6 lg:py-[16px] lg:pr-0 lg:pl-0 flex flex-col gap-4 lg:gap-[40px] lg:flex-1 lg:justify-between">
                            <!-- Top: Name + Text -->
                            <div class="flex flex-col gap-4 lg:gap-[40px]">
                                <!-- Name (Desktop Only) -->
                                <h3 class="hidden lg:block text-contrast text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                    Татьяна Цветкова
                                </h3>
                                <!-- Text -->
                                <p class="text-contrast text-[16px] lg:text-[23px] font-light font-geologica leading-[1.5] line-clamp-6 lg:line-clamp-none ">
                                    Для маленьких детей весь мир с одной стороны огромный и удивительный. С другой
                                    стороны — сужается до родных и близких. И их предательство или неадекватное
                                    отношение искажает всю картинку, будто разбитое зеркало. Я пережила инцест в
                                    детстве. Это разбило моё зеркало мира.<br>
                                    Я смотрела в него и себя видела уродливой, ненужной, использованной, разобранной на
                                    кусочки.
                                </p>
                            </div>

                            <!-- Bottom: Button + Navigation (Desktop) or Read More (Mobile) -->
                            <div class="histories__card-footer">
                                <!-- Mobile: Read More -->
                                <div class="lg:hidden">
                                    <?php
                                    get_template_part('template-parts/components/link-more', null, [
                                            'text' => 'Читать далее',
                                            'url' => '#',
                                            'style' => 'default'
                                    ]); ?>
                                </div>

                                <!-- Desktop: Button + Navigation -->
                                <div class="hidden lg:flex justify-between items-center w-full">
                                    <!-- All Histories Button -->
                                    <?php
                                    get_template_part('template-parts/components/button', null, [
                                            'text' => 'Все истории',
                                            'url' => '#',
                                            'style' => 'primary',
                                            'size' => 'md',
                                            'class' => '!w-[187px] !text-white !uppercase'
                                    ]); ?>

                                    <!-- Navigation -->
                                    <div class="flex gap-[8px]">
                                        <button type="button"
                                                class="histories-prev cursor-pointer hover:opacity-70 transition">
                                            <img src="<?php
                                            echo get_theme_file_uri('assets/images/arrow-prev.svg'); ?>" alt="Previous"
                                                 class="w-[56px] h-[56px]"/>
                                        </button>
                                        <button type="button"
                                                class="histories-next cursor-pointer hover:opacity-70 transition">
                                            <img src="<?php
                                            echo get_theme_file_uri('assets/images/arrow-next.svg'); ?>" alt="Next"
                                                 class="w-[56px] h-[56px]"/>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 (Duplicate for now) -->
                <div class="swiper-slide">
                    <div class="histories__card w-full bg-white rounded-[20px] overflow-hidden flex flex-col lg:flex-row items-center lg:items-stretch pt-1 lg:p-1 lg:gap-[40px]">
                        <div class="histories__card-image relative w-[calc(100%-8px)] lg:w-[340px] h-[400px] lg:h-auto mt-1 lg:mt-0 rounded-[20px] overflow-hidden flex-shrink-0">
                            <img class="w-full h-full object-cover"
                                 src="<?php echo get_theme_file_uri('assets/images/history-tatiana.jpg'); ?>"
                                 alt="Мария Иванова"/>
                            <div class="absolute inset-0 bg-black/20"></div>
                            <div class="absolute left-0 bottom-0 w-full p-4 lg:hidden">
                                <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                    Мария<br>Иванова
                                </h3>
                            </div>
                        </div>
                        <div class="histories__card-content w-full px-4 pt-4 pb-6 lg:py-[16px] lg:pr-0 lg:pl-0 flex flex-col gap-4 lg:gap-[40px] lg:flex-1 lg:justify-between">
                            <div class="flex flex-col gap-4 lg:gap-[40px]">
                                <h3 class="hidden lg:block text-contrast text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                    Мария Иванова
                                </h3>
                                <p class="text-contrast text-[16px] lg:text-[23px] font-light font-geologica leading-[1.5] line-clamp-6 lg:line-clamp-none lg:line-clamp-none">
                                    Вторая история: Мой путь к исцелению был долгим, но благодаря поддержке я смогла
                                    найти силы жить дальше.
                                </p>
                            </div>
                            <div class="histories__card-footer">
                                <div class="lg:hidden">
                                    <?php
                                    get_template_part('template-parts/components/link-more', null, [
                                            'text' => 'Читать далее',
                                            'url' => '#',
                                            'style' => 'default'
                                    ]); ?>
                                </div>
                                <div class="hidden lg:flex justify-between items-center w-full">
                                    <?php
                                    get_template_part('template-parts/components/button', null, [
                                            'text' => 'Все истории',
                                            'url' => '#',
                                            'style' => 'primary',
                                            'size' => 'md',
                                            'class' => '!w-[187px] !text-white !uppercase'
                                    ]); ?>
                                    <div class="flex gap-[8px]">
                                        <button type="button"
                                                class="histories-prev cursor-pointer hover:opacity-70 transition">
                                            <img src="<?php
                                            echo get_theme_file_uri('assets/images/arrow-prev.svg'); ?>" alt="Previous"
                                                 class="w-[56px] h-[56px]"/>
                                        </button>
                                        <button type="button"
                                                class="histories-next cursor-pointer hover:opacity-70 transition">
                                            <img src="<?php
                                            echo get_theme_file_uri('assets/images/arrow-next.svg'); ?>" alt="Next"
                                                 class="w-[56px] h-[56px]"/>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 (Duplicate for now) -->
                <div class="swiper-slide">
                    <div class="histories__card w-full bg-white rounded-[20px] overflow-hidden flex flex-col lg:flex-row items-center lg:items-stretch pt-1 lg:p-1 lg:gap-[40px]">
                        <div class="histories__card-image relative w-[calc(100%-8px)] lg:w-[340px] h-[400px] lg:h-auto mt-1 lg:mt-0 rounded-[20px] overflow-hidden flex-shrink-0">
                            <img class="w-full h-full object-cover"
                                 src="<?php echo get_theme_file_uri('assets/images/history-tatiana.jpg'); ?>"
                                 alt="Елена Петрова"/>
                            <div class="absolute inset-0 bg-black/20"></div>
                            <div class="absolute left-0 bottom-0 w-full p-4 lg:hidden">
                                <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                    Елена<br>Петрова
                                </h3>
                            </div>
                        </div>
                        <div class="histories__card-content w-full px-4 pt-4 pb-6 lg:py-[16px] lg:pr-0 lg:pl-0 flex flex-col gap-4 lg:gap-[40px] lg:flex-1 lg:justify-between">
                            <div class="flex flex-col gap-4 lg:gap-[40px]">
                                <h3 class="hidden lg:block text-contrast text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                    Елена Петрова
                                </h3>
                                <p class="text-contrast text-[16px] lg:text-[23px] font-light font-geologica leading-[1.5] line-clamp-6 lg:line-clamp-none">
                                    Третья история: Никогда не думала, что смогу говорить об этом вслух, но теперь я
                                    готова помогать другим.
                                </p>
                            </div>
                            <div class="histories__card-footer">
                                <div class="lg:hidden">
                                    <?php
                                    get_template_part('template-parts/components/link-more', null, [
                                            'text' => 'Читать далее',
                                            'url' => '#',
                                            'style' => 'default'
                                    ]); ?>
                                </div>
                                <div class="hidden lg:flex justify-between items-center w-full">
                                    <?php
                                    get_template_part('template-parts/components/button', null, [
                                            'text' => 'Все истории',
                                            'url' => '#',
                                            'style' => 'primary',
                                            'size' => 'md',
                                            'class' => '!w-[187px] !text-white !uppercase'
                                    ]); ?>
                                    <div class="flex gap-[8px]">
                                        <button type="button"
                                                class="histories-prev cursor-pointer hover:opacity-70 transition">
                                            <img src="<?php
                                            echo get_theme_file_uri('assets/images/arrow-prev.svg'); ?>" alt="Previous"
                                                 class="w-[56px] h-[56px]"/>
                                        </button>
                                        <button type="button"
                                                class="histories-next cursor-pointer hover:opacity-70 transition">
                                            <img src="<?php
                                            echo get_theme_file_uri('assets/images/arrow-next.svg'); ?>" alt="Next"
                                                 class="w-[56px] h-[56px]"/>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Controls (Mobile Only) -->
        <div class="histories__controls lg:hidden">
            <!-- Mobile Progress -->
            <div class="histories__progress w-full">
                <?php
                get_template_part('template-parts/components/slider-progress', null, [
                        'track_color' => '!bg-white/20',
                        'bar_color' => 'bg-white',
                        'is_white' => true,
                ]); ?>
            </div>
        </div>

        <!-- "All Histories" Button (Mobile Only) -->
        <div class="histories__view-all lg:hidden">
            <?php
            get_template_part('template-parts/components/button', null, [
                    'text' => 'Все истории',
                    'url' => '#',
                    'style' => 'primary',
                    'class' => 'w-full !text-white' // Force white text
            ]); ?>
        </div>

    </div>
</section>