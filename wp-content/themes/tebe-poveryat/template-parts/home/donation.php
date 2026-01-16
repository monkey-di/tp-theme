<?php
/**
 * Donation Form Section
 * Mobile First.
 */
?>
<section class="donation-form donation-section w-full bg-secondary relative overflow-hidden z-10 mt-[-40px] mb-[-40px] lg:mt-[-80px] lg:mb-[-80px] pt-[80px] pb-[80px] lg:pt-[160px] lg:pb-[140px]">
    
    <!-- Mobile Background -->
    <div class="md:hidden">
        <div class="donation-form__decor-svg absolute inset-0 z-0 pointer-events-none">
            <div class="absolute bottom-[63.02px] flex h-[506.981px] items-center justify-center left-[calc(12.5%+37.92px)] translate-x-[-50%] w-[638.386px]">
                <div class="flex-none rotate-[160.189deg]">
                    <div class="h-[338.343px] opacity-[0.45] relative w-[556.66px]">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stars/donation-stars1-mobile.svg" alt="" class="block max-w-none size-full" />
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 flex items-center justify-center right-[39.25px] top-[62.56%] w-[378.137px]">
                <div class="flex-none h-[378.137px] rotate-[90deg] scale-y-[-100%] w-[312.974px]">
                    <div class="opacity-[0.45] relative size-full">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stars/donation-stars2-mobile.svg" alt="" class="block max-w-none size-full" />
                    </div>
                </div>
            </div>
            <div class="absolute flex inset-[4.79%_-6.13%_58.89%_-15.19%] items-center justify-center">
                <div class="flex-none h-[293.194px] rotate-[178.579deg] scale-y-[-100%] skew-x-[357.878deg] w-[443.027px]">
                    <div class="opacity-[0.45] relative size-full">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stars/donation-stars3-mobile.svg" alt="" class="block max-w-none size-full" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Desktop Background -->
    <div class="hidden xl:block absolute inset-0 z-0 pointer-events-none px-[96px]">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stars/donation-stars-desktop.svg" alt="" class="w-full h-full ">
    </div>

    <div class="hidden md:block absolute inset-0 z-0 pointer-events-none mt-[-100px] px-0">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stars/donation-stars-tablet.svg" alt="" class="w-full h-full ">
    </div>

    <div class="donation-form__container container mx-auto px-4 relative z-20 md:pt-0 md:pb-24 lg:pb-0">
        <?php if( is_front_page() ) { ?>
            <h2 class="donation-form__title text-center text-white text-h2 md:text-[64px] font-ura uppercase mb-8 md:leading-[64px] lg:mb-[35px]">Поддержите нас</h2>
        <?php } ?>
        <div class="max-w-[711px] mx-auto flex flex-col justify-center">
            <!-- Toggle Button Group (Разово/Ежемесячно) -->
            <div class="donation-form__toggle mb-8 w-full">
                <button type="button" class="donation-form__toggle-button donation-form__toggle-button--active">Разово</button>
                <button type="button" class="donation-form__toggle-button donation-form__toggle-button--inactive">Ежемесячно</button>
            </div>
            <!-- Amount Buttons & Custom Amount Input -->
            <div class="donation-form__amounts mb-[23px]">
                <button type="button" class="donation-form__amount-button">100₽</button>
                <button type="button" class="donation-form__amount-button">300₽</button>
                <button type="button" class="donation-form__amount-button">500₽</button>
                <button type="button" class="donation-form__amount-button donation-form__amount-button--selected">1000₽</button>
                <input type="text" placeholder="Другая сумма" class="donation-form__custom-amount" />
            </div>
            <div class="self-stretch h-px bg-white mb-[23px]" > </div>
            <hr class="border-t border-white  mx-auto max-w-[708px]" />

            <!-- Contact Inputs -->
            <div class="flex flex-col gap-4 mb-8">
                <input type="email" placeholder="Почта*" class="donation-form__input" />
                <input type="text" placeholder="Ваше имя (не обязательно)" class="donation-form__input" />
            </div>

            <!-- Checkboxes -->
            <div class="donation-form__checkboxes mb-8">
                <label class="donation-form__checkbox-label">
                    <input type="checkbox" class="hidden donation-form__checkbox-input" />
                    <span class="donation-form__checkbox-custom">
                        <svg class="donation-form__checkbox-icon hidden w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    </span>
                    <span class="donation-form__checkbox-text">Я соглашаюсь на обработку моих <a href="#">персональных данных</a></span>
                </label>
                <label class="donation-form__checkbox-label">
                    <input type="checkbox" class="hidden donation-form__checkbox-input" />
                    <span class="donation-form__checkbox-custom">
                        <svg class="donation-form__checkbox-icon hidden w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    </span>
                    <span class="donation-form__checkbox-text">Я соглашаюсь с <a href="#">условиями оферты</a></span>
                </label>
            </div>

            <!-- Submit Button -->
            <?php get_template_part('template-parts/components/button', null, [
                'text' => 'Помочь',
                'submit' => true,
                'size' => 'help',
                'class' => 'w-full md:w-[348px] mx-auto'
            ]); ?>
        </div>
    </div>
</section>

<!-- Inline JS for Checkbox Toggle -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.donation-form__checkbox-input').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const checkmark = this.nextElementSibling.querySelector('.donation-form__checkbox-icon');
            if (this.checked) {
                checkmark.classList.remove('hidden');
            } else {
                checkmark.classList.add('hidden');
            }
        });
    });
});
</script>
