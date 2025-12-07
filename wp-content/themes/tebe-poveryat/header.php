<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header w-full bg-base relative z-50">
  <div class="header__container container mx-auto px-4 flex justify-between items-center h-[144px]"> <!-- Height from Frame 13 -->
    
    <!-- Logo Wrapper -->
    <div class="header__logo flex-shrink-0 w-[67px] h-[64px]">
         <?php 
         if ( has_custom_logo() ) {
             the_custom_logo();
         } else {
             // Fallback from Figma
             echo '<a href="' . home_url() . '" class="block w-full h-full">';
             echo '<img src="https://www.figma.com/api/mcp/asset/980fea03-0eb2-47b1-8418-214c0ed92171" alt="' . get_bloginfo( 'name' ) . '" class="w-full h-full object-contain">';
             echo '</a>';
         }
         ?>
    </div>

    <!-- Right Actions Group -->
    <div class="header__actions flex items-center gap-2">
        <!-- Donate Button -->
        <a href="#" class="header__donate-btn w-[159px] h-10 px-3 py-2 bg-secondary rounded-[40px] flex justify-center items-center gap-1 no-underline hover:opacity-90 transition">
          <div class="header__donate-icon w-[13px] h-[12px] flex items-center justify-center">
            <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.61553 1.01116C8.84736 -0.337024 10.8443 -0.33708 12.0761 1.01116C13.308 2.35975 13.308 4.54658 12.0761 5.89518L7.97638 10.3833C7.18331 11.2515 5.81597 11.2515 5.02296 10.3832L0.923911 5.89518C-0.30797 4.54658 -0.30797 2.35975 0.923911 1.01116C2.15573 -0.337044 4.15266 -0.33706 5.38447 1.01116L6.49961 2.23195L7.61553 1.01116Z" fill="white"/>
            </svg>
          </div>
          <span class="header__donate-text text-white text-[10px] font-normal uppercase leading-4 font-geologica">Хочу помочь</span>
        </a>

        <!-- Burger Menu -->
        <button class="header__burger w-16 h-10 p-2 bg-primary rounded-[40px] flex justify-center items-center gap-2 hover:bg-opacity-90 transition cursor-pointer border-none js-open-mobile-menu">
          <div class="header__burger-icon relative w-6 h-6">
            <img src="https://www.figma.com/api/mcp/asset/f1f61e86-0d0a-4090-8c31-ad4587e05d51" alt="Menu" class="w-full h-full" />
          </div>
        </button>
    </div>
  </div>
</header>
