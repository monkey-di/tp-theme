<?php
/**
 * Histories Section
 * Mobile First.
 */
?>
<section class="histories-section w-full bg-sky relative overflow-hidden py-12">
    
    <!-- Top Wave -->
    <div class="histories-section__wave histories-section__wave--top absolute left-0 top-0 z-10 w-full">
        <img src="https://www.figma.com/api/mcp/asset/14e29349-943f-45a8-ae8e-ddc92cb47dcb" alt="" class="w-full h-[32px] object-cover" />
    </div>

    <!-- Bottom Wave -->
    <div class="histories-section__wave histories-section__wave--bottom absolute left-0 bottom-0 z-10 w-full">
        <img src="https://www.figma.com/api/mcp/asset/14e29349-943f-45a8-ae8e-ddc92cb47dcb" alt="" class="w-full h-[32px] object-cover scale-y-[-1]" />
    </div>

    <!-- Background Decor -->
    <div class="histories-section__decor absolute inset-0 z-0 pointer-events-none opacity-30">
        <div class="absolute bottom-0 flex items-center justify-center left-[-28px] top-0 w-[423.184px]">
          <div class="flex-none h-[423.184px] rotate-[270deg] w-[982px]">
            <div class="opacity-[0.45] relative size-full">
              <img src="https://www.figma.com/api/mcp/asset/d6941a50-6207-40ce-a230-a5378fb2927e" alt="" class="block max-w-none size-full" />
            </div>
          </div>
        </div>
        <div class="absolute flex inset-[4.5%_-7.42%_5.7%_-6.46%] items-center justify-center">
          <div class="flex-none h-[432.762px] rotate-[270deg] scale-y-[-100%] w-[881.857px]">
            <div class="opacity-[0.45] relative size-full">
              <img src="https://www.figma.com/api/mcp/asset/7f2369f5-4a2d-409a-9d51-c9e0c37de692" alt="" class="block max-w-none size-full" />
            </div>
          </div>
        </div>
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
                        <img class="w-full h-full object-cover" src="https://www.figma.com/api/mcp/asset/cc242913-037e-4ebf-adcd-7cb3fdedd6df" alt="Татьяна Цветкова" />
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
                        <img class="w-full h-full object-cover" src="https://www.figma.com/api/mcp/asset/cc242913-037e-4ebf-adcd-7cb3fdedd6df" alt="Мария Иванова" />
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
                        <img class="w-full h-full object-cover" src="https://www.figma.com/api/mcp/asset/cc242913-037e-4ebf-adcd-7cb3fdedd6df" alt="Елена Петрова" />
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