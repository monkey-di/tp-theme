<?php
/**
 * Media About Us Section
 * Mobile First.
 */
?>
<section class="media-section w-full bg-teal relative overflow-hidden py-12 lg:py-20">
    
    <!-- Top Wave -->
    <div class="media-section__wave media-section__wave--top absolute left-0 top-0 z-10 w-full">
        <img src="https://www.figma.com/api/mcp/asset/caf0a422-764c-4079-aa5c-076f0e81e0b0" alt="" class="w-full h-[32px] lg:h-[64px] object-cover" />
    </div>

    <!-- Bottom Wave -->
    <div class="media-section__wave media-section__wave--bottom absolute left-0 bottom-0 z-10 w-full">
        <img src="https://www.figma.com/api/mcp/asset/caf0a422-764c-4079-aa5c-076f0e81e0b0" alt="" class="w-full h-[32px] lg:h-[64px] object-cover scale-y-[-1]" />
    </div>

    <!-- Background Decor -->
    <div class="media-section__decor absolute inset-0 z-0 opacity-20 pointer-events-none">
        <div class="absolute bottom-[-0.93%] flex items-center justify-center left-[-308px] top-[3.01%] w-[688.41px]">
          <div class="flex-none h-[325.078px] rotate-[180deg] w-[688.41px]">
            <div class="opacity-[0.45] relative size-full">
              <img src="https://www.figma.com/api/mcp/asset/aafc4d3a-a165-4a31-94b6-14585f99ac59" alt="" class="block max-w-none size-full" />
            </div>
          </div>
        </div>
        <div class="absolute bottom-[-0.13%] flex items-center justify-center left-[-72.91%] right-[10.22%] top-0">
          <div className="flex-none h-[332.434px] rotate-[180deg] scale-y-[-100%] w-[618.207px]">
            <div class="opacity-[0.45] relative size-full">
              <img src="https://www.figma.com/api/mcp/asset/a3ed1268-469b-463b-830a-12704d0610ad" alt="" class="block max-w-none size-full" />
            </div>
          </div>
        </div>
    </div>

    <div class="media__container container mx-auto px-4 relative z-20 flex flex-col gap-8 lg:gap-12 lg:my-20">
        
        <!-- Title -->
        <h2 class="media__title text-center text-white text-[32px] lg:text-[64px] font-normal font-ura uppercase leading-[1.1] lg:leading-[0.95]">
            Сми о нас
        </h2>

        <!-- Slider Cards -->
        <div class="media__slider swiper w-full min-w-0">
            <div class="swiper-wrapper">
                
                <!-- Card 1: Snob? (Frame) -->
                <div class="media__card swiper-slide h-[87px] p-5 bg-white rounded-[20px] flex justify-center items-center">
                    <div class="w-[140px] h-[47px] relative flex items-center justify-center">
                        <img src="https://www.figma.com/api/mcp/asset/bb8e6aa8-be2d-41be-b175-19f783772020" alt="СМИ 1" class="w-full h-full object-contain" />
                    </div>
                </div>

                <!-- Card 2: Novochag -->
                <div class="media__card swiper-slide h-[87px] p-5 bg-white rounded-[20px] flex justify-center items-center">
                    <div class="w-[150px] h-[21px] relative flex items-center justify-center">
                        <img src="https://www.figma.com/api/mcp/asset/1d546a68-ada4-4eea-8861-555d2af57034" alt="Новый Очаг" class="w-full h-full object-contain" />
                    </div>
                </div>

                <!-- Card 3: Forbes? (Frame1) -->
                <div class="media__card swiper-slide h-[87px] p-5 bg-white rounded-[20px] flex justify-center items-center">
                    <div class="w-[145px] h-[33px] relative flex items-center justify-center">
                        <img src="https://www.figma.com/api/mcp/asset/79d2f1dd-2c7a-4ef0-8100-b05bed435e8d" alt="Forbes" class="w-full h-full object-contain" />
                    </div>
                </div>

                <!-- Card 4: Knife (Frame2) -->
                <div class="media__card swiper-slide h-[87px] p-5 bg-white rounded-[20px] flex justify-center items-center">
                    <div class="w-[95px] h-[27px] relative flex items-center justify-center">
                        <img src="https://www.figma.com/api/mcp/asset/693f1a7e-d9ef-4e7e-ba85-06fccfb08798" alt="Нож" class="w-full h-full object-contain" />
                    </div>
                </div>

                <!-- Card 5: Download 1 -->
                <div class="media__card swiper-slide h-[87px] p-5 bg-white rounded-[20px] flex justify-center items-center">
                    <div class="w-[147px] h-[32px] relative flex items-center justify-center">
                        <img src="https://www.figma.com/api/mcp/asset/3dfc2e48-e6a0-42ce-aebe-3ec4b2c16dbf" alt="СМИ 5" class="w-full h-full object-contain" />
                    </div>
                </div>

                <!-- Card 6: Takie Dela (Frame3) -->
                <div class="media__card swiper-slide h-[87px] p-5 bg-white rounded-[20px] flex justify-center items-center">
                    <div class="w-[69px] h-[39px] relative flex items-center justify-center">
                        <img src="https://www.figma.com/api/mcp/asset/99cbb63b-f7f3-4918-9402-0aff2d465402" alt="Такие Дела" class="w-full h-full object-contain" />
                    </div>
                </div>

            </div>
        </div>

        <!-- Slider Controls -->
        <div class="media__controls w-full">
            <!-- Mobile Progress -->
            <div class="media__progress w-full lg:hidden">
                <?php get_template_part('template-parts/components/slider-progress', null, [
                    'track_color' => 'bg-white/20',
                    'bar_color' => 'bg-white'
                ]); ?>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex w-full">
                <?php get_template_part('template-parts/components/slider-navigation', null, [
                    'prev_class' => 'media-prev',
                    'next_class' => 'media-next',
                    'color'      => 'text-white',
                    'arrow_prev' => 'arrow-prev-white.svg',
                    'arrow_next' => 'arrow-next-white.svg',
                    'justify'    => 'justify-center'
                ]); ?>
            </div>
        </div>

    </div>
</section>
