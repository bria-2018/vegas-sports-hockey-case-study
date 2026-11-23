<?php
/**
 * Template Name: Vegas Sports & Hockey Case Study
 * Template Post Type: pf, page
 *
 * Self-contained case study template (same delivery pattern as the CMES case study).
 * Copy this file plus the vegas-case-study/ folder into the active (child) theme root,
 * then choose "Vegas Sports & Hockey Case Study" under Page Attributes > Template.
 * Header and footer come from the theme.
 *
 * Images: drop a file with the listed name into vegas-case-study/assets/img/ and it
 * replaces the placeholder automatically.
 */

$vsh_uri  = get_stylesheet_directory_uri() . '/vegas-case-study';
$vsh_path = get_stylesheet_directory() . '/vegas-case-study';
$cta_url  = 'https://www.commercepundit.com/personalized-strategy-consultation';
$GLOBALS['vsh_uri']  = $vsh_uri;
$GLOBALS['vsh_path'] = $vsh_path;

add_action( 'wp_enqueue_scripts', function () use ( $vsh_uri, $vsh_path ) {
	wp_enqueue_style( 'vsh-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600&display=swap', array(), null );
	wp_enqueue_style( 'vsh-case-study', $vsh_uri . '/css/vegas-case-study.css', array(), filemtime( $vsh_path . '/css/vegas-case-study.css' ) );
}, 20 );

/** Structured data (Article, Breadcrumb, FAQ) */
add_action( 'wp_head', function () {
	$faq = array(
		array( 'Why rebrand a Shopify store before running Google Ads?', 'Ads buy traffic, and a store only turns that traffic into orders if shoppers trust it and find products quickly. Fixing identity, navigation and trust signals first means every ad click lands on a page built to convert.' ),
		array( 'Does Commerce Pundit handle Shopify development, CRO, PPC and SEO together?', 'Yes. One team covers Shopify development, rebranding, theme upgrades, CRO audits and changes, Google Ads, SEO and AI visibility, so each channel works from the same product and conversion data.' ),
		array( 'How do I start a project like this?', 'Book a free strategy call. We review your store, traffic and goals, then scope the rebrand, CRO and growth work in order of impact.' ),
	);
	$graph = array(
		array(
			'@type' => 'Article',
			'headline' => 'Vegas Sports & Hockey: Shopify Rebrand, CRO and Google Ads Case Study',
			'description' => 'How Commerce Pundit rebranded and rebuilt the Shopify store of a Las Vegas sports retailer, then grew traffic and orders with CRO, Google Ads and SEO.',
			'datePublished' => '2026-11-19',
			'author' => array( '@type' => 'Organization', 'name' => 'Commerce Pundit', 'url' => 'https://www.commercepundit.com/' ),
			'about' => array( 'Shopify rebranding', 'Shopify theme upgrade', 'CRO audit', 'Google Ads', 'SEO', 'AI visibility' ),
		),
		array(
			'@type' => 'BreadcrumbList',
			'itemListElement' => array(
				array( '@type' => 'ListItem', 'position' => 1, 'name' => 'Case Studies', 'item' => 'https://www.commercepundit.com/work/' ),
				array( '@type' => 'ListItem', 'position' => 2, 'name' => 'Vegas Sports & Hockey' ),
			),
		),
		array(
			'@type' => 'FAQPage',
			'mainEntity' => array_map( function ( $f ) {
				return array( '@type' => 'Question', 'name' => $f[0], 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $f[1] ) );
			}, $faq ),
		),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( array( '@context' => 'https://schema.org', '@graph' => $graph ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}, 5 );

/** Render a supplied image if it exists, otherwise a labelled placeholder. */
if ( ! function_exists( 'vsh_media' ) ) {
function vsh_media( $file, $alt, $w, $h, $label, $dark = false, $eager = false ) {
	global $vsh_uri, $vsh_path;
	if ( file_exists( $vsh_path . '/assets/img/' . $file ) ) {
		printf(
			'<img src="%s" alt="%s" width="%d" height="%d" loading="%s">',
			esc_url( $vsh_uri . '/assets/img/' . $file ), esc_attr( $alt ), (int) $w, (int) $h, $eager ? 'eager' : 'lazy'
		);
		return;
	}
	printf(
		'<div class="v-ph%s" role="img" aria-label="%s"><b>%s</b><span>%s &middot; %d &times; %d</span></div>',
		$dark ? ' v-ph--dark' : '', esc_attr( $alt ), esc_html( $label ), esc_html( $file ), (int) $w, (int) $h
	);
}
}

get_header();
?>
<main id="main" class="vsh">

  <!-- 01 HERO: image collage + overlapping headline-results card -->
  <section class="v-hero" aria-labelledby="v-hero-title">
    <div class="v-wrap">
      <p class="v-crumbs"><a href="https://www.commercepundit.com/work/">Case Studies</a> &nbsp;/&nbsp; Vegas Sports &amp; Hockey</p>
      <div class="v-hero__grid">
        <div class="v-hero__copy">
          <p class="v-eyebrow"><span class="v-dot"></span>Case Study &middot; Shopify &middot; Sports Apparel &amp; Licensed Merchandise</p>
          <h1 id="v-hero-title" class="v-hero__title">How a Las Vegas sports shop grew monthly net sales 10x on Shopify</h1>
          <p class="v-hero__lede">Vegas Sports &amp; Hockey has sold licensed jerseys, caps and collectibles in Las Vegas since 1998. Commerce Pundit rebranded and rebuilt its Shopify store, tuned the path to checkout, then put Google Ads and SEO behind it.</p>
          <div class="v-hero__actions">
            <a class="v-btn v-btn--light" href="<?php echo esc_url( $cta_url ); ?>">Get your free quote</a>
            <a class="v-link v-link--light" href="https://uniformsport.com/" target="_blank" rel="noopener">View website</a>
          </div>
        </div>
        <div class="v-collage">
          <div class="v-frame v-frame--dark v-collage__main"><?php vsh_media( 'hero-storefront.jpg', 'Vegas Sports & Hockey store', 1000, 800, 'Hero: storefront or Uniform Sports homepage', true, true ); ?></div>
          <div class="v-frame v-frame--dark v-collage__inset"><?php vsh_media( 'hero-inset.jpg', 'Licensed jerseys and caps', 600, 450, 'Inset: jerseys and caps', true, true ); ?></div>
        </div>
      </div>
    </div>
    <div class="v-wrap v-stage">
      <ul class="v-scorecard v-scorecard__nums" aria-label="Headline results">
        <li class="is-lead"><strong>10x</strong><span>Monthly net sales</span></li>
        <li><strong>9.6x</strong><span>Search conversion</span></li>
        <li><strong>8.6x</strong><span>New customers</span></li>
        <li><strong>6.1x</strong><span>Monthly orders</span></li>
      </ul>
    </div>
  </section>

  <!-- 01b HERO RESULTS FOOT: sits on the white page, directly under the pink 10x tile -->
  <div class="v-wrap v-stage-foot">
    <div class="v-scorecard v-scorecard__foot">
      <p>September and October average against the May to July average</p>
      <dl>
        <div><dt>Platform</dt><dd>Shopify</dd></div>
        <div><dt>Market</dt><dd>Las Vegas, NV and US-wide</dd></div>
        <div><dt>Timeline</dt><dd>Live July 2026, ads from mid August</dd></div>
      </dl>
    </div>
  </div>

  <!-- 02 CHALLENGE: before / after scoreboard -->
  <section id="challenge" class="v-sec" aria-labelledby="v-ch-title">
    <div class="v-wrap">
      <div class="v-head">
        <div>
          <p class="v-eyebrow">The challenge</p>
          <h2 id="v-ch-title" class="v-h2">Strong in the shop, quiet online</h2>
        </div>
        <p class="v-head__aside">The reputation was built in person. Online it was not turning into orders, and weekly traffic sat in the hundreds.</p>
      </div>
      <div class="v-ba">
        <div class="v-ba__head" aria-hidden="true">
          <span></span><span class="v-ba__col">Before launch<small>May to July</small></span><span></span><span class="v-ba__col is-after">After<small>September and October</small></span>
        </div>
        <article class="v-ba__row">
          <div class="v-ba__what"><h3>Store conversion</h3><p>From May to July, fewer than one visit in 200 ended in an order. With so few orders there was too little data to learn from and too little demand to scale.</p></div>
          <div class="v-ba__num">0.47%</div><div class="v-ba__arrow" aria-hidden="true"></div><div class="v-ba__num is-after">1.40%</div>
        </article>
        <article class="v-ba__row">
          <div class="v-ba__what"><h3>Search conversion</h3><p>Shoppers who arrived through search rarely bought, so paid traffic had little to build on.</p></div>
          <div class="v-ba__num">0.34%</div><div class="v-ba__arrow" aria-hidden="true"></div><div class="v-ba__num is-after">3.23%</div>
        </article>
        <article class="v-ba__row">
          <div class="v-ba__what"><h3>Names for one business</h3><p>Vegas Sports &amp; Hockey and Uniform Sports both appeared across the store, search listings and ads. Shoppers and search engines had no single brand to remember.</p></div>
          <div class="v-ba__num">2</div><div class="v-ba__arrow" aria-hidden="true"></div><div class="v-ba__num is-after">1</div>
        </article>
        <p class="v-ba__note">Store conversion is measured across all sessions and search conversion across search sessions. After figures are the September and October average. The single brand is the goal set for the rebrand: one brand voice across store, search listings and ads.</p>
      </div>
    </div>
  </section>

  <!-- 03 CLIENT: editorial -->
  <section id="client" class="v-sec v-sec--paper" aria-labelledby="v-client-title">
    <div class="v-wrap">
      <div class="v-client__top">
        <div class="v-year" aria-hidden="true">1998</div>
        <div>
          <p class="v-eyebrow">The client</p>
          <h2 id="v-client-title" class="v-h2">A family business with 28 years of Las Vegas behind it</h2>
        </div>
      </div>
      <div class="v-client">
        <figure class="v-client__img"><div class="v-frame v-frame--line"><?php vsh_media( 'client-store.jpg', 'Vegas Sports & Hockey shop in Las Vegas', 800, 1000, 'Client: shop front or owner portrait' ); ?></div></figure>
        <div class="v-prose">
          <p class="v-lead">Vegas Sports &amp; Hockey is a licensed sports shop in Las Vegas, founded in 1998 and still family owned. Online it trades as Uniform Sports.</p>
          <p>It carries jerseys, fitted caps, tees, hoodies and collectibles across the NFL, NHL, MLB, NBA, NCAA and more, with a strong local focus on the Vegas Golden Knights, Las Vegas Raiders and Las Vegas Aviators.</p>
          <p>Our scope covered the whole journey: a Shopify rebrand and theme upgrade, a CRO audit with a first round of changes, then paid and organic growth on the new foundation.</p>
          <ul class="v-teams" aria-label="Local focus"><li>Vegas Golden Knights</li><li>Las Vegas Raiders</li><li>Las Vegas Aviators</li></ul>
        </div>
        <aside class="v-profile" aria-label="Client snapshot">
          <div class="v-frame v-frame--line v-profile__img"><?php vsh_media( 'client-detail.jpg', 'Licensed merchandise detail', 800, 600, 'Detail: jerseys, fitted caps' ); ?></div>
          <dl>
            <div><dt>Founded</dt><dd>1998, Las Vegas, Nevada</dd></div>
            <div><dt>Years in business</dt><dd>28</dd></div>
            <div><dt>Business</dt><dd>Licensed sports retailer, family owned</dd></div>
            <div><dt>Online store</dt><dd>Uniform Sports, uniformsport.com</dd></div>
          </dl>
        </aside>
      </div>
    </div>
  </section>

  <!-- 04 PLAN: why + scoreboard of goals -->
  <section id="plan" class="v-sec" aria-labelledby="v-plan-title">
    <div class="v-wrap">
      <div class="v-head">
        <div>
          <p class="v-eyebrow">The plan</p>
          <h2 id="v-plan-title" class="v-h2">One team, accountable for the build and the revenue</h2>
        </div>
        <p class="v-head__aside">The client wanted a single partner answerable for the store and for the sales it produced.</p>
      </div>
      <h3 class="v-sub">Why they chose Commerce Pundit</h3>
      <div class="v-why">
        <article><span>A</span><h4>Shopify development depth</h4><p>Theme-level Liquid work, not template swaps. The store needed a structure that could hold hundreds of league, team and brand pages.</p></article>
        <article><span>B</span><h4>Conversion-first thinking</h4><p>Every design choice was checked against the buying path: league, team, product, size, checkout.</p></article>
        <article><span>C</span><h4>Paid and organic together</h4><p>Google Ads, SEO and AI visibility run on the same product and conversion data, so each channel feeds the others.</p></article>
      </div>
      <h3 class="v-sub v-sub--gap">Four goals, each tied to a number we could track</h3>
      <ol class="v-goals">
        <li><b>One clear brand</b><p>Unify the Vegas Sports &amp; Hockey and Uniform Sports identity across storefront, search and ads.</p></li>
        <li><b>Convert more traffic</b><p>Turn browsers into buyers on mobile and desktop with a faster path from league to checkout.</p></li>
        <li><b>Grow qualified traffic</b><p>Reach fans searching for specific teams, players and gear through Google Ads and organic search.</p></li>
        <li><b>Protect return on spend</b><p>Measure every channel against order value so budget goes where it earns.</p></li>
      </ol>
    </div>
  </section>

  <!-- 05 PLAYBOOK: build + timeline merged into four phases -->
  <section id="build" class="v-sec v-sec--black" aria-labelledby="v-build-title">
    <div class="v-wrap">
      <div class="v-head">
        <div>
          <p class="v-eyebrow">The build &middot; The season</p>
          <h2 id="v-build-title" class="v-h2">Six workstreams, each setting up the next</h2>
        </div>
        <p class="v-head__aside">The foundation came first, conversion second and paid traffic third, so every step made the next one pay back more. Weekly figures are sessions and sessions with a cart add, from Shopify Analytics.</p>
      </div>

      <div class="v-start">
        <span class="v-start__when">Before July 2026</span>
        <div><h3>The starting point</h3><p>Store conversion under 0.5% and almost no cart activity from search traffic.</p></div>
      </div>

      <div class="v-phase">
        <div class="v-phase__intro"><span class="v-phase__n">01</span><small>Phase 1</small><h3>Foundation</h3><p>Rebrand, redesign and theme upgrade.</p></div>
        <div class="v-phase__body">
          <div class="v-phase__cards">
            <article class="v-wk"><span class="v-chip">Shopify Rebranding</span><h4>Brand and storefront redesign</h4><p>A new visual identity and a storefront that speaks to fans in their own terms.</p><ul><li>One brand voice across store, search listings and ads</li><li>A homepage organized around league, brand and category</li><li>Trust messaging for shipping, returns and authenticity</li></ul></article>
            <article class="v-wk"><span class="v-chip">Shopify Development</span><h4>Theme upgrade in Shopify</h4><p>A custom Online Store 2.0 theme sized for a catalog of league, team and brand pages.</p><ul><li>League-first header navigation for hundreds of teams</li><li>Loyalty and Google review widgets on the storefront</li><li>Mobile-first layout, since two thirds of visits are on phones</li></ul></article>
          </div>
          <div class="v-ms is-key"><span class="v-ms__when">July 2026</span><div><h5>Rebrand, redesign and theme upgrade go live</h5><p>New identity, league-first storefront and a custom Online Store 2.0 theme on Shopify.</p></div></div>
        </div>
      </div>

      <div class="v-phase">
        <div class="v-phase__intro"><span class="v-phase__n">02</span><small>Phase 2</small><h3>Convert</h3><p>CRO audit, then changes on the buying path.</p></div>
        <div class="v-phase__body">
          <div class="v-phase__cards">
            <article class="v-wk"><span class="v-chip">CRO Audit and Changes</span><h4>Conversion rate optimization</h4><p>A funnel audit, then changes aimed at the steps where shoppers dropped.</p><ul><li>Funnel review from session to cart to checkout</li><li>Device and landing page analysis in Shopify</li><li>Changes to product pages, navigation and the checkout path</li></ul></article>
          </div>
          <div class="v-ms"><span class="v-ms__when">September 2026</span><div><h5>Orders and new customers take off</h5><p>Net sales run 12.7x the May to July monthly average.</p></div></div>
          <div class="v-ms is-key"><span class="v-ms__when">Week of September 28</span><div><h5>Weekly conversion peaks at 3.28%</h5><p>The highest weekly rate in the weeks reviewed. Sessions with a cart add run about 13x the best pre-launch week.</p></div></div>
        </div>
      </div>

      <div class="v-phase">
        <div class="v-phase__intro"><span class="v-phase__n">03</span><small>Phase 3</small><h3>Acquire</h3><p>Google Ads ramp and SEO build-out.</p></div>
        <div class="v-phase__body">
          <div class="v-ms is-key"><span class="v-ms__when">Mid August 2026</span><div><h5>Google Ads starts, ramping gradually</h5><p>Weekly traffic begins to climb as campaigns scale and the new storefront catches the clicks.</p></div></div>
          <div class="v-phase__cards">
            <article class="v-wk"><span class="v-chip">PPC</span><h4>Google Ads</h4><p>Campaigns launched gradually from mid August 2026 and scaled as data came in.</p><ul><li>Phased budget ramp instead of a day-one spend spike</li><li>Team, league and product intent themes</li><li>Weekly review of traffic against Shopify orders</li><li>Budget moved toward what converted</li></ul></article>
            <article class="v-wk"><span class="v-chip">SEO</span><h4>Ecommerce SEO</h4><p>A catalog structure that lets team and league pages rank for how fans actually search.</p><ul><li>Product structured data (JSON-LD) on product pages</li><li>Team and league collections as ranking targets</li><li>Brand name aligned across search listings</li></ul></article>
          </div>
          <div class="v-ms"><span class="v-ms__when">Week of August 31</span><div><h5>Traffic hits 2.5x its pre-launch high</h5><p>Weekly sessions pass the best pre-launch week by about 2.5x. Conversion is still catching up.</p></div></div>
        </div>
      </div>

      <div class="v-phase">
        <div class="v-phase__intro"><span class="v-phase__n">04</span><small>Phase 4</small><h3>Compound</h3><p>AI visibility and ongoing optimization.</p></div>
        <div class="v-phase__body">
          <div class="v-phase__cards">
            <article class="v-wk"><span class="v-chip">AI Visibility</span><h4>AEO and GEO</h4><p>Content and markup shaped so AI assistants and search summaries can read and cite the store.</p><ul><li>Clear, citable facts: founding year, shipping, returns, authenticity</li><li>Product and brand data structured for machine reading</li><li>Brand entity consistency across the web</li></ul></article>
          </div>
          <div class="v-ms"><span class="v-ms__when">October to early November 2026</span><div><h5>The run-rate holds</h5><p>October orders stay near September&rsquo;s level, and early November traffic is about 2.6x the best pre-launch week.</p></div></div>
        </div>
      </div>
      <p class="v-legend"><i></i>Coral-filled markers show the three turning points: the launch, the start of ads and the conversion peak.</p>
    </div>
  </section>

  <!-- 06 STORE: annotated showcase -->
  <section id="store" class="v-sec v-sec--paper" aria-labelledby="v-store-title">
    <div class="v-wrap">
      <div class="v-head">
        <div>
          <p class="v-eyebrow">The storefront</p>
          <h2 id="v-store-title" class="v-h2">A homepage built around how fans shop</h2>
        </div>
        <p class="v-head__aside">Fans arrive with a team in mind. The homepage gets them there in one click and answers their trust questions on the way.</p>
      </div>
      <div class="v-show">
        <div class="v-show__shots">
          <div class="v-frame v-frame--line v-show__desktop"><?php vsh_media( 'storefront-desktop.jpg', 'Uniform Sports homepage on desktop', 1600, 1000, 'Homepage screenshot (desktop)' ); ?></div>
          <div class="v-frame v-frame--phone v-show__phone"><?php vsh_media( 'storefront-mobile.jpg', 'Uniform Sports homepage on mobile', 600, 1200, 'Homepage (mobile)', true ); ?></div>
        </div>
        <ol class="v-notes">
          <li><h3>Hero that sells the lifestyle</h3><p>A fan-first banner carousel sets the tone and leads straight to league shopping.</p></li>
          <li><h3>Trust before the scroll</h3><p>Five points sit directly under the hero, shown in the strip below.</p></li>
          <li><h3>League-first navigation</h3><p>Each league opens its own team list, so shoppers reach the right jersey fast.</p></li>
          <li><h3>A story that earns the click</h3><p>The owner and founding story turn a faceless online shop into the Las Vegas store people already know.</p></li>
          <li><h3>Local teams up front</h3><p>Featured cards for the Golden Knights, Raiders and Aviators match the highest-intent local searches. New Era Fitted and official partners sit in the same block.</p></li>
          <li><h3>Email capture with an offer</h3><p>A first-order discount on the Join The Club signup builds a list the store owns, for abandoned-cart and seasonal campaigns.</p></li>
        </ol>
      </div>
      <ul class="v-trust" aria-label="Trust points under the hero"><li>Free shipping over $75</li><li>Orders out within 24 hours</li><li>30-day returns</li><li>Authenticity guarantee</li><li>Family owned since 1998</li></ul>
      <div class="v-leagues"><b>League-first navigation</b><ul><li>NFL</li><li>NHL</li><li>MLB</li><li>MiLB</li><li>NBA</li><li>NCAA</li><li>WBC</li><li>MLS</li><li>FIFA</li></ul></div>
      <p class="v-also">The page also has an announcement bar, a header with Shop All, By League, New Arrivals, Best Sellers and Sale, a New Arrivals and Best Sellers block, and Shop by Brand and by Category.</p>
    </div>
  </section>

  <!-- 07 RESULTS: mosaic -->
  <section id="results" class="v-sec" aria-labelledby="v-results-title">
    <div class="v-wrap">
      <div class="v-head">
        <div>
          <p class="v-eyebrow">The results</p>
          <h2 id="v-results-title" class="v-h2">Sales, customers and search conversion all stepped up</h2>
        </div>
        <p class="v-head__aside">Figures come from Shopify Admin and Shopify Analytics. Each bar compares the September and October monthly average with the May to July monthly average, shown as 1x.</p>
      </div>
      <div class="v-mosaic">
        <div class="v-tile v-tile--hero"><span class="v-tile__label">Monthly net sales</span><b>10x</b><i style="--w:100%"></i></div>
        <div class="v-tile"><span class="v-tile__label">Search conversion</span><b>9.6x</b><small>From 0.34% to 3.23% of search sessions ordering</small><i style="--w:96%"></i></div>
        <div class="v-tile"><span class="v-tile__label">New customers</span><b>8.6x</b><i style="--w:86%"></i></div>
        <div class="v-tile"><span class="v-tile__label">Completed checkouts</span><b>7.2x</b><i style="--w:72%"></i></div>
        <div class="v-tile"><span class="v-tile__label">Cart-add sessions</span><b>6.2x</b><small>Shoppers adding to cart</small><i style="--w:62%"></i></div>
        <div class="v-tile v-tile--wide"><span class="v-tile__label">Monthly orders</span><b>6.1x</b><i style="--w:61%"></i></div>
        <div class="v-tile v-tile--wide"><span class="v-tile__label">Store conversion rate</span><b>3x</b><small>From 0.47% to 1.40% of all sessions</small><i style="--w:30%"></i></div>
      </div>
      <p class="v-axis">Bars are drawn to scale against the 10x tile.</p>
      <div class="v-read">
        <h3>How to read these numbers</h3>
        <ul>
          <li>The May to July baseline covers the three months before Google Ads scaled.</li>
          <li>Net sales are after discounts and returns. Search is Shopify&rsquo;s referrer class for search engines and covers paid and organic.</li>
          <li>The gains come from the rebrand, the conversion changes and Google Ads working together. The period also overlaps the start of the NFL season, which lifts demand for jerseys, and Shopify cannot split the effect of each factor.</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- 08 WHERE IT CONVERTED: charts -->
  <section id="converted" class="v-sec v-sec--dark" aria-labelledby="v-conv-title">
    <div class="v-wrap">
      <div class="v-head">
        <div>
          <p class="v-eyebrow">Where it converted</p>
          <h2 id="v-conv-title" class="v-h2">Search drove most orders, and most visits came from phones</h2>
        </div>
        <p class="v-head__aside">Last 90 days to mid November 2026, from Shopify Analytics, unless stated.</p>
      </div>
      <div class="v-charts">
        <article class="v-chart v-chart--funnel">
          <h3>Shopping funnel</h3><p class="v-chart__sub">Share of all sessions</p>
          <div class="v-funnel">
            <div><span>Sessions</span><i style="--w:100%"></i><b>100%</b></div>
            <div><span>Sessions with a cart add</span><i style="--w:4.3%"></i><b>4.3%</b></div>
            <div><span>Completed checkouts</span><i style="--w:1.3%"></i><b>1.3%</b></div>
          </div>
          <p class="v-chart__foot">Bars are drawn to scale.</p>
        </article>
        <article class="v-chart">
          <h3>Where orders came from</h3><p class="v-chart__sub">Share of orders since mid August</p>
          <div class="v-donut" style="--p:72"><div><b>72%</b><span>Search</span></div></div>
          <ul class="v-key"><li><i class="k1"></i>Search <b>72%</b></li><li><i class="k0"></i>Direct and other <b>28%</b></li></ul>
          <p class="v-chart__foot">Search visits ran 2.5x the pre-launch level in September and October.</p>
        </article>
        <article class="v-chart">
          <h3>Traffic by device</h3><p class="v-chart__sub">Share of sessions</p>
          <div class="v-donut v-donut--3" style="--a:68;--b:99"><div><b>68%</b><span>Mobile</span></div></div>
          <ul class="v-key"><li><i class="k1"></i>Mobile <b>68%</b></li><li><i class="k2"></i>Desktop <b>31%</b></li><li><i class="k3"></i>Tablet <b>1%</b></li></ul>
          <p class="v-chart__foot">Mobile sessions convert at 1.67%.</p>
        </article>
        <article class="v-chart v-chart--cols">
          <h3>Conversion by source</h3><p class="v-chart__sub">Conversion rate</p>
          <div class="v-cols">
            <div><b>2.88%</b><i style="--h:96%"></i><span>Google</span></div>
            <div><b>0.81%</b><i style="--h:27%"></i><span>Instagram</span></div>
            <div><b>0.47%</b><i style="--h:16%"></i><span>Direct</span></div>
          </div>
          <p class="v-chart__foot">Google referrals convert about 6x direct visits.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- 09 UNDER THE HOOD -->
  <section id="hood" class="v-sec v-sec--paper" aria-labelledby="v-hood-title">
    <div class="v-wrap">
      <div class="v-head">
        <div>
          <p class="v-eyebrow">Under the hood</p>
          <h2 id="v-hood-title" class="v-h2">Built on Shopify, measured end to end</h2>
        </div>
      </div>
      <ul class="v-pills"><li>Shopify</li><li>Online Store 2.0</li><li>Liquid</li><li>Google Ads</li><li>Google Tag Manager</li><li>Shopify Analytics</li><li>Product JSON-LD</li></ul>
      <h3 class="v-sub v-sub--gap">What we keep doing</h3>
      <ol class="v-keep">
        <li><p>Google Ads management, search term review and budget allocation</p></li>
        <li><p>CRO testing on navigation, product pages and the mobile and desktop checkout path</p></li>
        <li><p>SEO for team, league and product pages, including technical and structured data upkeep</p></li>
        <li><p>AI visibility monitoring and content updates for AEO and GEO</p></li>
        <li><p>Shopify theme maintenance, app review and performance monitoring</p></li>
      </ol>
    </div>
  </section>

  <!-- 10 FAQ -->
  <section id="faq" class="v-sec" aria-labelledby="v-faq-title">
    <div class="v-wrap v-faq">
      <div>
        <p class="v-eyebrow">FAQ</p>
        <h2 id="v-faq-title" class="v-h2">Frequently asked questions</h2>
      </div>
      <div class="v-faq__list">
        <details><summary>Why rebrand a Shopify store before running Google Ads?</summary><p>Ads buy traffic, and a store only turns that traffic into orders if shoppers trust it and find products quickly. Fixing identity, navigation and trust signals first means every ad click lands on a page built to convert.</p></details>
        <details><summary>Does Commerce Pundit handle Shopify development, CRO, PPC and SEO together?</summary><p>Yes. One team covers Shopify development, rebranding, theme upgrades, CRO audits and changes, Google Ads, SEO and AI visibility, so each channel works from the same product and conversion data.</p></details>
        <details><summary>How do I start a project like this?</summary><p>Book a free strategy call. We review your store, traffic and goals, then scope the rebrand, CRO and growth work in order of impact.</p></details>
      </div>
    </div>
  </section>

  <!-- 11 MORE CASE STUDIES -->
  <section id="more" class="v-sec v-sec--paper" aria-labelledby="v-more-title">
    <div class="v-wrap">
      <div class="v-head"><div><p class="v-eyebrow">More case studies</p><h2 id="v-more-title" class="v-h2">See more ecommerce results</h2></div></div>
      <div class="v-rels">
        <a class="v-rel" href="https://www.commercepundit.com/pf/big-city-sportswear/"><small>Custom Apparel</small><b>47%</b><span>GMV growth, Big City Sportswear</span></a>
        <a class="v-rel" href="https://www.commercepundit.com/pf/sport-decals/"><small>Custom Apparel</small><b>60%</b><span>Higher conversions, Sport Decals</span></a>
        <a class="v-rel" href="https://www.commercepundit.com/pf/ceptics-india/"><small>Shopify</small><b>4.6x</b><span>Google Ads ROAS, Ceptics India</span></a>
        <a class="v-rel" href="https://www.commercepundit.com/pf/suspension-direct/"><small>Automotive Parts</small><b>+95%</b><span>ROAS, Suspension Direct</span></a>
      </div>
    </div>
  </section>

  <!-- 12 CTA -->
  <section id="cta" class="v-cta" aria-labelledby="v-cta-title">
    <div class="v-wrap v-cta__grid">
      <div class="v-cta__inner">
        <p class="v-eyebrow"><span class="v-dot"></span>The takeaway</p>
        <h2 id="v-cta-title" class="v-cta__title">Nearly 30 years of trust, now working online</h2>
        <p class="v-cta__text">Vegas Sports &amp; Hockey already had a loyal local following. The new Shopify store, a conversion-focused build and paid and organic search now carry that trust online, and the first three months show traffic, cart activity and orders moving together.</p>
        <p class="v-cta__line">Rebrand, convert, advertise and rank your Shopify store with one team.</p>
        <div class="v-cta__actions">
          <a class="v-btn v-btn--light" href="<?php echo esc_url( $cta_url ); ?>">Book a free strategy call</a>
          <a class="v-link v-link--light" href="https://uniformsport.com/" target="_blank" rel="noopener">View website</a>
        </div>
      </div>
      <div class="v-frame v-frame--dark v-cta__img"><?php vsh_media( 'cta-image.jpg', 'Vegas Sports & Hockey', 900, 700, 'Closing image: team gear or storefront', true ); ?></div>
    </div>
  </section>

</main>
<?php get_footer(); ?>
