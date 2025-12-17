<?php
/**
 * Footer Template
 *
 * This template is loaded by get_footer().
 */

// Mobile Menu Overlay
$mobile_menu_path = get_theme_file_path('/parts/mobile-menu-overlay.html');
if (file_exists($mobile_menu_path)) {
    readfile($mobile_menu_path);
}
?>

<footer class="footer w-full bg-primary relative overflow-hidden px-4 z-20 mt-[-40px] lg:mt-[-80px] pt-12 lg:pt-32 pb-12 lg:pb-[56px] [border-radius:50%_50%_0_0_/_40px_40px_0_0] lg:[border-radius:50%_50%_0_0_/_80px_80px_0_0]">

    <div class="footer__container container mx-auto px-4 lg:px-0 relative z-20 flex flex-col lg:flex-row lg:justify-between gap-8 lg:gap-[145px]">

        <!-- Left Column -->
        <div class="footer__left flex flex-col gap-8 lg:pl-4 lg:gap-6 items-center lg:items-start lg:w-[41%]">

            <!-- Logo -->
            <div class="footer__logo">
                <a href="<?php
                echo home_url(); ?>" class="block w-[340px] lg:w-[561px] h-[33px] lg:h-[54px]">
                    <img src="<?php echo get_theme_file_uri('assets/images/logo-footer.svg'); ?>" alt="<?php
                    echo get_bloginfo('name'); ?>" class="w-full h-full object-contain lg:object-left"/>
                </a>
            </div>

            <!-- Social Icons -->
            <div class="footer__social flex gap-4 lg:gap-3 justify-center lg:justify-start relative left-[-5px] lg:pt-8">
                <a href="#"
                   class="footer__social-link footer__social-link--telegram w-14 h-14 flex items-center justify-center hover:opacity-80 transition">
                    <img src="<?php echo get_theme_file_uri('assets/images/icon-telegram.svg'); ?>" alt="Telegram"
                         class="w-full h-full object-contain"/>
                </a>
                <a href="#"
                   class="footer__social-link footer__social-link--vk w-14 h-14 flex items-center justify-center hover:opacity-80 transition">
                    <img src="<?php echo get_theme_file_uri('assets/images/icon-vk.svg'); ?>" alt="VK"
                         class="w-full h-full object-contain"/>
                </a>
            </div>

            <!-- Contact Email -->
            <a href="mailto:verimtebe@gmail.com"
               class="footer__email relative left-[-5px] text-white text-[32px] font-extrabold font-akrobat uppercase leading-none no-underline hover:underline text-center lg:text-left">
                verimtebe@gmail.com
            </a>

            <!-- Copyright -->
            <div class="footer__copyright hidden text-white text-[14px] font-light font-geologica leading-[1.5] w-full lg:flex gap-[77px] pt-5 relative left-[-5px]">
                <div>
                    © «Тебе поверят», 2025
                </div>

                <div class="footer__author hidden lg:block">
                    <img src="<?php echo get_theme_file_uri('assets/images/author-signature.svg'); ?>"
                         alt="Made with Love" class="w-[186px] h-[20px] object-contain opacity-100"/>
                </div>
            </div>

            <!-- Author Signature -->


        </div>

        <!-- Right Column -->
        <div class="footer__right flex flex-col gap-8 lg:gap-[43px] lg:w-[55%] lg:max-w-[692px]">

            <!-- Navigation Links -->
            <div class="footer__nav flex flex-col lg:flex-row gap-2 lg:gap-6">
                <?php
                get_template_part(
                        'template-parts/components/button',
                        null,
                        [
                                'text' => 'Проекты',
                                'url' => '#',
                                'style' => 'outline-white',
                                'uppercase' => '',
                                'class' => 'w-full lg:flex-1',
                                'size' => 'md'
                        ]
                ); ?>
                <?php
                get_template_part(
                        'template-parts/components/button',
                        null,
                        [
                                'text' => 'Отчеты',
                                'url' => '#',
                                'style' => 'outline-white',
                                'uppercase' => '',
                                'class' => 'w-full lg:flex-1',
                                'size' => 'md'
                        ]
                ); ?>
                <?php
                get_template_part(
                        'template-parts/components/button',
                        null,
                        [
                                'text' => 'О нас',
                                'url' => '#',
                                'style' => 'outline-white',
                                'uppercase' => '',
                                'class' => 'w-full lg:flex-1',
                                'size' => 'md'
                        ]
                ); ?>
                <?php
                get_template_part(
                        'template-parts/components/button',
                        null,
                        [
                                'text' => 'Реквизиты',
                                'url' => '#',
                                'style' => 'outline-white',
                                'uppercase' => '',
                                'class' => 'w-full lg:flex-1',
                                'size' => 'md'
                        ]
                ); ?>
            </div>

            <!-- Subscription Form -->
            <div class="footer__subscribe flex flex-col gap-3">
                <p class="text-white text-[16px] font-light font-geologica leading-[1.5]">Подпишитесь на рассылку, чтобы
                    не пропустить новости о нашей работе</p>
                <?php
                get_template_part('template-parts/components/input-with-button', null, [
                        'type' => 'email',
                        'name' => 'subscribe_email',
                        'placeholder' => 'example@mail.com',
                        'button_text' => 'Подписаться',
                        'submit' => true,
                        'state' => 'default',
                        'placeholder_position' => ' placeholder-shown:justify-start '

                ]); ?>
                <label class="footer__subscribe-checkbox flex items-start gap-2 cursor-pointer">
                    <input type="checkbox" class="footer__subscribe-checkbox-input hidden"/>
                    <span class="footer__subscribe-checkbox-custom w-6 h-6 rounded border-2 border-white flex-shrink-0 flex items-center justify-center">
                        <!-- Check icon -->
                        <svg class="footer__subscribe-checkbox-icon hidden w-4 h-4 text-primary" fill="currentColor"
                             viewBox="0 0 20 20"><path
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg>
                    </span>
                    <span class="footer__subscribe-checkbox-text text-white text-[16px] font-light font-geologica leading-[1.5]">Я соглашаюсь на обработку моих <a
                                href="#" class="!underline hover:no-underline text-white">персональных данных</a></span>
                </label>
            </div>

            <!-- Document Links -->
            <div class="footer__docs flex flex-col lg:flex-row gap-4 lg:gap-4 items-start lg:items-center">
                <a href="#"
                   class="footer__docs-link text-white text-[14px] font-light font-geologica leading-[1.5] no-underline hover:underline">Уставные
                    документы</a>
                <a href="#"
                   class="footer__docs-link text-white text-[14px] font-light font-geologica leading-[1.5] no-underline hover:underline">Публичная
                    оферта</a>
                <a href="#"
                   class="footer__docs-link text-white text-[14px] font-light font-geologica leading-[1.5] no-underline hover:underline">Политика
                    обработки персональных данных</a>
            </div>

        </div>

        <!-- Mobile-only Footer Elements -->
        <div class="footer__mobile-bottom lg:hidden flex flex-col gap-4 mt-4">
            <!-- Copyright -->
            <div class="footer__copyright text-white text-[14px] font-light font-geologica leading-[1.5] text-left lg:text-center">©
                «Тебе поверят», 2025
            </div>

            <!-- Author Signature -->
            <div class="footer__author flex justify-start lg:justify-center">
                <img src="<?php echo get_theme_file_uri('assets/images/author-signature.svg'); ?>" alt="Made with Love"
                     class="w-[186px] h-[20px] object-contain opacity-100"/>
            </div>
        </div>

    </div>
</footer>

<?php
// Sticky help button (mobile only, decorative, does nothing)
get_template_part('template-parts/components/sticky-help-button');
?>

<?php
wp_footer(); ?>
</body>
</html>