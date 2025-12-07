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
        <svg width="100%" height="32" viewBox="0 0 380 32" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M380 0C380 8.48693 359.982 16.6263 324.35 22.6274C288.718 28.6286 240.391 32 190 32C139.609 32 91.2816 28.6286 55.6497 22.6274C20.0178 16.6263 7.60885e-06 8.48693 0 6.18078e-06L190 0H380Z" fill="var(--wp--preset--color--base)"/>
        </svg>
    </div>

    <!-- Bottom Wave -->
    <div class="projects-section__wave projects-section__wave--bottom absolute left-0 bottom-0 z-10 w-full">
        <svg width="100%" height="32" viewBox="0 0 380 32" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M380 32C380 23.5131 359.982 15.3737 324.35 9.37258C288.718 3.37142 240.391 0 190 0C139.609 0 91.2816 3.37142 55.6497 9.37258C20.0178 15.3737 7.60885e-06 23.5131 0 32L190 32H380Z" fill="var(--wp--preset--color--base)"/>
        </svg>
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
