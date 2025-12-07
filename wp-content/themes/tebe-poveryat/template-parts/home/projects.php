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
              <img src="https://www.figma.com/api/mcp/asset/4ed35591-e379-463c-afdd-7d7f79c1af3d" alt="" class="block max-w-none size-full" />
            </div>
          </div>
        </div>
        <div class="absolute bottom-[31.83%] opacity-[0.45] right-[0.59px] top-[23.53%] w-[148.403px]">
          <img src="https://www.figma.com/api/mcp/asset/6f5ce425-94b4-4df0-a699-80c257aa197d" alt="" class="block max-w-none size-full" />
        </div>
        <div class="absolute flex inset-[6.3%_0.3%_-2.25%_3.42%] items-center justify-center">
          <div className="flex-none h-[226.665px] rotate-[251.458deg] scale-y-[-100%] skew-x-[357.179deg] w-[486.763px]">
            <div className="opacity-[0.45] relative size-full">
              <img src="https://www.figma.com/api/mcp/asset/f55f1b96-5dfa-49d3-985b-30a18650e9c5" alt="" class="block max-w-none size-full" />
            </div>
          </div>
        </div>
    </div>

    <!-- Top Wave -->
    <div class="projects-section__wave projects-section__wave--top absolute left-0 top-0 z-10 w-full">
        <img src="https://www.figma.com/api/mcp/asset/200c3548-325e-4e23-ae78-260dd8632d02" alt="" class="w-full h-[32px] object-cover" />
    </div>

    <!-- Bottom Wave -->
    <div class="projects-section__wave projects-section__wave--bottom absolute left-0 bottom-0 z-10 w-full">
        <img src="https://www.figma.com/api/mcp/asset/200c3548-325e-4e23-ae78-260dd8632d02" alt="" class="w-full h-[32px] object-cover scale-y-[-1]" />
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
                'style' => 'hero',
                'icon_src' => 'https://www.figma.com/api/mcp/asset/e8301a6f-5468-4f1f-96d9-7a652fc5cd61'
            ]); ?>
        </div>

    </div>
</section>
