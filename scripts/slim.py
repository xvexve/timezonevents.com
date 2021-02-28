#!/usr/bin/python3
# -*- coding: utf-8 -*-

import os
from slimmer import css_slimmer, js_slimmer, html_slimmer
from bs4 import BeautifulSoup

class slim:
    pathToFiles="../httpdocs"

    def checkFiles(self, files, typeFile):
        self.files=[]
        if type(files)==list:
            files=list(map(lambda x: x[1:] if len(x)>0 and x[0]=="/" else x, files))
            if typeFile=="css":
                files=list(filter(lambda x: x[-4:]==".css" and x[-8:]!=".min.css", files))
            elif typeFile=="js":
                files=list(filter(lambda x: x[-3:]==".js" and x[-7:]!=".min.js", files))
            self.files=[os.path.join(self.pathToFiles, f) for f in files if f and os.path.exists(os.path.join(self.pathToFiles, f))]
        return self

    def readFiles(self):
        """
        Function to read all css files and join to a var

        return string
        """
        content=""
        for fileName in self.files:
            try:
                # leemos el contenido del archivo
                content+=open(fileName,"r").read()
            except Exception as e:
                print ("Error:%s -> %s" % (fileName,e))
        return content

class slimmerCSS(slim):

    def __init__(self, files):
        """
        constructor

        param list lst - list with css files
        """
        self.checkFiles(files, "css")

    def slimmer(self, hard=False):
        content=self.readFiles()
        return css_slimmer(content, hard)


class slimmerJS(slim):
    pathToFiles="../httpdocs"

    def __init__(self, files):
        """
        constructor

        param list lst - list with css files
        """
        self.checkFiles(files, "js")

    def slimmer(self, hard=False):
        content=self.readFiles()

        fileRead=list(filter(lambda el: el.strip()!="" and el.strip()!="'use strict';", content.splitlines()))
        fileRead=js_slimmer("\n".join(fileRead))
        fileRead=fileRead.splitlines()
        fileRead=list(map(lambda el: el.strip(), fileRead))

        return js_slimmer("".join(fileRead), hard)

class slimmerHTML:
    htmlFile=""

    def __init__(self, develFile):
        if os.path.exists(develFile):
            html = BeautifulSoup(open(develFile,"r").read(), "html.parser")

            listCSS=list(map(lambda el: el.get("href"), html.find_all("link",{"rel":"stylesheet"})))
            listJS=list(map(lambda el: el.get("src"), html.find_all("script")))
            listJS=list(filter(lambda el: el and el[0:4]!="http", listJS))
            self.css=slimmerCSS(listCSS)
            self.js=slimmerJS(listJS)

            self.htmlFile=list(filter(lambda el: el.strip()!="", open(develFile,"r").readlines()))
            self.htmlFile=list(map(lambda x: x.strip(), self.htmlFile))

            self.htmlFile=self.__slimmer(self.htmlFile)
            self.htmlFile=self.__insertCSSandJS(self.htmlFile)

    def __slimmer(self, htmlFile):
        htmlFile=list(filter(lambda x: x[0:16]!='<link href="/css' and x[0:11]!='<script src', htmlFile))
        return html_slimmer("".join(htmlFile), True)

    def __insertCSSandJS(self, htmlFile):
        htmlFile=htmlFile.split('</body>')
        htmlFile[1]="<style>"+self.css.slimmer()+"</style><script>'use strict';"+self.js.slimmer()+"</script>"+htmlFile[1]
        htmlFile='</body>'.join(htmlFile)
        return htmlFile

    @staticmethod
    def get(develFile):
        obj=slimmerHTML(develFile)
        return obj.htmlFile
