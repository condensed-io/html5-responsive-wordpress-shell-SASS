<?php
/*
Template Name: home-template
*/

// Simple home page template that doesn't need a loop for content
// Gets content from advanced custom fields plugin, there's an example of how to grab a field below

?>

<?php get_header(); ?>

<!--BEGIN: Home Section-->
<article>
	<div class="row">
		<!--the advanced custom field examples below can be deleted if you aren't using the plugin-->
		<h1>Headline</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in mi non nunc luctus luctus. Mauris convallis nisi id arcu scelerisque, ut suscipit massa aliquet. Maecenas convallis magna eget malesuada laoreet. Aliquam porta suscipit aliquet. Aliquam massa ipsum, aliquet sed ligula sit amet, tristique molestie massa. Nam et sem elit. Mauris volutpat aliquet nisl, eget porta ligula mattis at. Aenean adipiscing magna a eleifend viverra. Aenean consequat sed neque aliquam dictum. Praesent venenatis fringilla enim ac malesuada. Pellentesque tincidunt mi ac ligula eleifend, non consequat nisi tincidunt. In hac habitasse platea dictumst. Donec dignissim in dolor at facilisis. Morbi et nisl sit amet nisl aliquam varius. In sodales lectus eget ante commodo, faucibus bibendum ligula aliquam.</p>
	</div>
	<!--END: row-->
</article>
<!--END: Home Section-->

<?php get_footer(); ?>