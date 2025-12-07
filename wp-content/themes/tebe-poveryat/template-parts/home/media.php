<?php
/**
 * Media About Us Section
 * Mobile First.
 */
?>
<section class="media-section w-full bg-teal relative overflow-hidden py-12">
    
    <!-- Top Wave -->
    <div class="media-section__wave media-section__wave--top absolute left-0 top-0 z-10 w-full">
        <img src="https://www.figma.com/api/mcp/asset/caf0a422-764c-4079-aa5c-076f0e81e0b0" alt="" class="w-full h-[32px] object-cover" />
    </div>

    <!-- Bottom Wave -->
    <div class="media-section__wave media-section__wave--bottom absolute left-0 bottom-0 z-10 w-full">
        <img src="https://www.figma.com/api/mcp/asset/caf0a422-764c-4079-aa5c-076f0e81e0b0" alt="" class="w-full h-[32px] object-cover scale-y-[-1]" />
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

    <div class="media__container container mx-auto px-4 relative z-20 mt-8 mb-8 flex flex-col gap-8">
        
        <!-- Title -->
        <h2 class="media__title text-center text-white text-[32px] font-normal font-ura uppercase leading-9">
            Сми о нас
        </h2>

        <!-- Slider Cards -->
        <div class="media__slider swiper">
            <div class="swiper-wrapper">
                <!-- Card 1 -->
                <div class="media__card swiper-slide flex-shrink-0 w-[180px] h-[87px] p-5 bg-white rounded-[20px] flex justify-center items-center">
                    <div class="w-[140px] h-[47px] relative flex items-center justify-center">
                        <img src="https://www.figma.com/api/mcp/asset/6d1a7059-44fb-400f-ad3e-0ced2a566951" alt="Logo 1" class="w-full h-full object-contain" />
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="media__card swiper-slide flex-shrink-0 w-[180px] h-[87px] p-5 bg-white rounded-[20px] flex justify-center items-center">
                    <div class="w-[95px] h-[27px] relative flex items-center justify-center">
                        <img src="https://www.figma.com/api/mcp/asset/bfc60519-0187-4ca1-b553-d8be8cb17cd0" alt="Logo 2" class="w-full h-full object-contain" />
                    </div>
                </div>

                <!-- Card 3 (Duplicate of 1 for now) -->
                <div class="media__card swiper-slide flex-shrink-0 w-[180px] h-[87px] p-5 bg-white rounded-[20px] flex justify-center items-center">
                    <div class="w-[140px] h-[47px] relative flex items-center justify-center">
                        <img src="https://www.figma.com/api/mcp/asset/6d1a7059-44fb-400f-ad3e-0ced2a566951" alt="Logo 3" class="w-full h-full object-contain" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Controls -->
        <div class="media__controls flex justify-between items-center">
            <!-- Mobile Progress -->
            <div class="media__progress w-full md:hidden">
                <?php get_template_part('template-parts/components/slider-progress', null, [
                    'track_color' => 'bg-white/20',
                    'bar_color' => 'bg-white'
                ]); ?>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex w-full justify-center mt-4">
                <?php get_template_part('template-parts/components/slider-navigation', null, [
                    'prev_class' => 'media-prev',
                    'next_class' => 'media-next',
                    'color'      => 'text-white'
                ]); ?>
            </div>
        </div>

    </div>
</section>
