<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"libms");
	$query = "delete from authors where author_id = $_GET[aid]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Author Deleted successfully...");
	window.location.href = "manage_author.php";
</script>