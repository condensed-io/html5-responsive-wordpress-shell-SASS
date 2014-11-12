<form method="get" class="search-form" action="<?php bloginfo('home'); ?>/">
	<fieldset>
		<label for="s">Search</label>
		<input placeholder="search" type="text" value="<?php the_search_query(); ?>" name="s" id="s" accesskey="s" tabindex="1" />
		<input class="button" type="submit" value="Go &gt;" />
	</fieldset>
</form>