/* à compléter */
var bg;

function bascule(){
    if (this.checked){
	bg.setAttribute("disabled","");
    }else{
	bg.removeAttribute("disabled");
    }
}


function brancheLesEcouteurs(){
    var case_a_cocher = document.getElementById("bg");
    bg = document.getElementById("bg1");
    case_a_cocher.addEventListener("change",bascule);
}


window.addEventListener("load", brancheLesEcouteurs);