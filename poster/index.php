<?php include_once('../view/header.php'); ?>
<div>
<div id="page-wrapper">
<div class="container-fluid">

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-fw fa-image"></i> POSTER
</li>
</ol>
</div>
</div>   
	    
	    <div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
		<div class="well text-center">
			<h2><b><a href="/"><span style="color: #3498db">Envie seu Poster!</span></h2>
			<hr>
			<div class="col-md-8 col-md-offset-2">
				<form class="form-inline" method="post" action="">
					<div class="input-group">
						<label class="input-group-btn">
							<span class="btn btn-danger btn-lg">
								Browse&hellip; <input type="file" id="upl" name="upl" style="display: none;" required>
							</span>
						</label>
						<input type="text" class="form-control input-lg" size="40" readonly required>
					</div>
					</div>
					<div class="input-group">
						<input type="submit" class="btn btn-lg btn-primary" value="Start upload">
					</div>
				</form>
				<br>
				<div class="progress" style="display:none">
					<div id="progressBar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
						<span class="sr-only">0%</span>
					</div>
				</div>
				<div class="msg alert alert-info text-left" style="display:none"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<script src="/assets/js/jquery.js"></script>
	<script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/upload.js"></script>
    <script>
	$(function() {
	  $(document).on('change', ':file', function() {
		var input = $(this),
			numFiles = input.get(0).files ? input.get(0).files.length : 1,
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [numFiles, label]);
	  });

	  $(document).ready( function() {
		  $(':file').on('fileselect', function(event, numFiles, label) {

			  var input = $(this).parents('.input-group').find(':text'),
				  log = numFiles > 1 ? numFiles + ' files selected' : label;

			  if( input.length ) {
				  input.val(log);
			  } else {
				  if( log ) alert(log);
			  }

		  });
	  });
	  
	});
	</script>
	<div class="col-lg-12">
<div class="panel panel-primary">
<div class="panel-heading">
</div>
<div class="panel-body">
<center><i aria-hidden="true" class="fa fa-thumbs-o-up fa-fw"></i> click this <a href="/poster/files" class="btn btn-success" style="line-height: 10px; margin-top: -5px;">button 2x</a> to look your files</div></center>
</div>
</div>
<?php include_once('../view/footer.php');?>