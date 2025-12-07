<?php
/**
 * Histories Section
 * Mobile First.
 */
?>
<section class="histories-section w-full bg-sky relative overflow-hidden py-12">
    
    <!-- Top Wave -->
    <div class="histories-section__wave histories-section__wave--top absolute left-0 top-0 z-10 w-full">
        <img src="https://www.figma.com/api/mcp/asset/5b123c0f-8fc7-432b-a8ff-d1c8d69cf037" alt="" class="w-full h-[32px] object-cover" />
    </div>

    <!-- Bottom Wave -->
    <div class="histories-section__wave histories-section__wave--bottom absolute left-0 bottom-0 z-10 w-full">
        <img src="https://www.figma.com/api/mcp/asset/5b123c0f-8fc7-432b-a8ff-d1c8d69cf037" alt="" class="w-full h-[32px] object-cover scale-y-[-1]" />
    </div>

    <!-- Background Decor (Stars/Sparks) -->
    <div class="histories-section__decor absolute inset-0 z-0 pointer-events-none">
        <div class="absolute bottom-0 left-[-28px] w-[423px] h-[423px] flex items-center justify-center">
            <img src="https://www.figma.com/api/mcp/asset/ca24a85b-aec7-44bb-9747-9b67a42f16c0" alt="" class="w-full h-full object-contain opacity-45 rotate-[270deg]" />
        </div>
        <div class="absolute top-[5%] right-[-6%] w-[432px] h-[432px] flex items-center justify-center">
            <img src="https://www.figma.com/api/mcp/asset/8a7b47e0-5554-4a01-99f4-964c295223ba" alt="" class="w-full h-full object-contain opacity-45 rotate-[270deg] scale-y-[-1]" />
        </div>
    </div>

    <div class="histories__container container mx-auto px-4 relative z-20 mt-8 mb-8 flex flex-col gap-8">
        
        <!-- Title -->
        <h2 class="histories__title text-white text-[32px] font-normal font-ura uppercase leading-[1.1] mb-2">
            Истории<br>переживших
        </h2>

        <!-- Slider Card -->
        <div class="histories__slider swiper w-full min-w-0">
            <div class="swiper-wrapper">
                <!-- Slide 1: Tatiana Tsvetkova -->
                <div class="histories__card swiper-slide w-full bg-white rounded-[20px] overflow-hidden flex flex-col items-center pt-1">
                    <!-- Image Container -->
                    <div class="histories__card-image relative w-[calc(100%-8px)] h-[400px] mt-1 rounded-[20px] overflow-hidden">
                        <img class="w-full h-full object-cover" src="https://www.figma.com/api/mcp/asset/314b9643-f36f-4b57-bdbc-8214ec397710" alt="Татьяна Цветкова" />
                        <!-- No Overlay -->
                        
                        <!-- Name Overlay -->
                        <div class="absolute left-0 bottom-0 w-full p-4">
                            <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                Татьяна<br>Цветкова
                            </h3>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="histories__card-content w-full px-4 pt-4 pb-6 flex flex-col gap-4">
                        <p class="text-contrast text-[16px] font-light font-geologica leading-[1.5]">
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
                    <div class="histories__card-image relative w-[calc(100%-8px)] h-[400px] mt-1 rounded-[20px] overflow-hidden">
                        <img class="w-full h-full object-cover" src="https://www.figma.com/api/mcp/asset/314b9643-f36f-4b57-bdbc-8214ec397710" alt="Мария Иванова" />
                        <div class="absolute left-0 bottom-0 w-full p-4 pt-20">
                            <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                Мария<br>Иванова
                            </h3>
                        </div>
                    </div>
                    <div class="histories__card-content w-full px-4 pt-4 pb-6 flex flex-col gap-4">
                        <p class="text-contrast text-[16px] font-light font-geologica leading-[1.5]">
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
                    <div class="histories__card-image relative w-[calc(100%-8px)] h-[400px] mt-1 rounded-[20px] overflow-hidden">
                        <img class="w-full h-full object-cover" src="https://www.figma.com/api/mcp/asset/314b9643-f36f-4b57-bdbc-8214ec397710" alt="Елена Петрова" />
                        <div class="absolute left-0 bottom-0 w-full p-4 pt-20">
                            <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                Елена<br>Петрова
                            </h3>
                        </div>
                    </div>
                    <div class="histories__card-content w-full px-4 pt-4 pb-6 flex flex-col gap-4">
                        <p class="text-contrast text-[16px] font-light font-geologica leading-[1.5]">
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
                'class' => 'w-full !text-white' // Force white text
            ]); ?>
        </div>

    </div>
</section>