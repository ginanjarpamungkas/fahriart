$(document).ready(function(){
	$('#add_category').click(function(){
		$('#category_select').clone().appendTo('#category_wrapper');
	});
});
