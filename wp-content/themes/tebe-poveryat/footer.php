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
    
    <div class="footer__container container mx-auto px-4 relative z-20 flex flex-col gap-8">
        
        <!-- Logo -->
        <div class="footer__logo flex flex-col items-center">
             <a href="<?php echo home_url(); ?>" class="block w-[348px] h-[84px]">
                 <img src="https://www.figma.com/api/mcp/asset/802942f5-abc3-4669-879e-3ee57d459253" alt="<?php echo get_bloginfo( 'name' ); ?>" class="w-full h-full object-contain object-center" />
             </a>
        </div>

        <!-- Contact Email -->
        <a href="mailto:verimtebe@gmail.com" class="footer__email text-white text-[32px] font-extrabold font-akrobat uppercase leading-none no-underline hover:underline text-center">
            verimtebe@gmail.com
        </a>

        <!-- Social Icons -->
        <div class="footer__social flex gap-4 justify-center">
            <a href="#" class="footer__social-link footer__social-link--telegram w-14 h-14 flex items-center justify-center hover:opacity-80 transition">
                <img src="https://www.figma.com/api/mcp/asset/2ac5164c-f53c-4646-8486-b3852ce8d9f3" alt="Telegram" class="w-full h-full object-contain" />
            </a>
            <a href="#" class="footer__social-link footer__social-link--vk w-14 h-14 flex items-center justify-center hover:opacity-80 transition">
                <img src="https://www.figma.com/api/mcp/asset/6b991558-e49f-4871-a3b3-57a3328a204d" alt="VK" class="w-full h-full object-contain" />
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="footer__nav flex flex-col gap-2">
            <?php get_template_part('template-parts/components/button', null, ['text' => 'Проекты', 'url' => '#', 'style' => 'outline-white', 'class' => 'w-full', 'size' => 'md']); ?>
            <?php get_template_part('template-parts/components/button', null, ['text' => 'Отчеты', 'url' => '#', 'style' => 'outline-white', 'class' => 'w-full', 'size' => 'md']); ?>
            <?php get_template_part('template-parts/components/button', null, ['text' => 'О нас', 'url' => '#', 'style' => 'outline-white', 'class' => 'w-full', 'size' => 'md']); ?>
            <?php get_template_part('template-parts/components/button', null, ['text' => 'Реквизиты', 'url' => '#', 'style' => 'outline-white', 'class' => 'w-full', 'size' => 'md']); ?>
        </div>

        <!-- Subscription Form -->
        <div class="footer__subscribe flex flex-col gap-3">
            <p class="text-white text-[16px] font-light font-geologica leading-[1.5]">Подпишитесь на рассылку, чтобы не пропустить новости о нашей работе</p>
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
                    <!-- Check icon -->
                    <svg class="footer__subscribe-checkbox-icon hidden w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg>
                </span>
                <span class="footer__subscribe-checkbox-text text-white text-[16px] font-light font-geologica leading-[1.5]">Я соглашаюсь на обработку моих <a href="#" class="underline hover:no-underline text-white">персональных данных</a></span>
            </label>
        </div>

        <!-- Document Links -->
        <div class="footer__docs flex flex-col gap-4 items-start">
            <a href="#" class="footer__docs-link text-white text-[14px] font-light font-geologica leading-[1.5] no-underline hover:underline">Уставные документы</a>
            <a href="#" class="footer__docs-link text-white text-[14px] font-light font-geologica leading-[1.5] no-underline hover:underline">Публичная оферта</a>
            <a href="#" class="footer__docs-link text-white text-[14px] font-light font-geologica leading-[1.5] no-underline hover:underline">Политика обработки персональных данных</a>
        </div>

        <!-- Copyright -->
        <div class="footer__copyright text-white text-[14px] font-light font-geologica leading-[1.5] mt-4">© «Тебе поверят», 2025</div>
        
        <!-- Author Signature -->
        <div class="footer__author mt-4">
            <img src="https://www.figma.com/api/mcp/asset/734dba62-15fd-4cd2-8028-ca94fbc94bfe" alt="Made with Love" class="w-[186px] h-[20px] object-contain opacity-100" />
        </div>

    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>