document.getElementById("language").addEventListener("change", function() {
    if (this.value === "FR") {
        window.location.href = "index_fr.html";
    }
    if (this.value === "EN") {
        window.location.href = "index_en.html";
    }
});