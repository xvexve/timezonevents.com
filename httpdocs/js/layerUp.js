class layersToMoveUp {
    constructor() {
        self.layers=[];
        window.onresize = this.resize;
    }

    /**
     * Function que esconde la capa y devuelve un objeto
     * con dos funciones, una para mostrar la capa y otra
     * funcion para esconderla
     * 
     * @param {string} id
     * 
     * @return {object} object con dos funciones
     */
    setLayer(element) {
        const newLayer=document.getElementById(element);
        layers.push(newLayer);
        this.resize();
        return {
            show: () => {
                newLayer.style.top=0;
                newLayer.scrollTop=0;
                newLayer.style.height=document.querySelector("body").scrollHeight > newLayer.scrollHeight ? document.querySelector("body").scrollHeight+"px" : newLayer.scrollHeight+"px";
            },
            hide: () => {
                newLayer.style.top=document.querySelector("body").scrollHeight+"px";
                newLayer.style.height="0px";                
            }
        }
    }

    /**
     * Función que se ejecuta cada vez que se añade una nueva 
     * capa o se modifica el tamaño de la ventana
     */
    resize() {
        // posicionamos las capas en la parte inferior de la ventana
        layers.forEach(el => {
            if (el.style.height=="" || el.style.height=="0px") {
                el.style.display="none";
                el.style.top=document.querySelector("body").scrollHeight+"px";
                el.style.height=0;
                el.style.display="block";
            }
        });
    }
}

const m=new layersToMoveUp();

const newUp=m.setLayer("new");
