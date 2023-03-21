<?php
phpinfo();
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


?>

<html lang="en">
   <head>
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Coffee Survey</title>
     <link rel="stylesheet" href="./style.css" />
     <script src="https://cdn.tailwindcss.com"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
     <link rel="stylesheet" type="text/css" href="//use.fontawesome.com/releases/v5.7.2/css/all.css">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;1,900&display=swap" rel="stylesheet">
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
    .hver{
        background-color: blue
    }

    #block2{
        
        flex-direction: column;
    }

    /* input[type="radio"] {
        -ms-transform: scale(1.2);
        -webkit-transform: scale(1.2); 
    } */

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

    
    input[type="checkbox"] {
        -ms-transform: scale(1.2); /* IE 9 */
        -webkit-transform: scale(1.2); /* Chrome, Safari, Opera */
        transform: scale(1.2);
    }

.option-input {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  top: 13.33333px;
  right: 0;
  bottom: 0;
  left: 0;
  height: 30px;
  width: 30px;
  transition: all 0.15s ease-out 0s;
  background: #cbd1d8;
  border: none;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 0.5rem;
  outline: none;
  position: relative;
  z-index: 1000;
}
.option-input:hover {
  background: #9faab7;
}
.option-input:checked {
  background: #1e3a8a;
}
.option-input:checked::before {
  width: 30px;
  height: 30px;
  display:flex;
  content: '\f00c';
  font-size: 18px;
  font-weight:bold;
  position: absolute;
  align-items:center;
  justify-content:center;
  font-family: "Font Awesome 5 Free";
}
.option-input:checked::after {
  -webkit-animation: click-wave 0.65s;
  -moz-animation: click-wave 0.65s;
  animation: click-wave 0.65s;
  background: #1e3a8a;
  content: '';
  display: block;
  position: relative;
  z-index: 100;
}
.option-input.radio {
  border-radius: 50%;
}
.option-input.radio::after {
  border-radius: 50%;
}

@keyframes click-wave {
  0% {
    height: 30px;
    width: 30px;
    opacity: 0.35;
    position: relative;
  }
  100% {
    height: 200px;
    width: 200px;
    margin-left: -80px;
    margin-top: -80px;
    opacity: 0;
  }
}

.textbox{
    height: 50px;
    border-radius: 4px;
    border-color: lightgray;
}



     </style>
   </head>
   <body class="bg-blue-100">
     
     

     <div
      id="block2"
      class=" drop-shadow-md w-[70%] mx-auto  bg-white hight text-center pb-5">
     <div class="w-full bg-blue-900 text-white text-left py-3.5">
         <span class="pl-5 text-2xl uppercase fonts">  
             Coffee lovers questionnaire
         </span>
      
       
     </div>
     <div class="  mb-4 text-left bg-gray-300 py-2">
     <span class="ml-3 text-xl fonts ">
         Please take some time and fill out the queestionnaire for our company to get a better understanding.
     </span>
     </div>

   
   
     <section id="q1">
        
         <!-- <div class="w-full flex justify-around mt-5 ">
//             <div class="bg-blue-100 rounded-full w-[75px] content-center drop-shadow-md  ]" >
//                 <span class="" style="font-size: 50px">&#8592;</span>
//             </div>

//             <div class="bg-blue-100 rounded-full w-[75px] content-center drop-shadow-md  "  >
//                 <span class="drop-shadow-md" style="font-size: 50px">&#8594;</span>
//             </div>
//         </div>
//      -->

     </section>

     <section id="q2 text-left px-5">
        
       
         <form action="" class="px-5"  method="post">
             <p class="text-left text-xl fonts  mt-5"> 1. What time of day do you usually drink coffee?</p>
             <ul class="text-left flex flex-col  pl-4">
                 <fieldset class="flex flex-col">
                    <div class="flex w-full  content-center">
                        <input type="radio" name="radio"  class="mr-2 option-input radio mt-[8px]" value="morning"/>
                     <label class="mt-2 p-3 fonts text-lg align-middle">Morning</label>
                    </div>
                   
                   <div class="flex w-full content-center">
                   <input type="radio" name="radio"  class="mr-2 option-input radio mt-[8px]" value="noon"/>
                     <label class="mt-2  p-3 text-lg align-middle fonts"> Noon</label>
                   </div>
             
                   <div class="flex w-full content-center">
                   <input type="radio" name="radio"   class="mr-2 option-input radio mt-[8px]" value="evening"/>
                     <label class="mt-2  p-3 text-lg align-middle fonts">Evening</label>

                   </div>
                    
                     <div class="flex w-full content-center">
                     <input type="radio" name="radio"  class="mr-2 option-input radio mt-[8px]"  value="night"/>
                     <label class="mt-2  p-3 text-lg align-middle fonts">Night</label>
                     </div>
                    
                 </fieldset>
             </ul>

             <p class="text-left text-xl fonts  mt-5"> 2. Do you prefer going out for coffee or drinking from home?</p>

             <fieldset>
                 <ul class="text-left flex flex-col pl-4">
                    <div class="flex w-full content-center">

                       <input type="radio" name="radio1" class="mr-2 option-input radio mt-[8px]"  value="going out"/>
                       <label class="mt-2  p-3 text-lg align-middle fonts">Going out</label>
                    </div>

                <div class="flex w-full content-center">
                <input type="radio" name="radio1"  class="mr-2 option-input radio mt-[8px]"  value="drinking at home"/>
                       
                        <label class="mt-2  p-3 text-lg align-middle fonts"> Drinking at home</label>       
                </div>
                    
                      
                      
                 </ul>
             </fieldset>

             <fieldset>
                 <p class="text-left text-xl fonts  mt-5">3. How much do you usually spend when going out for coffee?</p>
                 <ul class="text-left flex flex-col  pl-4">
                    <div class="flex w-full content-center">
                    <input type="radio" name="radio2" value="$3-less" class="mr-2 option-input radio mt-[8px]"/>
                    <label class="mt-2  p-3 text-lg align-middle fonts">
                        
                        $3 - less
                      </label>
                    </div>
                    <div class="flex w-full content-center">
                    <input type="radio" name="radio2" value="$3-$10" class="mr-2 option-input radio mt-[8px]" />
                    <label class="mt-2  p-3 text-lg align-middle fonts">
                         
                        $3 - $10
                       </label>
                    </div>

                    <div class="flex w-full content-center">
                    <input type="radio" name="radio2" value="$10-20"  class="mr-2 option-input radio mt-[8px]" />
                    <label class="mt-2  p-3 text-lg align-middle fonts">
                        
                        $10 - $20
                       </label>

                    </div>

                    <div  class="flex w-full content-center">
                    <input type="radio" name="radio2" value="$20 or more" class="mr-2 option-input radio mt-[8px]" />
                    <label class="mt-2  p-3 text-lg align-middle fonts">
                        
                         $20 or more
                       </label>
                    </div>
                       
                       
                      
                 </ul>
             </fieldset>

             <p  class="text-left text-xl fonts  mt-[50px]">4. What is your favorite coffee drink?</p>
             <input class="border w-[80%]  flex mb-[50px] ml-4 textbox pl-3"  name="favorite" id="" ></input>

             <p  class="text-left text-xl fonts  mt-5">5. What is the most important aspect(s) of your coffee? </p>
             <ul class="text-left ml-5 mb-[50px] ">
                <div class="mb-4">
                <input type="checkbox" id="vehicle1" name="aspect[]" value="Price" class="option-input checkbox">
                 <label for="vehicle1" class="mt-2 text-xl "> Price</label>
                </div>

                <div  class="mb-4">
                <input type="checkbox" id="vehicle2" name="aspect[]" value="Taste" class="option-input checkbox">
                 <label for="vehicle2" class="mt-2 text-xl"> Taste</label>
                </div>

                <div  class="mb-4">
                <input type="checkbox" id="vehicle3" name="aspect[]" value="Easiness to make" class="option-input checkbox">
                 <label for="vehicle3" class="mt-2 text-xl"> Easiness to make </label> <br>
                </div>
                
                <div>
                <input type="checkbox" id="vehicle4" name="aspect[]" value="Other" class="option-input checkbox" onclick="if(this.checked){ document.getElementById('vehicle5').focus();}">
                 <label for="vehicle4" class="mt-2 text-xl"> Other (please specify) </label>
                

                </div>
                <div class="mt-[30px] ">
                <input class="border textbox w-[80%]  flex pl-3" type="text"  name="aspect[]" id="vehicle5" ></input>
                </div>

              

               
                 
                
                
             </ul> 

             <p   class="text-left text-xl fonts  mt-5">6. If you could come up with a new kind of coffee drinnk, which could be easily  made at home without  any machines , what would it be? </p>
             <input class="border textbox w-[80%] flex justify-start ml-4 mb-[50px] pl-3"  name="favoriteCoffee" id="" ></input>

             <p  class="text-left text-xl fonts  mt-5 ">7. Are there any flavours or combinations of coffee that you think should be brought to the market? </p>
             <input class="border textbox  w-[80%] flex justify-start ml-4 mb-[50px] pl-3 "  name="favoriteCoffee" id=""  ></input>

             <p   class="text-left text-xl fonts  mt-5 mb-2">8.How do you like your coffee? </p>

             <fieldset class="bg-slate-100 rounded-full">
                <ul class="flex justify-around mt-[50px]  my-[80px]">
                
                  <li class="flex flex-col text-lg">Weak & Milky
                   <input type="radio" name="radio4" value="weak and milky" class="option-input radio mx-auto">
                   </li> 
     
                  <li class="flex flex-col text-lg">Weak & Black
                  <input type="radio" name="radio4" value="weak and black" class="option-input radio mx-auto">
                  </li> 
                  <li class="flex flex-col text-lg capitalize">Somewhere in the middle
                  <input type="radio" name="radio4" value="somewhere in the middle" class="option-input radio mx-auto">
                  </li> 
                  <li class="flex flex-col text-lg">Strong & Milky
                  <input type="radio" name="radio4" value="strong and milky" class="option-input radio mx-auto">
                  </li> 
                  <li class="flex flex-col text-lg">Strong & Milky
                  <input type="radio" name="radio4" value="strong and milky" class="option-input radio mx-auto">
                  </li> 
                  <li class="flex flex-col text-lg">Strong & Black
                  <input type="radio" name="radio4" value="strong and black" class="option-input radio mx-auto">
                  </li> 
                  
                  </ul>
             </fieldset>

             <p   class="text-left text-xl fonts  mt-5">9.When drinking coffee do you prefer drinking it instantly and quickly or taking your time and enjoying it? </p>
             <fieldset>
                 <ul class="flex flex-col justify-around text-left ml-4 my-4">   
                    <div class="flex w-full content-center">
                    <input type="radio" name="radio5" value="instantly and quickly" class="mr-2 option-input radio mt-[8px]">
                    <label class="mt-2  p-3 text-lg align-middle fonts capitalize">
                        
                    Instantly & quickly
                       </label>
                    
                    </div>

                    <div class="flex w-full content-center">
                    <input type="radio" name="radio5" value="taking time and enjoying it" class="mr-2 option-input radio mt-[8px]">
                    <label class="mt-2  p-3 text-lg align-middle fonts capitalize">Taking time & enjoying it</label>
                    </div>
                 
                                            
                  </ul>
             </fieldset>

            <fieldset>
             <p   class="text-left text-xl fonts  my-5">10.What brands of coffee do you usually buy? And why? (eg: packaging, taste, price, etc) </p>
             <ul>
                 <li class="flex flex-col text-left text-lg">
                     Brand: <input type="text" name="brand" class="border textbox  w-[80%] flex justify-start ml-4 mb-[50px] pl-3 ">
                    Why? <input type="text" name="brandWhy" class="border textbox  w-[80%] flex justify-start ml-4 mb-[50px] pl-3">
                 </li>
             </ul>
            </fieldset>

          
           <input
             class="bg-blue-900 text-white p-3 rounded-md mt-5 w-full" type="submit" name="save_coffee" value="Submit" 
            >
         </form>
                 
     </section>

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

