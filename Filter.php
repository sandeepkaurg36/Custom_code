<?php  /* template Name: filter */?>
<?php get_header();
?>
<div class="main_page">
    <div class="flex_container"> 
        <div class="posts_main">
	        <div class="cat_head">
		    <h3>Categories</h3>
	        </div>
	       <div class="list_posts">
		       <ul>
			   <li>
				<a href="?category=All">All</a>
			  </li>
			   <?php
			   $terms = get_terms('category');
               foreach ( $terms as $term)
                {
                  echo '<li><a href="?category='.$term->slug.'">'.$term->name.'</a></li>';
                }
			   ?>
		       </ul>
	        </div>
        </div>
    </div>
  <div class="posts_content">

      <?php
     $tax_cat = $_GET['category'];
     if($tax_cat=='All' || empty($tax_cat)){
        $tax_cat=array();
        foreach($terms as $term){
            $tax_cat[]=$term->slug;
        }
     }
       $loop = new WP_Query( array
       	( 'post_type' => 'article', 
       	'posts_per_page' => 10,
        'tax_query' => array(array(
            'taxonomy'=>'category',
            'field'=>'slug',
            'terms'=> $tax_cat
        )
        )
    )
        ); 
       ?>

    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="posts_item">
             <div class="entry-content">
    	        <div class="image_post">

                <?php
                // Display the featured image
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail('medium'); // You can change the size to 'thumbnail', 'medium', 'large', 'full', etc.
                }
                ?>
    	        </div>
    	        <?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>
                <?php the_content(); ?>
             </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php get_footer();?>