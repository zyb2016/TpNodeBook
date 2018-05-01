$(function(){

    //增加购物车商品
    $(".add").click(function(){
	//alert("haha");
	var $this = $(this);
	$(this).prev("input").val(parseInt($(this).prev("input").val())+1);
	var nums = $(this).prev("input").val();
	var gid = $(this).prev("input").attr("index");

	//alert($(".order-info span b").html());

	//alert(url1);
	$.ajax({
	    type:"POST",
	    url:url1,
	    dataType:"JSON",
	    data:{"nums":nums,"gid":gid},
	    success:function(msg){
		//alert(msg.nums+"==="+msg.gid);
		var a = $this.parents(".nProductLists").find(".nRed");
		a.eq(0).html(msg.nums);
		a.eq(1).html(msg.nums*msg.price);
		var b = $this.parents(".nProductLists").find(".nHeighLeight");
		b.eq(0).html(msg.nums*msg.price);

		$(".nPrice").html(msg.pricesum);
		$(".highlight").html(msg.numsum);
	    },
	    error:function(){
		alert("提交失败");
	    },
	});
    });

    //减少购物车商品
    $(".sub").click(function(){
	//alert("haha");
	
	var flag = $(this).next("input").val();
	if(flag>1){
	    var $this = $(this);
	    $(this).next("input").val(parseInt($(this).next("input").val())-1);
	    var nums = flag-1;
	    var gid = $(this).next("input").attr("index");

	    //alert($(".order-info span b").html());

	    //alert(url1);
	    $.ajax({
		type:"POST",
		url:url2,
		dataType:"JSON",
		data:{"nums":nums,"gid":gid},
		success:function(msg){
		    //alert(msg.nums+"==="+msg.gid);
		    var a = $this.parents(".nProductLists").find(".nRed");
		    a.eq(0).html(msg.nums);
		    a.eq(1).html(msg.nums*msg.price);
		    var b = $this.parents(".nProductLists").find(".nHeighLeight");
		    b.eq(0).html(msg.nums*msg.price);

		    $(".nPrice").html(msg.pricesum);
		    $(".highlight").html(msg.numsum);
		},
		error:function(){
		    alert("提交失败");
		},
	    });
	}
    });

});
