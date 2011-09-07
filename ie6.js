jQuery(function($){
//修正大尺寸图片大小
	$('img').each(function(){ 
		if(this.width>800){
			$(this).width(800);
	}}); 
//导航fixed
  $(window).scroll(function() {
    $('#nav').css('top', $(this).scrollTop() + "px");
    $('#scroll').css('top', 500 + $(this).scrollTop() + "px");
  });
//anti IE6
  $('#anti_ie6 p strong a').click(function(){
    $('#anti_ie6').fadeOut('slow');
    setCookie('closeAnti',true,7);
  });
});