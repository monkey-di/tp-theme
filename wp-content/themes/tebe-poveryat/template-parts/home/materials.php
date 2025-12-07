<?php
/**
 * Materials Section
 * Mobile First.
 */
?>
<section class="materials-section materials w-full bg-base relative overflow-hidden py-12 px-4">
    <div class="materials__container container mx-auto flex flex-col gap-6">
        
        <!-- Title -->
        <h2 class="materials__title text-primary-dark text-[32px] font-normal font-ura uppercase leading-[1.1] mb-2">
            Полезные<br>материалы
        </h2>

        <!-- Slider -->
        <div class="materials__slider swiper w-full">
            <div class="swiper-wrapper">
                
                <!-- Slide 1: AI and Psychotherapy -->
                <div class="materials__card swiper-slide w-full flex flex-col gap-6">
                    <!-- Illustration -->
                    <div class="materials__card-image w-full aspect-square rounded-[20px] overflow-hidden relative bg-[#fef1ec]">
                        <img src="https://www.figma.com/api/mcp/asset/ca09aa2b-4d81-42e7-aedf-9c2d95134ad4" alt="ИИ и психотерапия" class="w-full h-full object-cover" />
                    </div>

                    <!-- Content -->
                    <div class="materials__card-content flex flex-col items-start gap-4">
                        <h3 class="materials__card-title text-contrast text-[36px] font-extrabold font-akrobat leading-none">
                            ИИ и психотерапия: новый помощник или иллюзия близости?
                        </h3>
                        <div class="materials__card-description text-contrast text-[16px] font-light font-geologica leading-[1.5]">
                            <p class="mb-2">ИИ, включая ChatGPT, активно используется для оказания психологической поддержки.</p>
                            <p class="mb-2">Хотя он предоставляет доступность и анонимность, риски ошибок и отсутствие эмпатии поднимают вопросы о его роли в сфере ментального здоровья.</p>
                            <p>Мы собрали мнения коллег из секторов благотворительности и технологий.</p>
                        </div>
                        
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

                <!-- Slide 2 (Duplicate) -->
                <div class="materials__card swiper-slide w-full flex flex-col gap-6">
                    <div class="materials__card-image w-full aspect-square rounded-[20px] overflow-hidden relative bg-[#fef1ec]">
                        <!-- Using same image for duplicate slide as we only have one rasterized asset. In production, this would be dynamic. -->
                        <img src="https://www.figma.com/api/mcp/asset/ca09aa2b-4d81-42e7-aedf-9c2d95134ad4" alt="Материал 2" class="w-full h-full object-cover" />
                    </div>
                    <div class="materials__card-content flex flex-col items-start gap-4">
                        <h3 class="materials__card-title text-contrast text-[36px] font-extrabold font-akrobat leading-none">
                            Влияние социальных сетей на самооценку подростков
                        </h3>
                        <div class="materials__card-description text-contrast text-[16px] font-light font-geologica leading-[1.5]">
                            <p class="mb-2">Исследование о том, как лайки и комментарии формируют восприятие себя.</p>
                            <p>Советы психологов для родителей и педагогов.</p>
                        </div>
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
        </div>

        <!-- Progress Bar -->
        <div class="materials__progress w-full">
            <?php get_template_part('template-parts/components/slider-progress', null, [
                'track_color' => 'bg-white',
                'bar_color' => 'bg-secondary' // Pink color from design
            ]); ?>
        </div>

        <!-- View All Button -->
        <div class="materials__view-all w-full mt-4">
            <?php get_template_part('template-parts/components/button', null, [
                'text' => 'Смотреть все материалы',
                'url' => '#',
                'style' => 'outline-primary',
                'class' => 'w-full'
            ]); ?>
        </div>

    </div>
</section>