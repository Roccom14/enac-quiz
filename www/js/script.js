// Changement de langue
document.getElementById("language").addEventListener("change", function() {
    if (this.value === "FR") {
        window.location.href = "index_fr.html";
    }
    if (this.value === "EN") {
        window.location.href = "index_en.html";
    }
});

// Timer de 60 secondes
var timeLeft = 60;
 
function startTimer() {
    var timer = setInterval(function() {
        timeLeft--;
        document.getElementById("timer").innerHTML = timeLeft;
        if (timeLeft <= 0) {
            clearInterval(timer);
            document.forms[0].submit();
        } else if (timeLeft < 10) { // vérifier si le temps restant est inférieur à 10 secondes
            document.getElementById("timer").style.color = "red"; // changer la couleur en rouge
        }
    }, 1000);
}