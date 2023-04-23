<?php

class color_user_by_realname
{
	public $name = "Color user by realname [regex]";
	public $author = "Madrix";
	public $version = "1.0";
	public $description = "Color used by realname which I use in the format Chat [0-9]{2}/F/ or [0-9]{2}/H/...";
	public $email = "";

	function __construct()
	{
		if (preg_match("/\/users\/index.php/i", $_SERVER['PHP_SELF'])) {
			Hook::func(HOOKTYPE_FOOTER, 'color_user_by_realname::add');
		}
	}

	public static function add(&$empty)
	{
		GLOBAL $rpc;
		/* Get the user list */
		$users = $rpc->user()->getAll();
	
		$code = "";
		foreach($users as $user)
		{
			if (preg_match("/^[0-9]{2}\/F\//i", $user->user->realname))
			$code .= '$(\'.usertable table tbody tr[value="'.$user->name.'"]\').addClass("girl");';
			else if (preg_match("/^[0-9]{2}\/H\//i", $user->user->realname))
			$code .= '$(\'.usertable table tbody tr[value="'.$user->name.'"]\').addClass("boy");';

		}
		
		echo '<style>
		tr.boy {
			color: #0667ff;
		}
		tr.girl {
			color: #ff00ef;
		}
		</style>
		<script>'.$code.'</script>';
	}
}