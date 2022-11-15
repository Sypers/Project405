// JavaScript source code
// Ahmad's Scripts
// Load Posts data from database
        function LoadData() {
            var xhttp = XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementsByClassName("col-md-10 col-lg-8 col-xl-7").innerHTML = xhttp.responseText;
                }
            }
            xhttp.open("GET", "getposts.php", false);
            xhttp.send();
            window.alert("EXECUTED");
        }
function gotoPost(title) {
    xhttp.open("GET", "gotopost.php?");
    xhttp.send();
}

function searchResults(str) {
    if (str.length == 0) {
        document.getElementById("livesearch").innerHTML = "";
        document.getElementById("livesearch").style.border = "0px";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("livesearch").innerHTML = this.responseText;
            document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
        }
    }
    xmlhttp.open("GET", "livesearch.php?q=" + str, true);
    xmlhttp.send();

}