<?php

class ns_cloner_section_select_source extends ns_cloner_section {
	
	public $modes_supported = array('core');
	public $id = 'select_source';
	public $ui_priority = 100;
	
	function render(){
		$this->open_section_box( $this->id, __("Select Source","ns-cloner") );
		?>
		<select name="source_id">
		  <?php foreach( wp_get_sites(apply_filters('ns_cloner_wp_get_sites_args',array('limit'=>1000))) as $site ): ?>
			<option value="<?php echo $site['blog_id']; ?>">
				<?php $title = get_blog_details($site['blog_id'])->blogname; ?>
				<?php $url = is_subdomain_install()? "$site[domain]" : "$site[domain]$site[path]"; ?>
				<?php echo "$site[blog_id] - ".substr($title,0,30)." ($url)"; ?>
			</option>
		  <?php endforeach; ?>
		</select>
		<p class="description"><?php _e( 'Pick an existing source site to clone. If you haven\'t already, now is a great time to set up a "template" site exactly the way you want the new clone site to start out (theme, plugins, settings, etc.).','ns-cloner' ); ?></p>
		<?php
		$this->close_section_box();
	}
	
}
