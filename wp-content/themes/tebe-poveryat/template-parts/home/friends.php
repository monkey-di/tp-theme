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
$friends_data_looped = array_merge($friends_data, $friends_data);

?>
<section class="friends-section w-full bg-surface relative overflow-hidden py-12 lg:py-24">
    <div class="friends__container container mx-auto px-4 relative z-20 flex flex-col items-center">
        
        <h2 class="friends__title text-primary text-[32px] lg:text-[64px] font-ura uppercase text-center mb-8">
            Наши друзья
        </h2>

        <div class="friends__slider-area w-full flex items-center lg:justify-between lg:gap-x-4 lg:mt-10">
            <button type="button" class="friends-prev hidden lg:block cursor-pointer hover:opacity-70 transition">
                <img src="<?php echo get_theme_file_uri('assets/images/arrow-prev.svg'); ?>" alt="Previous" />
            </button>

            <div class="swiper-container-wrapper w-full lg:max-w-[1169px]">
                <div class="friends__slider swiper">
                    <div class="swiper-wrapper items-stretch">
                        <?php foreach ($friends_data_looped as $friend) : ?>
                            <div class="swiper-slide">
                                <div class="friends__card h-full flex flex-col gap-6">
                                    <div class="friends__card-image-wrap relative rounded-[20px] overflow-hidden">
                                        <img src="<?php echo get_template_directory_uri() . '/assets/images/' . $friend['image']; ?>" alt="<?php echo $friend['name']; ?>" class="w-full h-auto object-cover aspect-[853/1280]">
                                        <div class="absolute left-4 bottom-4 text-white">
                                            <h3 class="text-[40px] font-extrabold font-akrobat uppercase leading-none"><?php echo $friend['name']; ?></h3>
                                            <p class="text-[16px] font-geologica leading-[1.5]"><?php echo $friend['role']; ?></p>
                                        </div>
                                    </div>
                                    <p class="friends__card-quote text-[23px] font-light font-geologica leading-[1.5] text-contrast">
                                        <?php echo $friend['quote']; ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <button type="button" class="friends-next hidden lg:block cursor-pointer hover:opacity-70 transition">
                <img src="<?php echo get_theme_file_uri('assets/images/arrow-next.svg'); ?>" alt="Next" />
            </button>
        </div>
        
        <div class="friends__mobile-progress w-full mt-8 lg:hidden">
             <?php get_template_part('template-parts/components/slider-progress', null, [
                'track_color' => 'bg-black/20',
                'bar_color' => 'bg-secondary'
            ]); ?>
        </div>

    </div>
</section>
