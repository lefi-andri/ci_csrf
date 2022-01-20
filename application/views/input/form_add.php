<?php  
$csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="<?=$csrf['hash'];?>" />
	<title>Judul</title>
	
</head>
<body>



<?php //echo $this->security->get_csrf_token_name(); ?>

<?php echo validation_errors(); ?>

<form action="<?php echo base_url(); ?>add" method="post">


	<!-- <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /> -->

	<?php echo csrf(); ?>
	

	<!-- <input type="hidden" name="<?php echo get_csrf_name(); ?>" value="<?php echo get_csrf_token(); ?>"> -->
	<p>
		<input type="nama" name="nama">
	</p>
	<p>
		<button type="submit">Simpan</button>
	</p>
</form>

<script>
	$.ajaxSetup({
	    headers: {
	        '<?= $this->security->get_csrf_token_name(); ?>': $('meta[name="csrf-token"]').attr('content')
	    }
	});

</script>

</body>
</html>