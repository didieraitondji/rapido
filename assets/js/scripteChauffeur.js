var champDroit = document.querySelector("#droit");
var date = new Date();
var modifier = document.querySelectorAll(".modifier");
var retirer = document.querySelectorAll(".retirer");
var infoPlus = document.querySelector(".information-plus");
var plus = document.querySelectorAll(".plusbtn");

var imageFormulaire = document.querySelector(".image-formulaire");



if (champDroit) {
    champDroit.innerHTML = champDroit.textContent + date.getFullYear();
}

/* ************************************* ************************** */
// Page chaufeur pour admin 

var ajoutbtn = document.querySelector(".ouvreModal");
var ajoutModal = document.querySelector(".ajoutModal");
var ajoutModalContent = document.querySelector(".ajoutModal-content");
var closebtn = document.querySelector(".close");

if (ajoutbtn) {
    ajoutbtn.addEventListener("click", ()=>{
        var lesInput = document.querySelector(".formemaj").getElementsByTagName("input");

        var lesOptions = document.querySelector(".formemaj").getElementsByTagName("select")[0].getElementsByTagName("option");
        var laForme = document.querySelector(".formemaj");
        laForme.setAttribute("action", "/assets/includes/addChauffeur.php")

        var titre = document.querySelector(".formulaire").getElementsByTagName("h3")[0];

        titre.innerText = "Ajouter Chauffeur ";
        lesInput[0].setAttribute("value", "");
        lesInput[1].setAttribute("value", "");
        lesInput[2].setAttribute("value", "");
        lesInput[3].setAttribute("value", "");
        lesOptions[0].removeAttribute("selected");
        lesOptions[1].removeAttribute("selected");
        lesInput[4].setAttribute("value", "Ajouter Le Chauffeur");
        lesInput[5].setAttribute("value", "Nétoyer les champs");
        lesInput[5].removeEventListener("click", closeModaleDid);

        openModalDid();
    });
}

function openModalDid() {    
    ajoutModal.style.display = "block";
    infoPlus.style.display = "none";
    imageFormulaire.style.display = "grid";
    ajoutModal.scrollTop = 0;
}
function openModalDid2() {    
    ajoutModal.style.display = "block";
    imageFormulaire.style.display = "none";
    infoPlus.style.display = "block";
    ajoutModal.scrollTop = 0;
}

if (closebtn) {
    closebtn.addEventListener("click", closeModaleDid);
}

if (ajoutModal) {
    ajoutModal.addEventListener("click", closeModaleDid);
}

function closeModaleDid(params) {
    ajoutModal.style.display = "none";
    imageFormulaire.style.display = "none";
    infoPlus.style.display = "none";
}

if (ajoutModalContent) {
    ajoutModalContent.addEventListener("click", stopPropagation);
}


// mise en places des modales de modification des informations sur le Chauffeur
if (modifier) {
    modifier.forEach(element => {
        element.addEventListener('click', ()=>{
            var lesTD = document.querySelector("." + element.getAttribute("id")).getElementsByTagName("td");
            var lesInput = document.querySelector(".formemaj").getElementsByTagName("input");
            var lesOptions = document.querySelector(".formemaj").getElementsByTagName("select")[0].getElementsByTagName("option");
            var laForme = document.querySelector(".formemaj");
            laForme.setAttribute("action", lesTD[0].getAttribute("id"));

            var titre = document.querySelector(".formulaire").getElementsByTagName("h3")[0];

            titre.innerText = "Mettre à jour le Chauffeur !";

            lesInput[0].setAttribute("value", lesTD[1].textContent);
            lesInput[1].setAttribute("value", lesTD[2].textContent);
            lesInput[2].setAttribute("value", lesTD[13].textContent);
            lesInput[3].setAttribute("value", lesTD[3].textContent);

            if (lesTD[5].textContent == "M") {
                lesOptions[0].setAttribute("selected","");
            }
            else{
                lesOptions[1].setAttribute("selected","");
            }
            
            lesInput[4].setAttribute("value", "Mettre à jour ");
            lesInput[5].setAttribute("value", "Annuler");
            lesInput[5].addEventListener("click", closeModaleDid);

            openModalDid();
        })
    });
}

if (retirer) {
    retirer.forEach(element => {
        element.addEventListener("click", ()=>{
            confirmAction("Voulez-vous retirer ce Chauffeur ? ", element.getAttribute("id"));
        });
    }); 
}

if (plus) {
    plus.forEach(element => {
        element.addEventListener("click", ()=>{
            openModalDid2();
            var divInfos = document.querySelectorAll(".div-infos");
            var lesTD = document.querySelector("." + element.getAttribute("id")).getElementsByTagName("td");

            var modifierPlus = document.querySelector(".modifierPlus");
            var retirerPlus = document.querySelector(".retirerPlus");
            var resetPasse = document.querySelector(".resetPlus");
            var agirPlus = document.querySelector(".agirPlus")
            
            divInfos[0].innerText = lesTD[1].textContent;
            divInfos[1].innerText = lesTD[2].textContent;
            divInfos[2].innerText = lesTD[13].textContent;
            divInfos[3].innerText = lesTD[4].textContent;
            divInfos[4].innerText = lesTD[3].textContent;
            divInfos[5].innerText = lesTD[5].textContent;
            divInfos[6].innerText = lesTD[6].textContent;
            divInfos[7].innerText = lesTD[7].textContent;
            agirPlus.setAttribute("href", lesTD[9].getElementsByTagName("a")[0].getAttribute("href"));
            
            agirPlus.setAttribute("target", "_blank");

            retirerPlus.addEventListener("click", ()=>{
                var url = lesTD[10].getElementsByTagName("span")[0].getAttribute("id");

                confirmAction("Voulez-vous retirer ce Chauffeur ? ", url);
            });

            resetPasse.addEventListener("click", ()=>{
                var url = lesTD[12].textContent;
                confirmAction("Voulez-vous réinitialiser le mot de passe ?", url);
            });

            modifierPlus.addEventListener("click", ()=>{
                closeModaleDid();
                var lesInput = document.querySelector(".formemaj").getElementsByTagName("input");
                var lesOptions = document.querySelector(".formemaj").getElementsByTagName("select")[0].getElementsByTagName("option");
                var laForme = document.querySelector(".formemaj");
                laForme.setAttribute("action", lesTD[0].getAttribute("id"));

                var titre = document.querySelector(".formulaire").getElementsByTagName("h3")[0];

                titre.innerText = "Mettre à jour le Chauffeur ";

                lesInput[0].setAttribute("value", lesTD[1].textContent);
                lesInput[1].setAttribute("value", lesTD[2].textContent);
                lesInput[2].setAttribute("value", lesTD[13].textContent);
                lesInput[3].setAttribute("value", lesTD[3].textContent);

                if (lesTD[5].textContent == "M") {
                    lesOptions[0].setAttribute("selected","");
                }
                else{
                    lesOptions[1].setAttribute("selected","");
                }
                
                lesInput[4].setAttribute("value", "Mettre à jour ");
                lesInput[5].setAttribute("value", "Annuler");
                lesInput[5].addEventListener("click", closeModaleDid);
                
                setTimeout(function() {
                    openModalDid();
                }, 50);
                
            });

        });
    });
}