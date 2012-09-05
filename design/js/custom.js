$(function() {	
		//IE haks)
	$('#address ul:nth-child(2)').css({ 'border': '0', 'width': '330px', 'text-align': 'right', 'padding': '0'});
	$('#benefits ul li:last-child, .row li:last-child').css('margin', '0');
	$('#left-col nav ul li:last-child > a').css('border', '0');
		//bxSlider
	
		//Fancybox2
	$(".fancybox, a#zoom").fancybox({
		openEffect	: 'elastic',
		closeEffect	: 'elastic',
		padding	: 0,
		loop		: false
	});
	
	$('header nav li.active, footer div li.active').html($('header nav li.active a, footer div li.active a').html());
	
	Cufon.replace(".text_main h2");
	Cufon.replace(".main_category h2");
	
//	alert("sddsd");
	// Tabs
		//$('.hall:not(:eq(0))').hide();
		$(document).ready(function(){
			
			var slider = $('#id_1 ').bxSlider({
				speed: 800,
				controls: true,
				auto: false,
				prevText: 'предыдущая неделя',
				nextText: 'следующая неделя',
				infiniteLoop: false,
				startingSlide: 1,
				pager: false
			});
			var slider = $('#id_2').bxSlider({
				speed: 800,
					controls: true,
					auto: false,
					prevText: 'предыдущая неделя',
					nextText: 'следующая неделя',
					infiniteLoop: false,
					startingSlide: 1,
					pager: false
			});
			
			
			$('.bx-wrapper:eq(1)').hide();
			//var r = $('#hall');
			//console.log(r);
				
				
		});
		$('#tabs1').addClass('active');
		
		//$('.bx-wrapper:eq(0)').show();

		$('#tabs1').click(function(){
			$('.bx-wrapper:eq(1)').hide();
			$('.bx-wrapper:eq(0)').show();
			$(this).addClass('active');
			$(this).siblings().removeClass('active');
		});
		$('#tabs2').click(function(){
			$('.bx-wrapper').hide();
			$('.bx-wrapper:eq(1)').show();
			$(this).addClass('active');
			$(this).siblings().removeClass('active');
					
		});
	
		//alert(my);
		//console.log(my);
		//$('#tabs-4:not(.active').hide();
		//alert("sdfsd");

		$.ajax({
  			type: "POST",
  			url: "/news/lastnews.htm",
  			data: { name: "John", location: "Boston" }
		}).done(function( msg ) {
			//var one;
			
			msg = eval(msg);
			
			var txt = "<h3>Новости</h3>";
			txt = txt + "<div class=\"info_item\">";
			txt = txt + "<h4><a href=\"/newsview/"+msg.id+"\">"+msg.name_ru+"</a></h4>";
			txt = txt + "<h5>"+msg.date+"</h5>";
			txt = txt + "<div class=\"short_info\">";
			txt = txt + msg.smallcontent_ru+"</div>";
			txt = txt + "<div class=\"more\"><a href=\"/newsview/"+msg.id+"\">читать дальше</a></div>	<div class=\"clear\">&nbsp;</div>";		
			$('.infoleft').html(txt);
			console.log(msg.uri);
		for(one in msg){
				
			}
			
			
  			//alert( "Data Saved: " + msg[0]['title'] );
		});
		$.ajax({
  			type: "POST",
  			url: "/action/main.htm"  			
		}).done(function(msg ) {
			//var one;
				msg = eval(msg);
			var i=0,k;
			for (i;i<2;i++) {
			
				var txt = "<h3>Акции</h3>";
				txt = txt + "<div class=\"info_item\">";
				if(msg[i].thumb!=''){txt = txt + "<a class=\"img\" href=\"/action/"+msg[i].uri+".htm\"><img src=\""+msg[i].thumb+"\" alt=\"\"></a>	"};
				txt = txt + "<h4><a href=\"/action/"+msg[i].uri+".htm\">"+msg[i].name_ru+"</a></h4>";
				txt = txt + "<h5>"+msg[i].date+"</h5>";
				txt = txt + "<div class=\"short_info\">";
				txt = txt + msg[i].smallcontent_ru+"</div>";
				txt = txt + "<div class=\"more\"><a href=\"/action/"+msg[i].uri+".htm\">читать дальше</a></div>	<div class=\"clear\">&nbsp;</div>";				
				$('.infobottom:eq('+i+')').html(txt);
				console.log(i);
			}
			//msg = eval(msg);
			/*var txt = "<h3>Акции</h3>";
			txt = txt + "<div class=\"info_item\">";
			txt = txt + "<a class=\"img\" href=\"/action/"+msg.uri+".htm\"><img src=\""+msg.thumb+"\" alt=\"\"></a>	";
			txt = txt + "<h4><a href=\"/action/"+msg.uri+".htm\">"+msg.name_ru+"</a></h4>";
			txt = txt + "<h5>11.10.2011</h5>";
			txt = txt + "<div class=\"short_info\">";
			txt = txt + msg.smallcontent_ru+"</div>";
			txt = txt + "<div class=\"more\"><a href=\"/action/"+msg.uri+".htm\">читать дальше</a></div>	<div class=\"clear\">&nbsp;</div>";		
			$('.info:eq(2)').html(txt);
			console.log(msg.smallcontent_ru);
		for(one in msg){
				
			}*/
			
			
  			//alert( "Data Saved: " + msg[0]['title'] );
		});
				//$('#tabs').tabs();

				//hover states on the static widgets
				$('#dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); },
					function() { $(this).removeClass('ui-state-hover'); }
				);

		var menu = $('ul.navigation li a');
		console.log(menu[0]);

	
});
