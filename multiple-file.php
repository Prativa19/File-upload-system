
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register Here!!!</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h4 class="text-center">Registration</h4>
				<hr>
				
				<form action="multiple-upload.php" method="POST" enctype="multipart/form-data">

					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">Directory Name:</label>
						<div class="col-sm-12 col-md-9">
							<input type="text" name="dir" class="form-control form-control-sm">
						</div>
					</div>

					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">Image Upload:</label>
						<div class="col-sm-12 col-md-9">
							<input type="file" name="image[]" multiple accept = "image/*" required="">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-12 col-md-9 offset-md-3">
							<button type="reset"  class="btn btn-danger btn-sm">Reset</button>
							<button type="submit"  class="btn btn-success btn-sm">Submit</button>
						</div>
					</div>
					
				</form>

			</div>
		</div>
	</div>
</body>
</html>