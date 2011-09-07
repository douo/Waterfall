jQuery.noConflict();
jQuery(function($){	
  //宽屏.窄屏
  if(screen.width>1024){
    $('body').addClass('wide');
  }
	//外部链接 rel="external"
	$('a[rel="external"],a.url').click(function(){
		window.open(this.href);
		return false;
	});	
	//多级导航栏
  $('#nav>div>ul>li:gt(8)').addClass('hidden');
	$('#nav ul li').hover(
		function(){
			$(this).addClass('nav_li_hover');
		},
		function(){
			$(this).removeClass('nav_li_hover');
	});
  $('#nav ul>li').hover(
    function(){
      $(this).doTimeout('hoverNAV',300,function(){
        $(this).addClass('hover').children('ul').fadeIn();      
      });
    },
    function(){
      $(this).doTimeout('hoverNAV',0,function(){
        $(this).removeClass('hover').children('ul').fadeOut('slow');     
      });
    }
  );
	$('#nav li:has(ul)').addClass('li_ul');
  //导航按钮
  $('#cancel_reply a').attr('title','点击取消回复');
  $('#nav_buttons a,#cancel_reply a').fadeTo(0,0.6).hover(function(){$(this).fadeTo(300,1);}, function(){ $(this).fadeTo(300,0.6);});
  $('#nav_comment').click(function(){
    if($(this).attr('name')=='go-comment'){
      $('html, body').scrollTo($('#respond'), 1200,{easing: 'easeInOutSine', offset: -50 });
      return false;
    } else {
      setCookie('goGbook',1);
    }
  });
	//正文样式
  if($.browser.msie){
      var storyChildren = 0;
      $('.story').each(function(){
          storyChildren++;
      });
      if(storyChildren>1){    
          $('.story:lt('+(storyChildren-1)+')').addClass('story_not_last');
          $('.story:gt(0)').addClass('story_not_first');     
      }    
  }else{
      $('.story:not(:last)').addClass('story_not_last');
      $('.story:not(:first)').addClass('story_not_first');     
  }
  //链接样式
  $('.entry a:has(img)').addClass('hasIMG');
  //图片Hover
  $('.entry .inner img').hover(function(){
    $(this).doTimeout('hoverIMG',500,function(){
      $(this).animate(
        {
        borderTopColor: '#003E7B',
        borderRightColor: '#003E7B',
        borderBottomColor: '#003E7B',
        borderLeftColor: '#003E7B'   
        },
        {
        duration: 1200,
        complete: function(){
            $(this).addClass('hover');
          }
        }
      ); 
    });
  }, function(){
    $(this).doTimeout('hoverIMG',500,function(){
      $(this).animate(
        {
        borderTopColor: '#ccc',
        borderRightColor: '#ccc',
        borderBottomColor: '#ccc',
        borderLeftColor: '#ccc'   
        },
        {
        duration: 1200,
        complete: function(){
            $(this).removeClass('hover');
          }
        }
      ); 
    });
  });
  //评论区样式
  $('.thdrpy a').attr('title','点此回复');
  if($.browser.msie && $.browser.version<8){
    $('.thdrpy').addClass('show');
  } else {
    $('div.commentmetadata').hover(
      function(){
        $(this).closest('li[id^="comment-"]').find('.thdrpy:first').show();
      },function(){
        $(this).closest('li[id^="comment-"]').find('.thdrpy:first').hide();
      }
    );
    $('.comment_text').children(':not(".comment-childs")').hover(
      function(){
        $(this).closest('li[id^="comment-"]').find('.thdrpy:first').show();
      },function(){
        $(this).closest('li[id^="comment-"]').find('.thdrpy:first').hide();
      }
    );  
    $('.comment-childs').children().not('.comment-childs').hover(
      function(){
        $(this).closest('div[id^="comment-"]').find('.thdrpy:first').show();
      },function(){
        $(this).closest('div[id^="comment-"]').find('.thdrpy:first').hide();
      }
    );
  }
  $('ol.commentlist>li:odd').addClass('comment_odd');
  //welcome back
  if($('#commentform #author').attr('value')!=''){
    var commentAuthor = $('#commentform #author').attr('value');
    $('.welcome-back').addClass('show').children('strong').append(commentAuthor);
    $('.welcome-new').addClass('hidden');
  }
  $('.welcome-back .comment-reset').click(function(){
    $('.welcome-back').removeClass('show').siblings('.welcome-new').slideDown().children('input').attr('value','');
    return false;
  });
  //评论 Ctrl+Enter
  $('#commentform input,#commentform textarea').keydown(function(e){
    if(e.ctrlKey && (e.keyCode==13 || e.keyCode==10)){
      $('#commentform :submit').click();
    }
  });
  //侧边栏样式
	$('.pagenav,.linkcat').addClass('widget');    
	//自定义链接样式
	$('#better-blogroll a[rel="co-worker"]').addClass('co-worker'); 
  //搜索样式
  $('#searchreset').click(function(){
    $(this).hide();
  });
  $('#searchform :text').focus(function(){
    $('#searchreset').show();
    if($.browser.msie && $.browser.version<8){
      $('#searchform :text').css({'border-color':'#79a8e7'});
    }
  });
  $('#searchform :text').blur(function(){
    if($(this).attr('value')==''){
      $('#searchreset').hide();
    }
    if($.browser.msie && $.browser.version<8){
      $('#searchform :text').css({'border-color':'#ccc'});
    }
  });
  if($.browser.msie && $.browser.version==7){
    $('#searchreset,#searchsubmit').css({'top':'3px'});
  }
  //Text-Shasow
  if($.browser.webkit){
    $('#main,#footer').addClass('shadow');
  }
  //Zelig-Plugin
  $('.plugins-list tbody tr').each(function(){
    $(this).children('td:eq(0)').addClass('td-1');
    $(this).children('td:eq(1)').addClass('td-2');
    $(this).children('td:eq(2)').addClass('td-3');
  });
  //返回页首
  $('#scroll a').fadeTo(0,0.4).hover(
    function(){
      $(this).fadeTo(300,1);
    },
    function(){
      $(this).fadeTo(500,0.4);
    });
  $('a.back-to-top').click(function(){
    $('html, body').animate(
      {scrollTop: 0},
      {
      duration:1200,
      easing:'easeInOutSine'
      });
    return false;
  });
  $('a.back-to-bottom').click(function(){
    $('html, body').scrollTo( '#sidebar', 1200, {easing:'easeInOutSine'} );
    return false;
  });
  //Hash
  if(window.location.hash && $(window.location.hash).length>0){
    var locationHash = window.location.hash;
    $('html, body').scrollTo( locationHash, 300, {easing:'easeInOutSine', offset: -50}); 
  }
  //载入中 Loding..
  $('#loading').click(function(){
    $(this).fadeOut();
  });
  $('#loading-one').empty().append('页面载入完毕.').parent().fadeOut(800);
  //留言板
  if(getCookie('goGbook')==1 && $('li.page-item-6').hasClass('current_page_item')){
    $('html, body').animate({scrollTop: 0},2000).scrollTo($('#respond'), 1200,{easing: 'easeInOutSine', offset:-50, onAfter: function(){setCookie('goGbook',0);}}); 
  }
});