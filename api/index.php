<?php
$host = "localhost";
$username = "root";
$password = "root";

try
{
    $conn = new PDO("mysql:host=$host;dbname=survey", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

$fnameErr = $lnameErr = $emailErr = "";
$fname = $lname = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["fname"])) {
    $fnameErr = "* first name is required";
  } else {
    $fname = test_input($_POST["fname"]);
  }

  if (empty($_POST["lname"])) {
    $lnameErr = "* last name required";
  } else {
    $lname = test_input($_POST["lname"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "* Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

 

  if(!empty($fname) || !empty($email) ||!empty($lname) ){
   //if(isset($_POST['save_contact'])){
      //print_r($_POST);
      header("Location: form.php");
    
      
      $sql = "INSERT INTO contacts(fname,lname,email) VALUES('".$_POST['fname']."', '".$_POST['lname']."','".$_POST['email']."')";
      $conn->query($sql);
    
    //}
    

  }

}





if(isset($_POST['save_coffee'])){
    //print_r($_POST);
    // $aDoor = $_POST['aspect'];
    $rdb_value = $_POST['radio'];
    $rdb_value2 = $_POST['radio1'];

    $consoleArray = $_POST['aspect'];
    $consoleCommaString = " ";
    if ($consoleArray != null && is_array($consoleArray)) {
        foreach ($consoleArray as $consoleValue) {
            $consoleCommaString .= $consoleValue .", ";
        }
    }

    $brandText = $_POST['brand'];
    $brandWhy = $_POST['brandWhy'];
    $brandAndWhy = "";
  
    $brandAndWhy = $brandText." -".$brandWhy;
    //echo $brandAndWhy;


    $sql = "INSERT INTO samplecoffee(c1, c2, spend, favorite,aspects, likecoffee, prefer, brand) VALUES('".$_POST['radio']."', '".$_POST['radio1']."', '".$_POST['radio2']."', '".$_POST['favorite']."','$consoleCommaString','".$_POST['radio4']."','".$_POST['radio5']."', '$brandAndWhy') ";
    $conn->query($sql);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}




?>

<html lang="en">
   <head>
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Coffe Survey</title>
     <link rel="stylesheet" href="./style.css" />
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;1,900&display=swap" rel="stylesheet">
     <script src="https://cdn.tailwindcss.com"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
     <style>
        .aside{
            width: 400px;
        }

    .body{
        background-repeat: none;
        background-size: cover;
        font-family: Arial, Helvetica, sans-serif;
    }

    .hight{
        min-height: 300px;
    }

    .q1{
        display:none;
    }

    .q2{

    }

    .fonts{
      font-family: 'Roboto', sans-serif;
    }

    .fonts-300{
      font-weight: 300;
    }

    .fonts-500{
      font-weight: 500;
    }

    .fonts-900{
      font-weight: 900;
    }

    .error{
      color: red;
    }
    .hver{
        background-color: blue
    }

    #block2{
        
        flex-direction: column;
    }

    .inputbox{
      height: 40px;
    }

    input[type="radio"] {
        -ms-transform: scale(1.2); /* IE 9 */
        -webkit-transform: scale(1.2); /* Chrome, Safari, Opera */
        transform: scale(1.2);
    }
    
    input[type="checkbox"] {
        -ms-transform: scale(1.2); /* IE 9 */
        -webkit-transform: scale(1.2); /* Chrome, Safari, Opera */
        transform: scale(1.2);
    }

    .card{
    transform-style: preserve-3d;
    width: 35rem;
   
    padding: 0rem 5rem;
    box-shadow: 0 20px 20px rgba(0, 0,0, 0.2), 0px  0px 50px rgba(0, 0,0, 0.2);
}

     </style>
   </head>
   <body class="bg-blue-100">
     <div
       id="block1"
       class="flex drop-shadow-md w-[60%] mx-auto mt-[100px]"
     >
            <aside class="aside">
         <img
           src="https://images.pexels.com/photos/6205651/pexels-photo-6205651.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
          alt=""
           class="rounded-l-md h-full"
         />
       </aside>
       <div class="p-5 w-full card rounded-r-md">
         <header>
           <h1 class="text-3xl font-bold text-center uppercase text-blue-800 fonts mb-5">
             Coffee Survery
           </h1>
          
         </header>

         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
           <label for="fname" class="fonts fonts-weight:300 text-lg" >First name:</label><br />
           <div class="flex">
           <input
             id="fname"
            class="border w-full rounded-md  pl-3 inputbox"
             type="text"
            id="fname"
            name="fname"
             
           />
           <span class=" ml-2">* </span>
           </div>
         
           <?php echo $fnameErr;?>
           
          
           <br />
          <label for="lname" class="fonts fonts-weight:300 text-lg" >Last name:</label><br />
          <div class="flex">
          <input
            type="text"
            class="border w-full rounded-md pl-3 inputbox"
             id="lname"
             name="lname"
             
           />
           <span class=" text-blak ml-2">*</span>
          </div>
       
           <?php echo $lnameErr;?>
           
        
           <br />
           <label for="email" class="fonts fonts-weight:300 text-lg" >Email name:</label><br />
           <div class="flex">
           <input
             class="border w-full rounded-md pl-3 inputbox max-w-[97%]"
             type="text"
             id="email"             
             name="email"            
           />
           </div>
         
          
           
        <div class="flex justify-center">
            <input
                class="bg-blue-900 text-white p-3 rounded-md mt-5 w-[160] mx-auto" type="submit" name="save_contact" value="Submit" 
                onclick="myFunction()"
              >
        </div>

         
            
           </input>
         </form>
      </div>
     </div>

    

</div>
</div>

     <script>
      myFunction = () => {
        document.getElementById('block1').style.display = 'none';
        document.getElementById('block2').classList.remove('hidden')
        document.getElementById('block2').classList.add('flex-col')
        var fname = document.getElementById('fname').value;
        var result = 'Hello' + fname;
        document.getElementById('spanResult').textContent = result;

        console.log('it works');
      };
     </script>
</body>/ 
</html>

