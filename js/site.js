/**搜索提示功能*/
var searchkeyval = '';
function show_down_menu(obj, t, f, menuid, targetid) {
	var menuobj = document.getElementById(menuid);
	menuobj.style.border = '1px solid #A2BFF0';		
	menuobj.style.position = 'absolute';
	menuobj.style.backgroundColor = '#FFFFFF';
	menuobj.style.padding = '4px 0px';
	menuobj.style.fontSize = '13px';
	menuobj.style.zIndex = 23;
	if(obj.value != searchkeyval) {
		searchkeyval = obj.value;
		if(!searchkeyval) {
			menuobj.innerHTML = '';
			menuobj.style.display = 'none';
			return;
		}
		$.ajax({
			type: 'post',
			url: 'dispatcher.php?disp=Index/ajaxSearchArtKey',
			data: 'keyword=' + encodeURIComponent(searchkeyval) + '&t=' + t + '&f=' + f,
			dataType: 'json',
			success: function(json) {
				if(json['error'] != 1) {
					var result = '';
					for(var i in json['content']) {
						result += '<div style="padding:2px 4px; cursor: pointer" onmouseover="this.style.backgroundColor=\'#A2BFF0\'" onmouseout="this.style.backgroundColor=\'#ffffff\'" onclick="document.getElementById(\'' + targetid + '\').value=this.innerHTML; document.getElementById(\'' + menuid + '\').style.display=\'none\'">' + json['content'][i][f] + '</div>';
					}
					menuobj.innerHTML = result;
					if(result) {						
						menuobj.style.display = 'block';
					} else {
						menuobj.style.display = 'none';
					}
					
				} else {
					menuobj.innerHTML = '';
					menuobj.style.display = 'none';
				}
			}
		});
	}
}

function start_to_search(obj) {
	if(obj.className == 'search_init') {
		obj.value = '';
		obj.className = '';
	}
}
function checkf(obj) {
	var keyword = $.trim(obj.keyword.value);
	if(obj.keyword.className == 'search_init' || empty(keyword)) {
		alert('请选输入检索条件');
		obj.keyword.value = '';
		return false;
	}
}

/* 
 * 留言板相关JS函数 begin
 */
function notebook_submit_report(fobj, block_id) {
	if(checkForm(fobj)) {
		encrypt(fobj);
		var datas = getDatas(fobj);
		$.ajax({
			type: 'post',
			url: fobj.action,
			data: datas,
			success: function(msg) {
				msg = $.trim(msg);
				if(msg == 'ok') {
					notebook_load_submit_area();
					pagination('dispatcher.php?disp=Index/notebookPage');
				} else {
					alert(msg);
				}
			}
		});
	} else {
		return false;
	}
	return false;
}

function notebook_load_submit_area() {
	var url = 'dispatcher.php?disp=Index/notebookReportArea&_t=' + Math.random();
	$("#submit_area_id").load(url);
}

function notebook_reply(parent_id) {
	document.getElementById('reply_tip').innerHTML = '(Reply: ' + document.getElementById('hh_'+parent_id).innerHTML + ')';
	document.getElementById('parent_id').value = parent_id;
}

function winclose() {	
	if(parent.document.getElementById('validate_image')) {
		parent.document.getElementById('validate_image').src='validate.php?_t=' + Math.random();
	}
	parent.tb_remove();			
}

/* 
 * 留言板相关JS函数 end
 */
