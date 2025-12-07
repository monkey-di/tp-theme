<?php
/**
 * Footer Template
 *
 * This template is loaded by get_footer().
 */

// Mobile Menu Overlay (Rendered via do_blocks to support WP blocks inside)
// Это уже не нужно здесь, так как мы перешли на классику, и do_blocks не используется для parts/
// Но сохраняю для демонстрации, что можно было бы вызвать, если бы это был паттерн.
$mobile_menu_path = get_theme_file_path( '/parts/mobile-menu-overlay.html' );
if ( file_exists( $mobile_menu_path ) ) {
    // В классическом режиме WP-комментарии (блоки) внутри HTML-файлов
    // не обрабатываются автоматически как блоки.
    // Если бы это было нужно, пришлось бы вручную парсить и рендерить.
    // Пока оставим просто HTML для JS, без do_blocks.
    // echo file_get_contents( $mobile_menu_path ); // Render as plain HTML for JS to grab
}
?>

<footer class="footer w-full bg-primary relative overflow-hidden py-12 px-4">
    
    <!-- Top Wave (connects to previous section) -->
    <div class="footer__wave footer__wave--top absolute left-0 top-0 z-10 w-full">
        <svg width="100%" height="32" viewBox="0 0 380 32" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M380 0C380 8.48693 359.982 16.6263 324.35 22.6274C288.718 28.6286 240.391 32 190 32C139.609 32 91.2816 28.6286 55.6497 22.6274C20.0178 16.6263 7.60885e-06 8.48693 0 6.18078e-06L190 0H380Z" fill="var(--wp--preset--color--base)"/>
        </svg>
    </div>

    <!-- Bottom Wave (for the very bottom of the page, if needed) -->
    <div class="footer__wave footer__wave--bottom absolute left-0 bottom-0 z-10 w-full">
        <svg width="100%" height="32" viewBox="0 0 380 32" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M380 32C380 23.5131 359.982 15.3737 324.35 9.37258C288.718 3.37142 240.391 0 190 0C139.609 0 91.2816 3.37142 55.6497 9.37258C20.0178 15.3737 7.60885e-06 23.5131 0 32L190 32H380Z" fill="var(--wp--preset--color--primary)"/>
        </svg>
    </div>
    
    <div class="footer__container container mx-auto px-4 relative z-20 flex flex-col gap-8">
        
        <!-- Logo -->
        <div class="footer__logo flex flex-col items-start">
             <?php 
             if ( has_custom_logo() ) {
                 the_custom_logo(); // This will output the logo already set in Customizer
             } else {
                 // Fallback to text if no custom logo is set
                 echo '<a href="' . home_url() . '" class="block w-[348px] h-[84px]">';
                 echo '<img src="https://www.figma.com/api/mcp/asset/0a2ac881-3af9-4b66-840f-36b4d5b4583f" alt="' . get_bloginfo( 'name' ) . '" class="w-full h-full object-contain object-left">';
                 echo '</a>';
             }
             ?>
        </div>

        <!-- Contact Email -->
        <a href="mailto:verimtebe@gmail.com" class="footer__email text-white text-[32px] font-extrabold font-akrobat uppercase leading-8 no-underline hover:underline">
            verimtebe@gmail.com
        </a>

        <!-- Social Icons -->
        <div class="footer__social flex gap-4">
            <a href="#" class="footer__social-link footer__social-link--telegram w-14 h-14 flex items-center justify-center hover:opacity-80 transition">
                <img src="https://www.figma.com/api/mcp/asset/e13b3c33-65b4-4d69-9ea1-3769b8100d3f" alt="Telegram" class="w-full h-full object-contain" />
            </a>
            <a href="#" class="footer__social-link footer__social-link--vk w-14 h-14 flex items-center justify-center hover:opacity-80 transition">
                <img src="https://www.figma.com/api/mcp/asset/aa4d8819-3c9f-4ac8-b19e-f407e96bb9d6" alt="VK" class="w-full h-full object-contain" />
            </a>
        </div>

        <!-- Subscription Form -->
        <div class="footer__subscribe flex flex-col gap-3">
            <p class="text-white text-base font-light font-geologica leading-6">Подпишитесь на рассылку, чтобы не пропустить новости о нашей работе</p>
            <?php get_template_part('template-parts/components/input-with-button', null, [
                'type' => 'email',
                'name' => 'subscribe_email',
                'placeholder' => 'example@mail.com',
                'button_text' => 'Подписаться',
                'submit' => true,
                'state' => 'default'
            ]); ?>
            <label class="footer__subscribe-checkbox flex items-start gap-2 cursor-pointer">
                <input type="checkbox" class="footer__subscribe-checkbox-input hidden" />
                <span class="footer__subscribe-checkbox-custom w-6 h-6 rounded border-2 border-white flex-shrink-0 flex items-center justify-center">
                    <img src="https://www.figma.com/api/mcp/asset/eb6e2d94-9a4e-4b32-8ef4-40df64670ecd" class="footer__subscribe-checkbox-icon hidden w-4 h-4" alt="Check" />
                </span>
                <span class="footer__subscribe-checkbox-text text-white text-base font-light font-geologica leading-6">Я соглашаюсь на обработку моих <a href="#" class="underline hover:no-underline">персональных данных</a></span>
            </label>
        </div>

        <!-- Navigation Links -->
        <div class="footer__nav flex flex-col gap-2">
            <?php get_template_part('template-parts/components/button', null, ['text' => 'Проекты', 'url' => '#', 'style' => 'outline-white', 'class' => 'w-full text-left justify-start', 'size' => 'md']); ?>
            <?php get_template_part('template-parts/components/button', null, ['text' => 'Отчеты', 'url' => '#', 'style' => 'outline-white', 'class' => 'w-full text-left justify-start', 'size' => 'md']); ?>
            <?php get_template_part('template-parts/components/button', null, ['text' => 'О нас', 'url' => '#', 'style' => 'outline-white', 'class' => 'w-full text-left justify-start', 'size' => 'md']); ?>
            <?php get_template_part('template-parts/components/button', null, ['text' => 'Реквизиты', 'url' => '#', 'style' => 'outline-white', 'class' => 'w-full text-left justify-start', 'size' => 'md']); ?>
        </div>

        <!-- Document Links -->
        <div class="footer__docs flex flex-col gap-2">
            <a href="#" class="footer__docs-link text-white text-sm font-light font-geologica leading-[21px] no-underline hover:underline">Уставные документы</a>
            <a href="#" class="footer__docs-link text-white text-sm font-light font-geologica leading-[21px] no-underline hover:underline">Публичная оферта</a>
            <a href="#" class="footer__docs-link text-white text-sm font-light font-geologica leading-[21px] no-underline hover:underline">Политика обработки персональных данных</a>
        </div>

        <!-- Copyright -->
        <div class="footer__copyright text-white text-sm font-light font-geologica leading-[21px] mt-4">© «Тебе поверят», 2025</div>
        
        <!-- Author Signature -->
        <div class="footer__author mt-4">
            <img src="https://www.figma.com/api/mcp/asset/ee6616c4-c8be-4086-9a0c-d83e5c7fa522" alt="Author" class="w-[186px] h-[20px] object-contain opacity-100" />
        </div>

    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>