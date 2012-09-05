$(function(){
	$('.qa-content ul li').find('a').live('click',function(){ //Ќаходим все теги <a> внутри указаной конструкции и прив€зываем событие клика на них
		var $this = $(this);
		var sub = $this.next('ul');
		
		if(sub.size() > 0){ // We have next level
			if(sub.is(':visible')){
				// ul is visible - we need to hide it
				sub.slideUp('fast'
				/*, function(){ // Uncomment this if you need to reset opened children on parent close
				sub.find('.hidden').hide()
				}*/
			)
			$this.toggleClass('active', false); // remove "active1" class
			} else {
				// ul is invisible
				// close all links of the same level
				$this.parent().siblings().children('ul').slideUp('fast');
				$('.qa-content ul li a').toggleClass('active',false);
				//show it
				sub.slideDown('fast')
				$this.toggleClass('active', true); // add "active1" class
			}
			return false // Prevent user from following link
		}
		return true // We don't have next level - link is clickable
	})
})