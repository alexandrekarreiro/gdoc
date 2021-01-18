<script src="assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#refresh').click(function() {
            location.reload();
        });
        $('#back').click(function() {
            history.back()
        });
        $('#front').click(function(){
            window.history.forward()
        });
    }); 
    function recarregar() {
        reload();
    }
    function pad(s) {
        return (s < 10) ? '0' + s : s;
    }
    function newData(){
        var date = new Date();
        hora.innerHTML=[date.getHours(), date.getMinutes(),date.getSeconds()].map(pad).join(':');
    }
    setInterval(function(){
        newData();
    },500);
</script>
<nav class="nav navbar navbar-dark bg-back text-white d-flex flex-row-reverse" style="height:30px; bottom:0px; right:0px; width:100%; display: flex; position:fixed; ">
    <h7><a id="hora"></a><div id="data"></div></h7>
    <h7 style="font-weight: 200;">Desenvolvido por: <a style="font-weight:600; color:#E69E19;">Omile Softwares</a> - www.omile.net</h7>
    <div>
        <a class="fas fa-arrow-circle-left" id="back"></a>&nbsp;
        <i class="fas fa-arrow-circle-right" id="front"></i>&nbsp;
        <i class="fas fa-sync-alt" id="refresh"></i>
    </div>
</nav>

</body>
</html>