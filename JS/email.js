$(document).ready(function(){
    $("a[rel=modal]").click( function(ev){
        ev.preventDefault();
 
        var id = $(this).attr("href");
 
        var alturaTela = $(document).height();
        var larguraTela = $(document).width();
     
        //colocando o fundo preto
        $('#mascara').css({'width':larguraTela,'height':alturaTela});
 
        var left = ($(window).width() /2) - ( $(id).width() / 2 ) - 200;
        var top = ($(window).height() / 2) - ( $(id).height() / 2 );
     
        $(id).css({'top':top,'left':left});
        $(id).show();   
    });
 
    $('.close').click(function(ev){
        ev.preventDefault();
        $(".window").hide();
    });
});