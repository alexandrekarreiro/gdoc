var count1 = 0;
function duplicarCampos(){
    count1++;
    var clone = document.getElementById('ortipo1').cloneNode(true);
    var destino = document.getElementById('destipo1');
    destino.appendChild (clone);
    var camposClonados = clone.getElementsByTagName('input');
    if (count1 < 50) {
        for(i=0; i<camposClonados.length;i++){
            document.getElementById('tipo1').name = "TA[]";
        }
    } else {
        alert("Você chegou no numero máximo permitido.");
        var node1 = document.getElementById('destipo1');
        node1.removeChild(node1.childNodes[0]);
    } 
}
function removerCampos(id){
 var node1 = document.getElementById('destipo1');
 node1.removeChild(node1.childNodes[0]);
}


    //// COUNT 2
    var count2 = 1;
    function duplicarCampos2(){
        count2++;
        var clone = document.getElementById('ortipo2').cloneNode(true);
        var destino = document.getElementById('destipo2');
        destino.appendChild (clone);
        var camposClonados = clone.getElementsByTagName('input');
        if (count2 < 50) {
            for(i=0; i<camposClonados.length;i++){
                document.getElementById('tipo2').name = "TB[]";
            }
        } else {
            alert("Você chegou no numero máximo permitido.");
            var node1 = document.getElementById('destipo2');
            node1.removeChild(node1.childNodes[0]);
        }
    }
    function removerCampos2(id){
     var node1 = document.getElementById('destipo2');
     node1.removeChild(node1.childNodes[0]);
 }

    //// COUNT 3
    var count3 = 1;
    function duplicarCampos3(){
        count3++;
        var clone = document.getElementById('ortipo3').cloneNode(true);
        var destino = document.getElementById('destipo3');
        destino.appendChild (clone);
        var camposClonados = clone.getElementsByTagName('input');
        if (count1 < 50) {
            for(i=0; i<camposClonados.length;i++){
                document.getElementById('tipo3').name = "TC[]";
            }
        } else {
            alert("Você chegou no numero máximo permitido.");
            var node1 = document.getElementById('destipo3');
            node1.removeChild(node1.childNodes[0]);
        }
    }
    function removerCampos3(id){
     var node1 = document.getElementById('destipo3');
     node1.removeChild(node1.childNodes[0]);
 }

    //// COUNT 4
    var count4 = 1;
    function duplicarCampos4(){
        count4++;
        var clone = document.getElementById('ortipo4').cloneNode(true);
        var destino = document.getElementById('destipo4');
        destino.appendChild (clone);
        var camposClonados = clone.getElementsByTagName('input');
        if (count1 < 50) {
            for(i=0; i<camposClonados.length;i++){
                document.getElementById('tipo4').name = "TD[]";
            }
        } else {
            alert("Você chegou no numero máximo permitido.");
            var node1 = document.getElementById('destipo4');
            node1.removeChild(node1.childNodes[0]);
        }
    }
    function removerCampos4(id){
     var node1 = document.getElementById('destipo4');
     node1.removeChild(node1.childNodes[0]);
 }