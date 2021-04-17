'use strict';

// insert new tz clock
document.querySelector("select[name=tz]").addEventListener("keypress", (e) => {
    if (e.keyCode==13) {
        ope.insertTz(document.querySelector("select[name=tz]").value);
    }
});
document.getElementById("addTz").addEventListener("click", () => ope.insertTz(document.querySelector("select[name=tz]").value));
// copy url
document.querySelector("#url button").addEventListener("click", function() {
    const input=document.querySelector("#url>input");
    input.disabled=false;
    input.select();
    document.execCommand("copy");
    input.disabled=true;
    this.focus();
});

// form add new event
document.getElementById("createEvent").addEventListener("click", () => {
    clear();
    showNew();
});
document.getElementById("editEvent").addEventListener("click", () => {
    edit();
    showNew();
});
document.getElementById("newClose").addEventListener("click", () => newUp.hide());
document.getElementById("newCreate").addEventListener("click", createUrl);
document.getElementById("newAddTz").addEventListener("click", newAddTzToList);

document.addEventListener("keyup", (e) => {
    if (e.key=="Escape") {
        newUp.hide();
    }
});

const showNew = () => {
    newUp.show();
    document.documentElement.scrollTo(0,0);
    setTimeout(() => document.querySelector("textarea[name=txt]").focus(), 500);
};
