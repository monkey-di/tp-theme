<?php
/**
 * Friends / Partners Section
 * Mobile First with Desktop version.
 */

$friends_data = [
    [
        'name' => 'Аглая Тарасова',
        'role' => 'актриса',
        'image' => 'aglaia-tarasova.jpg',
        'quote' => 'Это одна из самых табуированных тем в нашем обществе. Про неё важно говорить как можно чаще.'
    ],
    [
        'name' => 'Константин Хабенский',
        'role' => 'актёр',
        'image' => 'konstantin-khabensky.jpg',
        'quote' => 'Важно создавать безопасное пространство, где дети могут говорить и быть услышанными.'
    ],
    [
        'name' => 'Юрий Шевчук',
        'role' => 'артист',
        'image' => 'yuri-shevchuk.jpg',
        'quote' => 'Творчество – это способ говорить о сложном, достучаться до сердец.'
    ]
];

// Duplicate slides for seamless loop
$friends_data = array_merge($friends_data, $friends_data);

?>
<section class="friends-section w-full bg-base relative overflow-hidden py-12 lg:py-24">
    <div class="friends__container container mx-auto px-4 relative z-20 flex flex-col items-center">
        
        <!-- Title -->
        <h2 class="friends__title text-primary text-[32px] lg:text-[64px] font-ura uppercase text-center mb-8">
            Наши друзья
        </h2>

        <!-- Slider & Desktop Controls Wrapper -->
        <div class="relative w-full">
            <div class="friends__slider swiper w-full lg:-mx-32">
                <div class="swiper-wrapper items-center">
                    <?php foreach ($friends_data as $friend) : ?>
                        <div class="swiper-slide" data-quote="<?php echo htmlspecialchars($friend['quote']); ?>">
                            <div class="friends__card aspect-[334/521] rounded-[20px] overflow-hidden relative">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/' . $friend['image']; ?>" alt="<?php echo $friend['name']; ?>" class="w-full h-full object-cover">
                                <div class="friends__card-overlay absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <div class="absolute left-4 bottom-4 text-white">
                                    <h3 class="text-[40px] font-extrabold font-akrobat uppercase leading-none"><?php echo $friend['name']; ?></h3>
                                    <p class="text-[16px] font-geologica"><?php echo $friend['role']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Desktop Navigation Arrows -->
            <div class="hidden lg:flex absolute top-1/2 -translate-y-1/2 w-full z-10">
                 <?php get_template_part('template-parts/components/slider-navigation', null, [
                    'prev_class' => 'friends-prev',
                    'next_class' => 'friends-next',
                    'color'      => 'text-primary',
                    'class'      => 'px-8'
                ]); ?>
            </div>
        </div>
        
        <!-- Quote -->
        <div id="friends-quote" class="friends__quote text-center max-w-sm mx-auto mt-6 text-contrast text-[16px] lg:text-[23px] font-light font-geologica leading-[1.5]">
             <!-- Quote will be inserted here by JS -->
        </div>

        <!-- Mobile Slider Controls (Progress Bar) -->
        <div class="friends__mobile-progress w-full mt-8 lg:hidden">
            <?php get_template_part('template-parts/components/slider-progress', null, [
                'track_color' => 'bg-black/20',
                'bar_color' => 'bg-secondary'
            ]); ?>
        </div>

    </div>
</section>
