<?php
/**
 * About Section - Part 2
 * Mobile First with Desktop version.
 */
?>
<section class="about-section-part2 w-full bg-base py-12 px-4 relative overflow-hidden">
    <div class="about-section-part2__container container mx-auto flex flex-col lg:flex-row lg:items-center lg:gap-x-20">
        
        <!-- Left Column: Image -->
        <div class="about-section-part2__image-wrapper relative w-full lg:w-1/2 h-[522px] rounded-[20px] overflow-hidden">
            <img class="w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/assets/images/yulia-kuleshova.jpg" alt="Юлия Кулешова" />
            
            <!-- Mobile-only Overlay: Name and Title -->
            <div class="about-section-part2__overlay-text lg:hidden absolute left-0 bottom-4 w-full px-4 text-white">
                <h3 class="text-h3 font-extrabold font-akrobat uppercase leading-10 mb-0">Юлия Кулешова</h3>
                <p class="text-[16px] font-normal font-geologica leading-[1.5]">директор</p>
            </div>
        </div>

        <!-- Right Column: Text -->
        <div class="w-full lg:w-1/2 flex flex-col gap-8 mt-8 lg:mt-0">
            <!-- Desktop-only Title -->
            <div class="hidden lg:block">
                 <h3 class="text-[40px] font-extrabold font-akrobat uppercase leading-none">Юлия Кулешова</h3>
                 <p class="text-[20px] font-light font-geologica">директор</p>
            </div>
            
            <!-- Description Text -->
            <div class="about-section-part2__description">
                <p class="text-[16px] lg:text-[23px] font-light font-geologica leading-[1.5]">Мне очень хочется, чтобы общество перешагнуло через эту ступень и начало создавать большую образовательную и реабилитационную структуру на всю страну. В «Тебе поверят» мы делаем так, чтобы о проблеме узнавало как можно больше людей, чтобы пережившие получали поддержку, а родители знали, чему учить детей, чтобы они знали, что такое «личные границы».</p>
            </div>

            <!-- Mobile-only Read More Link -->
            <div class="about-section-part2__read-more lg:hidden">
                <?php get_template_part('template-parts/components/link-more', null, [
                    'text' => 'Читать далее',
                    'url' => '#',
                    'style' => 'default'
                ]); ?>
            </div>
        </div>

    </div>
</section>