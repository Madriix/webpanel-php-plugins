<?php

class top_countries
{
	public $name = "Top Countries";
	public $author = "Madrix";
	public $version = "1.0";
	public $description = "Display a 'Top Countries' menu in the sidebar.";
	public $email = "";

	function __construct()
	{
		Hook::func(HOOKTYPE_NAVBAR, 'top_countries::add_navbar'); 
	}

	public static function add_navbar(&$pages)
	{
		$page_name = "Top Countries";
		$page_link = "plugins/top_countries/index.php";
		$pages[$page_name] = $page_link;
	}
}