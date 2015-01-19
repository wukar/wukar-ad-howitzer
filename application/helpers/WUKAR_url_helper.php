<?php

if(!function_exists('asset_url')){
	function asset_url($url = '',$protocol = 'http'){
		$url = 'assets/'.$url;
		return get_instance()->config->base_url($url, $protocol);
	}
}