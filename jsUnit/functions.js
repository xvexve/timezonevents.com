/**
 * Functions.js to jsUnit
 * 
 * Ver 1.2 20200902
 */

/** generic vars **/
//const d=new Date();

const returnText = (trueOrFalse, result, returned) => (trueOrFalse) ? "<span class='ok'>OK</span>" : "<span class='ko'>KO [expected:"+result+"] [return:"+returned+"]</span>";

const showText = (text, elementShowResult) => elementShowResult ? document.querySelector(elementShowResult).innerHTML=text : document.write(text);


/**
 * function to check equal
 */
function equal(result, returned, elementShowResult)
{
    if (Array.isArray(result) && Array.isArray(returned)) {
        showText(returnText(arraySame(result, returned), result, returned), elementShowResult);
    } else if (typeof(result)=="object" && typeof(returned)=="object" && result!=null && returned!=null) {
        showText(returnText(objectSame(result, returned), result, returned), elementShowResult);
    } else {
        showText(returnText(result===returned, result, returned), elementShowResult);
    }
}
const greaterThan = (result, returned) => {
    document.write(returnText(result>returned, result, returned));
}

const arraySame = (arr1, arr2) => Array.isArray(arr1) && Array.isArray(arr2) && arr1.length === arr2.length && arr1.every((value, index) => value === arr2[index]);

const objectSame = (obj1, obj2) => {
    if (typeof(obj1)==="object" && typeof(obj2)==="object") {
        return !Object.keys(obj1).some(el => {
            if (typeof(obj1[el])==="object") {
                return objectSame(obj1[el], obj2[el]);
            }
            return obj1[el]!==obj2[el];
        });
    }
    return false;
}

/**
 * Function to show result in textarea
 */
function showResultInTextarea(result)
{
    document.write("<textarea>"+result+"</textarea>");
}
