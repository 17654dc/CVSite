function twPopConstructeur2(){
    var anchors = document.getElementsByTagName("a");
    for (var i=0; i<anchors.length;
         i++){
        var anchor = anchors[i];
        var relAttribute = String(anchor.getAttribute("class"));
        if (anchor.getAttribute("href") && (relAttribute.toLowerCase().match("twpop"))){
            var oParent = anchor.parentNode; var oImage=document.createElement("img");
            oImage.src = anchor.getAttribute("href");
            oImage.alt = anchor.getAttribute("title");
            var oLien=document.createElement("a");
            oLien.href = "#ferme"; oLien.title = anchor.getAttribute("title");
            oLien.onclick = "return false;"; oLien.appendChild(oImage);
            var sNumero = "id"+i;
            var node=document.createElement("div");
            node.id = sNumero; node.className = "twAudessus";
            node.appendChild(oLien);
            anchor.setAttribute("href","#"+sNumero);
            oParent.appendChild(node);
        }
    }
}

function ChangeClassMenu() {
    var scrollY; if (document.all) {
        if (!document.documentElement.scrollTop) scrollY = document.body.scrollTop; else scrollY = document.documentElement.scrollTop; }
        else scrollY = window.pageYOffset; if(scrollY > 100) document.getElementById("menu_principal").className = "menu_principal2";
        else document.getElementById("menu_principal").className = "menu_principal1"; } window.onscroll = ChangeClassMenu;