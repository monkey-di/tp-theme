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

<footer class="footer w-full bg-primary relative overflow-hidden px-4 z-20 mt-[-40px] xl:mt-[-80px] pt-12 xl:pt-32 pb-12 xl:pb-[56px] [border-radius:50%_50%_0_0_/_40px_40px_0_0] xl:[border-radius:50%_50%_0_0_/_80px_80px_0_0]">

    <div class="footer__container container mx-auto px-0 relative z-20 flex flex-col xl:flex-row xl:justify-between gap-8 xl:gap-[145px]">

        <!-- Left Column -->
        <div class="footer__left flex flex-col gap-8 xl:pl-4 xl:gap-6 items-center xl:items-start xl:w-[41%]">

            <!-- Logo -->
            <div class="footer__logo">
                <a href="<?php
                echo home_url(); ?>" class="block w-[340px] xl:w-[561px] h-[33px] xl:h-[54px]">
                    <img src="<?php echo get_theme_file_uri('assets/images/logo-footer.svg'); ?>" alt="<?php
                    echo get_bloginfo('name'); ?>" class="w-full h-full object-contain xl:object-left"/>
                </a>
            </div>

            <!-- Social Icons -->
            <div class="footer__social flex gap-4 xl:gap-3 justify-center xl:justify-start relative left-[-5px] xl:pt-8">
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
            <a href="mailto:<?php echo tp_get_text('footer.email', 'verimtebe@gmail.com', 'verimtebe@gmail.com'); ?>"
               class="footer__email relative left-[-5px] text-white text-[32px] font-extrabold font-akrobat uppercase leading-none no-underline hover:underline text-center xl:text-left">
                <?php echo tp_get_text('footer.email', 'verimtebe@gmail.com', 'verimtebe@gmail.com'); ?>
            </a>

            <!-- Copyright -->
            <div class="footer__copyright hidden text-white text-[14px] font-light font-geologica leading-[1.5] w-full xl:flex gap-[77px] pt-5 relative left-[-5px]">
                <div>
                    <?php echo tp_get_text('footer.copyright', '© «Тебе поверят», 2025', '© "Tebe Poveryat", 2025'); ?>
                </div>

                <div class="footer__author hidden xl:block">
                    <img src="<?php echo get_theme_file_uri('assets/images/author-signature.svg'); ?>"
                         alt="Made with Love" class="w-[186px] h-[20px] object-contain opacity-100"/>
                </div>
            </div>

            <!-- Author Signature -->


        </div>

        <!-- Right Column -->
        <div class="footer__right flex flex-col gap-8 xl:gap-[43px] xl:w-[55%] xl:max-w-[692px]">

            <!-- Navigation Links -->
            <div class="footer__nav flex flex-col xl:flex-row gap-2 xl:gap-6">
                <?php
                get_template_part(
                        'template-parts/components/button',
                        null,
                        [
                                'text' => tp_get_text('footer.projects', 'Проекты', 'Projects'),
                                'url' => '#',
                                'style' => 'outline-white',
                                'uppercase' => '',
                                'class' => 'w-full xl:flex-1',
                                'size' => 'md'
                        ]
                ); ?>
                <?php
                get_template_part(
                        'template-parts/components/button',
                        null,
                        [
                                'text' => tp_get_text('footer.reports', 'Отчеты', 'Reports'),
                                'url' => '#',
                                'style' => 'outline-white',
                                'uppercase' => '',
                                'class' => 'w-full xl:flex-1',
                                'size' => 'md'
                        ]
                ); ?>
                <?php
                get_template_part(
                        'template-parts/components/button',
                        null,
                        [
                                'text' => tp_get_text('footer.about_us', 'О нас', 'About Us'),
                                'url' => '#',
                                'style' => 'outline-white',
                                'uppercase' => '',
                                'class' => 'w-full xl:flex-1',
                                'size' => 'md'
                        ]
                ); ?>
                <?php
                get_template_part(
                        'template-parts/components/button',
                        null,
                        [
                                'text' => tp_get_text('footer.details', 'Реквизиты', 'Details'),
                                'url' => '#',
                                'style' => 'outline-white',
                                'uppercase' => '',
                                'class' => 'w-full xl:flex-1',
                                'size' => 'md'
                        ]
                ); ?>
            </div>

            <!-- Subscription Form -->
            <div class="footer__subscribe flex flex-col gap-3">
                <p class="text-white text-[16px] font-light font-geologica leading-[1.5]"><?php echo tp_get_text('footer.subscribe_text', 'Подпишитесь на рассылку, чтобы не пропустить новости о нашей работе', 'Subscribe to our newsletter to stay updated on our work'); ?></p>
                <form id="subscribe-form" class="flex flex-col gap-3">
                    <?php
                    get_template_part('template-parts/components/input-with-button', null, [
                            'type' => 'email',
                            'name' => 'subscribe_email',
                            'placeholder' => tp_get_text('footer.placeholder', 'example@mail.com', 'example@mail.com'),
                            'button_text' => tp_get_text('footer.subscribe_btn', 'Подписаться', 'Subscribe'),
                            'submit' => true,
                            'state' => 'default',
                            'button_id' => 'subscribe-btn',
                            'input_id' => 'subscribe-email',
                            'placeholder_position' => ' placeholder-shown:justify-start '

                    ]); ?>
                    <label class="donation-form__checkbox-label !items-start sm:!items-center">
                        <input type="checkbox" id="subscribe-consent" class="hidden donation-form__checkbox-input" />
                    <span class="donation-form__checkbox-custom">
                        <svg class="donation-form__checkbox-icon hidden w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    </span>
                    <span class="donation-form__checkbox-text"><?php echo tp_get_text('footer.consent', 'Я соглашаюсь на обработку моих <a href="#">персональных данных</a>', 'I agree to the processing of my <a href="#">personal data</a>'); ?></span>
                </label>
                </form>

            </div>

            <!-- Document Links -->
            <div class="footer__docs flex flex-col xl:flex-row gap-4 xl:gap-4 items-start xl:items-center">
                <a href="#"
                   class="footer__docs-link text-white text-[14px] font-light font-geologica leading-[1.5] no-underline hover:underline"><?php echo tp_get_text('footer.documents', 'Уставные документы', 'Governing Documents'); ?></a>
                <a href="#"
                   class="footer__docs-link text-white text-[14px] font-light font-geologica leading-[1.5] no-underline hover:underline"><?php echo tp_get_text('footer.offer', 'Публичная оферта', 'Public Offer'); ?></a>
                <a href="#"
                   class="footer__docs-link text-white text-[14px] font-light font-geologica leading-[1.5] no-underline hover:underline"><?php echo tp_get_text('footer.privacy', 'Политика обработки персональных данных', 'Privacy Policy'); ?></a>
            </div>

        </div>

        <!-- Mobile-only Footer Elements -->
        <div class="footer__mobile-bottom xl:hidden flex flex-col gap-4 mt-4">
            <!-- Copyright -->
            <div class="footer__copyright text-white text-[14px] font-light font-geologica leading-[1.5] text-left xl:text-center">
                <?php echo tp_get_text('footer.copyright', '© «Тебе поверят», 2025', '© "Tebe Poveryat", 2025'); ?>
            </div>

            <!-- Author Signature -->
            <div class="footer__author flex justify-start xl:justify-center">
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