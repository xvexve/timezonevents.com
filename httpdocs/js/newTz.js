// script to check form for new tz

// function to add tz to the list
function newAddTzToList(e) {
    const tz=document.querySelector("select[name=newAddTz]").value;

    // check if tz exists
    if (!checkIfTzExists(tz)) {
        return false;
    }

    // check if tz exist in list <li>
    const exists=[...document.querySelectorAll("#newListTz>li")].some(el => el.innerText==tz);
    if (exists) {
        return false;
    }

    createLi(tz);
}

/**
 * Function to create li
 * 
 * @param {string} tz 
 */
function createLi(tz) {
    const ul=document.getElementById("newListTz");
    const li=document.createElement("li");
    const close=document.createElement("div");
    close.addEventListener("click", function() {
        this.parentElement.remove();
        showHideNewListTz();
    });    
    close.classList.add("close");
    li.innerText=tz;
    li.appendChild(close);
    
    ul.appendChild(li);
    ul.style.display="block";
}

function createUrl(e) {
    const url=createUrlForm();
    location.href=url;
}

function createUrlForm() {
    const date=document.querySelector("input[name=date]").value;
    const time=document.querySelector("input[name=time]").value;
    let dt=undefined;
    if (date && time) {
        let values=date.split("-").concat(time.split(":"));
        values.push(0);
        dt=new Date(...values.map(x => parseInt(x)));
        dt.setMonth(dt.getMonth() -1);
    }

    const object = {
        values:{
            txt:document.querySelector("textarea[name=txt]").value.trim().replace(/\n|\r\n/g,"<br>"),
            dt:dt,
            dttz:document.querySelector("select[name=newAddDttz]").value,
            p:document.querySelector("select[name=newPeriodicity]").value,
            tz:[...document.querySelectorAll("#newListTz>li")].map(el => el.innerText).join(",")
        }
    };
    return ope.createUrl.call(object);
}

function clear() {
    document.querySelector("textarea[name=txt]").value="";
    document.querySelector("[name=newAddDttz]").value=getTzUser();
    document.querySelector("[name=date]").value="";
    document.querySelector("[name=time]").value="";
    document.querySelector("[name=newPeriodicity]").value="";
    document.querySelector("[name=newAddTz]").value="";
    document.getElementById("newListTz").innerHTML="";
    showHideNewListTz();
}

function edit() {
    const v=ope.values;
    document.querySelector("textarea[name=txt]").value=unformatText(v.txt);
    document.querySelector("[name=newAddDttz]").value=v.dttz ? v.dttz : getTzUser();
    document.querySelector("[name=date]").value=v.dt ? LeadingZero(v.dt.getFullYear())+"-"+LeadingZero(v.dt.getMonth()+1)+"-"+LeadingZero(v.dt.getDate()) : "";
    document.querySelector("[name=time]").value=v.dt ? LeadingZero(v.dt?.getHours())+":"+LeadingZero(v.dt?.getMinutes()) : "";
    document.querySelector("[name=newPeriodicity]").value=v.p;
    document.querySelector("[name=newAddTz]").value="";
    document.getElementById("newListTz").innerHTML="";
    v.tz.split(",").forEach(el => {
        if (el) {
            createLi(el);
        }
    });
    showHideNewListTz();
}

const showHideNewListTz = () => {
    const ul=document.getElementById("newListTz");
    ul.style.display=ul.querySelectorAll("li").length==0 ? "none" : "block";
};
