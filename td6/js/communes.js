
window.addEventListener('load',initForm);
function initForm(){
  fetchFromJson('services/getTerritoires.php')
  .then(processAnswer)
  .then(makeOptions);

  document.forms.form_communes.addEventListener("submit", sendForm);

  // décommenter pour le recentrage de la carte :
  document.forms.form_communes.territoire.addEventListener("change",function(){
    centerMapElt(this[this.selectedIndex]);
  });
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
  let args = new FormData(this);
  let url = 'services/getCommunes.php?'+new URLSearchParams(args);
  fetchFromJson(url)
  .then(processAnswer)
  .then(makeCommunesItems);
}


function makeCommunesItems(tab){
  var list = document.getElementById('liste_communes')
  list.style.display="block";
  list.textContent="";
  for (let commune of tab){
      let option = document.createElement('li');
      option.textContent = commune.nom;
      for (let k of ['insee','lat','lon','min_lat','min_lon','max_lat','max_lon']){
          option.dataset[k] = commune[k];
    option.addEventListener('mouseover', functions(event){ //question facultative
    centerMapElt(event.target);
    });
    option.addEventListener('click',fetchCommune);
      list.appendChild(option);

      }
    }
}

function fetchCommune(){
  let url = 'services/getDetails.php?insee='+param;
  fetchFromJson(url)
  .then(processAnswer)
  .then(displayCommune);
}

function displayCommune(commune){
  var list = document.getElementById('details')
  list.textContent=""
  createDetailMap(commune)
  for (let k of ['insee','nom','nom_terr','lat','lon','surface','perimetre','pop2016']){
    param = document.createElement('p');
    param.textContent += k + " : " + commune[k]+"\n";

    list.append(param)
  }
}


/**
 * Recentre la carte principale autour d'une zone rectangulaire
 * elt doit comporter les attributs dataset.min_lat, dataset.min_lon, dataset.max_lat, dataset.max_lon,
 */
function centerMapElt(elt){
  let ds = elt.dataset;
  map.fitBounds([[ds.min_lat,ds.min_lon],[ds.max_lat,ds.max_lon]]);
}
