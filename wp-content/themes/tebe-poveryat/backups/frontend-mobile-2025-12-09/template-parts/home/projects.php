<?php
/**
 * Projects / Campaign Section
 * Mobile First with Desktop version.
 */
?>
<section class="projects-section w-full bg-peach relative overflow-hidden py-8 lg:py-24">
    <!-- Decorative SVG Shapes -->
    <div class="hidden lg:block absolute inset-0 z-0 opacity-40 pointer-events-none">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/campaign-vector1.svg" alt="" class="absolute bottom-[137.22px] left-[29.17%] translate-x-[-50%] w-[636.439px] h-[542.593px] opacity-[0.45]" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/campaign-vector2.svg" alt="" class="absolute bottom-[514.35px] left-[87.5%] translate-x-[-50%] w-[393.216px] h-[291.646px] rotate-[330.178deg] skew-x-[9.797deg] opacity-[0.45]" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/campaign-vector3.svg" alt="" class="absolute bottom-[14.84%] right-[58.33%] w-[487.294px] h-[487.294px] rotate-[90deg] scale-y-[-100%] opacity-[0.45]" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/campaign-vector4.svg" alt="" class="absolute bottom-[7.6%] right-[142.7px] w-[350.422px] h-[263.025px] rotate-[195.756deg] scale-y-[-100%] skew-x-[7.153deg] opacity-[0.45]" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/campaign-vector5.svg" alt="" class="absolute bottom-[64px] left-[21.15%] right-[7.97%] w-[543.65px] h-[543.65px] opacity-[0.45]" />
    </div>

    <!-- Top and Bottom Ellipse Shapes -->
    <div class="hidden lg:block absolute top-0 left-0 w-full h-[64px] z-10">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/campaign-ellipse1.svg" alt="" class="w-full h-full object-cover" />
    </div>
    <div class="hidden lg:block absolute bottom-0 left-0 w-full h-[64px] z-10 scale-y-[-1]">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/campaign-ellipse1.svg" alt="" class="w-full h-full object-cover" />
    </div>

    <div class="projects__container container mx-auto px-4 relative z-20 flex flex-col items-center lg:py-20">
        <h2 class="projects__title text-h2 text-primary font-ura uppercase text-center mb-4 lg:text-[64px] lg:leading-[0.95] lg:mb-10">КАМПАНИЯ</h2>
        
        <div class="projects__content flex flex-col items-center gap-6 lg:max-w-[692px] lg:gap-8">
            <h3 class="projects__hashtag text-h5 text-contrast font-akrobat font-extrabold uppercase text-center lg:text-[26px] lg:leading-none">#страшноважно</h3>
            
            <div class="projects__description text-contrast text-[16px] font-geologica font-light leading-[1.5] text-center flex flex-col gap-2 lg:gap-4">
                <p class="lg:text-[23px]">Ежегодная акция ко Дню защиты детей, которую проводит «Тебе поверят».</p>
                <p class="lg:text-[23px]">Каждый год мы говорим о разных сторонах одной темы — как защитить детей от сексуализированного насилия и как поддержать тех, кто его пережил.</p>
                <p class="lg:text-[23px]">Акция помогает обществу слышать, верить и поддерживать детей, делая шаги к миру, где они в безопасности.</p>
            </div>

            <div class="projects__link-wrapper flex flex-col items-center mt-4">
                <a href="#" class="projects__link flex items-center gap-2 text-primary font-akrobat font-bold text-[16px] lg:text-[20px] leading-none no-underline hover:underline">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-top-right.svg" alt="" class="w-[24px] h-[24px]" />
                    <span>Смотреть все проекты</span>
                </a>
                <div class="projects__link-underline w-full h-0.5 bg-primary relative -mt-0.5 lg:w-[200px]"></div>
            </div>
        </div>
    </div>
</section>