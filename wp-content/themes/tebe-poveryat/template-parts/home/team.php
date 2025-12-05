<?php
/**
 * Team Section
 * Mobile First.
 */
?>
<section class="team-section w-full bg-base py-12 px-4 relative overflow-hidden">
    
    <!-- Bottom Wave -->
    <div class="team-section__wave team-section__wave--bottom absolute left-0 bottom-0 z-10 w-full">
        <svg width="100%" height="32" viewBox="0 0 380 32" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M380 32C380 23.5131 359.982 15.3737 324.35 9.37258C288.718 3.37142 240.391 0 190 0C139.609 0 91.2816 3.37142 55.6497 9.37258C20.0178 15.3737 7.60885e-06 23.5131 0 32L190 32H380Z" fill="var(--wp--preset--color--primary)"/>
        </svg>
    </div>

    <div class="team__container container mx-auto px-4 relative z-20 mt-8 mb-8 flex flex-col gap-8">
        
        <!-- Title -->
        <h2 class="team__title text-left text-primary text-[32px] font-normal font-ura uppercase leading-9">
            Наши <br>специалисты
        </h2>

        <!-- Slider Card -->
        <div class="team__card w-full bg-white rounded-[20px] overflow-hidden shadow-lg">
            
            <!-- Image Container -->
            <div class="team__card-image relative w-full h-[480px] rounded-[20px] overflow-hidden bg-gray-200">
                <img class="w-full h-full object-cover" src="https://placehold.co/340x480" alt="Ксения Шашунова" />
                
                <!-- Name & Role Overlay -->
                <div class="absolute left-0 bottom-0 w-full p-4 bg-gradient-to-t from-black/60 to-transparent pt-20">
                    <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-10">
                        Ксения Шашунова
                    </h3>
                    <p class="text-white text-base font-normal font-geologica leading-6">
                        Координаторка детско-родительского направления
                    </p>
                </div>
            </div>

            <!-- Content -->
            <div class="team__card-content w-full px-4 pt-4 pb-6 flex flex-col gap-4">
                <p class="text-contrast text-base font-light font-geologica leading-6">
                    «Я руковожу направлением работы, куда обращаются за помощью, поддержкой и информацией подростки или родители, чьи дети подверглись сексуализированному насилию. Моя главная задача — поддержка и развитие команды психологов этого направления, организация обучения и регулярных супервизий и интервизий. Также я принимаю заявки от подростков, распределяю их между специалистами: мне важно быть на связи в случае, если ситуация срочная, подключать к работе юристов или другие организации.<br>
                    Кроме того, я рассказываю о нашей работе с детьми в СМИ, чтобы было больше информации о проблеме сексуализированного насилия над детьми в разных аспектах»
                </p>
                
                <!-- Read More -->
                <div class="team__card-read-more">
                    <a href="#" class="team__card-link inline-flex justify-start items-center gap-3 no-underline group">
                        <span class="text-primary text-base font-normal font-geologica leading-6 group-hover:underline">Читать далее</span>
                    </a>
                    <div class="w-full h-0 outline outline-2 outline-offset-[-1px] outline-primary mt-1"></div>
                </div>
            </div>

        </div>

        <!-- Slider Progress -->
        <div class="team__progress w-full h-0.5 bg-white/20 overflow-hidden rounded-sm mt-8">
            <div class="team__progress-bar w-[104px] h-0.5 bg-secondary rounded-sm"></div>
        </div>

    </div>
</section>