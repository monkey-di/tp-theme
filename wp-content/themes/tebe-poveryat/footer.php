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
                 echo '<a href="' . home_url() . '" class="text-white text-h2 font-ura uppercase leading-9">' . get_bloginfo( 'name' ) . '</a>';
             }
             ?>
             <!-- Text version if SVG is too complex -->
             <a href="<?php echo home_url(); ?>" class="text-white text-h2 font-ura uppercase leading-9 no-underline mt-4">Тебе поверят</a>
        </div>

        <!-- Contact Email -->
        <a href="mailto:verimtebe@gmail.com" class="footer__email text-white text-[32px] font-extrabold font-akrobat uppercase leading-8 no-underline hover:underline">
            verimtebe@gmail.com
        </a>

        <!-- Social Icons -->
        <div class="footer__social flex gap-4">
            <a href="#" class="footer__social-link footer__social-link--telegram w-14 h-14 bg-white rounded-full flex items-center justify-center hover:bg-white/90 transition">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.81 27.0208L35.2366 21.0728C35.9526 20.8141 36.578 21.2475 36.346 22.3301L36.3473 22.3288L33.7206 34.7035C33.526 35.5808 33.0046 35.7941 32.2753 35.3808L28.2753 32.4328L26.346 34.2915C26.1326 34.5048 25.9526 34.6848 25.5393 34.6848L25.8233 30.6141L33.2366 23.9168C33.5593 23.6328 33.1646 23.4728 32.7393 23.7555L23.578 29.5235L19.6286 28.2915C18.7713 28.0195 18.7526 27.4341 19.81 27.0208Z" fill="var(--wp--preset--color--primary)"/>
                </svg>
            </a>
            <a href="#" class="footer__social-link footer__social-link--vk w-14 h-14 bg-white rounded-full flex items-center justify-center hover:bg-white/90 transition">
                <svg fill-rule="evenodd" clip-rule="evenodd" d="M25.4049 23.0063C26.4088 23.0063 27.1224 23.005 28.2403 23C28.4805 23 28.7952 23.0378 28.9919 23.1665C28.997 23.1692 29.002 23.1722 29.0068 23.1753C29.152 23.2687 29.3324 23.3835 29.3338 23.7947C29.3379 24.3396 29.3365 24.858 29.3351 25.3714C29.3324 26.166 29.3324 26.9519 29.346 27.8147C29.3745 28.1098 29.5821 28.2334 29.7774 28.2322C29.9714 28.2322 30.1953 28.1187 30.3621 27.966C31.2684 27.1386 32.3116 25.1494 32.952 23.8451C33.1758 23.3872 33.5313 23.3872 33.9356 23.3885H34.0102C34.892 23.3885 35.455 23.3935 36.0655 23.4011C36.463 23.4049 36.8808 23.4087 37.4194 23.4112C37.6704 23.4137 37.8875 23.6092 37.958 23.7505C38.0191 23.8729 38.0611 24.2286 37.7288 24.7293C36.7085 26.2733 35.7684 27.517 34.6315 28.9827C34.561 29.076 34.4918 29.1858 34.4945 29.3006C34.5017 29.4071 34.5504 29.5075 34.6315 29.5831L35.3682 30.2996C36.1523 31.0589 36.9527 31.8347 37.7423 32.6646C38.0476 32.985 37.8563 33.482 37.7722 33.6208C37.7084 33.7255 37.4221 33.9954 37.2281 33.9979C36.8429 34.0004 36.6665 34.0004 36.1076 33.9992L33.5665 33.9979C33.1297 33.9979 32.956 33.8781 32.7254 33.6523C31.9318 32.8791 31.83 32.7769 31.3023 32.2522L30.704 31.6568C30.5588 31.5117 30.2685 31.3288 29.9931 31.4449L29.9389 31.4663C29.6974 31.566 29.3284 31.7186 29.3284 32.0907V33.4921C29.3284 33.7469 28.8983 33.9361 28.6392 33.9361H26.6313C25.6857 33.9361 24.8677 33.7242 24.4132 33.5199C22.4583 32.6369 21.2943 31.4083 20.0244 29.3611C18.9644 27.64 17.977 25.8812 17.0642 24.0886C16.9598 23.8867 16.8851 23.4453 17.6612 23.4453C18.0288 23.4453 18.3856 23.4427 18.779 23.439C19.2661 23.4339 19.8074 23.4289 20.4979 23.4289C20.8629 23.4289 21.0908 23.497 21.2441 23.6004C21.3919 23.7001 21.4652 23.8287 21.5371 23.9536L21.548 23.9738C21.8654 24.5237 22.1191 24.9677 22.3294 25.3386C23.1475 26.774 23.3292 27.0957 24.2097 28.1552C24.3142 28.2801 24.4648 28.299 24.576 28.299C24.7085 28.3076 24.8398 28.2718 24.9464 28.1981C25.1702 28.0304 25.234 27.8512 25.234 27.5927V24.8794C25.234 24.5679 25.0061 24.1075 24.7551 23.9624C24.69 23.9284 24.6153 23.8943 24.5394 23.859C24.3087 23.7518 24.0673 23.6408 24.0781 23.5109C24.093 23.3216 24.5638 23.0063 25.4049 23.0063Z" fill="var(--wp--preset--color--primary)"/>
                </svg>
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
                'state' => 'default' // Можно поменять на 'error' или 'disabled' для тестирования
            ]); ?>
            <label class="footer__subscribe-checkbox flex items-start gap-2 cursor-pointer">
                <input type="checkbox" class="footer__subscribe-checkbox-input hidden" />
                <span class="footer__subscribe-checkbox-custom w-6 h-6 rounded border-2 border-white flex-shrink-0 flex items-center justify-center">
                    <svg class="footer__subscribe-checkbox-icon hidden w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
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

    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>