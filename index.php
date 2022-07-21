<?php

declare(strict_types=1);

namespace App;

$pageName = $_GET['action'] ?? null;


require_once "head.php";
?>


	<?php if ($pageName === null)
		include("sites/main_page.php");
	?>



	<?php if ($pageName === 'zaloguj_sie')
		include("sites/login_subpage.php");
	?>



	<?php if ($pageName === 'log_out')
		include("logout.php");

	?>



	<?php if ($pageName === 'zarejestruj_sie')
		include("sites/register_subpage.php");
	?>



	<?php if ($pageName === 'userprofile')
		include("sites/userprofile_subpage.php");

	?>



	<?php if ($pageName === "addoffer")
		include("sites/addoffer_subpage.php");

	?>



	<?php if ($pageName === 'editprofile')
		include("sites/editprofile_subpage.php");
	?>



	<?php if ($pageName === 'search')
		include("search.php");
	?>

<!--
	<div id="Footer"> Footer </div>

	</body>
-->