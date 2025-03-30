<?php
get_header(); ?>

    <div class="homepage">
        <section class="about">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                <?php endwhile;
            endif;
            ?>
        </section>

        <section class="top-projects">
            <h2>Mes meilleures réalisations</h2>
            <ul class="projects-grid">
                <?php
                $args = array(
                    'post_type' => 'portfolio',
                    'posts_per_page' => 3,
                    'meta_key' => 'meilleure_realisation',
                    'meta_value' => '1'
                );
                $top_projects = new WP_Query($args);
                if ($top_projects->have_posts()) :
                    while ($top_projects->have_posts()) : $top_projects->the_post(); ?>
                        <li class="project-item">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php endif; ?>
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </li>
                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </ul>
        </section>
    </div>

<?php get_footer();
