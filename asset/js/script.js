jQuery(document).ready(function($) {	
	$('.wow .tab-nav li:first').addClass('select'); 
	$('.wow .tab-panels>div').hide().filter(':first').show();    
	$('.wow .tab-nav a').click(function(){
		$('.wow .tab-panels>div').hide().filter(this.hash).show(); 
		$('.wow .tab-nav li').removeClass('select');
		$(this).parent().addClass('select');
		return (false); 
	})
});