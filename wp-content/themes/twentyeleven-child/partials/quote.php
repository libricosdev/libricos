<?php 
$str = '';
if(!empty($citatags)){ 
    $numCitas = count($citatags);
    foreach ( $citatags as $term ) {
        $str .= '<a href="'.get_term_link($term->term_id).'">'.$term->name.'</a>, ';
    }
    $str = rtrim($str, ', ');
}
?>
<div class="mb-3">
    <blockquote class="col-sm-12 blockquote mb-0">
        <i class="fas fa-quote-left fa-2x float-left pl-0 pr-3 pt-0 pb-3"></i>
        <p><?php echo $cita;?></p>
        <footer class="text-right blockquote-footer">
            <?php echo $autorName;?> en <cite title="<?php echo $tituloLibro;?>"><?php echo $shortTitle;?></cite>
        </footer>
    </blockquote>
    <div class="ml-3 text-muted">
        <?php echo $str;?>
    </div> 
</div>