<?php
/**
 * Donation Form Section
 * Mobile First.
 */
?>
<section class="donation-form donation-section w-full bg-secondary relative overflow-hidden py-8">
    
    <!-- Decorative SVG Shapes (Background) -->
    <div class="donation-form__decor-svg absolute inset-0 z-0 opacity-40 pointer-events-none">
        <div class="absolute bottom-[63.02px] flex h-[506.981px] items-center justify-center left-[calc(12.5%+37.92px)] translate-x-[-50%] w-[638.386px]">
          <div class="flex-none rotate-[160.189deg]">
            <div class="h-[338.343px] opacity-[0.45] relative w-[556.66px]">
              <img src="https://www.figma.com/api/mcp/asset/45e136bb-866c-4ffa-b1fe-ed7a4755cb64" alt="" class="block max-w-none size-full" />
            </div>
          </div>
        </div>
        <div class="absolute bottom-0 flex items-center justify-center right-[39.25px] top-[62.56%] w-[378.137px]">
          <div class="flex-none h-[378.137px] rotate-[90deg] scale-y-[-100%] w-[312.974px]">
            <div class="opacity-[0.45] relative size-full">
              <img src="https://www.figma.com/api/mcp/asset/87cb529a-5be0-4559-a2e0-ac304cc06cd8" alt="" class="block max-w-none size-full" />
            </div>
          </div>
        </div>
        <div class="absolute flex inset-[4.79%_-6.13%_58.89%_-15.19%] items-center justify-center">
          <div class="flex-none h-[293.194px] rotate-[178.579deg] scale-y-[-100%] skew-x-[357.878deg] w-[443.027px]">
            <div class="opacity-[0.45] relative size-full">
              <img src="https://www.figma.com/api/mcp/asset/44eedf02-4da3-46f6-8ea7-f605bae9519d" alt="" class="block max-w-none size-full" />
            </div>
          </div>
        </div>
    </div>

    <!-- Top Wave -->
    <div class="donation-form__decor-svg donation-form__decor-svg--top-wave absolute left-0 top-0 z-10 w-full">
        <img src="https://www.figma.com/api/mcp/asset/a78f4794-1aec-424a-84e6-29b30a1deec8" alt="" class="w-full h-[32px] object-cover" />
    </div>

    <!-- Bottom Wave -->
    <div class="donation-form__decor-svg donation-form__decor-svg--bottom-wave absolute left-0 bottom-0 z-10 w-full">
        <img src="https://www.figma.com/api/mcp/asset/a78f4794-1aec-424a-84e6-29b30a1deec8" alt="" class="w-full h-[32px] object-cover scale-y-[-1]" />
    </div>

    <div class="donation-form__container container mx-auto px-4 relative z-20 pt-16 pb-16">
        <h2 class="donation-form__title text-center text-white text-h2 font-normal font-ura uppercase leading-9 mb-8">Поддержите нас</h2>
        
        <!-- Toggle Button Group (Разово/Ежемесячно) -->
        <div class="donation-form__toggle flex p-1 bg-white rounded-[40px] mb-8">
            <button type="button" class="donation-form__toggle-button flex-1 px-8 py-3 bg-primary rounded-[40px] flex justify-center items-center text-white text-xl font-bold font-akrobat leading-5 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50">Разово</button>
            <button type="button" class="donation-form__toggle-button flex-1 px-8 py-3 bg-white rounded-[40px] flex justify-center items-center text-contrast text-xl font-bold font-akrobat leading-5 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50">Ежемесячно</button>
        </div>

        <!-- Amount Buttons -->
        <div class="donation-form__amounts grid grid-cols-2 gap-4 mb-8">
            <button type="button" class="donation-form__amount-button px-8 py-3 bg-white rounded-[40px] text-contrast text-xl font-medium font-geologica leading-7 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50">100₽</button>
            <button type="button" class="donation-form__amount-button px-8 py-3 bg-white rounded-[40px] text-contrast text-xl font-medium font-geologica leading-7 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50">300₽</button>
            <button type="button" class="donation-form__amount-button px-8 py-3 bg-white rounded-[40px] text-contrast text-xl font-medium font-geologica leading-7 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50">500₽</button>
            <button type="button" class="donation-form__amount-button px-8 py-3 bg-white rounded-[40px] text-contrast text-xl font-medium font-geologica leading-7 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50">1000₽</button>
        </div>

        <!-- Custom Amount Input -->
        <input type="text" placeholder="Другая сумма" class="donation-form__custom-amount w-full px-8 py-3 bg-white rounded-[40px] text-contrast text-[20px] font-medium font-geologica leading-[1.4] placeholder:text-primary/30 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50 mb-8 text-center" />
        
        <hr class="donation-form__divider border-t border-white mb-8" />

        <!-- Contact Inputs -->
        <div class="donation-form__contact-inputs flex flex-col gap-4 mb-8">
            <input type="email" placeholder="Почта*" class="donation-form__input w-full px-5 py-3 bg-white rounded-[40px] text-contrast text-[16px] font-normal font-geologica leading-[1.5] placeholder:text-primary/40 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50" />
            <input type="text" placeholder="Ваше имя (не обязательно)" class="donation-form__input w-full px-5 py-3 bg-white rounded-[40px] text-contrast text-[16px] font-normal font-geologica leading-[1.5] placeholder:text-primary/40 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50" />
        </div>

        <!-- Checkboxes -->
        <div class="donation-form__checkboxes flex flex-col gap-4 mb-8">
            <label class="donation-form__checkbox-label flex items-start gap-2 cursor-pointer">
                <input type="checkbox" class="donation-form__checkbox-input hidden" />
                <span class="donation-form__checkbox-custom w-6 h-6 rounded border-2 border-white flex-shrink-0 flex items-center justify-center bg-white">
                     <!-- Custom SVG Checkmark -->
                    <svg class="donation-form__checkbox-icon hidden w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </span>
                <span class="donation-form__checkbox-text text-white text-[16px] font-light font-geologica leading-[1.5]">Я соглашаюсь на обработку моих <a href="#" class="!underline hover:no-underline decoration-solid text-white">персональных данных</a></span>
            </label>
            <label class="donation-form__checkbox-label flex items-start gap-2 cursor-pointer">
                <input type="checkbox" class="donation-form__checkbox-input hidden" />
                <span class="donation-form__checkbox-custom w-6 h-6 rounded border-2 border-white flex-shrink-0 flex items-center justify-center bg-white">
                    <svg class="donation-form__checkbox-icon hidden w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </span>
                <span class="donation-form__checkbox-text text-white text-[16px] font-light font-geologica leading-[1.5]">Я соглашаюсь с <a href="#" class="!underline hover:no-underline decoration-solid text-white">условиями оферты</a></span>
            </label>
        </div>

        <!-- Submit Button -->
        <?php get_template_part('template-parts/components/button', null, [
            'text' => 'Помочь',
            'submit' => true,
            'class' => 'w-full'
        ]); ?>

    </div>
</section>

<!-- Inline JS for Checkbox Toggle -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.donation-form__checkbox-input').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const customCheckbox = this.nextElementSibling;
            const checkmark = customCheckbox.querySelector('.donation-form__checkbox-icon');
            if (this.checked) {
                customCheckbox.classList.add('bg-white');
                customCheckbox.classList.remove('bg-white/0');
                checkmark.classList.remove('hidden');
            } else {
                customCheckbox.classList.remove('bg-white');
                customCheckbox.classList.add('bg-white/0');
                checkmark.classList.add('hidden');
            }
        });
    });
});
</script>
