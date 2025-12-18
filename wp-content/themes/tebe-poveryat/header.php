<!doctype html>
<html <?php
language_attributes(); ?>>
<head>
    <meta charset="<?php
    bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    wp_head(); ?>
</head>

<body <?php
body_class(); ?>>
<?php
wp_body_open(); ?>

<header class="header w-full bg-surface relative z-50">
    <div class="header__container">

        <!-- Logo Wrapper -->
        <a href="<?php
        echo home_url(); ?>" class="header__logo-link flex items-center gap-[16px] flex-shrink-0 no-underline">
            <!-- Mobile Logo (Icon only) -->
            <div class="header__logo-mobile xl:hidden flex-shrink-0 w-[67px] h-[64px] sm:w-[77px] sm:h-[74px]">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    // Fallback from Figma - original mobile logo
                    echo '<img src="' . get_theme_file_uri('assets/images/logo-header-icon.svg') . '" alt="' . get_bloginfo(
                                    'name'
                            ) . '" class="w-full h-full object-contain">';
                }
                ?>
            </div>

            <!-- Desktop Logo (Icon + Text) -->
            <div class="header__logo-desktop hidden xl:flex items-center gap-[16px] flex-shrink-0">
                <!-- Logo Icon -->
                <div class="header__logo-icon flex-shrink-0 w-[60px] h-[64px]">
                    <img src="<?php echo get_theme_file_uri('assets/images/logo-header-icon1.svg'); ?>" alt="Logo Icon"
                         class="w-full h-full object-contain"/>
                </div>

                <!-- Logo Text -->
                <div class="header__logo-text flex-shrink-0 w-[164.905px] h-[16px]">
                    <img src="<?php echo get_theme_file_uri('assets/images/logo-header-text.svg'); ?>"
                         alt="Tebe Poveryat" class="w-full h-full object-contain"/>
                </div>
            </div>
        </a>

        <!-- Desktop Navigation Menu (hidden on mobile) -->
        <nav class="header__nav hidden xl:flex items-center gap-4 flex-1 justify-center">
            <a href="#"
               class="header__nav-link text-contrast font-akrobat font-bold text-[20px] leading-none hover:text-primary transition">О
                проблеме</a>
            <a href="#"
               class="header__nav-link text-contrast font-akrobat font-bold text-[20px] leading-none hover:text-primary transition">Для
                переживших</a>
            <a href="#"
               class="header__nav-link text-contrast font-akrobat font-bold text-[20px] leading-none hover:text-primary transition">Как
                мы помогаем</a>
            <a href="#"
               class="header__nav-link text-contrast font-akrobat font-bold text-[20px] leading-none hover:text-primary transition">Проекты</a>
            <a href="#"
               class="header__nav-link text-contrast font-akrobat font-bold text-[20px] leading-none hover:text-primary transition">О
                нас</a>
            <a href="#"
               class="header__nav-link text-contrast font-akrobat font-bold text-[20px] leading-none hover:text-primary transition">Блог</a>
        </nav>

        <!-- Desktop Controls (hidden on mobile) -->
        <div class="header__controls hidden xl:flex items-center gap-[24px]">
            <!-- Language Switcher -->
            <div class="header__language-switcher">
                <button class="header__language-btn header__language-btn--active">RU</button>
                <button class="header__language-btn ">ENG</button>
            </div>

            <!-- Donate Button -->
            <a href="#"
               class="header__donate-btn bg-secondary rounded-[40px] px-[20px] py-[8px] flex items-center gap-[8px] no-underline hover:opacity-90 transition">
                <div class="header__donate-icon w-[20px] h-[18px] flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18" fill="none">
                        <path d="M11.7162 1.51674C13.6113 -0.505536 16.6835 -0.50562 18.5786 1.51674C20.4738 3.53963 20.4738 6.81988 18.5786 8.84277L11.459 16.442C10.6688 17.2855 9.33009 17.2855 8.53989 16.4419L1.4214 8.84277C-0.473801 6.81988 -0.473801 3.53963 1.4214 1.51674C3.31651 -0.505566 6.38871 -0.50559 8.28381 1.51674L9.99941 3.34793L11.7162 1.51674Z"
                              fill="white"/>
                    </svg>
                </div>
                <span class="header__donate-text text-white font-geologica font-normal text-[14px] leading-[1.57] uppercase whitespace-nowrap">Хочу помочь</span>
            </a>
        </div>

        <!-- Mobile Donate Button (visible only on mobile) -->
        <a href="#"
           class="header__donate-btn-mobile xl:hidden w-[159px] sm:w-[180px] h-10 sm:h-12 px-3 py-2 bg-secondary rounded-[40px] flex justify-center items-center gap-1 no-underline hover:opacity-90 transition">
            <div class="header__donate-icon-mobile w-[13px] h-[12px] flex items-center justify-center">
                <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.61553 1.01116C8.84736 -0.337024 10.8443 -0.33708 12.0761 1.01116C13.308 2.35975 13.308 4.54658 12.0761 5.89518L7.97638 10.3833C7.18331 11.2515 5.81597 11.2515 5.02296 10.3832L0.923911 5.89518C-0.30797 4.54658 -0.30797 2.35975 0.923911 1.01116C2.15573 -0.337044 4.15266 -0.33706 5.38447 1.01116L6.49961 2.23195L7.61553 1.01116Z"
                          fill="white"/>
                </svg>
            </div>
            <span class="header__donate-text-mobile text-white text-[10px] font-normal uppercase leading-4 font-geologica">Хочу помочь</span>
        </a>

        <!-- Burger Menu (visible only on mobile) -->
        <button class="header__burger xl:hidden w-16 sm:w-18 h-10 sm:h-12 p-2 bg-primary rounded-[40px] flex justify-center items-center gap-2 hover:bg-opacity-90 transition cursor-pointer border-none js-open-mobile-menu">
            <div class="header__burger-icon relative w-6 h-6">
                <img src="<?php echo get_theme_file_uri('assets/images/icon-burger.svg'); ?>" alt="Menu"
                     class="w-full h-full"/>
            </div>
        </button>
    </div>
</header>
