jQuery(document).ready(function(){

$('p').hide();


$('h2').click(function(){
	$('p').hide(1000);
	$(this).next('p').slideToggle(1000); 
});



jQuery('p').mouseout(function(){
	jQuery('p').css({'background': '#FFE5C3','color':'#524737'});
});

});