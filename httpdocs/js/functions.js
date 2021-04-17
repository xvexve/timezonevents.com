'use strict';

const d=document;
const w=window;
const domain="https://www.timezonevents.com";
const _G = id => d.getElementById(id);
const _H = s => d.querySelector(s);
const _I = s => d.querySelectorAll(s);
const _J = e => d.createElement(e);


/**
 * Function para inserter ceros o cualquier caracter delante de un numero
 * 
 * @param {integer|string} n numero a añadir 0 o cualquier valor delante
 * 
 * @return {string} numero con uno o dos ceros delante si es necesario
 */
const LeadingZero = n => n.toString().length>=2 ? n.toString() : ("00"+n.toString()).substr(n.toString().length);

/**
 * Function to get all parameters for a url and return
 * an object withe values
 *  Sample: http://domain.com?key1=val1&key2=valw
 *  Return: {key1: val1, key2:val2}
 * 
 * @param {string} url Url from browser
 * 
 * @return {object} key value for all parameters passed to the url
 */
const getURLParameters = url => (
    url.match(/([^?=&]+)(=([^&]*))/g) || []).reduce(
        (k, v) => ((k[v.slice(0, v.indexOf('='))] = v.slice(v.indexOf('=') + 1)), k),
        {}
);

/**
 * Function to return a formater number for show "time left"
 * 
 * @param {integer} s seconds
 */
const formatTimer = s => {
    if (s < 0) s = -s;
    const time = {
        D: Math.floor(s / 86400),
        H: Math.floor(s / 3600) % 24,
        M: Math.floor(s / 60) % 60,
        S: Math.floor(s / 1) % 60,
    };
    return Object.entries(time)
        .map(([key, val]) => LeadingZero(val)+key)
        .join(" ");
};

const formatOffsetTz = s => {
    const time = {
        H: Math.floor(s / 3600) % 24,
        M: Math.floor(s / 60) % 60,
    };
    return Object.entries(time)
        .map(([k, v], i) => i ? LeadingZero(v) : v)
        .join(":");
};

/**
 * Funcion que devuelve un objeto Date con el siguiente dia de la fecha recibida.
 * Si no se recibe un valor de tipo Date devuelve la fecha de mañana.
 * 
 * @param {Date} date 
 * 
 * @return {Date}
 */
const getNextDay = date => {
    if (date instanceof Date) {
        do {
            date=new Date(date.setDate(date.getDate() + 1));
        } while (date<new Date());
        return date;
    }
    return new Date(new Date().setDate(new Date().getDate() + 1));
};

/**
 * Funcion que devuelve un objeto Date con el siguiente semana de la fecha recibida.
 * Si no se recibe un valor de tipo Date devuelve la fecha actual en la
 * siguiente semana.
 * 
 * @param {Date} date 
 * 
 * @return {Date}
 */
const getNextWeek = date => {
    if (date instanceof Date) {
        do {
            date=new Date(date.setDate(date.getDate() + 7));
        } while (date<new Date());
        return date;
    }
    return new Date(new Date().setDate(new Date().getDate() + 7));
};

/**
 * Funcion que devuelve un objeto Date con el siguiente mes de la fecha recibida.
 * Si no se recibe un valor de tipo Date devuelve la fecha actual en el
 * siguiente mes.
 * 
 * @param {Date} date 
 * 
 * @return {Date}
 */
const getNextMonth = date => {
    if (date instanceof Date) {
        do {
            date=new Date(date.setMonth(date.getMonth() + 1));
        } while (date<new Date());
        return date;
    }
    return new Date(new Date().setMonth(new Date().getMonth() + 1));
};

/**
 * Funcion que devuelve un objeto Date con el siguiente año de la fecha recibida.
 * Si no se recibe un valor de tipo Date devuelve la fecha actual en el
 * siguiente año.
 * 
 * @param {Date} date 
 * 
 * @return {Date}
 */
const getNextYear = date => {
    if (date instanceof Date) {
        do {
            date=new Date(date.setMonth(date.getMonth() + 12));
        } while (date<new Date());
        return date;
    }
    return new Date(new Date().setMonth(new Date().getMonth() + 12));
};

const formatText = txt => {
    txt=decodeURI(txt).trim();
    const replace={"<":"&lt;", ">":"&gt;"};
    txt=txt.replace(/[<>]/g, function(e) {return replace[e]});
    txt=txt.replace(/&lt;br&gt;|&lt;br\/&gt;|&lt;br \/&gt;|\n|\r\n/g, "<br>");
    return txt.replace(/(https?:\/\/(www\.[\w\.\-]+\.[a-z]{2,}[\/\w\.\-]*|[^www\.][\w\.\-]+\.[a-z]{2,}[\/\w\.\-]*))/gi, '<a href="$1" target="_blank">$1</a>');
};

const unformatText = txt => {
    const replace={"&lt;":"<", "&gt;":">", "<br>":"\n"};
    txt=txt.replace(/&lt;|&gt;|<br>/g, function(e) {return replace[e]});
    return txt.replace(/(<a href="[\w\._\-:\/]+" target="_blank">|<\/a>)/gi, "");
};
