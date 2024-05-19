// déconnexion
var btn = document.querySelector(".logout");

if (btn) {
btn.addEventListener("click", ()=>{
    confirmAction("Voulez-vous vous déconnecter ? ", "/assets/includes/deconnecte.php");
});
}

function confirmAction(text, lien) {
    
    var tito = document.querySelector(".confirme-action-modal");
    
    if (tito) {
        document.body.removeChild(tito);
    }

    var div1 = document.createElement("div");
    div1.classList.add("confirme-action-modal");

    div1.innerHTML = '<div class="confirme-action-content"> <div> <div class="action-text"></div> <div class="action-btn"> <div><a href="" class="action-confirm">Oui</a></div> <div><span class="action-cancel">Non</span></div> </div> </div> </div>';
    
    document.body.appendChild(div1);

    var modal = document.querySelector(".confirme-action-modal");

    var modcontent = document.querySelector(".confirme-action-content");

    modal.style.display = "flex";

    var actionCancel = document.querySelector(".action-cancel");

    var actionConfirm = document.querySelector(".action-confirm");

    var confirmText = document.querySelector(".action-text");

    actionConfirm.setAttribute("href", lien);

    confirmText.innerHTML = text;

    modal.addEventListener("click", ()=>{
        modal.style.display = "none";
    })
    modcontent.addEventListener("click", stopPropagation);

    actionCancel.addEventListener("click", ()=>{
        modal.style.display = "none";
    });

}

// notification
function showContent() {
    if (document.querySelector('.notification')) {
        document.querySelector('.notification').classList.add('charge_fini');
    }
}
setTimeout(showContent, 2000);

//fonction de non propagation de click
function stopPropagation(e){
    e.stopPropagation();
}

function confirmOperation(text, operation, operation2, operation3) {
    var i = 0;
    var tito = document.querySelector(".confirme-action-modal");
    
    if (tito) {
        document.body.removeChild(tito);
    }

    var div1 = document.createElement("div");
    div1.classList.add("confirme-action-modal");

    div1.innerHTML = '<div class="confirme-action-content"> <div> <div class="action-text"></div> <div class="action-btn"> <div><span class="action-confirm">Oui</span></div> <div><span class="action-cancel">Non</span></div> </div> </div> </div>';
    
    document.body.appendChild(div1);

    var modal = document.querySelector(".confirme-action-modal");

    var modcontent = document.querySelector(".confirme-action-content");

    modal.style.display = "flex";

    var actionCancel = document.querySelector(".action-cancel");

    var actionConfirm = document.querySelector(".action-confirm");

    var confirmText = document.querySelector(".action-text");

    actionConfirm.addEventListener("click", ()=>{
        var j = operation();
        console.log(j);
        if (operation2 != 0) {
            operation2();
        }
        if (j==2 && operation3 != 0) {
            operation3();
        }
        modal.style.display = "none";
        i=1;
    });

    confirmText.innerHTML = text;

    modal.addEventListener("click", ()=>{
        if (operation3 != 0) {
            operation3();
        }
        modal.style.display = "none";
        i=0;
    })
    modcontent.addEventListener("click", stopPropagation);

    actionCancel.addEventListener("click", ()=>{
        if (operation3 != 0) {
            operation3();
        }
        modal.style.display = "none";
        i=0;
    });

    return i;
}

// pagination
var precedentC = document.querySelector(".precedent");
var suivantC = document.querySelector(".suivant");
var spNote = document.querySelector(".spnote");
var lesTbody = document.querySelectorAll("tbody");
var total = lesTbody.length;
var iter = 1;

function displayTbody(i){
    lesTbody.forEach(element => {
        element.style.display = "none";
    });

    lesTbody[i-1].style.display = "table-row-group";
}

if (spNote) {
    function updatePagination(a,b){
        if (b==0) {
            spNote.innerHTML = a + "/" + 1;
        }
        else{
            spNote.innerHTML = a + "/" + b;
        }
        
        displayTbody(a);
    }

    updatePagination(iter, total);

    suivantC.addEventListener("click", suivant);
    function suivant(){
        if (iter<total && iter>=1) {
            iter = iter + 1;
        }
        
        updatePagination(iter, total);
    }

    precedentC.addEventListener("click", precedent);
    function precedent(){
        if (iter<=total && iter>1) {
            iter = iter - 1;
        }
        
        updatePagination(iter, total);
    }
}



