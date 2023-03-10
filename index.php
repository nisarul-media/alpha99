<?php get_header(); ?>
<?php get_template_part( 'template-parts/hero' ); ?>

<!-- Post Loop -->
<div class="posts mt-4">
    <?php
        while( have_posts() ) :
            the_post();
    ?>
    <div class="post" <?php post_class(); ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>
                        <strong><?php the_author(); ?></strong><br/>
                        <?php echo get_the_date('jS F, Y'); ?>
                    </p>
                    <div class="tags">
                        <?php echo get_the_tag_list( '<ul class="list-unstyled"><li>', '</li><li>', '</li></ul>' ) ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <p>
                        <?php
                        if ( has_post_thumbnail() ) {
                            $thumbnail_url = get_the_post_thumbnail_url( null, 'large' );
                            echo '<a href="#" data-featherlight="image">';
                            the_post_thumbnail( 'large', array(
                                'class' => 'img-fluid',
                            ) );
                            echo '</a>';
                        }
                        ?>
                    </p>
                    <?php the_excerpt(); ?>
                </div>
            </div>

        </div>
    </div>
    <?php
        endwhile;
    ?>

    <div class="container post-pagination my-4 py-5">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
                <?php the_posts_pagination( array(
                    'prev_text' => '<< New Posts',
                    'next_text' => 'Old Posts >>',
                ) ); ?>
            </div>
        </div>
    </div>

</div>
<?php get_footer(); ?>