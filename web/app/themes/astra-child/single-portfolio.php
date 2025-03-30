<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <article class="portfolio-single">
            <h1><?php the_title(); ?></h1>
            <div class="portfolio-content">
                <?php the_content(); ?>
            </div>

            <?php
            // Vérifier et afficher tous les champs ACF
            if (function_exists('get_field')) {
                $fields = get_fields();
                if ($fields) {
                    echo '<div class="acf-fields">';
                    foreach ($fields as $field_name => $value) {
                        // Formatage du nom du champ
                        $formatted_name = ucwords(str_replace('_', ' ', $field_name));
                        echo '<p><strong>' . esc_html($formatted_name) . ':</strong> ';

                        // Gestion des différents types de champs
                        if (is_array($value)) {
                            foreach ($value as $sub_value) {
                                if (is_array($sub_value) && isset($sub_value['url'])) {
                                    // Si c'est une image, l'afficher
                                    echo '<img src="' . esc_url($sub_value['url']) . '" alt="" class="portfolio-image">';
                                } else {
                                    echo esc_html($sub_value) . ', ';
                                }
                            }
                        }  else {
                            echo esc_html($value);
                        }
                        echo '</p>';
                    }
                    echo '</div>';
                }
            }
            ?>
        </article>
    <?php endwhile;
endif;

get_footer();
?>

<style>
    .portfolio-single {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .portfolio-content {
        margin-bottom: 20px;
    }

    .acf-fields p {
        font-size: 16px;
        margin-bottom: 10px;
        color: #333;
    }

    .acf-fields strong {
        color: #000;
    }

    .portfolio-image {
        max-width: 100%;
        height: auto;
        display: block;
        margin-top: 10px;
        border-radius: 5px;
    }
</style>
