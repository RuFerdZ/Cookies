<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
	<?php
		include('headFile.html');
	?>
	<h1>Enter Reviews</h1>
	<br>

	<form action="reviewProcess.php" method="POST">


		<div id="wrapper">
		


				<div id="margin">Title: <input id="title" type="text" name="title" placeholder="Enter title"></div>

		<div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputEmail4">Dentist ID: </label>
		      <input type="textarea" class="form-control" id="input" name="docid">
		    </div>
		 </div>
				<textarea placeholder="Enter Review (Optional)." id="text" name="text" rows="4" style="overflow: hidden; word-wrap: break-word; resize: none; height: 160px; "></textarea>  
				<br>



		</div>




	
		<div class="page">
		  <div class="page__demo">
		    </div>
		    <div class="page__group">  
		      <div class="rating">
		        <input type="radio" name="rating-star2" class="rating__control" id="rc6" value="1">
		        <input type="radio" name="rating-star2" class="rating__control" id="rc7" value="2">
		        <input type="radio" name="rating-star2" class="rating__control" id="rc8" value="3">
		        <input type="radio" name="rating-star2" class="rating__control" id="rc9" value="4">
		        <input type="radio" name="rating-star2" class="rating__control" id="rc10" value="5">
		        <label for="rc6" class="rating__item">
		          <svg class="rating__star">
		            <use xlink:href="#star"></use>
		          </svg>
		          <span class="rating__label">1</span>
		        </label>
		        <label for="rc7" class="rating__item">
		          <svg class="rating__star">
		            <use xlink:href="#star"></use>
		          </svg>
		          <span class="rating__label">2</span>
		        </label>
		        <label for="rc8" class="rating__item">
		          <svg class="rating__star">
		            <use xlink:href="#star"></use>
		          </svg>
		          <span class="rating__label">3</span>
		        </label>
		        <label for="rc9" class="rating__item">
		          <svg class="rating__star">
		            <use xlink:href="#star"></use>
		          </svg>
		          <span class="rating__label">4</span>
		        </label>
		        <label for="rc10" class="rating__item">
		          <svg class="rating__star">
		           	 <use xlink:href="#star"></use>
		          </svg>
		          <span class="rating__label">5</span>
		        </label>	
		      </div>  
		    </div>
		  </div>
		</div>
		<svg xmlns="http://www.w3.org/2000/svg" style="display: none">
		  <symbol id="star" viewBox="0 0 26 28">
		    <path d="M26 10.109c0 .281-.203.547-.406.75l-5.672 5.531 1.344 7.812c.016.109.016.203.016.313 0 .406-.187.781-.641.781a1.27 1.27 0 0 1-.625-.187L13 21.422l-7.016 3.687c-.203.109-.406.187-.625.187-.453 0-.656-.375-.656-.781 0-.109.016-.203.031-.313l1.344-7.812L.39 10.859c-.187-.203-.391-.469-.391-.75 0-.469.484-.656.875-.719l7.844-1.141 3.516-7.109c.141-.297.406-.641.766-.641s.625.344.766.641l3.516 7.109 7.844 1.141c.375.063.875.25.875.719z"/>
		  </symbol>
		</svg>
		<br>

		<button type="submit" class="btn btn-primary btn-lg">Post Review</button>
		<button type="reset" class="btn btn-primary btn-lg">Reset Form</button>
		<br>
	</form>

<?php
		include('footFile.html');
?>
	
</body>
</html>

