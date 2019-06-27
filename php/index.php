<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
      #form1 {
        width: 100%;
        padding: 50px 0;
        text-align: center;
        background-color: lightblue;
        margin-top: 20px;
      }
      #message {
        width: 100%;
        height: 100px;
        padding: 50px 0;
        text-align: center;
        background-color: red;
        margin-top: 20px;
        display: none;
      }
      </style>

</head>
<body>
    <div class="formwrap">
        <form id="form1">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Select city</label>
              <select class="form-control" id="selectcity">
                <option>1</option>
                <option>2</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">From</label>
              <input type="email" class="form-control" id="from" placeholder="From">
            </div>
            <div class="form-group">
                    <label for="exampleFormControlInput1">To</label>
                    <input type="email" class="form-control" id="to" placeholder="to">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Move Size</label>
                <select class="form-control" id="movesize">
                  <option>1 BHK</option>
                  <option>2 BHK</option>
                  <option>3 BHK</option>
                </select>
              </div>
            <div id="button">
                <input type="button" name="submit" value="Register"  onclick="onregister()"/>
            </div>
          </form>
          <div id="message"><h1>Saved
          <?php
                        $message;
                        ?>
          </h1></div>
    </div>
    <div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
        // var detailsArray=[];
        var objectdata={};
        
        // console.log(objectdata);

        // var de=Object.assign({},detailsArray);s

        function onregister(){
            var x = document.getElementById("form1");
            var y = document.getElementById("message");
            var selectCity=document.getElementById("selectcity").value;
            var from=document.getElementById("from").value;
            var to=document.getElementById("to").value;
            var moveSize=document.getElementById("movesize").value;

            var details={selectCity:selectCity,from:from,to:to,moveSize:moveSize};
            var jsondetails=JSON.stringify(details);
            // detailsArray.push(jsondetails);
            
            
            objectdata=jsondetails;

             console.log(objectdata);

             $.ajax({
                      type : 'POST',
                      //async: false,
                      url  : 'insert.php',
                      data : {inputdata : objectdata },
                      success :function(objectdata){
                        console.log(objectdata);
                        <?php
                        $message;
                        ?>
                          x.style.display="none";
                          y.style.display="block";
                        
                            
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.status);
                        console.log(textStatus);
                        console.log(errorThrown);
                      }
                     });
        }
    </script>
</body>

</html>