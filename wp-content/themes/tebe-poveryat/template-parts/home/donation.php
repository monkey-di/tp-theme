<?php
/**
 * Donation Form Section
 * Mobile First.
 */
?>
<section class="donation-form donation-section w-full bg-secondary relative overflow-hidden py-8">
    
    <!-- Decorative SVG Shapes (Background) -->
    <div class="donation-form__decor-svg donation-form__decor-svg--large-top absolute left-[-233.77px] top-[40.04px] z-0 pointer-events-none">
        <div class="absolute bottom-[63.02px] flex h-[506.981px] items-center justify-center left-[calc(12.5%+37.92px)] translate-x-[-50%] w-[638.386px]">
          <div class="flex-none rotate-[160.189deg]">
            <div class="h-[338.343px] opacity-[0.45] relative w-[556.66px]">
              <img src="https://www.figma.com/api/mcp/asset/54bd77cf-c844-43d1-8bb5-3da032b519c4" alt="" class="block max-w-none size-full" />
            </div>
          </div>
        </div>
        <div class="absolute bottom-0 flex items-center justify-center right-[39.25px] top-[62.56%] w-[378.137px]">
          <div class="flex-none h-[378.137px] rotate-[90deg] scale-y-[-100%] w-[312.974px]">
            <div class="opacity-[0.45] relative size-full">
              <img src="https://www.figma.com/api/mcp/asset/9f1499a2-be94-41cb-a244-e9b1559a8cc2" alt="" class="block max-w-none size-full" />
            </div>
          </div>
        </div>
        <div class="absolute flex inset-[4.79%_-6.13%_58.89%_-15.19%] items-center justify-center">
          <div className="flex-none h-[293.194px] rotate-[178.579deg] scale-y-[-100%] skew-x-[357.878deg] w-[443.027px]">
            <div className="opacity-[0.45] relative size-full">
              <img src="https://www.figma.com/api/mcp/asset/b03e1887-9606-4e7e-8cf4-9f10a2160c17" alt="" class="block max-w-none size-full" />
            </div>
          </div>
        </div>
    </div>

    <!-- Top Wave -->
    <div class="donation-form__decor-svg donation-form__decor-svg--top-wave absolute left-0 top-0 z-10 w-full">
        <svg width="100%" height="32" viewBox="0 0 380 32" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M380 0C380 8.48693 359.982 16.6263 324.35 22.6274C288.718 28.6286 240.391 32 190 32C139.609 32 91.2816 28.6286 55.6497 22.6274C20.0178 16.6263 7.60885e-06 8.48693 0 6.18078e-06L190 0H380Z" fill="var(--wp--preset--color--base)"/>
        </svg>
    </div>

    <!-- Bottom Wave -->
    <div class="donation-form__decor-svg donation-form__decor-svg--bottom-wave absolute left-0 bottom-0 z-10 w-full">
        <svg width="100%" height="32" viewBox="0 0 380 32" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M380 32C380 23.5131 359.982 15.3737 324.35 9.37258C288.718 3.37142 240.391 0 190 0C139.609 0 91.2816 3.37142 55.6497 9.37258C20.0178 15.3737 7.60885e-06 23.5131 0 32L190 32H380Z" fill="var(--wp--preset--color--base)"/>
        </svg>
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
        <input type="text" placeholder="Другая сумма" class="donation-form__custom-amount w-full px-8 py-3 bg-white rounded-[40px] text-contrast text-xl font-medium font-geologica leading-7 placeholder-primary/30 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50 mb-8" />
        
        <hr class="donation-form__divider border-t border-white mb-8" />

        <!-- Contact Inputs -->
        <div class="donation-form__contact-inputs flex flex-col gap-4 mb-8">
            <input type="email" placeholder="Почта*" class="donation-form__input w-full px-5 py-3 bg-white rounded-[40px] text-contrast text-base font-normal font-geologica leading-6 placeholder-primary/40 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50 text-center" />
            <input type="text" placeholder="Ваше имя (не обязательно)" class="donation-form__input w-full px-5 py-3 bg-white rounded-[40px] text-contrast text-base font-normal font-geologica leading-6 placeholder-primary/40 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50 text-center" />
        </div>

        <!-- Checkboxes -->
        <div class="donation-form__checkboxes flex flex-col gap-4 mb-8">
            <label class="donation-form__checkbox-label flex items-start gap-2 cursor-pointer">
                <input type="checkbox" class="donation-form__checkbox-input hidden" />
                <span class="donation-form__checkbox-custom w-6 h-6 rounded border-2 border-white flex-shrink-0 flex items-center justify-center bg-white/0">
                     <!-- Custom SVG Checkmark -->
                    <svg class="donation-form__checkbox-icon hidden w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </span>
                <span class="donation-form__checkbox-text text-white text-base font-light font-geologica leading-6">Я соглашаюсь на обработку моих <a href="#" class="underline hover:no-underline">персональных данных</a></span>
            </label>
            <label class="donation-form__checkbox-label flex items-start gap-2 cursor-pointer">
                <input type="checkbox" class="donation-form__checkbox-input hidden" />
                <span class="donation-form__checkbox-custom w-6 h-6 rounded border-2 border-white flex-shrink-0 flex items-center justify-center bg-white/0">
                    <svg class="donation-form__checkbox-icon hidden w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </span>
                <span class="donation-form__checkbox-text text-white text-base font-light font-geologica leading-6">Я соглашаюсь с <a href="#" class="underline hover:no-underline">условиями оферты</a></span>
            </label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="donation-form__submit-button w-full px-5 py-4 bg-primary/40 rounded-[40px] text-white text-base font-normal font-geologica uppercase leading-6 hover:bg-primary transition duration-300 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50">Помочь</button>

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
