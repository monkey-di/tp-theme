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
            <?php block_template_part( 'details-en-title' ); ?>
            <?php block_template_part( 'details-en-org-name' ); ?>
        </div>



        <!-- Right Column (Contact and Details) -->
        <div class="details-en__right">
            <!-- Registration Address -->
            <div class="details-en__block">
                <?php block_template_part( 'details-en-address' ); ?>
            </div>

            <!-- Contact Information -->
            <div class="details-en__block mt-6 lg:mt-0">
                <?php block_template_part( 'details-en-contact' ); ?>
            </div>

            <!-- Bank Details -->
            <div class="details-en__block mt-6 lg:mt-0">
                <?php block_template_part( 'details-en-bank' ); ?>
            </div>
        </div>

    </div>
</section>
