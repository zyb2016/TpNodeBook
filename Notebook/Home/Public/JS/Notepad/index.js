$(function(){

	$("ul.list li").hover(
      function () {
		var key	= $(this).attr('key');
		var act = '#act_' + key;
		var code = $('#act_template').html();
		code = code.replace(/\[ID\]/g,key);
	  	$(act).html(code);
      }, 
      function () {
		var key	= $(this).attr('key');
		var act = '#act_' + key;		 
		$(act).html('');
      }
	);
});


