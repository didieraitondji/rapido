var champDroit = document.querySelector("#droit");
var date = new Date();
var ouvreModal = document.querySelector(".ouvreModal");
var laforme = document.querySelector(".laforme");

//insersion de la date sur la page de course
if (champDroit) {
    champDroit.innerHTML = champDroit.textContent + date.getFullYear();
}

// dynamisation du formulaire d'ajout de course
if (ouvreModal) {

    var closebtn = document.querySelector(".close");
    var courseModal = document.querySelector(".courseModal");
    var courseModalContent = document.querySelector(".courseModal-content");
    

    ouvreModal.addEventListener("click", ()=>{
        var modalTitle = document.querySelector(".modalTitle");
        var lesInputs = courseModalContent.getElementsByTagName("input");

        laforme.setAttribute("action", "/assets/includes/addCourse.php");
        modalTitle.innerText = " Renseigner une course ! ";
        lesInputs[0].setAttribute("value", "");
        lesInputs[1].setAttribute("value", "");
        lesInputs[2].setAttribute("value", "");
        lesInputs[3].setAttribute("value", "");
        lesInputs[4].setAttribute("value", "Annuler");
        lesInputs[5].setAttribute("value", "Enrégistrer");
        
        openModalDid();
    });
    closebtn.addEventListener("click", closeModaleDid);
    courseModal.addEventListener("click", closeModaleDid);
    courseModalContent.addEventListener("click", stopPropagation);


    function openModalDid() {
        courseModal.style.display = "block";
    }

    function closeModaleDid() {
        courseModal.style.display = "none";
    }

}

// attribution du chauffeur 
var lesTr = document.querySelectorAll(".uneLigne");

if(lesTr){
    lesTr.forEach(element =>{
        var lesTDS = element.getElementsByTagName("td");
        var selectionChauffeur = element.getElementsByTagName("select")[0];

        var defaultValue = selectionChauffeur.value;

        selectionChauffeur.addEventListener("change", ()=>{
            function operation(){
                var retour = 0;
                var url = selectionChauffeur.getAttribute("id") + selectionChauffeur.value + "&d=" + defaultValue;
                var xhr = new XMLHttpRequest(); 
                xhr.open('GET', url);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var reponse = JSON.parse(xhr.responseText);
                        reponse.forEach(function(courses) {
                            if (courses.statut == 0) {
                                lesTDS[6].innerHTML='<span class="btn bg-warning m-0 py-1 px-2 enattente"> En attente ... </span>';
                                retour += 0;
                            }
                            else if (courses.statut == 1) {
                                lesTDS[6].innerHTML='<span class="btn bg-info m-0 py-1 px-2 encours"> En cours ... </span>';
                                retour += 1;
                            }
                            else{
                                lesTDS[6].innerHTML='<span class="btn bg-success text-white m-0 py-1 px-2 terminer"> Terminée </span>';
                                selectionChauffeur.setAttribute("disabled", "");
                                retour += 2;
                                window.location.reload();
                            }
                            
                        });

                        defaultValue = selectionChauffeur.value;
                    }
                };
                xhr.send();

                return retour;
            }

            function operation2(){
                selectionChauffeur.classList.add("deja")
            }
            
            var contenu = selectionChauffeur.querySelectorAll(".option");
            var message ="";
            
            if (selectionChauffeur.value == -1) {
                message = "Voulez-vous retirer la course au Chauffeur ?";
            }
            else{
                contenu.forEach(elt =>{
                    if (defaultValue == -1) {
                        if ((elt.getAttribute("value")) == selectionChauffeur.value) {
                            message = "Voulez-vous affecter la course au Chauffeur " + elt.textContent + "?";
                        }                        
                    }
                    else{
                        if (selectionChauffeur.classList.contains("deja")) {
                            if ((elt.getAttribute("value")) == selectionChauffeur.value) {
                                message = "Voulez-vous changer et affecter la course au Chauffeur " + elt.textContent + "?";
                            }
                        }
                        else if ((elt.getAttribute("value")) == selectionChauffeur.value) {
                            message = "Voulez-vous affecter la course au Chauffeur " + elt.textContent + "?";
                        }
                    }
                    
                })
            }
            

            function operation3(){
                selectionChauffeur.value = defaultValue;
            }
            
            confirmOperation(message, operation, operation2, operation3);
        });

    })
}

// gestion des tris de cours

//fonction qui affiche une collection
function afficheCollection(collection) {
    collection.forEach(element => {
        element.style.display = "table-row";
    });
}

// fonction pour masquer une collection
function masqueCollection(collection) {
    collection.forEach(element => {
        element.style.display = "none";
    });
}

function ttOune(collection){
    masqueCollection(lesLignes);
    afficheCollection(collection);
}
var trie_course = document.querySelector("#trie_course");
var lesLignes = document.querySelectorAll(".uneLigne");
var lestr0 = document.querySelectorAll("#tr0");
var lestr1 = document.querySelectorAll("#tr1");
var lestr2 = document.querySelectorAll("#tr2");

trie_course.addEventListener("change", ()=>{
    if (trie_course.value == 0) {
        ttOune(lesLignes);
    }
    else if (trie_course.value == 1) {
        ttOune(lestr0);
    }
    else if (trie_course.value == 2) {
        ttOune(lestr1);
    }
    else if (trie_course.value == 3) {
        ttOune(lestr2);
    }
})