<html>
    <head>
        <title>TEST</title>
        <!-- <link rel="stylesheet" type="text/css" href="assets/views/css/bootstrap.css" media='all'> -->
        <link rel="stylesheet" type="text/css" href="assets/views/font-awesome-4.3.0/css/font-awesome.css" media='all'>

        <!-- CSS Files -->
        <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="admin/assets/css/light-bootstrap-dashboard790f.css?v=2.0.1" rel="stylesheet" />

      <!-- Fancybox utilities -->
      <link href="assets/views/js/fancybox/jquery.fancybox2e46.css" rel="stylesheet" />
      


      <!-- lite version -->
      <link href="admin/assets/summernote-new/dist/summernote-lite.css" rel="stylesheet">
      <script src="admin/assets/summernote-new/dist/summernote-lite.js"></script>

      <!-- My custom settings -->
      <link href="admin/assets/css/custom.css" rel="stylesheet" />
    </head>

    <body>
        <div class="col-md-12">
          <div class="col-md-3"></div>
          <div class="col-md-6" style="background-color: #fff !important;">
            <?php
            // class Person {
            //     public $name;

            //     function __construct( $name ) {
            //         $this->name = $name;
            //     }
            // };

            // $jack = new Person('Jack');
            // echo $jack->name;


            // function name($first, $second){
            //     $combine = $first ." ". $second;
            //     return $combine;
            // }

            // echo name('alaba','tunde');

            Class Persons {

                private $name;    // Variable that can only be accessed from within the Person class.
                private $phoneNbr;  // -||-
                
                Function __Construct($personName, $personPhNbr ) {
                    $this->name = $personName;  // Assign the value from the attribute to the class variable $name
                    $this->phoneNbr = $personPhNbr;
                
                }
                
                Public Function getName() {
                    return $this->name;
                }
                
                Public Function getNbr() {
                    return $this->phoneNbr;
                }
                
                Public Function getNamePhone(){
                    $t = $this->name;
                    $r = $this->phoneNbr;
                    return $t ." ".$r;
                }
            }
                
            // add a person by creating a new object
                $p = new Persons("John", "1234");

            // displaying the name of the person stored in the object $p is reffering to
                echo $p->getName()."<br/>"; 

            // displaying the phone number of the person stored in the object $p is reffering to
                //nl2br()
                echo $p->getNbr()."<br/><br/>";
                

                //echo $p->getNamePhone();

                // $x = "45 inches" + "20 inches";
                // echo $x;

                // function GenerateAlphaNumPass($len){
                //     $result = "";
                //       $pickfrom = "1234567ABCDEFGHJKMNPQRSTUVWXYZ";
                //       $charArray = str_split($pickfrom);
                //       for($i = 0; $i < $len; $i++){
                //       $randItem = array_rand($charArray);
                //         $result .= "".$charArray[$randItem];
                //       }
                //       return $result;
                //   }


            // echo md5("BASUFWFMEMBERS")."<br/><br/>";

            // echo $pp = 5*1024;

                $pword1 = "Password11";
				//$pword2 = $_POST["Pword2"];
				$salt = "dilyasSalt";
				$alpha = $pword1.$salt;
                
                var_dump(md5(sha1($alpha)));

                //echo md5(sha1($alpha));

                echo "<br/>";
                //echo strlen("This is me.. Just me in the making..");

            //$name = array("Ada", "Ehi", "chidera");
            
            //$temp = implode(",",  $name)."<br/><br/>";

            //$count = count($name);
            
            // for($i = 0; $i < $count; $i++){
            //     $pp = $name[$i];
            //     echo "The names are: ".$pp."<br/>";
            // }
            //$count++;
            //echo "The names are: ".$pp."<br/>";
            // echo "The names are: ".implode(", ",$name)."<br/><br/>";

            // $str = "A, E, I, O, U, I am a boy";

            // $arr = explode(",", $str);

            // print_r($arr);

            echo"<hr/>";

            class mobile{
              //member variables
              var $price;
              var $title;

              function setTitle($par){
                $this->title = $par;
              }

              function getTitle(){
                echo $this->title." = ";
              }

              function setPrice($par){
                $this->price = $par;
              }

              function getPrice(){
                echo $this->price."<br/>";
              }
            }
            
            $iphone = new mobile();
            $nokia = new mobile();

            $iphone->setTitle("iPhone12");
            $nokia->setTitle("Nokia13");

            $iphone->setPrice(57000);
            $nokia->setPrice(23000);

            $iphone->getTitle().$iphone->getPrice();

            $nokia->getTitle().$nokia->getPrice();

            //////////////////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////////////////

            /* First method to create an associate array. */
            $student_one = array("Maths"=>95, "Physics"=>90,  
                                "Chemistry"=>96, "English"=>93,  
                                "Computer"=>98); 

            /* Second method to create an associate array. */
            $student_two["Maths"] = 95; 
            $student_two["Physics"] = 90; 
            $student_two["Chemistry"] = 96; 
            $student_two["English"] = 93; 
            $student_two["Computer"] = 98; 

            /* Accessing the elements directly */
            echo "Marks for student one is:\n"; 
            echo "Maths:" . $student_two["Maths"], "\n"; 
            echo "Physics:" . $student_two["Physics"], "\n"; 
            echo "Chemistry:" . $student_two["Chemistry"], "\n"; 
            echo "English:" . $student_one["English"], "\n"; 
            echo "Computer:" . $student_one["Computer"], "\n";

            /* Looping through an array using foreach */
            echo "Looping using foreach: \n"; 
            foreach ($student_one as $subject => $marks){ 
                echo "Student one got ".$marks." in ".$subject."\n"; 
            } 
            //echo "This is it";
              
            /* Looping through an array using for */
            echo "\nLooping using for: \n"; 
            $subject = array_keys($student_one); 
            $marks = count($student_one);  
                
            for($i=0; $i < $marks; ++$i) { 
                echo $subject[$i] . ' ' . $student_one[$subject[$i]] . "\n"; 
            } 

        
            ?>

            
        <hr/>
            
        <script>
          //Add the entered values into the array
          let numArray = [];

          //Display "Numbers Added: " 
          function displayText() {
            var result = numArray.reduce((acc, curr) => parseInt(curr) + parseInt(acc), 0);
            var numSumString = "";
            for (data of numArray) {
              numSumString = data + " + " + numSumString;
            }
            document.getElementById("numLabel").innerHTML = "Numbers Added:" + numSumString.substring(0, numSumString.length - 2) + "=" + result;
          }

          function addNum() {
            let num = document.getElementById("numInput").value;
            numArray.push(num);
            document.getElementById("numValue").innerHTML = numArray.join(" ");
          }


          //Reset the page
          function resetPage() {
            //Clear input field
            document.getElementById("numInput").value = "";
            //Hide "Numbers Added: "
            document.getElementById("numLabel").style.display = "none";
            //Clear array items
            numArray = [];
            document.getElementById("numValue").innerHTML = "";
          }
      </script>


      <section>
          <header class="header m-2" id="myForm">Numbers App</header>
          <section class="row m-2">
            <label class="inputLabel">Number: <input type="number" id="numInput"></label>
          </section>
          <button class="button m-1" onclick="addNum();" id="addButton">Add Number</button>
          <button class="button m-1" onclick="displayText();">Calculate</button>
          <button class="button m-1" onclick="resetPage();">Reset</button>
        </section>

  <section id="numForm">
    <div class="numLabel m-2" id="numLabel">Numbers Added: </div>
    <p class="m-2 mt-3" id="numValue"></p>
  </section>

  <script src="script.js"></script>

  <!-- ===============================================================================
  =============================================================================== -->
  <hr/>
  <script>
    let count = 1;
    $('#addMemberMale').click(function () {
        count++;
        dynamicMale(count);
    });
    dynamicMale(count);
    function dynamicMale (number) {
        var html = '' +
            '<div class="form-group">\n' +
            '<label for="memberMale">Male</label>\n' +
            '<input type="text" id="memberMale" name="memberMale[]" class="form-control">\n' +
            '</div>';
        $('#showMemberMale').append(html);
    }
    $('body').on('click','label', function (e) {
        e.preventDefault();
        $(this).next().focus();
    });
    function countUpMale() {
        var memberMale = document.getElementById('memberMale');
        var i = parseInt(memberMale.value, 10);
        memberMale.value = ++i;
    }
  </script>


<div class="row border-danger" id="showMemberMale">

</div>
<div class="row mb-2 bg-white mb-5">
    <div class="w-100 text-center">
        <p>Add a member.</p>
        <a id="addMemberMale" class="bg-warning text-white pt-2 pb-2 pl-3 pr-3 rounded-circle cursor-pointer"><i class="fas fa-plus"></i></a>
    </div>
</div>

           
<script>

// get the element you want to add the button to
var myDiv = document.getElementById("demo");

// create the button object and add the text to it
var button = document.createElement("BUTTON");
button.innerHTML = "Button";

// add the button to the div
myDiv.appendChild(button);

</script>         

<div >
        <p>Add number</p>
        <a id="Button" class="bg-warning text-white pt-2 pb-2 pl-3 pr-3 rounded-circle cursor-pointer"><i class="fas fa-plus"></i></a>
    </div>



      

          </div><!-- col-md-6 ends here -->

        <div class="col-md-3"></div>



      </div><!-- col-md-12 ends here -->

    </body>

</html>