<?php
/**
 * Materials Section
 * Mobile First.
 */
?>
<section class="materials-section materials w-full bg-surface relative overflow-hidden py-12 lg:py-20 px-4">
    <div class="materials__container container mx-auto flex flex-col gap-6 lg:gap-12">

        <!-- Title -->
        <h2 class="materials__title text-primary text-[32px] lg:text-[64px] font-normal font-ura uppercase leading-[1.1] lg:leading-[0.95] mb-2 text-center">
            Полезные<br class="lg:hidden">материалы
        </h2>

        <!-- Slider with Navigation (Desktop) -->
        <div class="materials__slider-area w-full flex items-center lg:justify-between lg:gap-x-4">

            <button type="button" class="materials-prev hidden lg:block cursor-pointer hover:opacity-70 transition flex-shrink-0">
                <img src="<?php echo get_theme_file_uri('assets/images/arrow-prev.svg'); ?>" alt="Previous" class="w-[56px] h-[56px]" />
            </button>

            <div class="swiper-container-wrapper w-full lg:flex-1 lg:min-w-0">
                <div class="materials__slider swiper">
                    <div class="swiper-wrapper">
                
                <!-- Slide 1: AI and Psychotherapy -->
                <div class="swiper-slide">
                    <div class="materials__card w-full lg:max-w-[1129px] lg:ml-auto flex flex-col lg:flex-row gap-6 lg:gap-0">
                        <!-- Illustration -->
                        <div class="materials__card-image w-full lg:w-[453px] lg:h-[453px] lg:min-w-[453px] rounded-[20px] overflow-hidden relative bg-[#fef1ec] flex-shrink-0">
                            <img src="<?php echo get_theme_file_uri('assets/images/1.png'); ?>" alt="ИИ и психотерапия" class="w-full h-full object-cover" />
                        </div>

                        <!-- Content -->
                        <div class="materials__card-content flex flex-col justify-start gap-4 lg:gap-6 lg:p-12 lg:flex-1">
                            <h3 class="materials__card-title text-contrast text-[20px] lg:text-[26px] font-extrabold font-akrobat leading-none">
                                ИИ и психотерапия: новый помощник или иллюзия близости?
                            </h3>
                            <p class="materials__card-description text-contrast text-[16px] lg:text-[23px] font-light font-geologica leading-[1.5]">
                                ИИ, включая ChatGPT, активно используется для оказания психологической поддержки. Хотя он предоставляет доступность и анонимность, риски ошибок и отсутствие эмпатии поднимают вопросы о его роли в сфере ментального здоровья. Мы собрали мнения коллег из секторов благотворительности и технологий.
                            </p>

                            <!-- Read Link -->
                            <div class="materials__card-read-more">
                                <?php get_template_part('template-parts/components/link-more', null, [
                                    'text' => 'Читать',
                                    'url' => '#',
                                    'style' => 'default'
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 (Duplicate) -->
                <div class="swiper-slide">
                    <div class="materials__card w-full lg:max-w-[1129px] lg:ml-auto flex flex-col lg:flex-row gap-6 lg:gap-0">
                        <div class="materials__card-image w-full lg:w-[453px] lg:h-[453px] lg:min-w-[453px] rounded-[20px] overflow-hidden relative bg-[#fef1ec] flex-shrink-0">
                            <img src="<?php echo get_theme_file_uri('assets/images/1.png'); ?>" alt="Материал 2" class="w-full h-full object-cover" />
                        </div>
                        <div class="materials__card-content flex flex-col justify-start gap-4 lg:gap-6 lg:p-12 lg:flex-1">
                            <h3 class="materials__card-title text-contrast text-[20px] lg:text-[26px] font-extrabold font-akrobat leading-none">
                                Влияние социальных сетей на самооценку подростков
                            </h3>
                            <p class="materials__card-description text-contrast text-[16px] lg:text-[23px] font-light font-geologica leading-[1.5]">
                                Исследование о том, как лайки и комментарии формируют восприятие себя. Советы психологов для родителей и педагогов.
                            </p>
                            <div class="materials__card-read-more">
                                <?php get_template_part('template-parts/components/link-more', null, [
                                    'text' => 'Читать',
                                    'url' => '#',
                                    'style' => 'default'
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>

                    </div> <!-- End swiper-wrapper -->
                </div> <!-- End swiper -->
            </div> <!-- End swiper-container-wrapper -->

            <button type="button" class="materials-next hidden lg:block cursor-pointer hover:opacity-70 transition flex-shrink-0">
                <img src="<?php echo get_theme_file_uri('assets/images/arrow-next.svg'); ?>" alt="Next" class="w-[56px] h-[56px]" />
            </button>

        </div> <!-- End slider-area -->

        <!-- Progress Bar (Mobile Only) -->
        <div class="materials__progress w-full lg:hidden">
            <?php get_template_part('template-parts/components/slider-progress', null, [
                'track_color' => 'bg-white',
                'bar_color' => 'bg-secondary'
            ]); ?>
        </div>

        <!-- View All Button -->
        <div class="materials__view-all w-full mt-4 flex justify-center">
            <a href="#" class="inline-flex justify-center items-center border border-primary rounded-[40px] px-5 py-4 lg:px-[20px] lg:py-[16px] text-[16px] text-primary uppercase font-geologica leading-[1.5] transition-colors hover:bg-primary hover:text-white w-full lg:w-[334px]">
                Смотреть все материалы
            </a>
        </div>

    </div>
</section>