<?php

class button_find_regex_for_page_spamfilter
{
	public $name = "Button find for page spamfilter [regex]";
	public $author = "Madrix";
	public $version = "1.0";
	public $description = "For page spamfilter, button find regex without '.' before_'*'. Ideal for locating typos because in case of error it blacklists the world.";
	public $email = "";

	function __construct()
	{
		if (preg_match("/(\/spamfilter.php)/i", $_SERVER['PHP_SELF'])) {
			Hook::func(HOOKTYPE_FOOTER, 'button_find_regex_for_page_spamfilter::add');
		}
	}

	public static function add(&$empty)
	{
		echo '
		<style>
		.hidden {
			display: none;
		}
		</style>
		<script>
			$("#main_contain > p").append("<button type=\"button\" class=\"btn btn-primary ml-4 find-mask\">Find masks without \'.\' before \'*\'</button>");

			$(".find-mask" ).click(function() {
				var regex = /(?<!\.)\*/;
				$("#main_contain table tbody tr").each(function() {
				  var col2Value = $(this).find("td").eq(2).text();
				  if (regex.test(col2Value)) {
					$(this).find("td").parent().removeClass("hidden");
				  } else {
					$(this).find("td").parent().addClass("hidden");
				  }
				});
			});
		</script>';
	}
}