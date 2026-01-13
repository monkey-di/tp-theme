<?php
/**
 * Projects / Campaign Section
 * Mobile First with Desktop version.
 */

?>
<section
        class="projects-section w-full bg-peach relative overflow-hidden z-10 mt-[-40px] mb-[-40px] lg:mt-[-80px] lg:mb-[-80px] pt-[80px] lg:pt-[160px] pb-[80px] lg:pb-[160px]">
    <!-- Decorative SVG Shapes -->
    <div class="absolute inset-0 z-0 pointer-events-none px-0 lg:px-[96px] hidden lg:block">
        <img src="<?php
        echo get_template_directory_uri(); ?>/assets/images/bg.png" alt=""
             class="w-full h-full object-cover object-bottom lg:object-center"/>
    </div>

    <div class="absolute inset-0 z-0 pointer-events-none px-0 lg:px-[96px] lg:hidden block">
        <img src="<?php
        echo get_template_directory_uri(); ?>/assets/images/fon1.png" alt=""
             class="w-full h-full object-cover object-bottom lg:object-center"/>
    </div>

    <div class="projects__container container mx-auto px-4 relative z-20 flex flex-col items-start sm:items-center pt-[80px] pb-8 lg:pt-14 lg:pb-8">
        <h2 class="projects__title text-h2 text-primary md:mb-10 font-ura uppercase text-left sm:text-center mb-4 lg:text-[64px] lg:leading-[0.95] lg:mb-[25px]

">
            КАМПАНИЯ</h2>

        <div class="projects__content flex flex-col items-start sm:items-center gap-4 lg:gap-2 lg:max-w-[692px]">
            <h3 class="projects__hashtag text-[26px] leading-none text-contrast font-akrobat font-extrabold text-left sm:text-center lg:text-[26px] xl:mb-[14px]">
                #страшноважно</h3>

            <div class="projects__description text-contrast text-[16px] font-geologica font-light leading-[1.5] text-left sm:text-center flex flex-col gap-2 lg:gap-2.5">
                <p class="text-p">Ежегодная акция ко Дню защиты детей, которую проводит «Тебе поверят».</p>
                <p class="text-p">Каждый год мы говорим о разных сторонах одной темы — как защитить детей от
                    сексуализированного насилия и как поддержать тех, кто его пережил.</p>
                <p class="text-p">Акция помогает обществу слышать, верить и поддерживать детей, делая шаги к
                    миру, где они в безопасности.</p>
            </div>

            <div class="projects__link-wrapper flex flex-col items-start sm:items-center mt-4 w-full lg:w-auto">
                <!-- Mobile-only Read More Link -->
                <?php
                get_template_part('template-parts/components/link-more', null, [
                        'text' => 'Смотреть все проекты',
                        'url' => '#',
                        'style' => 'default',
                    'class' => ''
                ]); ?>
            </div>
        </div>
    </div>
</section>
