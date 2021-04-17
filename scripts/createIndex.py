#!/usr/bin/python3
# -*- coding: utf-8 -*-

import os,sys
import subprocess
from slim import slimmerCSS, slimmerJS, slimmerHTML
from bs4 import BeautifulSoup

index="../httpdocs/index.php"
devel="../httpdocs/devel.php"

startSize=os.path.getsize(index)

htmlFile=slimmerHTML.get(devel)

# replace
replace={
    "document.getElementById(":"_G(",
    "document.querySelector(":"_H(",
    "document.querySelectorAll(":"_I(",
    "document.createElement(":"_J(",
    "values":"_V",
    " = ":"=",
    ") {":"){",
    " => ":"=>",
    ", ":",",
    " ? ":"?",
    " % ":"%",
    " : ":":",
    " + ":"+",
    " - ":"-",
    " / ":"/",
    " < ":"<",
    " > ":">",
    " || ":"||",
    " && ":"&&",

    "addTz":"_K",
    "createEvent":"_L",
    "editEvent":"_M",
    "newAddDttz":"_N",
    "newPeriodicity":"_O",
    "newAddTz":"_P",
    "newListTz":"_Q",
    "newCreate":"_R",
    "newClose":"_S",
    "seconds":"_T",
    "minutes":"_U",
    "hours":"_V",

    "userLangBrowser":"_L1",
    "_checkLanguage":"_L2",
    "setText":"_L3",
    "getSampleText":"_L4",

    "LeadingZero":"_F1",
    "getURLParameters":"_F2",
    "formatTimer":"_F3",
    "getNextDay":"_F4",
    "getNextWeek":"_F5",
    "getNextMonth":"_F6",
    "getNextYear":"_F7",
    "formatText":"_F8",
    "unformatText":"_F9",
    "formatOffsetTz":"_F10",

    "getTzUser":"_T1",
    "tzSelect":"_T2",
    "createOption":"_T3",
    "getTzFromString":"_T4",
    "checkIfTzExistsInString":"_T5",
    "checkIfTzExists":"_T6",
    "getDateForTimezone":"_T7",
    "getOffsetTimezone":"_T8",
    "getNowForTimezone":"_T9",
    "tzString":"_T10",
    "tzDate":"_T12",

    "newAddTzToList":"_N1",
    "createLi":"_N2",
    "createUrlForm":"_N3",
    "createUrl":"_N4",
    "showHideNewListTz":"_N5",

    "addClock":"_C1",
    "resize":"_C2",
    "updateDivHourEnd":"_C3",
    "_drawClock":"_C4",
    "DrawClock":"_C5",
    "_createCanvas":"_C6",
    "this.canvas":"this._C7",
    "setDivHourEnd":"_C8",
    "updateClockHand":"_C9",
    "_drawClockHand":"_C10",
    "elementToCreateClock":"_C11",
    "start_x":"_C12",
    "start_y":"_C13",
    "end_x":"_C14",
    "end_y":"_C15",
    "context":"_C16",

    "getValuesFromUrl":"_O1",
    "showRemaining":"_O2",
    "showUrl":"_O3",
    "tmpDate":"_O4",
    "_findNextDt":"_O5",
    "insertTz":"_O6",
    "removeTz":"_O7",
    "params":"_O8",

    "showNew":"_E1",
    "hideNew":"_E2",

    "layersToMoveUp":"_U1",
    "setLayer":"_U2",
    "layers":"_U3",
    "newLayer":"_U4",
    "newUp":"_U5",
}
for k,v in replace.items():
    htmlFile=htmlFile.replace(k, v)


# save html file
with open(index, 'w') as f:
    f.write(htmlFile)

print(f"html size start: {startSize}")
print(f"html size end  : {os.path.getsize(index)}")
