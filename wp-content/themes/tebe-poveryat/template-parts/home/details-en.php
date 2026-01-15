<?php
/**
 * English Details Section - Organization Details
 * Mobile First with Desktop version
 * Static content
 */
?>
<section class="details-en-section bg-surface relative z-20 pt-12 lg:pt-20 pb-12 lg:pb-32 overflow-hidden [border-radius:50%_50%_0_0_/_40px_40px_0_0] lg:[border-radius:50%_50%_0_0_/_80px_80px_0_0]">
    <style>
        @media (min-width: 1280px) {
            .details-en__container {
                background-image: url("<?php echo get_theme_file_uri('assets/images/bg-about.webp'); ?>");
                background-position: right 75%;
                background-repeat: no-repeat;
            }
        }

    </style>
    <div class="details-en__container">

        <!-- Left Column (Title and Description) -->
        <div class="details-en__left flex flex-col gap-10">
            <h2 class="details-en__title text-primary">Our Details</h2>
            <p class="details-en__org-name">
                AUTONOMOUS NON-PROFIT ORGANIZATION HELP FOR SURVIVORS OF SEXUAL VIOLENCE IN CHILDHOOD AND ADOLESCENCE, PREVENTION AND AVOIDANCE OF SEXUAL VIOLENCE AGAINST CHILDREN AND ADOLESCENTS "THEY WILL BELIEVE YOU"
            </p>
        </div>



        <!-- Right Column (Contact and Details) -->
        <div class="details-en__right">
            <!-- Registration Address -->
            <div class="details-en__block">
                <p class="details-en__text">
                    Registration address: 191119, Russia, St. Petersburg, Marata St., Building 54/34, Lit. A, Apt. 26
                </p>
            </div>

            <!-- Contact Information -->
            <div class="details-en__block mt-6 lg:mt-0">
                <p class="details-en__text">verimtebe@gmail.com</p>
                <p class="details-en__text">+7 985 610-77-55</p>
                <p class="details-en__text">Mon–Fri 10:00 AM – 7:00 PM MSK</p>
            </div>

            <!-- Bank Details -->
            <div class="details-en__block mt-6 lg:mt-0">
                <p class="details-en__text">OGRN 1207800103939</p>
                <p class="details-en__text">INN: 7840093243 / KPP 784001001</p>
                <p class="details-en__text">OKPO: 45313328</p>
                <p class="details-en__text">Account: 40703810500000716019</p>
                <p class="details-en__text">Correspondent Account: 30101810145250000974</p>
                <p class="details-en__text">BIC: 044525974</p>
                <p class="details-en__text">Bank Name: AO "TBank"</p>
            </div>
        </div>

    </div>
</section>
