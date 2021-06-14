const branche = {
    ch_simple_vue_int : [['chambre','chambre_simple','vue_intern'],300],
    ch_simple_vue_ext : [['chambre','chambre_simple','vue_extern'],300+0.2*300],
    ch_double_lit_double_int : [['chambre','chambre_double','lit_double','vue_intern'],450],
    ch_double_lit_double_ext : [['chambre','chambre_double','lit_double','vue_extern'],450+0.2*450],
    ch_double_2lit_int : [['chambre','chambre_double','deux_lit_simple','vue_intern'],450]
};


const enfant_option = {
    option1 : 0.25,
    option2 : 0,
    option3 : 0.5,
    option4 : 1,
    option5 : 0.7
};

let total = {}




/* const nbchild = document.querySelector('#nbchild')
nbchild.addEventListener('input', () => {
    document.querySelector('.children').innerHTML = ''
    for(let i = 1 ; i<= nbchild.value ; i++){ 
        document.querySelector(".children").innerHTML += 

        `
        <span>age enfant ${i} :</span>
        <input style="width: 140px" type="number"
         min="1" max="17"  id="id-age${i}" 
         class="enfant-age form-control"
        />
        <div id="enf-lit${i}"></div>

        `
    }
}) */

const bien_type = document.querySelector("#hotel")
const chambre_type = document.querySelector('.chambre_type')
const nbroom = document.querySelector('#addchambre')



bien_type.addEventListener("change",() => {
    if(bien_type.checked){
    
        document.querySelector('.child').style.display = 'block'
        document.querySelector('.room').style.display = 'block'
        document.querySelector('.pension').style.display = 'block'

        }
    else
    {
        document.querySelector('.child').style.display = 'none'
        document.querySelector('.room').style.display = 'none'
    }
    })
    


    let simplech = 300 ;
    let doublech = 400 ;

nbroom.addEventListener('input', () => {
    document.querySelector('.add_bien').innerHTML = ''
    for(let i = 1 ; i<= nbroom.value ; i++){ 
        
        document.querySelector(".add_bien").innerHTML += 

        `
        <div class="chambre_type${i}">
        <label for="chambre_type">Choose a chambre type:
         <select name="rooms[${i}][typechambre]"id="chambre_type${i}" class="bk-selector form-control">
         <option value="">--select one--</option>
         <option value="chambre_simple">chambre simple</option>
         <option value="chambre_double">chambre double</option>
         </select>
         </label>

 
         </div>
         <div class="bed_type${i} style="display:flex;"></div>
         <div class="vue_type${i}"></div>
         <label>Prix</label><br><input name="prix${i}" style="width: 140px;" type="number" id="prix${i}" value="0" class="form-control" disabled/>

        `
    }
})


document.addEventListener("change", function(e){
    
    for(let j=1; j<=nbroom.value ; j++){
        
    
    if(e.target.id == `chambre_type${j}` &&  (e.target.value == `chambre_simple`)){

        document.querySelector(`.bed_type${j}`).innerHTML =''
        document.querySelector(`.vue_type${j}`).innerHTML =''

        document.querySelector(`.vue_type${j}`).innerHTML =
        
        `
        <label for='vue${j}'>Choose a vue:
        <select name="rooms[${j}][vuetype]" id='vue${j}'  class="bk-selector form-control">
        <option>coose a vue</option>
        <option value="vue_intern">vue intérieure</option>
        <option value="vue_extern">vue extérieure</option>
        </select>
        </label>
        
        `
        document.querySelector(`#prix${j}`).value = simplech;
        




        
    }else if(e.target.id == `chambre_type${j}` &&  (e.target.value == `chambre_double`)){
        document.querySelector(`.vue_type${j}`).innerHTML =''
        document.querySelector(`.bed_type${j}`).innerHTML =''
        document.querySelector(`#prix${j}`).value = doublech;

        document.querySelector(`.bed_type${j}`).innerHTML =
        `
        <label for="bed${j}">Choose a bed:
        <select name="rooms[${j}][typelit]" id="bed${j}" class="bk-selector form-control">
        <option value="">--select one--</option>
        <option value="lit_double">lit double</option>
        <option value="deux_lit_simple">2 lit simple</option>
        </select> 
        `
        


        

    }
}
})

// choose  vue

document.addEventListener("change", function(e){
    for(let a=1; a<=nbroom.value ; a++){
    
        if(e.target.id == `vue${a}` && e.target.value == "vue_intern"){

            document.querySelector(`#prix${a}`).value = simplech +1;
            
            
    }
     else if(e.target.id == `vue${a}` && e.target.value == "vue_extern"){

           document.querySelector(`#prix${a}`).value = simplech +(0.2*300);
     }

           
    }
})





document.addEventListener("change", function(e){
    for(let k=1; k<=nbroom.value ; k++){
    
    if(e.target.id == `bed${k}` && e.target.value == "lit_double"){
        document.querySelector(`#prix${k}`).value = doublech;

        document.querySelector(`.vue_type${k}`).innerHTML =''

        document.querySelector(`.vue_type${k}`).innerHTML =
        
        `
        <label for="Vue${k}">Choose a vue:
        <select name="rooms[${k}][vuetype]" id="Vue${k}"  class="bk-selector form-control">
        <option value="vue_intern">vue intérieure</option>
        <option value="vue_extern">vue extérieure</option>
        </select>
        </label>
        
        `
    }


    else if(e.target.id == `bed${k}` && e.target.value == "deux_lit_simple"){
        document.querySelector(`#prix${k}`).value = doublech;

        document.querySelector(`.vue_type${k}`).innerHTML =''

        document.querySelector(`.vue_type${k}`).innerHTML =
        
        `
        <label for="Vue${k}">Choose a vue:
        <select name="rooms[${k}][vuetype]"  id="Vue${k}"  class="bk-selector form-control">
        <option value="vue_intern">vue intérieure</option>
        </select>
        </label>
        `
    }
}
})

document.addEventListener("change", function(e){
    for(let b=1; b<=nbroom.value ; b++){
    
        if(e.target.id == `Vue${b}` && e.target.value == "vue_intern"){

            document.querySelector(`#prix${b}`).value = doublech;
            
            
    }
     else if(e.target.id == `Vue${b}` && e.target.value == "vue_extern"){

           document.querySelector(`#prix${b}`).value = doublech +(0.2*300);
     }

           
    }
})







// function arrayEquals(a, b) {
//   return Array.isArray(a) &&
//     Array.isArray(b) &&
//     a.length === b.length &&
//     a.every((val, index) => val === b[index]);
// }
// arrayEquals(branche.ch_double_lit_double_int, singleBranch )

const btn = document.querySelector('#reserve')
btn.addEventListener("click", function(){
    let sel =  document.querySelectorAll('.bk-selector')
    var arr = Array.from(sel)
    var singleBranch = []
   
    arr.forEach(function(item , index){
        singleBranch[index] = item.value;
    })

    // console.log(singleBranch);

    switch (JSON.stringify(singleBranch)){

        // case JSON.stringify(branche.bungalow[0]):
        //     console.log(branche.bungalow[1]);
        //     break;

        // case JSON.stringify(branche.appartement[0]):
        //     console.log(branche.appartement[1]);
        //     break;
            
        case JSON.stringify(branche.ch_simple_vue_int[0]):
            console.log(branche.ch_simple_vue_int[1])
            total = branche.ch_simple_vue_int[1]
            break;
            
        case JSON.stringify(branche.ch_simple_vue_ext[0]):
            console.log(branche.ch_simple_vue_ext[1]);
            total = branche.ch_simple_vue_ext[1]
            break;

        case JSON.stringify(branche.ch_double_lit_double_int[0]):
            console.log(branche.ch_double_lit_double_int[1]);
            break;

        case JSON.stringify(branche.ch_double_lit_double_ext[0]):
            console.log(branche.ch_double_lit_double_ext[1]);
            break;

        case JSON.stringify(branche.ch_double_2lit_int[0]):
            console.log(branche.ch_double_2lit_int[1]);
            break;

        default: 
        console.log("please fill in the blanks")
        

    }     
}
)

const nbchild = document.querySelector('#nbchild')
nbchild.addEventListener('input', () => {
    document.querySelector('.children').innerHTML = ''
    for(let i = 1 ; i<= nbchild.value ; i++){ 
        document.querySelector(".children").innerHTML += 

        `
        <span>age enfant ${i} :</span>
        <input style="width: 140px" type="number"
         min="1" max="17"  id="id-age${i}" 
         class="enfant-age form-control"
        />
        <div id="enf-lit${i}"></div>

        `
    }
})

document.addEventListener("input", function(e){
    
    for(let i = 1  ; i<= nbchild.value ; i++){

        
        if(e.target.id == `id-age${i}` && (e.target.value <= 2 &&  e.target.value >= 0)){

            // console.log("enfant A")
            document.querySelector(`#enf-lit${i}`).innerHTML = 
            `
            <label for="">Choose offer:
            <select name="" id="child_offer${i}"  class="enf-option form-control">
            <option value="">--select one--</option>
            <option value="option1">lit supplémentaire</option>
            <option value="option2">pas lit supplémentaire</option>
            </select>
            </label><br>
            <label>Prix</label><br><input name="prix${i}" style="width: 140px;" type="number" id="prix_child${i}" value="0" class="form-control" disabled/>
            `
    }
        
        else if(e.target.id == `id-age${i}` && (2 <e.target.value && e.target.value < 14)){
            // console.log("enfant B")
            document.querySelector(`#enf-lit${i}`).innerHTML = 
            `
            <label for="">Choose offer:
            <select name="" id="child_offer${i}"  class="enf-option form-control">
            <option value="">--select one--</option>
            <option value="option3">in parents chambre simple</option>
            </select>
            </label><br>
            <label>Prix</label><br><input name="prix${i}" style="width: 140px;" type="number" id="prix_child${i}" value="0" class="form-control" disabled/>
            `
        
    }

        else if(e.target.id == `id-age${i}` && (e.target.value >= 14 && e.target.value < 18)){
            // console.log("enfant C")
            document.querySelector(`#enf-lit${i}`).innerHTML = 
            `
            <label for="">Choose offer:
            <select name="" id="child_offer${i}"  class="enf-option form-control">
            <option value="">--select one--</option>
            <option value="option4">chambre simple separeé</option>
            <option value="option5">in parents chambre simple</option>
            </select>
            </label><br>
            <label>Prix</label><br><input name="prix${i}" style="width: 140px;" type="number" id="prix_child${i}" value="0" class="form-control" disabled/>
            `
    }

}

})

document.addEventListener("change", function(e){
    for(let c=1; c<=nbchild.value ; c++){
    
        if(e.target.id == `child_offer${c}` && e.target.value == "option1"){

            document.querySelector(`#prix_child${c}`).value = 300*0.25;
            
            
    }
     else if(e.target.id == `child_offer${c}` && e.target.value == "option2"){

        document.querySelector(`#prix_child${c}`).value = 0;
        
        
}
else if(e.target.id == `child_offer${c}` && e.target.value == "option3"){

    document.querySelector(`#prix_child${c}`).value = 300*0.5;
}
else if(e.target.id == `child_offer${c}` && e.target.value == "option4"){

    document.querySelector(`#prix_child${c}`).value = 300*1;}
    else if(e.target.id == `child_offer${c}` && e.target.value == "option5"){

        document.querySelector(`#prix_child${c}`).value = 300*0.7;}


           
    }
})
var prixp = document.querySelector('#prixp');
var demi = document.querySelector('#demi');
var sans = document.querySelector('#sans');
var complet = document.querySelector('#complet');
var demi_choix = document.querySelector('#demichoix');




demi.addEventListener("change",() => {
    if(demi.checked){
    
        demi_choix.innerHTML = `<br>
        <label for="">Choose offer:
        <select name="" id="demi_ch"  class="form-control">
        <option value="">--select one--</option>
        <option value="peutit dej/dej">peutit dej/dej</option>
        <option value="peutit dej/diner">peutit dej/diner</option>
        </select>
        </label><br>
        
        `
        prixp.innerHTML = `
        <label>Prix</label><br><input name="prixp" style="width: 140px;" type="number" id="prixps" value="0" class="form-control" disabled/>
        
        `
    }
})

document.addEventListener("change", function(e){
    if(e.target.id == `demi_ch` && e.target.value == "peutit dej/dej"){
        document.querySelector('#prixps').value = 250;

    }
    else if(e.target.id == `demi_ch` && e.target.value == "peutit dej/diner"){
        document.querySelector('#prixps').value = 300;

    }

})


    sans.addEventListener("change",() => {
        if(sans.checked){
        
            prixp.innerHTML = `
            <label>Prix</label><br><input name="prixp" style="width: 140px;" type="number" id="prixps" value="0" class="form-control" disabled/>
            
            `
        }
        
})


        complet.addEventListener("change",() => {
            if(complet.checked){
            
                prixp.innerHTML = `
                <label>Prix</label><br><input name="prixp" style="width: 140px;" type="number" id="prixps" value="500" class="form-control" disabled/>
                
                `
            }
            
                
            
            })








btn.addEventListener("click", function(){  
    

const enf= document.querySelectorAll('.enf-option')
let enf_A = Array.from(enf)
let enf_data = []
enf_A.forEach(function(item,index){enf_data[index]=item.value})
console.log(enf_data)

// let total = 300

for(let i = 0  ; i< nbchild.value ; i++){
    switch (enf_data[i]){
        case 'option1':
            console.log(300*enfant_option.option1)

            total += 300*enfant_option.option1
            break;

        case 'option2':
            console.log(300*enfant_option.option2)
            total += 300*enfant_option.option2
            break;

        case 'option3':
            console.log(300*enfant_option.option3)
            total += 300*enfant_option.option3
            break;

        case 'option4':
            console.log(300*enfant_option.option4)
            total += 300*enfant_option.option4
            break;

        case 'option5':
            console.log(300*enfant_option.option5)
            total += 300*enfant_option.option5
            break;

        default: 
        console.log("please fill in the blanks")

}
}
console.log("prix total = "+total)

})