<?php
/**
 * About Section - Part 2
 * Mobile First.
 */
?>
<section class="about-section-part2 w-full bg-base py-12 px-4 relative overflow-hidden">
    <div class="about-section-part2__container container mx-auto flex flex-col gap-8">
        
        <!-- Image with Overlayed Text -->
        <div class="about-section-part2__image-wrapper relative w-full h-[522px] rounded-[20px] overflow-hidden">
            <img class="w-full h-full object-cover" src="https://www.figma.com/api/mcp/asset/a62e16dc-97e9-4001-9f00-200875951d25" alt="Юлия Кулешова" />
            
            <!-- Overlayed Text: Name and Title -->
            <div class="about-section-part2__overlay-text absolute left-0 bottom-4 w-full px-4 text-white">
                <h3 class="text-h3 font-extrabold font-akrobat uppercase leading-10 mb-0">Юлия Кулешова</h3>
                <p class="text-[16px] font-normal font-geologica leading-[1.5]">директор</p>
            </div>
        </div>

        <!-- Description Text -->
        <div class="about-section-part2__description text-contrast text-[16px] font-light font-geologica leading-[1.5] line-clamp-5">
            <p>Мне очень хочется, чтобы общество перешагнуло через эту ступень и начало создавать большую образовательную и реабилитационную структуру на всю страну. В «Тебе поверят» мы делаем так, чтобы о проблеме узнавало как можно больше людей, чтобы пережившие получали поддержку, а родители знали, чему учить детей, чтобы они знали, что такое «личные границы».</p>
        </div>

        <!-- Read More Link -->
        <div class="about-section-part2__read-more">
            <?php get_template_part('template-parts/components/link-more', null, [
                'text' => 'Читать далее',
                'url' => '#',
                'style' => 'default'
            ]); ?>
        </div>

    </div>
</section>
