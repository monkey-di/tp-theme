<?php
/**
 * Team Section
 * Mobile First.
 */
?>
<section class="team-section w-full bg-base py-12 px-4 relative overflow-hidden">
    
    <!-- Bottom Wave -->
    <div class="team-section__wave team-section__wave--bottom absolute left-0 bottom-0 z-10 w-full">
        <img src="https://www.figma.com/api/mcp/asset/dcd1a811-3883-4478-be2b-3c52e5fa7c08" alt="" class="w-full h-[32px] object-cover scale-y-[-1]" />
    </div>

    <div class="team__container container mx-auto px-4 relative z-20 mt-8 mb-8 flex flex-col gap-8">
        
        <!-- Title -->
        <h2 class="team__title text-left text-primary text-[32px] font-normal font-ura uppercase leading-9">
            Наши <br>специалисты
        </h2>

        <!-- Slider Card -->
        <div class="team__slider swiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="team__card swiper-slide w-full bg-white rounded-[20px] overflow-hidden shadow-lg">
                    <!-- Image Container -->
                    <div class="team__card-image relative w-full h-[480px] rounded-[20px] overflow-hidden bg-gray-200">
                        <img class="w-full h-full object-cover" src="https://www.figma.com/api/mcp/asset/4664c46b-d4e7-435d-83e9-d4e7488d9279" alt="Ксения Шашунова" />
                        <!-- Name & Role Overlay -->
                        <div class="absolute left-0 bottom-0 w-full p-4 bg-gradient-to-t from-black/60 to-transparent pt-20">
                            <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-10">
                                Ксения Шашунова
                            </h3>
                            <p class="text-white text-base font-normal font-geologica leading-6">
                                Координаторка детско-родительского направления
                            </p>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="team__card-content w-full px-4 pt-4 pb-6 flex flex-col gap-4">
                        <p class="text-contrast text-base font-light font-geologica leading-6">
                            «Я руковожу направлением работы, куда обращаются за помощью, поддержкой и информацией подростки или родители, чьи дети подверглись сексуализированному насилию. Моя главная задача — поддержка и развитие команды психологов этого направления, организация обучения и регулярных супервизий и интервизий. Также я принимаю заявки от подростков, распределяю их между специалистами: мне важно быть на связи в случае, если ситуация срочная, подключать к работе юристов или другие организации.<br>
                            Кроме того, я рассказываю о нашей работе с детьми в СМИ, чтобы было больше информации о проблеме сексуализированного насилия над детьми в разных аспектах»
                        </p>
                        <!-- Read More -->
                        <div class="team__card-read-more">
                            <?php get_template_part('template-parts/components/link-more', null, [
                                'text' => 'Читать далее',
                                'url' => '#',
                                'style' => 'default'
                            ]); ?>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 (Duplicate for now) -->
                <div class="team__card swiper-slide w-full bg-white rounded-[20px] overflow-hidden shadow-lg">
                    <div class="team__card-image relative w-full h-[480px] rounded-[20px] overflow-hidden bg-gray-200">
                        <img class="w-full h-full object-cover" src="https://www.figma.com/api/mcp/asset/4664c46b-d4e7-435d-83e9-d4e7488d9279" alt="Ирина Смирнова" />
                        <div class="absolute left-0 bottom-0 w-full p-4 bg-gradient-to-t from-black/60 to-transparent pt-20">
                            <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-10">
                                Ирина Смирнова
                            </h3>
                            <p class="text-white text-base font-normal font-geologica leading-6">
                                Психолог-консультант
                            </p>
                        </div>
                    </div>
                    <div class="team__card-content w-full px-4 pt-4 pb-6 flex flex-col gap-4">
                        <p class="text-contrast text-base font-light font-geologica leading-6">
                            Вторая история специалиста: Ирина работает с детьми и подростками, помогая им справиться с травмами и восстановить доверие к миру.
                        </p>
                        <div class="team__card-read-more">
                            <?php get_template_part('template-parts/components/link-more', null, [
                                'text' => 'Читать далее',
                                'url' => '#',
                                'style' => 'default'
                            ]); ?>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 (Duplicate for now) -->
                <div class="team__card swiper-slide w-full bg-white rounded-[20px] overflow-hidden shadow-lg">
                    <div class="team__card-image relative w-full h-[480px] rounded-[20px] overflow-hidden bg-gray-200">
                        <img class="w-full h-full object-cover" src="https://www.figma.com/api/mcp/asset/4664c46b-d4e7-435d-83e9-d4e7488d9279" alt="Алексей Волков" />
                        <div class="absolute left-0 bottom-0 w-full p-4 bg-gradient-to-t from-black/60 to-transparent pt-20">
                            <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-10">
                                Алексей Волков
                            </h3>
                            <p class="text-white text-base font-normal font-geologica leading-6">
                                Юридический консультант
                            </p>
                        </div>
                    </div>
                    <div class="team__card-content w-full px-4 pt-4 pb-6 flex flex-col gap-4">
                        <p class="text-contrast text-base font-light font-geologica leading-6">
                            Третья история специалиста: Алексей оказывает правовую поддержку и консультирует по вопросам защиты прав детей.
                        </p>
                        <div class="team__card-read-more">
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
        <div class="team__controls flex justify-between items-center mt-8">
            <!-- Mobile Progress -->
            <div class="team__progress w-full md:hidden">
                <?php get_template_part('template-parts/components/slider-progress', null, [
                    'track_color' => 'bg-white/20',
                    'bar_color' => 'bg-secondary'
                ]); ?>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex w-full justify-end">
                <?php get_template_part('template-parts/components/slider-navigation', null, [
                    'prev_class' => 'team-prev',
                    'next_class' => 'team-next',
                    'color'      => 'text-primary'
                ]); ?>
            </div>
        </div>

    </div>
</section>