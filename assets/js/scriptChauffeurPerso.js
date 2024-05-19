var card = document.querySelector(".card");
var lesTRs = document.querySelectorAll(".uneLigne");

lesTRs.forEach(element => {
    var idcours = element.getElementsByTagName("td")[0].getAttribute("id");
    var idchauffeur = card.getAttribute("id");
    var url = "/assets/includes/courseTermine.php?id1=" + idcours + "&id2=" + idchauffeur;
    var elementBtn = element.querySelector(".encours");
    var lesTD = element.getElementsByTagName("td");
    var message = " Avez-vous fini la course ? ";

    function operation1(){
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var reponse = JSON.parse(xhr.responseText);
                reponse.forEach(function(courses) {
                    lesTD[5].innerHTML = '<span class="btn bg-success text-white m-0 py-1 px-2 terminer"> Terminé </span>';
                });
            }
        };
        xhr.send();
    }

    if (elementBtn) {
        elementBtn.addEventListener("click", ()=>{
            confirmOperation(message, operation1, 0, 0);
        })
    }
    
});






/*function addCourses(){
    var url = "/assets/includes/getChauffeurCourses.php?id=" + card.getAttribute("id");
    var xhr = new XMLHttpRequest(); 
    xhr.open('GET', url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var reponse = JSON.parse(xhr.responseText);
            reponse.forEach(function(courses) {
                                
            });
        }
    };
    xhr.send();
}


setInterval(() => {
    addCourses();
}, 2000);*/

