<?php
/**
 * Team Section
 * Mobile First.
 */
?>
<section class="team-section w-full bg-base py-12 px-4 relative overflow-hidden">
    
    <!-- Bottom Wave -->
    <div class="team-section__wave team-section__wave--bottom absolute left-0 bottom-0 z-10 w-full">
        <img src="https://www.figma.com/api/mcp/asset/a3ffcfd2-6447-443d-af83-5edaaddb8c2d" alt="" class="w-full h-[32px] object-cover scale-y-[-1]" />
    </div>

    <div class="team__container container mx-auto px-4 relative z-20 mt-8 mb-8 flex flex-col gap-8">
        
        <!-- Title -->
        <h2 class="team__title text-primary text-[32px] font-normal font-ura uppercase leading-[1.1] mb-2">
            Наши<br>специалисты
        </h2>

        <!-- Slider Card -->
        <div class="team__slider swiper w-full min-w-0">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="team__card swiper-slide w-full bg-white rounded-[20px] overflow-hidden shadow-lg">
                    <!-- Image Container -->
                    <div class="team__card-image relative w-full h-[480px] rounded-[20px] overflow-hidden">
                        <img class="w-full h-full object-cover" src="https://www.figma.com/api/mcp/asset/eff26b4d-5d3f-4d3c-85da-268de874818f" alt="Ксения Шашунова" />
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/20 pointer-events-none"></div>
                        <!-- Name & Role Overlay -->
                        <div class="absolute left-0 bottom-0 w-full p-4">
                            <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                Ксения<br>Шашунова
                            </h3>
                            <p class="text-white text-[16px] font-normal font-geologica leading-[1.5]">
                                Координаторка детско-родительского направления
                            </p>
                        </div>
                    </div>
                    <!-- Content -->
                    <!-- Content -->
                    <div class="team__card-content w-full px-4 pt-4 pb-6 flex flex-col gap-4">
                        <p class="text-contrast text-[16px] font-light font-geologica leading-[1.5]">
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
                    <div class="team__card-image relative w-full h-[480px] rounded-[20px] overflow-hidden">
                        <img class="w-full h-full object-cover" src="https://www.figma.com/api/mcp/asset/eff26b4d-5d3f-4d3c-85da-268de874818f" alt="Ирина Смирнова" />
                        <div class="absolute inset-0 bg-black/20 pointer-events-none"></div>
                        <div class="absolute left-0 bottom-0 w-full p-4">
                            <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                Ирина<br>Смирнова
                            </h3>
                            <p class="text-white text-[16px] font-normal font-geologica leading-[1.5]">
                                Психолог-консультант
                            </p>
                        </div>
                    </div>
                    <!-- Content -->
                    <!-- Content -->
                    <div class="team__card-content w-full px-4 pt-4 pb-6 flex flex-col gap-4">
                        <p class="text-contrast text-[16px] font-light font-geologica leading-[1.5]">
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
                    <div class="team__card-image relative w-full h-[480px] rounded-[20px] overflow-hidden">
                        <img class="w-full h-full object-cover" src="https://www.figma.com/api/mcp/asset/eff26b4d-5d3f-4d3c-85da-268de874818f" alt="Алексей Волков" />
                        <div class="absolute inset-0 bg-black/20 pointer-events-none"></div>
                        <div class="absolute left-0 bottom-0 w-full p-4">
                            <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                Алексей<br>Волков
                            </h3>
                            <p class="text-white text-[16px] font-normal font-geologica leading-[1.5]">
                                Юридический консультант
                            </p>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="team__card-content w-full px-4 pt-4 pb-6 flex flex-col gap-4">
                        <p class="text-contrast text-[16px] font-light font-geologica leading-[1.5]">
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
            <div class="team__progress w-full">
                <?php get_template_part('template-parts/components/slider-progress', null, [
                    'track_color' => 'bg-white/20',
                    'bar_color' => 'bg-secondary'
                ]); ?>
            </div>

            <!-- Desktop Navigation -->
            <!-- Removed for mobile first approach -->
        </div>

    </div>
</section>