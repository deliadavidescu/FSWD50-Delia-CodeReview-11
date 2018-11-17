
//Ascending sorting 
function ascSort() {
    for (var i = 0; i < arrayLoc.length; i++) {
        arrayLoc.sort(function (a, b) {
            return Date.parse(a.date) - Date.parse(b.date); //tranforms dates in millisec and compares them
        });
        document.querySelector("#content").innerHTML += "<div class=\"col-lg-3 col-md-6 col-sd-12 py-2\" data-aos=\"zoom-in\" \n                                                    data-aos-duration=\"900\"><div class=\"card\"><img class=\"card-img-top\" src=\"" + arrayLoc[i].image + "\" \n                                                    alt=\"Card image cap\"><div class=\"card-body\"><h5 class=\"card-title\">" + arrayLoc[i].name + "</h5>\n                                                    <p class=\"card-text\">" + arrayLoc[i].address + ", " + arrayLoc[i].zipCode + ", " + arrayLoc[i].city + "</p>\n                                                    <p class=\"font-italic text-secondary\">Created: " + arrayLoc[i].date + " </p></div></div></div>";
    }
    console.log(arrayLoc);
}
//Descending sorting 
function descSort() {
    for (var i = 0; i < arrayLoc.length; i++) {
        arrayLoc.sort(function (a, b) {
            return Date.parse(b.date) - Date.parse(a.date); //tranforms dates in millisec and compares them
        });
        document.querySelector("#content").innerHTML += "<div class=\"col-lg-3 col-md-6 col-sd-12 py-2\" data-aos=\"zoom-in\" \n                                                  data-aos-duration=\"900\"><div class=\"card\"><img class=\"card-img-top\" src=\"" + arrayLoc[i].image + "\" \n                                                  alt=\"Card image cap\"><div class=\"card-body\"><h5 class=\"card-title\">" + arrayLoc[i].name + "</h5>\n                                                  <p class=\"card-text\">" + arrayLoc[i].address + ", " + arrayLoc[i].zipCode + ", " + arrayLoc[i].city + "</p>\n                                                  <p class=\"font-italic text-secondary\">Created: " + arrayLoc[i].date + " </p></div></div></div>";
        console.log(arrayLoc);
    }
}
//Increase likes
var hearts = document.getElementsByClassName("fa-heart");
var likes = document.getElementsByClassName("likes");
var _loop_1 = function (i) {
    hearts[i].addEventListener("click", function () {
        console.log(likes[i]);
        var x = Number(likes[i].textContent) + 1;
        likes[i].innerHTML = x.toString();
    });
};
for (var i = 0; i < hearts.length; i++) {
    _loop_1(i);
}
