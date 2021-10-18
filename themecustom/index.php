<?php get_header(); ?>
 <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
 <div class="container-fluid">
 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
<?php wp_nav_menu([
    'menu' => 'header',
    'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
    'container_class' => 'collapse navbar-collapse',
]); ?>
</div>
</nav> -->
<div class="container">
<?php if (have_posts()) { ?>

    <div class="row">
        <div class="col"><?php customtheme_generate_pagination(); ?>
</div>
    </div>

    <div class="row">

    <?php
    while (have_posts()) {
        the_post(); ?>
    <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="card">
        <h5 class="card-title"><?php the_title(); ?></h5>
        <?php $post_id = get_post_thumbnail_id();
        $alt = get_post_meta($post_id, '_wp_attachment_image_alt', true); ?>
            <!-- <?php the_post_thumbnail('medium'); ?> -->
            <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $alt; ?>">
            <div class="card-body">
                
                <p class="card-text">
                <?php if (has_excerpt()) {
            the_excerpt();
        } else {
            the_content();
        } ?>
                </p>
                <!-- <small><?php the_category(); ?></small> -->
                <?php if (has_category()) {
            $categories = get_the_category();
            foreach ($categories as $category) {
                // var_dump(get_category_link($category));

                // exit;
                $cat_link = get_category_link($category);
                // echo "<a href='{$cat_link}'>{$category->name}</a>";
                // var_dump($category->name);
            }
        } ?>
                <a class="btn btn-primary" href="<?php the_permalink(); ?>">Voir plus</a>

            </div>
        </div>
    </div>
<?php
    } ?>
    </div>
<?php
} else { ?>
    <h2>Aucun article pour le moment</h2>
<?php }
?>

</div>

<?php get_footer(); ?>