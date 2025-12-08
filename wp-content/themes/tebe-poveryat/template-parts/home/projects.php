<?php
/**
 * Projects / Campaign Section
 * Mobile First.
 */
?>
<section class="projects-section w-full bg-peach relative overflow-hidden py-12">
    
    <!-- Background Decor -->
    <div class="projects-section__decor absolute bottom-[-12.77px] right-[0.59px] w-[396.407px] h-[599.774px] z-0 pointer-events-none">
        <div class="absolute bottom-[143.03px] flex h-[443.966px] items-center justify-center left-[calc(37.5%+16.79px)] translate-x-[-50%] w-[352.581px]">
          <div class="flex-none rotate-[289.811deg] scale-y-[-100%]">
            <div class="h-[235.301px] opacity-[0.45] relative w-[387.13px]">
              <img alt="" class="block max-w-none size-full" src="https://www.figma.com/api/mcp/asset/3d4ac3cb-1793-427f-a852-5db0d5838b6b" />
            </div>
          </div>
        </div>
        <div class="absolute bottom-[31.83%] opacity-[0.45] right-[0.59px] top-[23.53%] w-[148.403px]">
          <img alt="" class="block max-w-none size-full" src="https://www.figma.com/api/mcp/asset/ee66662d-aa87-4b8a-9f24-dca6b07eb1ef" />
        </div>
        <div class="absolute flex inset-[6.3%_0.3%_-2.25%_3.42%] items-center justify-center">
          <div className="flex-none h-[226.665px] rotate-[251.458deg] scale-y-[-100%] skew-x-[357.179deg] w-[486.763px]">
            <div className="opacity-[0.45] relative size-full">
              <img alt="" class="block max-w-none size-full" src="https://www.figma.com/api/mcp/asset/acd507be-da7e-4273-8a57-4752367b770d" />
            </div>
          </div>
        </div>
    </div>

    <!-- Top Wave -->
    <div class="projects-section__wave projects-section__wave--top absolute left-0 top-0 z-10 w-full">
        <img src="https://www.figma.com/api/mcp/asset/e23dd8d4-39a1-429c-917a-0fe7a230a12f" alt="" class="w-full h-[32px] object-cover" />
    </div>

    <!-- Bottom Wave -->
    <div class="projects-section__wave projects-section__wave--bottom absolute left-0 bottom-0 z-10 w-full">
        <img src="https://www.figma.com/api/mcp/asset/e23dd8d4-39a1-429c-917a-0fe7a230a12f" alt="" class="w-full h-[32px] object-cover scale-y-[-1]" />
    </div>
    
    <div class="projects__container container mx-auto px-4 relative z-20 mt-8 mb-8 flex flex-col gap-6">
        
        <!-- Label -->
        <div class="projects__label text-primary text-[32px] font-normal font-ura uppercase leading-9">
            КАМПАНИЯ
        </div>

        <!-- Title -->
        <h2 class="projects__title text-contrast text-[26px] font-extrabold font-akrobat leading-[26px]">
            #страшноважно
        </h2>

        <!-- Text Content -->
        <div class="projects__description flex flex-col gap-4 text-contrast text-base font-light font-geologica leading-6">
            <p>#страшноважно — ежегодная акция ко Дню защиты детей, которую проводит «Тебе поверят».</p>
            <p>Каждый год мы говорим о разных сторонах одной темы — как защитить детей от сексуализированного насилия и как поддержать тех, кто его пережил.</p>
            <p>Акция помогает обществу слышать, верить и поддерживать детей, делая шаги к миру, где они в безопасности.</p>
        </div>

        <!-- Link -->
        <div class="projects__link-wrapper mt-2">
            <?php get_template_part('template-parts/components/link-more', null, [
                'text' => 'Смотреть все проекты',
                'url' => '#',
                'style' => 'hero'
            ]); ?>
        </div>

    </div>
</section>
