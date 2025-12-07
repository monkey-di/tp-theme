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
            <img src="https://www.figma.com/api/mcp/asset/3705d354-b558-4cc5-893c-b0f481c0d426" alt="Heart" class="w-full h-full" />
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
