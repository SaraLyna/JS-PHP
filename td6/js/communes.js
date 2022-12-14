
window.addEventListener('load',initForm);
function initForm(){
  fetchFromJson('services/getTerritoires.php')
  .then(processAnswer)
  .then(makeOptions);

  document.forms.form_communes.addEventListener("submit", sendForm);

  // décommenter pour le recentrage de la carte :
  //document.forms.form_communes.territoire.addEventListener("change",function(){
  //  centerMapElt(this[this.selectedIndex]);
  //});
}

function processAnswer(answer){
  if (answer.status == "ok")
    return answer.result;
  else
    throw new Error(answer.message);
}


function makeOptions(tab){
  for (let territoire of tab){
    let option = document.createElement('option');
    option.textContent = territoire.nom;
    option.value = territoire.id;
    document.forms.form_communes.territoire.appendChild(option);
    for (let k of ['min_lat','min_lon','max_lat','max_lon']){
      option.dataset[k] = territoire[k];
    }
  }
}


function sendForm(ev){ // form event listener
  ev.preventDefault();
  let args = new FormData (this);
  let url = 'services/getCommunes.php?'+new URLSearchParams(args);
  fetchFromJson(url).then(processAnswer).then(makeCommunesItems);

}


function makeCommunesItems(tab){
  var liste= document.getElementById('liste_communes')listes.style.display="block";
  liste.textContent="";
  for(let commune)

}

function fetchCommune(){

}

function displayCommune(commune){
}

/**
 * Recentre la carte principale autour d'une zone rectangulaire
 * elt doit comporter les attributs dataset.min_lat, dataset.min_lon, dataset.max_lat, dataset.max_lon,
 */
function centerMapElt(elt){
  let ds = elt.dataset;
  map.fitBounds([[ds.min_lat,ds.min_lon],[ds.max_lat,ds.max_lon]]);
}
