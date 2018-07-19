<?php
        //echo 'chandan';die;
        include_once("connection.php");
        $manufac_array = $obj->modalList();
        ?> 
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <style>

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial;
}

/* The grid: Four equal columns that floats next to each other */
.column {
    float: left;
    width: 25%;
    padding: 10px;
}

/* Style the images inside the grid */
.column img {
    opacity: 0.8; 
    cursor: pointer; 
}

.column img:hover {
    opacity: 1;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* The expanding image container */
.containers {
    position: relative;
    display: none;
}

/* Expanding image text */
#imgtext {
    position: absolute;
    bottom: 15px;
    left: 15px;
    color: white;
    font-size: 20px;
}

/* Closable button inside the expanded image */
.closebtn {
    position: absolute;
    top: 10px;
    right: 15px;
    color: white;
    font-size: 35px;
    cursor: pointer;
}


</style>
</head>
<body>

<?php include("header.php"); ?>
<div class="container" style="border:1px solid #ccc;">
	<div class="col-sm-12 col-md-12 col-xs-12" style="padding-bottom:10px;" >
		<h3>Add Manufacture:</h3>
			<table class="table">
             <thead>
				  <tr>
					<th>sr</th>
					<th>Manufacture</th>
					<th>Model</th>
					<th>count</th>
					<th>::</th>
				  </tr>
			</thead>
			<tbody>
			<?php $i=1;
			foreach ($manufac_array as $key => $value) { ?>
			  <tr id="<?php echo $value['id'];?>_row">
				<td><?php echo $i; ?></td>
				<td><?php echo $obj->manu_list($value['menu_id']);?></td>
				<td><?php echo $value['model']; ?></td>
				<td><?php echo $i; ?></td>
				<td> <a class="btn btn-success btn-xs " data-toggle="modal" data-target="#view_modal_<?php echo $value['id'];?>"  title="modify"><i class="fa fa-eye" ></i></a> 
				<div class="modal fade bs-example-modal-xs" id="view_modal_<?php echo $value['id'];?>"" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xs" >
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" >Modal <?php echo $value['model']; ?></h4>
					</div>
					<div class="modal-body ">
							<div class="row">
						  <div class="column">
							<img src="upload/index.jpg" alt="Nature" style="width:100%" onclick="myFunction(this);">
						  </div>
						  <div class="column">
							<img src="upload/index1.jpg" alt="Snow" style="width:100%" onclick="myFunction(this);">
						  </div>
						  
						</div>

						<div class="containers">
						  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
						  <img id="expandedImg" style="width:100%">
						  <div id="imgtext"></div>
						</div>
						
						<table class="table ">
							<tr>
								<td><b>Manufacture: </b></td><td><?php echo $obj->manu_list($value['menu_id']); ?></td><td><b>Modal: </b></td><td><?php echo $value['model']; ?></td>
							</tr>
							<tr>
								<td><b>Registration No : </b></td><td><?php echo $value['reg_no']; ?></td><td><b>Date: </b></td><td><?php echo date('d-m-Y',$value['menu_year']); ?></td>
							</tr>
							<tr>
								<td><b>Color : </b></td><td><?php echo $value['color']; ?></td><td><b>Remarks: </b></td><td><?php echo date('d-m-Y',$value['remark']); ?></td>
							</tr>
						</table>
						<button class="btn btn-danger btn-sm"" onclick=	"sold(<?php echo $value['id'];?>);" >Sold Out</button>
					</div>
					<div class="clearfix"></div>	
				</div>
			</div>
			</div>
		
				</td>
			  </tr>
			<?php $i++; } ?>
			<tbody>
			</table>
		 
	</div>
</div>
	
</body>
<script>
function myFunction(imgs) {
	
    var expandImg = document.getElementById("expandedImg");
    var imgText = document.getElementById("imgtext");
    expandImg.src = imgs.src;
    imgText.innerHTML = imgs.alt;
    expandImg.parentElement.style.display = "block";
}
</script>

<script>
function sold(id){
		
		var data = "id="+id+"&ref=sold";
		//alert(data);
		$.ajax({
			url: "add_model.php",
			data: data,
			method: "post",
			success:function(del){
				if(del=='1')
				{
					alert("Car Sold Out");
				}
				window.location.reload();
			}
		})
	
}
</script>
</html>
