			function theRotator() {
				$('.slideshow ul li').css({opacity: 0.0});
				$('.slideshow ul li:first').css({opacity: 1.0});
				setInterval('rotate()',5000);
			}
			function rotate() {	
				var current = ($('.slideshow ul li.show')?  $('.slideshow ul li.show') : $('.slideshow ul li:first'));
				var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('.slideshow ul li:first') :current.next()) : $('.slideshow ul li:first'));	
				next.css({opacity: 0.0})
				.addClass('show')
				.animate({opacity: 1.0}, 3000);
				// Прячем текущую картинку
				current.animate({opacity: 0.0}, 3000)
				.removeClass('show');
			};
			$(document).ready(function() {		
				theRotator();
			});

////////////////////////////////////////////SLIDER////////////////////////////////			
			function theSlider() {
				$('ul.slide li:first')
				setInterval('slide()',5000);
			}
			function slide() {	
				var current = ($('ul.slide li.active')?  $('ul.slide li.active') : $('ul.slide li:first'));
				var next = ((current.next().length) ? ((current.next().hasClass('active')) ? $('ul.slide li:first') :current.next()) : $('ul.slide li:first'));	
				next.addClass('active')
				current.removeClass('active');
			};
			$(document).ready(function() {		
				theSlider();
			});