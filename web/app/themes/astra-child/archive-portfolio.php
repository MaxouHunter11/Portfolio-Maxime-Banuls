<?php
get_header(); ?>

    <div class="portfolio-archive">
        <h1 class="portfolio-title">Mes réalisations</h1>
        <div class="portfolio-grid">
            <ul>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <li class="portfolio-item">
                    <a href="<?php the_permalink(); ?>">
                        <h2 class="portfolio-item-title"><?php the_title(); ?></h2>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="portfolio-thumbnail">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>
                    </a>
                </li>
            <?php endwhile; endif; ?>
            </ul>
        </div>
    </div>

<?php get_footer();
