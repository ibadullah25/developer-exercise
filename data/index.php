<!DOCTYPE html>
<html>
  <head>
    <title>Warehouse Web Developer Exercise</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
      <div class="container">
        <div class="row">
          <div class="col">
            <h5 class="text-center text-uppercase mt-5">If you like this, you might be into these</h5>
          </div>
        </div>
        <hr>
          <div class="row">
            <?php
				function showProducts($data){
					foreach ($data['hits'] as $row) { 			
						if(isset($row['image'])){
						$img = isset($row['image']['link']) ? $row['image']['link'] : '';
						}else{
							$img = "No-Preview.jpg";
						}
						echo "<div class='col-sm-12 col-md-4 col-lg-3 mb-5'>";
						echo "<img src='$img' class='img-fluid'>";
						echo "<h6 class='mt-2'>" . $row['product_name'] . "</h6>"; 	
						echo "<p> Price £" . $row['price'] . "</p>"; 			
						echo "</div>";
					}
				}

				$data = file_get_contents("recommendations.json");
				$data = json_decode($data,true);

				showProducts($data);
			?>
        </div>
      </div>
    </body>
  </html>