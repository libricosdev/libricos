<h2>Últimos artículos</h2>
<ul>
<?php
$posts = wp_get_recent_posts(
    array(
        'post_type'      => array('libro', 'review', 'nota', 'autor', 'editorial'),
        'post_status'    => 'publish',
        'posts_per_page' => 4
    )
);
foreach( $posts as $post ){
    // echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a></li> ';
    echo view('../partials/home-item', array(
        'this2' => $post)
    );
}
?>
</ul>
<hr />





<blockquote class="blockquote text-center">
    <p class="mb-0">Un libro que deja huella, deja de ser un libro - forma parte de ti - se convierte en tu librico.</p>
    <footer class="blockquote-footer">Cuando amas un <cite title="Source Title">libro</cite></footer>
</blockquote>

<?php 
use App\Util\Wp;
$tamano_grid = 4;

/*
The template for displaying content in the tpl/home.php template
@see: 
- https://florianbrinkmann.com/en/organizing-files-functions-wordpress-theme-4190/
- https://docs.pods.io/tutorials/get-values-from-a-relationship-field/
*/
$urlBase = get_site_url();

$args = array(
    'taxonomy' => 'genero',
    'hide_empty' => false
);
$terms = get_terms($args);
if($terms){
    echo view('../partials/searchform-complete', array(
        'this2' => (object)[
            'terms' => $terms,
            'placeholder' => 'Busca libricos por temática, título, autor, ...'
        ])
    );
}
?>

<hr />

<h1>Novedades</h1>
<?php
$libros = Wp::get_books_by_category_id(3);
$asins = Wp::get_libros_asins($libros)[0];
$ids = Wp::get_libros_asins($libros)[1];
echo do_shortcode('[amazon box="'.rtrim($asins,',').'" tpl_ids="'.rtrim($ids,',').'" grid="'.$tamano_grid.'" template="my-vertical"]');
?>

<hr />

<h2>Novedades Amazon</h2>
<?php echo do_shortcode('[amazon new="mejores libros" items="12"]');?>





