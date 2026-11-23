# Vegas Sports & Hockey case study (WordPress)

Same delivery pattern as the CMES case study: a theme template plus a self-contained asset folder.

## Install
1. Copy `single-pf-vegas-sports-hockey-case-study.php` and the `vegas-case-study/` folder into the active (child) theme root (next to `cmes-case-study/`).
2. Create or edit the `pf` entry, set Page Attributes > Template to **Vegas Sports & Hockey Case Study**, and publish. Slug suggestion: `vegas-sports-hockey`.
3. Header and footer come from the theme via `get_header()` / `get_footer()`. Nothing global is changed.

## Images
No images were supplied, so each slot shows a labelled placeholder. Drop a file with the exact name into `vegas-case-study/assets/img/` and it replaces the placeholder automatically:

| File | Size | Used in |
|---|---|---|
| hero-storefront.jpg | 1000 x 800 | Hero (main) |
| hero-inset.jpg | 600 x 450 | Hero (inset) |
| client-store.jpg | 800 x 1000 | The client (portrait) |
| client-detail.jpg | 800 x 600 | The client (detail) |
| storefront-desktop.jpg | 1600 x 1000 | The storefront |
| storefront-mobile.jpg | 600 x 1200 | The storefront (phone) |
| cta-image.jpg | 900 x 700 | Closing section |

## Notes
- CSS is scoped under `.vsh` with `v-` class prefixes, enqueued only by this template. No JS needed (FAQ uses native `<details>`).
- Article, Breadcrumb and FAQ JSON-LD from the source file are emitted in `wp_head`. If the FAQ-schema plugin is also active on this page, remove the FAQ block from the template to avoid duplicates.
- CTA buttons link to `/personalized-strategy-consultation` (as the CMES page does); the source HTML pointed to the homepage. "View website" points to uniformsport.com.
- All copy and figures come from the supplied HTML, unchanged. Headings were kept; only the order and layout changed.
