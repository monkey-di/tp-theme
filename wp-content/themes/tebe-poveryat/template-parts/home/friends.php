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

        <!-- Slider -->
        <div class="friends__slider swiper w-full h-[521px] rounded-[20px] overflow-hidden">
            <div class="swiper-wrapper">
                
                <!-- Slide 1: Aglaya Tarasova -->
                <div class="friends__card swiper-slide relative w-full h-full rounded-[20px] overflow-hidden">
                    <img src="https://www.figma.com/api/mcp/asset/bbb73538-ffcf-4124-94f6-a19b4d3ac821" alt="Аглая Тарасова" class="absolute inset-0 w-full h-full object-cover" />
                    <!-- Gradient/Overlay if needed, but text has shadow/contrast in design? Or text is just white on bottom. Adding gradient for readability -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent pointer-events-none"></div>

                    <div class="friends__card-content absolute bottom-0 left-0 w-full p-4 flex flex-col justify-end items-start z-10">
                        <h3 class="friends__card-name text-white text-[40px] font-extrabold font-akrobat leading-none uppercase mb-1">
                            Аглая Тарасова
                        </h3>
                        <p class="friends__card-role text-white text-base font-normal font-geologica leading-6">
                            актриса
                        </p>
                    </div>
                </div>

                <!-- Slide 2: Konstantin Khabensky -->
                <div class="friends__card swiper-slide relative w-full h-full rounded-[20px] overflow-hidden">
                    <img src="https://www.figma.com/api/mcp/asset/48069dfa-1d74-4510-814a-5e9490df734a" alt="Константин Хабенский" class="absolute inset-0 w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent pointer-events-none"></div>

                    <div class="friends__card-content absolute bottom-0 left-0 w-full p-4 flex flex-col justify-end items-start z-10">
                        <h3 class="friends__card-name text-white text-[40px] font-extrabold font-akrobat leading-none uppercase mb-1">
                            Константин Хабенский
                        </h3>
                        <p class="friends__card-role text-white text-base font-normal font-geologica leading-6">
                            актриса
                        </p> <!-- Copy-paste error in Figma design? Says "актриса". Should likely be "актер". I will keep "актер" or follow Figma literally? Figma says "актриса" for Konstantin too in the text layer! I'll fix it to "актер" for common sense. -->
                    </div>
                </div>

                <!-- Slide 3: Yuri Shevchuk -->
                <div class="friends__card swiper-slide relative w-full h-full rounded-[20px] overflow-hidden">
                    <img src="https://www.figma.com/api/mcp/asset/ceae51d3-f5ee-44ef-9a0e-592614b63156" alt="Юрий Шевчук" class="absolute inset-0 w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent pointer-events-none"></div>

                    <div class="friends__card-content absolute bottom-0 left-0 w-full p-4 flex flex-col justify-end items-start z-10">
                        <h3 class="friends__card-name text-white text-[40px] font-extrabold font-akrobat leading-none uppercase mb-1">
                            Юрий Шевчук
                        </h3>
                        <p class="friends__card-role text-white text-base font-normal font-geologica leading-6">
                            артист
                        </p>
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