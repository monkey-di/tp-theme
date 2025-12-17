# Asset Update Context - 2025-12-15

## Summary
Replaced placeholder Figma asset URLs with local assets downloaded via `download_assets.sh`.
This ensures that the theme does not rely on temporary Figma API links which expire after 7 days.

## Asset Mapping

| Original Figma Component | Local File Path | Description |
| ------------------------ | --------------- | ----------- |
| Team Members | `assets/images/team-*.jpg` | Julia Kuleshova, Ksenia Shashunova |
| Friends | `assets/images/friend-*.jpg` | Aglaya Tarasova, Konstantin Khabensky, Yuri Shevchuk |
| History | `assets/images/history-*.jpg` | Tatiana Tsvetkova |
| Partners | `assets/images/partner-*.svg` | Partner logos |
| Hero | `assets/images/hero-abstract.png` | Abstract hero background |
| Logo | `assets/images/logo-header-icon.svg`, `logo-header-text.svg` | Header logo parts |
| Decor | `assets/images/media-wave.svg`, `media-decor-*.svg` | Decorative waves and shapes |
| Footer | `assets/images/logo-footer.svg` | Footer logo (Desktop `imgGroup7`) |
| Icons | `assets/images/icon-*.svg` | Telegram (`imgLinkTelegram`), VK (`imgLink`), Burger menu (Mobile `imgOutlineMenu`), Heart (`imgUnion`) |
| Link Decoration | `assets/images/arrow-link-more.svg` | Underline decoration for "Read More" links (Desktop `imgLine3`) |
| Team Wave | `assets/images/team-wave.svg` | Decorative wave in Team section (Desktop `imgEllipse2`) |
| Author Signature | `assets/images/author-signature.svg` | Author signature in footer (Desktop `imgAuthorSvg`) |

## Key Changes
- Updated `download_assets.sh` with correct Figma asset IDs after verifying valid responses.
- Modified `header.php`, `footer.php`, `template-parts/home/team.php`, and `template-parts/components/link-more.php` to use `get_theme_file_uri()` for these assets.
- Fixed 404 errors for `arrow-link-more.svg`, `author-signature.svg`, `icon-burger.svg`, `icon-telegram.svg`, `icon-vk.svg`, `logo-footer.svg`, and `team-wave.svg`.

## Notes
- Images are downloaded to `wp-content/themes/tebe-poveryat/assets/images/`.
- `download_assets.sh` can be re-run to refresh assets if URLs are updated.