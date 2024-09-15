<?php /* template name: form */ ?>

<form method="post">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="John"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="Doe"><br><br>
  <label for="cars">Choose a car:</label>
<?php

  $categories = get_terms(array(
    'taxonomy' => 'movies_categories', // Replace with your custom taxonomy if needed
    'post_type' => 'movies',   // Your custom post type
    'hide_empty' => false,    // Set to true if you only want categories with posts
));

if (!empty($categories) && !is_wp_error($categories)) {
	?>
	<select id="cars" name="cars">
		<?php
    foreach ($categories as $category) {
    	 
        echo '<option>' . esc_html($category->name) . '</option>';
    }
    ?>
    </select>
    <?php
} else {
    echo 'No categories found.';
}
?>
  <input type="submit" value="Submit" name="submit">
</form> 

<?php 
$postTitle = $_POST['fname'];
$post = $_POST['lname'];
$cat = array( $_POST['cars'] );

$submit = $_POST['submit'];
if(isset($submit)){
	echo 'sssssssss';
    global $user_ID;
    $new_post = array(
        'post_title' => $postTitle,
        'post_content' => $post,
        'post_status' => 'publish',
      'tags_input'  => $tags,
        'post_date' => date('Y-m-d H:i:s'),
        'post_author' => $user_ID,
        'post_type' => 'post',
        'post_category' => $cat
    );
    wp_insert_post($new_post,$wp_error);
    print_r($new_post);
}
?>