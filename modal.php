<!DOCTYPE html>
<html lang="en"> 
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include("header.php"); ?>

               <div class="container" style="border:1px solid #ccc;">
            <div class="col-sm-12 col-md-12 col-xs-12" style="padding-bottom:10px;" >
                <h2>Add Modal:</h2>
               <form id="addmodel" action=""  method="post" enctype="multipart/form-data" >
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
							<?php
								//echo 'chandan';die;
								include_once("connection.php");
								$manufac_array = $obj->manufactureList();
								?>
                            <label for="sel1">Manufacture</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="designation" data-toggle="modal" href="#Insertmanu" style="color: red;">ADD Manufacture</a>
                            <div class="man">
                                
                                    <select class="form-control" id="manufactre_id" name="manu_id" required="">
                                        <option value="">Please select manufacture</option>
                                        <?php foreach ($manufac_array as $key => $value) { ?>
                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['name']; ?></option>

                                        <?php }
                                        ?>


                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="usr">Modal:</label>
                            <input type="text" class="form-control" id="model"  name="model" required="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="usr">Registration No:</label>
                            <input type="text" class="form-control" id="registration_no" name="reg_no" required="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="usr">Manufacturing Year:</label>
                            <input type="date" class="form-control" id="Manufacturing_Year" name="manu_year" required="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="usr">Remarks:</label>
                            <input type="text" class="form-control" id="remarks"  name="remarks" required="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="usr">Color:</label>
                            <input type="text" class="form-control" id="color" name="color" required="">
                        </div>
                    </div>
                  <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="usr">Image1:</label>
                            <input type="file" class="form-control" name="img1" multiple="multiple" >
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="usr">Image2:</label>
                            <input type="file" class="form-control" name="img1" multiple="multiple"  >
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-6">
                       <button type="submit" onclick="addmodel();" name="submit" class="btn btn-danger">Submit</button>
                    </div> </br></br>
                </form> 

            </div>
        </div>
        <div class="modal fade" id="Insertmanu" role="dialog" >
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3>Add Manufacture</h3> 
                    </div>
                    <div class="modal-body">
                        <form method="post" action="" id="des" enctype="multipart/form-data">
                            <div class="form-group col-sm-12 "> 
                                <input type="hidden" name="c_id" class="form-control" placeholder="Company Id" value="<?php echo $company_id; ?>" required=""> 
                            </div>	

                            <div class="form-group col-sm-12 ">
                                <label>Add Manufacture:</label>
                                <input type="text" name="man" class="form-control" placeholder="Add Manufacture" required=""> 
                            </div>		

                            <div class="form-group col-sm-12 ">
                                <label>Add Details:</label>
                                <input type="text" name="remark" class="form-control" placeholder="Add Details" required=""> 
                            </div>	

                            <div class="col-sm-12">
                                <input type="button" name="submit" onclick="addmanu();" value="Submit" class="btn btn-primary"/>

                            </div>	
                        </form>

                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>	
    </body>
    <script>
        function addmanu() {
            $(".man").html("<i class='fa fa-refresh fa-lg fa-spin'></i>");
            var data = $("#des").serialize();
            $.ajax({
                type: "post",
                url: "insert_profile.php",
                data: data,
                success: function (design) {
                    $("#Insertmanu").hide();
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $(".man").load("new_register.php .man");

                }
            })
        }

        /* function addmodel() {
            //alert();
            var data = $("#addmodel").serialize()+"&ref=model";
               //alert(data);
            $.ajax({
                type: "POST",
                url: "add_model.php",
               
			    data:data,
			    
                success: function (msg) {
                    
                    if (msg == '1')
                    {
                        alert("Inserted Sucessfully")
                        location.reload();
                    } else {
                        alert("Error Occur!!")
                    }

                }
            })
        } */
		
    </script>
	<?php 
	if(isset($_POST['submit']))
	{
		$manu_id=$_POST['manu_id'];
		$modal=$_POST['model'];
		$reg_no=$_POST['reg_no'];
		$manu_year=$_POST['manu_year'];
		$remarks=$_POST['remark'];
		$color=$_POST['color'];
		if($manu_id==""|| $modal="" || $reg_no="" || $manu_year="" || $remarks="" || $color="")
		{
		?>
		<script>
		alert("Please Fill All Form");
		</script>
		<?php
		} else {
			$values=$_POST;
			print_r($values);
			$sql = $obj->addModel($values);
			if($sql)
			{
				?>
			<script>
			alert("Insert Sucessfull");
			</script>
			<?php }else{
			alert("Error occurs");	
			}
		}
	}
	?>
</html>
