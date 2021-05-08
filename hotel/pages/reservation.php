<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS Style -->
    <!-- <link rel="stylesheet" href="../css/" /> -->

    <style>
      .child {
        display: none;
      }
      .chambre {
        display: none;
      }

      /* .vue_type {
        display: none;
      } */
    </style>

    <title>Hello, world!</title>



    
  </head>
  <body>
    <div class="container">
      <form method="get">
        <div class="reseverSelectNode">
          <input type="checkbox" id="app" name="appartement" value="appartement" class="" />
          <label for="appt">appartement</label><br />
          <input type="checkbox" id="bang" name="" value="bungalow" class="" />
          <label for="bang">bangalow</label><br />
          <input type="checkbox" id="rooms" name="" value="chambre" class="room"/>
          <label for="rooms">rooms</label>


          <div class="chambre">
            <p>Number of room :</p>
            <input  style="width: 140px" type="number" min="1" max="6" id="nbrroom" class="form-control"/>
            <div class="chambres"></div>
  
            
          </div>
          <!-- <div class="child">
              <p>Number of child :</p>
              <input style="width: 140px" type="number" min="0" max="4" id="nbrchild" class="form-control"/>
              <div class="children"></div>
            </div> --> 

          

          <div class="room_type"></div>
          <div class="bed_type"></div>
          <div class="vue_type"></div>
        </div>

        

        
        
        <br />
        <button type="button" id="reserve" class="btn btn-primary">
          Submit
        </button>
      </form>
    </div>


    <script>
      var rooms = document.querySelector("#rooms");
      var room_type = document.querySelector(".chambres");
      
      


      rooms.addEventListener("change",function(){
        if(rooms.checked){
          
          
          document.querySelector(".chambre").style.display = 'block';
          console.log("hello!!!");
          var nbrroom = document.querySelector("#nbrroom").value;
          console.log(nbrroom);
          room_type.innerHTML='';
          for(let i = 1 ; i<= nbrroom ; i++){
            console.log("hello hello!!!");
            room_type.innerHTML +=`
          
        <span>room type ${i} :</span> 
        <select name="chambre_type" id="chambre_type${i}" class="bk-selector form-control">
          <option value="chambre_simple">chambre simple</option>
          <option value="chambre_double">chambre double</option>
        </select>
        <div id="enf-lit${i}"></div>

        `
        /* '<span>room type ${i} :</span><select name="chambre_type" id="chambre_type" class="bk-selector form-control"><option value="chambre_simple">chambre simple</option><option value="chambre_double">chambre double</option></select>' */

        
      }

        }
      })







var nbrroom = document.querySelector("#nbrroom");
nbrroom.addEventListener("input", function(){
  

        document.querySelector(".chambres").innerHTML='';
        for(let i = 1 ; i<= nbrroom.value ; i++){
          //document.querySelector(".child").style.display = 'block';
          document.querySelector(".chambres").innerHTML +=`
          
          <label for="chambre_type">Choose a chambre type:
        <select name="chambre_type" id="chambre_type" class="bk-selector form-control">

        <option value="chambre_simple">chambre simple</option>
        <option value="chambre_double">chambre double</option>
        </select>
        </label>

        <label for="id-age${i}">child number:
        <input style="width: 140px" type="number"
         min="0" max="6"  id="id-age${i} placeholder="number of child" 
         class="enfant-age form-control"
        /></label>
        <div id="enf-lit${i}"></div>


        `;

        }
      })
      document.addEventListener("change", function(e){
    
    if(e.target.value == "chambre_simple"){

        document.querySelector(".bed_type").innerHTML =''
        document.querySelector(".vue_type").innerHTML =''

        document.querySelector(".vue_type").innerHTML =
        
        `
        <label for="vue">Choose a vue:
        <select name="vue" id="vue"  class="bk-selector form-control">
        
        <option value="vue_intern">vue intérieure</option>
        <option value="vue_extern">vue extérieure</option>
        </select>
        </label>
        
        `
    }else if(e.target.value == "chambre_double"){
        document.querySelector(".vue_type").innerHTML =''
        document.querySelector(".bed_type").innerHTML =''

        document.querySelector(".bed_type").innerHTML =
        `
        <label for="bed">Choose a bed:
        <select name="bed" id="bed" class="bk-selector form-control">
        
        <option value="lit_double">lit double</option>
        <option value="deux_lit_simple">2 lit simple</option>
        </select> 
        `
    }
})


document.addEventListener("change", function(e){
    
    if(e.target.value == "lit_double"){

        document.querySelector(".vue_type").innerHTML =
        
        `
        <label for="vue">Choose a vue:
        <select name="vue" id="vue"  class="bk-selector form-control">
        <option value=""></option>
        <option value="vue_intern">vue intérieure</option>
        <option value="vue_extern">vue extérieure</option>
        </select>
        </label>
        
        `
    }else if(e.target.value == "deux_lit_simple"){
        document.querySelector(".vue_type").innerHTML =
        
        `
        <label for="vue">Choose a vue:
        <select name="vue" id="vue"  class="bk-selector form-control">
        <option value=""></option>
        <option value="vue_intern">vue intérieure</option>
        </select>
        </label>
        `
    }
})




      
      
      


      /* var nbrroom = document.querySelector("#nbrroom");
       nbrroom.addEventListener("input", function(){
        document.querySelector("#chambres").innerHTML='';
        for(let i = 1 ; i<= nbrroom.value ; i++){
          document.querySelector("#chambres").innerHTML +=`
          
        <span>room type ${i} :</span>
        <input style="width: 140px" type="number"
         min="1" max="17"  id="id_room${i}" 
         class="roomtype form-control"
        />
        <div id="enf-lit${i}"></div>

        `;

        }
      })
 */
      /* var nbrchild = document.querySelector("#nbrchild");
      nbrchild.addEventListener("input", function(){
        document.querySelector("#children").innerHTML='';
        for(let i = 1 ; i<= nbrchild.value ; i++){
          document.querySelector("#children").innerHTML +=`
          
        <span>age enfant ${i} :</span>
        <input style="width: 140px" type="number"
         min="1" max="17"  id="id-age${i}" 
         class="enfant-age form-control"
        />
        <div id="enf-lit${i}"></div>

        `;

        }
      })


 */

    </script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    
    <!-- Main Js -->

    
</html>
