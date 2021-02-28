'use strict';
class Clock {
    clocks=[];
    size=200;

    constructor() {
        setInterval(() => this.clocks.map(el => el.updateClockHand()) ,1000);
    }

    /**
     * Method for create a drawClock object
     * 
     * @param {string} elementToCreateClock Element to create a <canvas>
     * @param {string} tz                   TimeZone
     * @param {object} dateObject           Date object
     */
    addClock(element, tz, dateObject) {
        this.clocks.push(new DrawClock(element, tz, this.size, dateObject));
    }

    /**
     * Function for resize the clocks
     * 
     * @param {integer} size 
     */
    resize(size) {
        this.clocks.map(el => el.resize(size))
    }

    updateDivHourEnd() {
        this.clocks.map(el => el.setDivHourEnd());
    }

    /**
     * Function to show clocks
     * TODO: remove them
     */
    /*showClocks() {
        this.clocks.map(el => console.log(el));
    }*/
}



class DrawClock {
    /**
     * Constructor
     * 
     * @param {element} elementToCreateClock Element to create a <canvas>
     * @param {string}  tz                   TimeZone
     * @param {int}     size                 Size
     * @param {object}  dateObject           Date object
     */
    constructor(elementToCreateClock, tz, size, dateObject) {
        this.tz=tz ? tz : getTzUser();
        this.size=size;
        this.center=size/2;
        this.date=dateObject instanceof Date ? dateObject : undefined;
        this._createCanvas(elementToCreateClock);
        this._drawClock();
        this.updateClockHand();
    }

    /**
     * Function to resize a clock
     * 
     * @param {int} size New size for a clock
     */
    resize(size) {
        this.size=size;
        this.center=size/2;
        this.canvas.width=size;
        this.canvas.height=size;
        this.updateClockHand();
    }

    /**
     * Fuction to create a canvas and the necessary divs
     * 
     * @param {element} elementToCreateClock Element to create the <canvas>
     */
    _createCanvas(elementToCreateClock) {
        this.canvas=document.createElement('canvas');
        this.context = this.canvas.getContext("2d");
        this.canvas.width=this.size;
        this.canvas.height=this.size;

        // Div wrapper
        this.div=document.createElement("div");
        this.div.classList.add("clock");
        if (ope.values.dttz==this.tz) {
            this.div.classList.add("dttz");
        } else if (getTzUser()==this.tz) {
            this.div.classList.add("tzuser");
        }

        // Close button
        const divClose=document.createElement("div");
        divClose.classList.add("close");
        divClose.addEventListener("click", () => {
            ope.removeTz(this.tz, this.div.classList.contains("dttz"));
            this.div.remove()
        });
        this.div.appendChild(divClose);

        // Title. Show timezone
        const divTz=document.createElement("div");
        divTz.innerHTML=`<h3>${this.tz}</h3>`;

        // Div to show end hour in every tz
        const divHourEnd=document.createElement("div");

        // Div to show actual hour
        const divHour=document.createElement("div");

        this.div.appendChild(divTz);
        this.div.appendChild(divHourEnd);
        this.div.appendChild(this.canvas);
        this.div.appendChild(divHour);

        this.setDivHourEnd();
        document.querySelector(elementToCreateClock).appendChild(this.div);
    }

    setDivHourEnd() {
        if (ope.values.dt && ope.values.dttz && this.tz) {
            let date=getDateForTimezone(this.tz, ope.values.dt);
            if (date) {
                const seconds=getOffsetTimezone(ope.values.dttz);
                date.setSeconds(date.getSeconds() - seconds);
                this.div.querySelector("div:nth-child(3)").innerHTML=date.toLocaleDateString()+"<br>"+date.toLocaleTimeString([], {hour:'2-digit', minute:'2-digit', second:'2-digit'});
            }
        }
    }

    /**
     * Function called for a draw clock
     */
    _drawClock() {
        // limpiamos el canvas entero
        let context = this.context;
        context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    
        // dibujamos el circulo
        context.lineWidth=1;
        context.beginPath();
        context.strokeStyle="#808080";
        context.arc(this.center, this.center, this.center-10, 0, 2*Math.PI);
        context.stroke();
    
        // dibujamos la linea de los segundos 1, 2, 3, ...
        for (let i=0;i<60;i++) {
            let start_x = this.center+Math.round((this.center-15)*Math.cos(6*i*Math.PI/180));
            let start_y = this.center+Math.round((this.center-15)*Math.sin(6*i*Math.PI/180));
            let end_x = this.center+Math.round((this.center-10)*Math.cos(6*i*Math.PI/180));
            let end_y = this.center+Math.round((this.center-10)*Math.sin(6*i*Math.PI/180));
            context.beginPath();
            context.moveTo(start_x,start_y);
            context.lineTo(end_x,end_y);
            context.stroke();
        }
    
        context.lineWidth=2;
        // dibujamos la linea de los minutos 5, 10, 15, ...
        for (let i=0;i<12;i++) {
            let start_x = this.center+Math.round((this.center-30)*Math.cos(30*i*Math.PI/180));
            let start_y = this.center+Math.round((this.center-30)*Math.sin(30*i*Math.PI/180));
            let end_x = this.center+Math.round((this.center-10)*Math.cos(30*i*Math.PI/180));
            let end_y = this.center+Math.round((this.center-10)*Math.sin(30*i*Math.PI/180));
            context.beginPath();
            context.moveTo(start_x, start_y);
            context.lineTo(end_x, end_y);
            context.stroke();
        }
    
        // Mostramos el texto en el centro del reloj
        /*context.font = "14px sans-serif";
        context.textAlign = "center";
        context.fillStyle = "blue";
        context.fillText(this.tz, this.canvas.width/2, (this.canvas.height/2)+30);
        */
    }

    /**
     * Refresh clock
     * 
     * This function is called every time to refresh the clock
     */
    updateClockHand() {
        const dtNow=getNowForTimezone(this.tz);

        this.canvas.nextSibling.innerHTML=dtNow.toLocaleDateString()+"<br>"+dtNow.toLocaleTimeString([], {hour:'2-digit', minute:'2-digit', second:'2-digit'});

        this._drawClock();
        var hours = dtNow.getHours();
        var minutes = dtNow.getMinutes();
        var seconds = dtNow.getSeconds();
    
        this._drawClockHand(seconds, (this.center-20), 1, "red");
        this._drawClockHand(minutes, (this.center-35), 3, "#606060");
        this._drawClockHand(hours*5, (this.center-60), 5, "grey");
    }

    /**
     * Function to draw clock hands
     *
     * @param {inte}   valor    Value for a seconds, minutes or hours
     * @param {int}    longitud length of line
     * @param {int}    grueso   weight for a line
     * @param {string} color    color for a line
     */
    _drawClockHand(valor, longitud, grueso, color) {
        const angle = ((Math.PI * 2) * (valor / 60)) - ((Math.PI * 2) / 4);
    
        const end_x = this.center+Math.cos(angle)*longitud;
        const end_y = this.center+Math.sin(angle)*longitud;
    
        this.context.beginPath();
        this.context.lineWidth=grueso;
        this.context.strokeStyle=color;
        this.context.moveTo(this.center, this.center);
        this.context.lineTo(end_x, end_y);
        this.context.stroke();
    }

}
