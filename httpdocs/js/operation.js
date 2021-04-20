'use strict';
class Operation {
    // content the values for show the clocks
    values={};
    
    constructor() {
        this.getValuesFromUrl(w.location.href);
        this.showRemaining();
        this.showUrl();
    }

    /**
     * Function to create object for show clocks
     * 
     * @param {string} url url from browser
     * 
     * @return {this}
     */
    getValuesFromUrl(url) {
        const params=getURLParameters(url);
        if (Object.entries(params).length==0) {
            // create the event sample
            let tmpDate=new Date();
            tmpDate.setDate(tmpDate.getDate() + 2);
            params.dt=tmpDate.getFullYear+","+tmpDate.getMonth+","+tmpDate.getDate()+",10,0,0";
            params.dttz=getTzUser()=="America/New_York" ? "Europe/London" : "America/New_York";
            params.p="d";
            params.txt=sampleLang.replace("XXX", tmpDate.getDate()).replace("YYY", params.dttz);
        }

        let date=undefined;
        const dttz=checkIfTzExists(params.dttz) ? params.dttz : "";

        // Get date from url param if it is
        let dt=params?.dt?.split(",");
        if (Array.isArray(dt) && dt.length==6 && dttz) {
            dt=dt.map(el => parseInt(el) || 0);
            dt[1]=parseInt(dt[1])-1;
            date=new Date(...dt);
        }

        // get the timezones from url params or string defined
        let tz=(params?.tz && getTzFromString(params.tz)) ? getTzFromString(params.tz) : "";

        if (!dttz && !tz) {
            tz="America/New_York,Europe/London,Europe/Moscow,Asia/Tokyo";
        }
        
        let values={
            txt:formatText(params?.txt || ""),
            dt:date,
            dttz:dttz,
            p:params?.p && ["y", "m", "w", "d"].indexOf(params.p)!=-1 ? params.p : "",
            tz:tz
        };
        this.values=values;

        if (this.values.txt) {
            document.getElementById("txt").style.display="block";
            document.getElementById("txt").innerHTML=this.values.txt;
        }
        return this;
    }

    showRemaining() {
        setInterval(() => {
            if (this.values.dt==undefined || this.values.dttz=="") {
                return;
            } else {
                document.getElementById("remaining").style.display="block";
            }
            let seconds=0;
            if (this.values.dt) {
                seconds=(this.values.dt.getTime()-getDateForTimezone(this.values.dttz, new Date()).getTime())/1000;
            }
            if (seconds>0) {
                document.querySelector("#remaining>span:last-child").innerHTML=formatTimer(seconds);
            } else if (this.values.p) {
                this._findNextDt();
                clock.updateDivHourEnd();
            } else {
                document.querySelector("#remaining>span:last-child").innerHTML="00D 00H 00M 00S";
            }
        },
        1000);
    }

    /**
     * Function to find the next Date time if it has a periodicity.
     */
    _findNextDt() {
        if (this.values.p) {
            this.values.dt={
                "y":getNextYear,
                "m":getNextMonth,
                "w":getNextWeek,
                "d":getNextDay
            }[this.values.p](this.values.dt);
        } else {
            this.values.dt=undefined;
            this.values.dttz="";
        }
    }

    /**
     * Function to show url in input
     */
    showUrl() {
        document.querySelector("#url input").value=this.createUrl();
    }
    
    /**
     * Function to create url from this.values
     * 
     * @return {string} url
     */
    createUrl() {
        let v=this.values;
        let text="?";

        text+=v.dt ? `dt=${v.dt.getFullYear()},${v.dt.getMonth()+1},${v.dt.getDate()},${v.dt.getHours()},${v.dt.getMinutes()},${v.dt.getSeconds()}&` : "";
        text+=v.dttz ? `dttz=${v.dttz}&` : "";
        text+=v.p ? `p=${v.p}&` : "";
        text+=v.tz ? `tz=${v.tz}&` : "";
        text+=v.txt ? `txt=${unformatText(v.txt, false)}&` : "";

        return domain+text.slice(0, -1);
    }

    /**
     * Function to add tz
     * @param {string} tz 
     */
    insertTz(tz) {
        // check if this new tz is correctly and check if this new tz exist in this.values.tz
        if (checkIfTzExists(tz) && checkIfTzExistsInString(this.values.tz, tz)==false && checkIfTzExistsInString(this.values.dttz, tz)==false) {
            this.values.tz+=`,${tz}`;
            clock.addClock("#clocks", tz, this.values.dt);
            this.showUrl();
            return true;
        }
        return false;
    }

    /**
     * Function to remove a tz
     * @param {string}  tz   - time zone to remove
     * @param {boolean} dttz - if it's true, define it's the tz for specific date
     */
    removeTz(tz, dttz=false) {
        if (dttz) {
            const dtText=this.values.dt;
            this.values.dt=undefined;
            this.values.dttz="";
            this.showUrl();
            return dtText!=this.values.dt;
        } else {
            const arrayLength=this.values.tz.length;
            this.values.tz=this.values.tz.split(",").filter(el => el!=tz).join(",");
            this.showUrl();
            return arrayLength!=this.values.tz.length;
        }
    }

    /**
     * Function to create objects from tz received in url
     */
    show() {
        // show clock with Date defined for user
        if (this.values.dttz) {
            clock.addClock("#clocks", this.values.dttz, this.values.dt);
        }
        // show the user tz
        // if tz not is in list tz received for user and not is dttz
        if (checkIfTzExistsInString(this.values.tz, getTzUser())==false && this.values.dttz!=getTzUser()) {
            clock.addClock("#clocks", getTzUser(), this.values.dt);
        }
        this.values.tz.split(",").forEach(tz => {
            if (tz && tz!=this.values.dttz) {
                clock.addClock("#clocks", tz, this.values.dt);
            }
        });
    }
}

const clock=new Clock();
const ope=new Operation();
ope.show();
