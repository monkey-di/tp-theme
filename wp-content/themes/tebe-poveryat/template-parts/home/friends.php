<?php
/**
 * Friends / Partners Section
 * Mobile First.
 */
?>
<section class="friends-section w-full bg-base py-12 px-4 relative overflow-hidden">
    <div class="friends__container container mx-auto flex flex-col gap-8">
        
        <!-- Title -->
        <h2 class="friends__title text-primary-dark text-[32px] font-normal font-ura uppercase leading-9">
            Наши друзья
        </h2>

        <!-- Slider Container (Static for now) -->
        <div class="friends__slider flex flex-col gap-6">
            
            <!-- Slide 1 -->
            <div class="friends__slide flex flex-col gap-6">
                
                <!-- Image Card -->
                <div class="friends__card relative w-full h-[522px] rounded-[20px] overflow-hidden">
                    <img class="w-full h-full object-cover" src="https://placehold.co/348x522" alt="Аглая Тарасова" />
                    
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

        </div>

        <!-- Slider Progress Indicator -->
        <div class="friends__progress w-full h-0.5 bg-white overflow-hidden rounded-sm">
            <div class="friends__progress-bar w-[104px] h-0.5 bg-secondary rounded-sm"></div>
        </div>

    </div>
</section>