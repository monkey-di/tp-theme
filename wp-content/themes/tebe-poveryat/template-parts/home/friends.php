<?php
/**
 * Friends / Partners Section
 * Mobile First.
 */
?>
<section class="friends-section w-full bg-base py-12 px-4 relative overflow-hidden">
    <div class="friends__container container mx-auto flex flex-col gap-8">
        
        <!-- Title -->
        <h2 class="friends__title text-[#36569f] text-[32px] font-normal font-ura uppercase leading-9">
            Наши друзья
        </h2>

        <!-- Slider Container -->
        <div class="friends__slider swiper flex flex-col gap-6">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="friends__slide swiper-slide flex flex-col gap-6">
                    <!-- Image Card -->
                    <div class="friends__card relative w-full h-[522px] rounded-[20px] overflow-hidden">
                        <img class="w-full h-full object-cover" src="https://www.figma.com/api/mcp/asset/7ff846e5-2b30-4452-a201-9a25262b3730" alt="Аглая Тарасова" />
                        <!-- Overlay Text -->
                        <div class="friends__card-info absolute left-0 bottom-0 w-full p-4 flex flex-col justify-start items-start bg-gradient-to-t from-black/50 to-transparent pt-20">
                            <div class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-10">Аглая Тарасова</div>
                            <div class="text-white text-base font-normal font-geologica leading-6">актриса</div>
                        </div>
                    </div>
                    <!-- Quote / Text -->
                    <div class="friends__quote text-contrast text-base font-light font-geologica leading-6">
                        Это одна из самых табуированных тем в нашем обществе.<br>
                        Про неё важно говорить как можно чаще.
                    </div>
                </div>

                <!-- Slide 2 (Duplicate for now) -->
                <div class="friends__slide swiper-slide flex flex-col gap-6">
                    <div class="friends__card relative w-full h-[522px] rounded-[20px] overflow-hidden">
                        <img class="w-full h-full object-cover" src="https://placehold.co/348x522" alt="Аглая Тарасова 2" />
                        <div class="friends__card-info absolute left-0 bottom-0 w-full p-4 flex flex-col justify-start items-start bg-gradient-to-t from-black/50 to-transparent pt-20">
                            <div class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-10">Друг Два</div>
                            <div class="text-white text-base font-normal font-geologica leading-6">поддерживает</div>
                        </div>
                    </div>
                    <div class="friends__quote text-contrast text-base font-light font-geologica leading-6">
                        Вторая цитата от второго друга. Очень важные слова!
                    </div>
                </div>

                <!-- Slide 3 (Duplicate for now) -->
                <div class="friends__slide swiper-slide flex flex-col gap-6">
                    <div class="friends__card relative w-full h-[522px] rounded-[20px] overflow-hidden">
                        <img class="w-full h-full object-cover" src="https://placehold.co/348x522" alt="Аглая Тарасова 3" />
                        <div class="friends__card-info absolute left-0 bottom-0 w-full p-4 flex flex-col justify-start items-start bg-gradient-to-t from-black/50 to-transparent pt-20">
                            <div class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-10">Друг Три</div>
                            <div class="text-white text-base font-normal font-geologica leading-6">активист</div>
                        </div>
                    </div>
                    <div class="friends__quote text-contrast text-base font-light font-geologica leading-6">
                        Третья цитата, еще более мощная и вдохновляющая.
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Controls -->
        <div class="friends__controls flex justify-between items-center mt-4">
            <!-- Mobile Progress -->
            <div class="friends__progress w-full md:hidden">
                <?php get_template_part('template-parts/components/slider-progress', null, [
                    'track_color' => 'bg-white',
                    'bar_color' => 'bg-secondary'
                ]); ?>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex w-full justify-end">
                <?php get_template_part('template-parts/components/slider-navigation', null, [
                    'prev_class' => 'friends-prev',
                    'next_class' => 'friends-next',
                    'color'      => 'text-primary'
                ]); ?>
            </div>
        </div>

    </div>
</section>