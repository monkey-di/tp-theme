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
            <img class="w-full h-full object-cover" src="https://placehold.co/348x522" alt="Юлия Кулешова" />
            
            <!-- Overlayed Text: Name and Title -->
            <div class="about-section-part2__overlay-text absolute left-4 bottom-4 w-full px-4 text-white">
                <h3 class="text-h3 font-extrabold font-akrobat uppercase leading-10 mb-1">Юлия Кулешова</h3>
                <p class="text-base font-normal font-geologica leading-6">директор</p>
            </div>
        </div>

        <!-- Description Text -->
        <div class="about-section-part2__description text-contrast text-base font-light font-geologica leading-6">
            <p>Мне очень хочется, чтобы общество перешагнуло через эту ступень и начало создавать большую образовательную и реабилитационную структуру на всю страну. В «Тебе поверят» мы делаем так, чтобы о проблеме узнавало как можно больше людей, чтобы пережившие получали поддержку, а родители знали, чему учить детей, чтобы они знали, что такое «личные границы».</p>
        </div>

        <!-- Read More Link -->
        <div class="about-section-part2__read-more inline-flex flex-col justify-start items-start gap-1">
            <a href="#" class="about-section-part2__read-more-link inline-flex justify-start items-center gap-3 no-underline">
                <span class="text-primary text-base font-normal font-geologica leading-6 hover:underline">Читать далее</span>
            </a>
            <div class="about-section-part2__read-more-underline w-full h-0 outline outline-2 outline-offset-[-1px] outline-primary"></div>
        </div>

    </div>
</section>
