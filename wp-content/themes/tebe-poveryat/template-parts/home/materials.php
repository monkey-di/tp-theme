<?php
/**
 * Materials Section
 * Mobile First.
 */
?>
<section class="materials-section w-full bg-base py-12 px-4 relative overflow-hidden">
    
    <!-- Background Decorative SVGs -->
    <div class="materials-section__decor-group absolute inset-0 z-0 opacity-40 pointer-events-none">
        <!-- SVG Decor 1 (simplified path for brevity) -->
        <svg class="absolute left-[119.79px] top-0" width="229" height="256" viewBox="0 0 229 256" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0C0 0 0.540097 14.11 15.4651 42.0983C30.3901 70.0865 57.8397 71.333 52.5021 99.7626C47.1644 128.192 35.6686 141.44 52.5021 161.322C63.8218 174.692 45.7258 182.836 43.1255 192.298C40.5253 201.759 53.2614 189.484 65.5799 193.412C77.8977 197.34 91.4711 228.983 113.339 229.761C135.208 230.537 157.831 217.096 169.896 232.462C181.961 247.827 207.355 258.515 228.215 254.9V0H0Z" fill="var(--wp--preset--color--sand-yellow)"/>
        </svg>
        <!-- SVG Decor 2 -->
        <svg class="absolute left-[288.15px] top-[24.33px]" width="47" height="40" viewBox="0 0 47 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20.7852 36.3053C20.7852 36.3053 13.9818 40.1409 12.1353 39.6398C10.2888 39.1387 14.8066 36.6777 13.1703 34.6071C11.534 32.5365 2.06628 34.4894 0.144626 21.3455C-1.77703 8.20151 15.8652 -0.895212 28.4537 0.0701403C41.0423 1.03549 50.7355 20.8826 43.6029 30.5842C34.0092 43.6328 20.7852 36.3053 20.7852 36.3053Z" fill="var(--wp--preset--color--rust-orange)"/>
        </svg>
        <!-- ... и другие, я беру ключевые, чтобы не перегружать кодом -->
    </div>

    <div class="materials__container container mx-auto px-4 relative z-10 flex flex-col gap-8">
        
        <!-- Title -->
        <h2 class="materials__title text-[#36569f] text-[32px] font-normal font-ura uppercase leading-9">
            Полезные<br>материалы
        </h2>

        <!-- Article Card (Static Slide) -->
        <div class="materials__slider swiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="materials__card swiper-slide w-full h-[348px] relative rounded-[20px] overflow-hidden shadow-lg">
                    <!-- Card Background -->
                    <div class="materials__card-decor absolute inset-0 z-0">
                        <img src="https://www.figma.com/api/mcp/asset/69985f9e-2f6d-48d9-bdf8-e36af5d63851" alt="" class="w-full h-full object-cover" />
                        <!-- Overlay Vectors (Simplified for now, assuming Background contains main visual or we accept simplification) -->
                    </div>

                    <!-- Card Content -->
                    <div class="materials__card-content relative z-10 p-4 flex flex-col justify-end items-start h-full">
                        <h3 class="materials__card-title text-contrast text-h4 font-extrabold font-akrobat leading-9 mb-2">
                            ИИ и психотерапия: новый помощник или иллюзия близости?
                        </h3>
                        <p class="materials__card-description text-contrast text-base font-light font-geologica leading-6 mb-4">
                            ИИ, включая ChatGPT, активно используется для оказания психологической поддержки. Хотя он предоставляет доступность и анонимность, риски ошибок и отсутствие эмпатии поднимают вопросы о его роли в сфере ментального здоровья. Мы собрали мнения коллег из секторов благотворительности и технологий.
                        </p>
                        <div class="materials__card-read-more mt-auto">
                            <?php get_template_part('template-parts/components/link-more', null, [
                                'text' => 'Читать',
                                'url' => '#',
                                'style' => 'default',
                                'icon_src' => 'https://www.figma.com/api/mcp/asset/b0a347d8-70b4-4efd-a823-b3cc0f9a0960'
                            ]); ?>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 (Duplicate for now) -->
                <div class="materials__card swiper-slide w-full h-[348px] relative rounded-[20px] overflow-hidden shadow-lg">
                    <div class="materials__card-decor absolute inset-0 z-0">
                        <img src="https://www.figma.com/api/mcp/asset/69985f9e-2f6d-48d9-bdf8-e36af5d63851" alt="" class="w-full h-full object-cover" />
                    </div>
                    <div class="materials__card-content relative z-10 p-4 flex flex-col justify-end items-start h-full">
                        <h3 class="materials__card-title text-contrast text-h4 font-extrabold font-akrobat leading-9 mb-2">
                            Новое исследование: Влияние технологий на подростков
                        </h3>
                        <p class="materials__card-description text-contrast text-base font-light font-geologica leading-6 mb-4">
                            Второе описание: Как современные технологии влияют на психику и развитие подростков? Эксперты обсуждают плюсы и минусы цифровой эры.
                        </p>
                        <div class="materials__card-read-more mt-auto">
                            <?php get_template_part('template-parts/components/link-more', null, [
                                'text' => 'Подробнее',
                                'url' => '#',
                                'style' => 'default',
                                'icon_src' => 'https://www.figma.com/api/mcp/asset/b0a347d8-70b4-4efd-a823-b3cc0f9a0960'
                            ]); ?>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 (Duplicate for now) -->
                <div class="materials__card swiper-slide w-full h-[348px] relative rounded-[20px] overflow-hidden shadow-lg">
                    <div class="materials__card-decor absolute inset-0 z-0">
                        <img src="https://www.figma.com/api/mcp/asset/69985f9e-2f6d-48d9-bdf8-e36af5d63851" alt="" class="w-full h-full object-cover" />
                    </div>
                    <div class="materials__card-content relative z-10 p-4 flex flex-col justify-end items-start h-full">
                        <h3 class="materials__card-title text-contrast text-h4 font-extrabold font-akrobat leading-9 mb-2">
                            Психологическая помощь онлайн: доступность и эффективность
                        </h3>
                        <p class="materials__card-description text-contrast text-base font-light font-geologica leading-6 mb-4">
                            Третье описание: Обзор возможностей онлайн-терапии, ее преимуществ и потенциальных ограничений для тех, кто ищет поддержку.
                        </p>
                        <div class="materials__card-read-more mt-auto">
                            <?php get_template_part('template-parts/components/link-more', null, [
                                'text' => 'Узнать',
                                'url' => '#',
                                'style' => 'default',
                                'icon_src' => 'https://www.figma.com/api/mcp/asset/b0a347d8-70b4-4efd-a823-b3cc0f9a0960'
                            ]); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Controls -->
        <div class="materials__controls flex justify-between items-center mt-8">
            <!-- Mobile Progress -->
            <div class="materials__progress w-full md:hidden">
                <?php get_template_part('template-parts/components/slider-progress', null, [
                    'track_color' => 'bg-white/20',
                    'bar_color' => 'bg-secondary'
                ]); ?>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex w-full justify-end">
                <?php get_template_part('template-parts/components/slider-navigation', null, [
                    'prev_class' => 'materials-prev',
                    'next_class' => 'materials-next',
                    'color'      => 'text-primary'
                ]); ?>
            </div>
        </div>

        <!-- "View All" Button -->
        <div class="materials__view-all mt-8">
            <?php get_template_part('template-parts/components/button', null, [
                'text' => 'Смотреть все материалы', 
                'url' => '#', 
                'style' => 'outline-primary', // Assuming we might need this style or reuse primary/outline-white logic but with primary color border
                'class' => 'w-full outline-primary text-primary hover:bg-primary hover:text-white' // Manual override if style is not exact match yet, or let's add outline-primary to button.php later. For now, manual classes + base button structure works.
            ]); ?>
        </div>

    </div>
</section>