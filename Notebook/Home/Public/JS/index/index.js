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

function edit(id)
{
	var s = '#show_' + id;
	var e = '#edit_' + id;
	var a = '#act_' + id;
	
	var code = $('#act_edit').html();
	code = code.replace(/\[ID\]/g,id);
		
	$(e).html(code);
	$(a).hide();
	var content = $('#content_' + id).html();
	$('#edit_content_' + id).val(content);
	
	$(s).slideUp(200,function(){
		$(e).slideDown(200);
	});	
}

function act_cancel(id){
	//取消修改
	var e = '#edit_' + id;
	var s = '#show_' + id;
	var a = '#act_' + id;
	
	$(a).show();	
	$(e).slideUp().html('');	
	$(s).slideDown();	
}
