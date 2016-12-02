function $LID(objName){return(document.getElementById(objName));}  //转换ID


var index_zt_daohang_time;
var index_zt_daohang_id;
var index_zt_daohang_src;
var index_zt_daohang_src1;
index_zt_daohang_id = "";
//导航鼠标经过
function index_zt_daohang_begin(Obj)
{
	clearTimeout(index_zt_daohang_time);
	index_zt_daohang_begin_1(Obj.id)
	
}
function index_zt_daohang_begin_1(id)
{
	//id=Obj.id;
	if(index_zt_daohang_id!="")
	{
		//$LID(index_zt_daohang_id).className="daohang_1";
	}
	index_zt_daohang_id = id;
	
	//$LID(id).className="daohang_2";
	
	height = $("#"+ id +"").innerHeight();
	top_y = ($("#daohang_all").offset().top+27);
	//top_y = "110";
	left_y = $("#"+ id +"").offset().left;
	value = $LID(id).id;

	str = $LID("daohang_c_"+id).innerHTML;

	$LID("div_ls_text").style.display = "";
	
	//position:fixed;
	
	$LID("div_ls_text").innerHTML = "<font id='index_zt_daohang_skindid' style='position:absolute;top: "+ top_y +"px;left: "+ left_y +"px;z-index: 1000;display:none;' onmouseover='clearTimeout(index_zt_daohang_time);' onmouseout=\"index_zt_daohang_time=setTimeout(function(){index_zt_daohang_end_1();},300);\">" + str + "</font><iframe src='' style=\"position:absolute; visibility:inherit;top:"+ top_y +"px; left:"+ left_y +"px; width:0px; height:0px; z-index:501; filter='progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0)';\" id='index_zt_daohang_skindid_iframe' FRAMEBORDER='0' SCROLLING='no'></iframe>";

	$LID("index_zt_daohang_skindid").style.display = "";
	
	if((left_y + $LID("index_zt_daohang_skindid").scrollWidth) > document.body.scrollWidth)
	{
		$LID("index_zt_daohang_skindid").style.left =  (document.body.scrollWidth - $LID("index_zt_daohang_skindid").scrollWidth) + "px";
		$LID("index_zt_daohang_skindid_iframe").style.left = $LID("index_zt_daohang_skindid").style.left;
		
	}
	
	
	$LID("index_zt_daohang_skindid_iframe").style.height = $LID("index_zt_daohang_skindid").scrollHeight + "px";
	$LID("index_zt_daohang_skindid_iframe").style.width = $LID("index_zt_daohang_skindid").scrollWidth + "px";
	$LID("index_zt_daohang_skindid_iframe").style.display = "none";
	
	$LID("index_zt_daohang_skindid").style.display = "none";
	
	
	
	$("#index_zt_daohang_skindid").slideDown("fast");
	$("#index_zt_daohang_skindid_iframe").slideDown("fast");

	
}

//导航鼠标离开
function index_zt_daohang_end()
{
	clearTimeout(index_zt_daohang_time);
	index_zt_daohang_time = setTimeout(function(){index_zt_daohang_end_1()},300);	
}

function index_zt_daohang_end_1()
{
	clearTimeout(index_zt_daohang_time);
	//$LID(index_zt_daohang_id).className="daohang_1";
	$("#index_zt_daohang_skindid_iframe").slideUp("fast");
	$("#index_zt_daohang_skindid").slideUp("fast",function(){
		$LID("div_ls_text").style.display = "none";
		$LID("div_ls_text").innerHTML = "";
	 })
	
}



//提交时提交按钮变灰，避免二次提交开始
function CheckInput(button)
{
	document.getElementById( button ).disabled = true;
}
//弹出提示后进入页面开始
function confirmdel_yes(url,title)
{
	if (confirm(title)) 
	{
		//window.location.href=url
		document.write("<form name='hrefform1' method='post' action='"+ url +"'></form>")
		hrefform1.submit()
	}
}
//弹出提示后进入页面结束

//添加管理员
function adminadd(str)
{
	if(form1.adminname.value=="")
	{
		alert("用户名不能为空")
		return false;
	}
	CheckInput(str)
}

//加载页面时间等待
function admin_load()
{
	fh = '"';
	Height = (document.body.scrollHeight+15);
	if(Height<document.body.clientHeight){Height="100%";}
	adminLoad.innerHTML = "<div id='_adminloadalpha' style='position: absolute;top: 0;left: 0;z-index: 1;width: 100%;height:"+ Height +";background-color: #000;filter:alpha(opacity=0);'></div><div style='position: absolute;top: 0;left: "+ (document.body.scrollWidth-180) +";z-index: 2;'><table width='180' border='0' align='center' cellpadding='0' cellspacing='0'><tr><td height='30' align='center' bgcolor='#FFFFFF' style='font-size:12px;color:#000000;' id='ymzrz'><img src='../images/loading_16x16.gif' width='16' height='16'>&nbsp;页面载入中...</td></tr></table></div><iframe src='' style="+ fh +"position:absolute; visibility:inherit;top:0px; left:0px; width:100%; height:"+ Height +"; z-index:3; filter='progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0)';"+  fh+"></iframe>";
	adminloadalpha();
	setTimeout("admin_load_ymzrz()","500")
}

//加载页提示语
var _admin_load_ymzrz = 1
function admin_load_ymzrz()
{
	if(_admin_load_ymzrz==1)
	{
		ymzrz.innerHTML = "<img src='../images/loading_16x16.gif' width='16' height='16'>&nbsp;页面载入中.&nbsp;&nbsp;";
		_admin_load_ymzrz = _admin_load_ymzrz + 1;
	}
	else if(_admin_load_ymzrz==2)
	{
		ymzrz.innerHTML = "<img src='../images/loading_16x16.gif' width='16' height='16'>&nbsp;页面载入中..&nbsp;";
		_admin_load_ymzrz = _admin_load_ymzrz + 1;
	}
	else if(_admin_load_ymzrz==3)
	{
		ymzrz.innerHTML = "<img src='../images/loading_16x16.gif' width='16' height='16'>&nbsp;页面载入中...";
		_admin_load_ymzrz = 1;
	}
	setTimeout("admin_load_ymzrz()","500")
}

//加载页面层渐变.
var _adminloadalpha_i = 0;
function adminloadalpha()
{
	_adminloadalpha_i = (_adminloadalpha_i+5)
	eval("_adminloadalpha").filters.alpha.opacity=_adminloadalpha_i;
	if(_adminloadalpha_i<40)
	{
		setTimeout("adminloadalpha()","1")
	}
}


//图片比例显示
function DownImage(ImgD,MaxWidth,MaxHeight)
{
	var image=new Image();
	image.src=ImgD.src;
	if(image.width>0 && image.height>0)
	{
		var rate = (image.width > image.height)?MaxWidth/image.width:MaxHeight/image.height;

		if(rate <= 1)
		{
			ImgD.width=image.width*rate;
			ImgD.height=image.height*rate;
		}
		else
		{
			ImgD.width=image.width;
			ImgD.height=image.height;
		}
	}
	//tp2.innerHTML=rate;
}


//当前元素具顶端距离
function body_top(element)
{
	var anchor = document.getElementById(element);
	var top_i;
	//top_i = anchor.offsetTop;
	top_i = 0
	if (anchor.offsetParent)
	{
		while (anchor.offsetParent)
		{ 
			top_i += anchor.offsetTop; 
			anchor = anchor.offsetParent;
		}
	}
	return top_i;
}

//当前元素具左边距离
function body_left(element)
{
	var anchor = document.getElementById(element);
	var left_i;
	//left_i = anchor.offsetLeft;	
	left_i = 0;
	if (anchor.offsetParent)
	{
		while (anchor.offsetParent)
		{ 
			left_i += anchor.offsetLeft; 
			anchor = anchor.offsetParent;
		}
	}
	return left_i;
}

