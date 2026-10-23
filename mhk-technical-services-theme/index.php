<?php
/**
 * Main Template File
 *
 * @package MHK_Technical_Services_Theme
 */

get_header();
?>

<main id="primary" class="mhk-site-main">

    <?php if ( is_front_page() || is_home() ) : ?>
        <!-- Hero Introduction Section -->
        <section class="mhk-hero">
            <div class="mhk-container">
                <div class="mhk-hero-content">
                    <span class="mhk-badge">★ Professional Technical Contracting</span>
                    <h1 class="mhk-hero-title">
                        Excellence in <span>Technical Services</span> Across the UAE
                    </h1>
                    <p class="mhk-hero-lead">
                        From precision HVAC systems and electromechanical maintenance to interior carpentry and tiling, MHK Technical Services provides turn-key building solutions for commercial properties and residences.
                    </p>
                    <div class="mhk-hero-buttons">
                        <a href="#services" class="mhk-btn mhk-btn-primary">Our Services</a>
                        <a href="#contact" class="mhk-btn mhk-btn-outline" style="border-color: rgba(255,255,255,0.3); color: #fff;">Get in Touch</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section Anchor -->
        <section id="services" style="padding: 70px 0 30px;">
            <div class="mhk-container">
                <div style="text-align: center; max-width: 680px; margin: 0 auto 50px;">
                    <span class="mhk-badge" style="background: var(--mhk-primary-light); color: var(--mhk-primary-dark); border-color: rgba(43, 179, 2, 0.2);">
                        Core Capabilities
                    </span>
                    <h2 style="font-size: 2.25rem; font-weight: 800; color: var(--mhk-dark); margin-top: 12px; margin-bottom: 12px;">
                        Comprehensive Technical &amp; Maintenance Solutions
                    </h2>
                    <p style="color: var(--mhk-text-muted); font-size: 1.0625rem;">
                        Fully compliant with UAE municipal and civil defense guidelines, executed by experienced certified engineers and craftsmen.
                    </p>
                </div>

                <div class="mhk-posts-grid">
                    <div class="mhk-card">
                        <div class="mhk-card-body">
                            <div style="font-size: 2rem; margin-bottom: 12px;">❄️</div>
                            <h3 class="mhk-card-title">Air Conditioning &amp; Ventilation</h3>
                            <p class="mhk-card-excerpt">
                                Expert AC installations, duct cleaning, air filtration maintenance, chiller servicing, and indoor air quality solutions.
                            </p>
                        </div>
                    </div>

                    <div class="mhk-card">
                        <div class="mhk-card-body">
                            <div style="font-size: 2rem; margin-bottom: 12px;">⚙️</div>
                            <h3 class="mhk-card-title">Electromechanical Equipment</h3>
                            <p class="mhk-card-excerpt">
                                Industrial and commercial electromechanical equipment servicing, power distribution, control panels, and preventive maintenance.
                            </p>
                        </div>
                    </div>

                    <div class="mhk-card">
                        <div class="mhk-card-body">
                            <div style="font-size: 2rem; margin-bottom: 12px;">🧱</div>
                            <h3 class="mhk-card-title">Floor &amp; Wall Tiling</h3>
                            <p class="mhk-card-excerpt">
                                Precision porcelain, marble, and ceramic tile fixing, grouting, waterproofing, and surface preparation for luxury interiors.
                            </p>
                        </div>
                    </div>

                    <div class="mhk-card">
                        <div class="mhk-card-body">
                            <div style="font-size: 2rem; margin-bottom: 12px;">🪵</div>
                            <h3 class="mhk-card-title">Carpentry &amp; Wood Flooring</h3>
                            <p class="mhk-card-excerpt">
                                Custom architectural woodwork, parquet installation, wooden partition framing, cabinetry, and door fitting.
                            </p>
                        </div>
                    </div>

                    <div class="mhk-card">
                        <div class="mhk-card-body">
                            <div style="font-size: 2rem; margin-bottom: 12px;">🏗️</div>
                            <h3 class="mhk-card-title">False Ceilings &amp; Partitions</h3>
                            <p class="mhk-card-excerpt">
                                Gypsum board ceiling design, acoustic ceiling tiles, fire-rated light partitions, and decorative interior work.
                            </p>
                        </div>
                    </div>

                    <div class="mhk-card">
                        <div class="mhk-card-body">
                            <div style="font-size: 2rem; margin-bottom: 12px;">🔧</div>
                            <h3 class="mhk-card-title">Plumbing &amp; Sanitary Repairs</h3>
                            <p class="mhk-card-excerpt">
                                Complete domestic and commercial sanitary fixtures, pipeline replacement, leak inspection, pumps, and water heaters.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Latest News / Articles / Posts -->
    <div class="mhk-container" style="padding-top: 30px;">
        <div class="mhk-page-header">
            <h2 class="mhk-page-title">
                <?php
                if ( is_home() && ! is_front_page() ) {
                    single_post_title();
                } else {
                    esc_html_e( 'Latest Updates & Articles', 'mhk-technical-services' );
                }
                ?>
            </h2>
            <p class="mhk-page-description">
                <?php esc_html_e( 'Insights and maintenance advice from the MHK Technical Services team.', 'mhk-technical-services' ); ?>
            </p>
        </div>

        <?php if ( have_posts() ) : ?>
            <div class="mhk-posts-grid">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'mhk-card' ); ?>>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="mhk-card-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'medium_large' ); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="mhk-card-body">
                            <div class="mhk-card-meta">
                                <span>📅 <?php echo esc_html( get_the_date() ); ?></span>
                                <span>👤 <?php the_author(); ?></span>
                            </div>

                            <h3 class="mhk-card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <div class="mhk-card-excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <div class="mhk-card-footer">
                                <a href="<?php the_permalink(); ?>" class="mhk-btn mhk-btn-outline" style="padding: 6px 14px; font-size: 0.875rem;">
                                    Read Article &rarr;
                                </a>
                            </div>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <!-- Pagination -->
            <div style="margin-bottom: 50px;">
                <?php
                the_posts_pagination( [
                    'mid_size'  => 2,
                    'prev_text' => __( '&larr; Previous', 'mhk-technical-services' ),
                    'next_text' => __( 'Next &rarr;', 'mhk-technical-services' ),
                ] );
                ?>
            </div>

        <?php else : ?>
            <div class="mhk-card" style="padding: 40px; text-align: center;">
                <h3><?php esc_html_e( 'Welcome to MHK Technical Services', 'mhk-technical-services' ); ?></h3>
                <p style="color: var(--mhk-text-muted); margin-top: 10px;">
                    <?php esc_html_e( 'No posts published yet. Stay tuned for expert maintenance and engineering articles.', 'mhk-technical-services' ); ?>
                </p>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php
get_footer();
