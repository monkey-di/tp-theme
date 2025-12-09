<?php
/**
 * Team Section
 * Mobile First.
 */
?>
<section class="team-section w-full bg-surface py-12 px-4 relative overflow-hidden">
    
    <!-- Bottom Wave -->
    <div class="team-section__wave team-section__wave--bottom absolute left-0 bottom-0 z-10 w-full">
        <img src="https://www.figma.com/api/mcp/asset/a3ffcfd2-6447-443d-af83-5edaaddb8c2d" alt="" class="w-full h-[32px] object-cover scale-y-[-1]" />
    </div>

    <div class="team__container container mx-auto px-4 relative z-20 mt-8 mb-8 flex flex-col gap-8">
        
        <!-- Title -->
        <h2 class="team__title text-primary text-[32px] lg:text-[64px] font-normal font-ura uppercase leading-[1.1] lg:leading-[0.95] mb-2 text-center">
            Наши специалисты
        </h2>

        <!-- Slider with Navigation (Desktop) -->
        <div class="team__slider-area w-full flex items-center lg:justify-between lg:gap-x-4">

            <button type="button" class="team-prev hidden lg:block cursor-pointer hover:opacity-70 transition flex-shrink-0">
                <img src="<?php echo get_theme_file_uri('assets/images/arrow-prev.svg'); ?>" alt="Previous" class="w-[56px] h-[56px]" />
            </button>

            <div class="swiper-container-wrapper w-full lg:flex-1 lg:min-w-0">
                <div class="team__slider swiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="team__card w-full lg:max-w-[1129px] lg:ml-auto flex flex-col lg:flex-row gap-6 lg:gap-0 rounded-[20px] overflow-hidden">
                        <!-- Image Container -->
                        <div class="team__card-image relative w-full lg:w-[428px] lg:min-w-[428px] h-[480px] lg:h-auto flex-shrink-0 rounded-[20px] overflow-hidden">
                            <img class="w-full h-full object-cover rounded-[20px]" src="https://www.figma.com/api/mcp/asset/eff26b4d-5d3f-4d3c-85da-268de874818f" alt="Ксения Шашунова" />
                            <!-- Overlay for mobile only -->
                            <div class="absolute inset-0 bg-black/20 pointer-events-none lg:hidden"></div>
                            <!-- Name & Role Overlay - Mobile only -->
                            <div class="absolute left-0 bottom-0 w-full p-[16px] lg:hidden">
                                <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                    Ксения<br>Шашунова
                                </h3>
                                <p class="text-white text-[16px] font-normal font-geologica leading-[1.5]">
                                    Координаторка детско-родительского направления
                                </p>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="team__card-content w-full px-4 py-6 lg:p-4 flex flex-col gap-1 lg:flex-1">
                            <!-- Name & Role - Desktop only -->
                            <div class="hidden lg:flex lg:flex-col lg:gap-1 lg:p-[16px]">
                                <h3 class="text-contrast text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                    Ксения Шашунова
                                </h3>
                                <p class="text-contrast text-[20px] font-light font-geologica leading-[1.5]">
                                    Координаторка детско-родительского направления
                                </p>
                            </div>
                            <!-- Description -->
                            <div class="lg:p-[16px]">
                                <p class="text-contrast text-[16px] lg:text-[23px] font-light font-geologica leading-[1.5]">
                                    «Я руковожу направлением работы, куда обращаются за помощью, поддержкой и информацией подростки или родители, чьи дети подверглись сексуализированному насилию. Моя главная задача — поддержка и развитие команды психологов этого направления, организация обучения и регулярных супервизий и интервизий. Также я принимаю заявки от подростков, распределяю их между специалистами: мне важно быть на связи в случае, если ситуация срочная, подключать к работе юристов или другие организации. Кроме того, я рассказываю о нашей работе с детьми в СМИ, чтобы было больше информации о проблеме сексуализированного насилия над детьми в разных аспектах»
                                </p>
                            </div>
                            <!-- Read More (Mobile Only) -->
                            <div class="team__card-read-more lg:hidden">
                                <?php get_template_part('template-parts/components/link-more', null, [
                                    'text' => 'Читать далее',
                                    'url' => '#',
                                    'style' => 'default'
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <div class="team__card w-full lg:max-w-[1129px] lg:ml-auto flex flex-col lg:flex-row gap-6 lg:gap-0 rounded-[20px] overflow-hidden">
                        <div class="team__card-image relative w-full lg:w-[428px] lg:min-w-[428px] h-[480px] lg:h-auto flex-shrink-0 rounded-[20px] overflow-hidden">
                            <img class="w-full h-full object-cover rounded-[20px]" src="https://www.figma.com/api/mcp/asset/eff26b4d-5d3f-4d3c-85da-268de874818f" alt="Ирина Смирнова" />
                            <div class="absolute inset-0 bg-black/20 pointer-events-none lg:hidden"></div>
                            <div class="absolute left-0 bottom-0 w-full p-[16px] lg:hidden">
                                <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                    Ирина<br>Смирнова
                                </h3>
                                <p class="text-white text-[16px] font-normal font-geologica leading-[1.5]">
                                    Психолог-консультант
                                </p>
                            </div>
                        </div>
                        <div class="team__card-content w-full px-4 py-6 lg:p-4 flex flex-col gap-1 lg:flex-1">
                            <div class="hidden lg:flex lg:flex-col lg:gap-1 lg:p-[16px]">
                                <h3 class="text-contrast text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                    Ирина Смирнова
                                </h3>
                                <p class="text-contrast text-[20px] font-light font-geologica leading-[1.5]">
                                    Психолог-консультант
                                </p>
                            </div>
                            <div class="lg:p-[16px]">
                                <p class="text-contrast text-[16px] lg:text-[23px] font-light font-geologica leading-[1.5]">
                                    Вторая история специалиста: Ирина работает с детьми и подростками, помогая им справиться с травмами и восстановить доверие к миру.
                                </p>
                            </div>
                            <!-- Read More (Mobile Only) -->
                            <div class="team__card-read-more lg:hidden">
                                <?php get_template_part('template-parts/components/link-more', null, [
                                    'text' => 'Читать далее',
                                    'url' => '#',
                                    'style' => 'default'
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <div class="team__card w-full lg:max-w-[1129px] lg:ml-auto flex flex-col lg:flex-row gap-6 lg:gap-0 rounded-[20px] overflow-hidden">
                        <div class="team__card-image relative w-full lg:w-[428px] lg:min-w-[428px] h-[480px] lg:h-auto flex-shrink-0 rounded-[20px] overflow-hidden">
                            <img class="w-full h-full object-cover rounded-[20px]" src="https://www.figma.com/api/mcp/asset/eff26b4d-5d3f-4d3c-85da-268de874818f" alt="Алексей Волков" />
                            <div class="absolute inset-0 bg-black/20 pointer-events-none lg:hidden"></div>
                            <div class="absolute left-0 bottom-0 w-full p-[16px] lg:hidden">
                                <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                    Алексей<br>Волков
                                </h3>
                                <p class="text-white text-[16px] font-normal font-geologica leading-[1.5]">
                                    Юридический консультант
                                </p>
                            </div>
                        </div>
                        <div class="team__card-content w-full px-4 py-6 lg:p-4 flex flex-col gap-1 lg:flex-1">
                            <div class="hidden lg:flex lg:flex-col lg:gap-1 lg:p-[16px]">
                                <h3 class="text-contrast text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                    Алексей Волков
                                </h3>
                                <p class="text-contrast text-[20px] font-light font-geologica leading-[1.5]">
                                    Юридический консультант
                                </p>
                            </div>
                            <div class="lg:p-[16px]">
                                <p class="text-contrast text-[16px] lg:text-[23px] font-light font-geologica leading-[1.5]">
                                    Третья история специалиста: Алексей оказывает правовую поддержку и консультирует по вопросам защиты прав детей.
                                </p>
                            </div>
                            <!-- Read More (Mobile Only) -->
                            <div class="team__card-read-more lg:hidden">
                                <?php get_template_part('template-parts/components/link-more', null, [
                                    'text' => 'Читать далее',
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

            <button type="button" class="team-next hidden lg:block cursor-pointer hover:opacity-70 transition flex-shrink-0">
                <img src="<?php echo get_theme_file_uri('assets/images/arrow-next.svg'); ?>" alt="Next" class="w-[56px] h-[56px]" />
            </button>

        </div> <!-- End slider-area -->

        <!-- Progress Bar (Mobile Only) -->
        <div class="team__progress w-full lg:hidden">
            <?php get_template_part('template-parts/components/slider-progress', null, [
                'track_color' => 'bg-white/20',
                'bar_color' => 'bg-secondary'
            ]); ?>
        </div>

    </div>
</section>