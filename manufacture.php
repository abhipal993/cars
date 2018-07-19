<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <?php include("header.php"); ?>
        <div class="container" style="border:1px solid #ccc;">
            <div class="col-sm-12 col-md-12 col-xs-12" style="padding-bottom:10px;" >
                <h2>Add Manufacture:</h2>
                <form id="addmanf"   method="post" enctype="multipart/form-data">

                    <div class="col-sm-12 col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="usr">Manufacture:</label>
                            <input type="text" class="form-control" name="man" id="usr">
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="usr">Remarks:</label>
                            <textarea name="remarks"  class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        <button type="submit" onclick="addmanuf();" class="btn btn-danger">Submit</button>
                    </div> </br></br>
                </form> 

            </div>
        </div>
    </body>
    <script>
        function addmanuf() {
            var data = $("#addmanf").serialize();
            ;
            alert(data);
            $.ajax({
                type: "POST",
                url: "add.php",
                data: data,
                success: function (msg) {
                    alert(msg);
                    if (msg == 1)
                    {
                        alert("Insert Sucessfully")
                        location.reload();
                    } else {
                        alert("Error Occur!!")
                    }

                }
            })
        }
    </script>
</html>
