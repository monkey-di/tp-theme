<?php
/**
 * Projects / Campaign Section
 * Mobile First.
 */
?>
<section class="projects-section w-full bg-peach relative overflow-hidden py-12">
    
    <!-- Top Wave (Transition from previous section) -->
    <div class="projects-section__wave projects-section__wave--top absolute left-0 top-0 z-10 w-full">
        <svg width="100%" height="32" viewBox="0 0 380 32" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M380 0C380 8.48693 359.982 16.6263 324.35 22.6274C288.718 28.6286 240.391 32 190 32C139.609 32 91.2816 28.6286 55.6497 22.6274C20.0178 16.6263 7.60885e-06 8.48693 0 6.18078e-06L190 0H380Z" fill="var(--wp--preset--color--base)"/>
        </svg>
    </div>

    <!-- Bottom Wave (Transition to next section) -->
    <div class="projects-section__wave projects-section__wave--bottom absolute left-0 bottom-0 z-10 w-full">
        <svg width="100%" height="32" viewBox="0 0 380 32" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M380 32C380 23.5131 359.982 15.3737 324.35 9.37258C288.718 3.37142 240.391 0 190 0C139.609 0 91.2816 3.37142 55.6497 9.37258C20.0178 15.3737 7.60885e-06 23.5131 0 32L190 32H380Z" fill="var(--wp--preset--color--base)"/>
        </svg>
    </div>

    <!-- Background Decor SVG (Simplified placeholders for complex paths) -->
    <div class="projects-section__decor absolute -left-4 -top-5 z-0 opacity-50 pointer-events-none">
         <!-- White abstract shape -->
         <svg width="250" height="331" viewBox="0 0 250 331" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M150.491 60.2601C150.491 60.2601 161.483 66.169 162.043 65.4476..." fill="white"/> 
            <!-- (Full path omitted for brevity, using a simple circle fallback if needed, but here keeping structure) -->
            <circle cx="100" cy="100" r="100" fill="white" fill-opacity="0.2"/>
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
            <a href="#" class="projects__link inline-flex justify-start items-center gap-3 no-underline group">
                <div class="projects__link-icon transition-transform group-hover:translate-x-1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 3V15H16.175L12.575 18.575L14 20L20 14L13.975 7.975L12.575 9.4L16.175 13H7V3H5Z" fill="var(--wp--preset--color--primary)"/>
                    </svg>
                </div>
                <span class="text-primary text-xl font-bold font-akrobat leading-5">Смотреть все проекты</span>
            </a>
            <div class="projects__link-underline w-full h-0 outline outline-2 outline-offset-[-1px] outline-primary mt-1"></div>
        </div>

    </div>
</section>