<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multiplication table!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
	 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>
  <body>
	<section class="section">
		<div class="hero-body is-one-third">
    <div class="container has-text-centered">
      <h1 class="title">
        Multiplication Table
      </h1>
      <h3 class="subtitle">
        Click somwhere on the matrix to see the result
      </h3>
    </div>
  </div>
	<div class="container">
    <div class="columns is-half is-centered is-narrow has-text-centered" id="first_section"">
		</div>
  </div>
	<div class='column is-narrow'>
    <div class='rows'>
      <div class='row'></div>    
    </div>
  </div>
	<div class="columns is-centered">
		<div class="column is-narrow">
			<table class="table table is-bordered" id ="tbl">
			  <thead>
				<tr>
				  <th></th>
				  <th>1</th>
				  <th>2</th>
				  <th>3</th>
				  <th>4</th>
				  <th>5</th>
				  <th>6</th>
				  <th>7</th>
				  <th>8</th>
				  <th>9</th>
				  <th>10</th>
				</tr>
			  </thead>
			  <tbody>
						
			  </tbody>
			</table>
		</div>
	</div>
	</section>
	<section class="section-padding columns is-half has-text-centered is-centered">
	<div class="is-half form"> 
		<div class="field">
						<label class="label">Result:</label>
			<div class="control">
						<input class="input is-primary has-text-centered" id="result" type="text" placeholder="0">
			</div>
		</div>
	</div>
	</section>
</body>
<script src="./public/js/calculator.js"></script>
</html>