var lang_please_choose_option = '请选择您将要操作的项！';
var lang_op_success = '恭喜：操作成功';
var lang_confirm_delete = '您确定要执行删除操作吗？';
var lang_required_digit = '请填写正确的数据类型（数值型）';
var lang_please_inter_search_content = '请输入搜索内容';
var lang_has_exist = '已经被占用！';
var lang_cache_has_cleared = '缓存已清空！';
var lang_confirm_password_error = '您两次输入的密码不一致！';
var lang_notepad_write_success = '增加记事项成功';
var lang_notepad_update_success = '更新记事项成功';
var lang_available_tag = '可用标签';

/**
 **************************************************
 * 页面处理 begin                               *
 **************************************************
 */
 
$(document).ready(function() {
	loadMenu();	
	var url = getCookie("url");
	
	if(url) {
		showLoading("area_right");
		$("#area_right").load(url);
	} else {
		$("#area_right").load('dispatcher.php?disp=system/sysStart');
	}
});

function loadMenu() {
	showLoading("area_left");
	
	$("#area_left").load("dispatcher.php?disp=system/sysMenu&_t="+Math.random());
}

function loadPage(url, is_cookie) {
	showLoading("area_right");
	var pattern = /\?\w+=\w*/;
	if(pattern.test(url)) {
		url += '&_t='+Math.random();
	} else {
		url += '?_t='+Math.random();
	}
	
	if(is_cookie) {
		setCookie("url", url);
	}
	
	$("#area_right").load(url);
	
}

function ajaxGet(url, reload, sucMsg) {
	$.ajax({
		type: 'get',
		url: url,
		success: function(msg) {
			if(msg == 'ok') {
				if(sucMsg) {
					showMsgByDiv(sucMsg);
				} else {
					showMsgByDiv(lang_op_success);
				}
			} else {
				showMsgByDiv(msg, 1);
			}
			if(reload) {
				loadPage(reload);
			}
		}
	});
	return false;
}

//ajax提交数据请求
function ajaxDoSubmit(fobj, url, menu) {
	 if(!checkForm(fobj)) {
		 return false;
	 }
	 datas = getDatas(fobj);

	 $.ajax({
		type: 'post',
		url: fobj.action,
		data: datas,
		success: function(msg) {
			msg = $.trim(msg);
			if(msg == 'ok') {
				showMsgByDiv(lang_op_success);
				if(url) {
					loadPage(url);
				} else {
					loadPage(fobj.action);
				}
				
				if(menu) {
					loadMenu();
				}
			} else {
				//showMsgByDiv("操作失败，请重试", 1);
				showMsgByDiv(msg, 1);
				//alert(msg);
			}
		}
	 });
	 return false;
}

/**
 * common function
 */
function showLoading(elementId) {
	$("#"+elementId).html('<div><img src="images/loading.gif" border="0" style="vertical-align:top"/>&nbsp;<span style="font-size:16px;font-weight:bold">Loading...</span></div>');
}

/******************************页面加载处理end*************************************/

/**
 **************************************************
 * 菜单JS处理 begin                               *
 **************************************************
 */

 //顶菜单
$(document).ready(function() {
	$("#topmenu li.node a").mouseover(function() {
		$("#topmenu li.node ul").css({"visibility":"hidden"});
	});
	$("#topmenu li.node").mouseover(function() {
		$("#topmenu li.node").removeClass("hover");
		$(this).find("ul").eq(0).css({"visibility":"visible"});
		$(this).addClass("hover");
	});
	$("#topmenu li.subnode").mouseover(function() {
		$("#topmenu li.subnode ul").css({"visibility":"hidden"});
		$(this).find("ul").css({"visibility":"visible"});
		$(this).addClass("hover");
	});

	$("#topmenu li.node").mouseout(function(e) {
		if(e.currentTarget) {
			var related = e.relatedTarget;
			var i = 0;
			while(related && i++ < 8) {
				if(related != this) {
					related = related.parentNode;
				} else {
					return false;
				}				
			}
			$(this).find("ul").css({"visibility":"hidden"});
			$(this).removeClass("hover");
		} else {
			var to = e.toElement;
			var i = 0;
			while(i++ < 8) {
				if(to != this) {
					to = to.parentNode;
				} else {
					return false;
				}
			}
			$(this).find("ul").css({"visibility":"hidden"});
			$(this).removeClass("hover");
		}
		
	});
	$(document).click(function() {
		$("#topmenu li.node ul").css({"visibility":"hidden"});
	});	
});

//侧树形菜单
function triggerTopic(divobj) {
	if(divobj.className=='doctopic_open') {
		divobj.className='doctopic_close';
		$(divobj).parent().find(".doc1, .terminal").slideUp(500);

	} else {
		divobj.className='doctopic_open';
		$(divobj).parent().find(".doc1, .terminal").slideDown(500);
	}
}

function triggerDiv(divobj) {
	if(divobj.className=='doctitle_open') {
		divobj.className='doctitle_close';
		$(divobj).parent().find(".items").slideUp(500);

	} else {
		divobj.className='doctitle_open';
		$(divobj).parent().find(".items").slideDown(500);
	}
}

function triggerDivSub(divobj) {
	if(divobj.className == 'item_add') {		
		$(divobj).parent().find(".items_sub").show();
		divobj.className = 'item_sub';

	} else if(divobj.className == 'item_sub') {		
		$(divobj).parent().find(".items_sub").hide();
		divobj.className = 'item_add';

	} else if(divobj.className == 'item_last_add') {		
		$(divobj).parent().find(".items_sub").show();
		divobj.className = 'item_last_sub';

	} else if(divobj.className == 'item_last_sub') {		
		$(divobj).parent().find(".items_sub").hide();
		divobj.className = 'item_last_add';

	}
}

function oc(aobj) {
	$("#doc0").find("div.comm a").css({'color':'#555555'});
	$("#doc0").find("div.terminal a").css({'color':'#555555'});
	
	aobj.style.color = '#EE0000';

}

/*****************************菜单JS处理 end************************************8*/


/**
 **************************************************
 * 构建组件函数 begin                             *
 **************************************************
 */


/**
 * fckeditor
 */

function editor(textareaId, basePath, toolbarSet) {
	var oEditor = new FCKeditor(textareaId);
	oEditor.BasePath = basePath;
	if(toolbarSet) {
		oEditor.ToolbarSet = toolbarSet;
	} else {
		oEditor.ToolbarSet = 'Default';
	}
	oEditor.ReplaceTextarea();
}


function deleteById(table, id, url, menu, image, req_url) {
	if(image) {
		var datas = 'table='+table+'&id='+id+'&image='+image;
	} else {
		var datas = 'table='+table+'&id='+id;
	}

	if(!req_url) {
		req_url = 'dispatcher.php?disp=ajax/delete';
	}

	$.ajax({
		type: 'post',
		url: req_url,
		data: datas,
		success: function(msg) {
			msg = $.trim(msg);
			if(msg == 'ok') {
				showMsgByDiv(lang_op_success);
				loadPage(url);
				if(menu) {
					loadMenu();
				}
			} else {
				showMsgByDiv(msg, 1);
			}
		}
	});
	return false;
}

function batchDeleteByCheckbox(table, classname, url, menu, image, req_url) {
	var ckb = $('.'+classname);
	var len = ckb.length;
	var ids = new Array();
	for(var i = 0, j = 0; i < len; i++) {
		if(ckb[i].checked) {
			ids[j++] = ckb[i].value;
		}
	}
	if(ids.length) {
		ids = toJson(ids);
		if(!confirm(lang_confirm_delete)) {
			return false;
		}
	} else {
		alert(lang_please_choose_option);
		return false;
	}

	var datas = 'table='+table+'&ids='+ids;
	if(image) {
		datas = datas + '&image='+image;
	}

	if(!req_url) {
		req_url = 'dispatcher.php?disp=ajax/batchDelete';
	}

	$.ajax({
		type: 'post',
		url: req_url,
		data: datas,
		success: function(msg) {
			msg = $.trim(msg);
			if(msg == 'ok') {
				showMsgByDiv(lang_op_success);
				loadPage(url);
				if(menu) {
					loadMenu();
				}
			} else {
				showMsgByDiv(msg, 1);
			}
		}
	 });
	 return false;
}

/**
 * table 数据表；field 表中字段；value 该字段要更新的值；url 更新完成后加载的地址*；menu 是否重新加载菜单项
 */
function uFieldById(table, field, value, id, url, menu) {
	var datas = 'table=' + table + '&field=' + field + '&value=' + value + '&id=' + id;
	$.ajax({
		type: 'post',
		url: 'dispatcher.php?disp=ajax/update',
		data: datas,
		success: function(msg) {
			msg = $.trim(msg);
			if(msg == 'ok') {
				showMsgByDiv(lang_op_success);
				if(url) {
					loadPage(url);
				}
				if(menu) {
					loadMenu();
				}
			} else {
				showMsgByDiv(msg, 1);
			}
		}
	});
}

function batchUpdateByCheckbox(table, field, value, classname, url) {
	var list = $("."+classname);
	var len = list.length;
	var ids = new Array();
	var index = 0;
	for(var i = 0; i < len; i++) {
		if(list.eq(i).attr('checked')) {
			ids[index++] = list.eq(i).val();
		}
	}

	if(ids.length > 0) {
		ids = toJson(ids);
	} else {
		alert(lang_please_choose_option);
		return false;
	}
	uFieldById('products', field, value, ids, url);
}

function switcher(obj, table, field, id, e) {	
	if(/yes\.gif/.test(obj.src)) {
		tovalue = 0;
	} else {
		tovalue = 1;
	}
	var datas = 'table=' + table + '&field=' + field + '&value=' + tovalue + '&id=' + id;
	$.ajax({
		type: 'post',
		url: 'dispatcher.php?disp=ajax/update',
		data: datas,
		success: function(msg) {
			msg = $.trim(msg);
			if(msg == 'ok') {
				showMsgByDiv(lang_op_success);
				if(tovalue == 1) {
					obj.src = 'images/yes.gif';
				} else {
					obj.src = 'images/no.gif';
				}
			} else {
				showMsgByDiv(msg, 1);
			}
		}
	});
}

//动态载入修改编辑
function loadEdit(obj, table, field, id, digit, size) {
	var value = $.trim($(obj).html());
	var init = $(obj).attr('init');
	if(!digit) {
		digit = '';
	}
		
	if(init == undefined || init == 0) {
		$(obj).attr('init', '1');
		var html = '<input type="text" id="f_'+id+'" name="' + field + '" value="'+value+'" onblur="updateDynEdit(this, \'' + table + '\', \'' + field + '\', \'' + id + '\', \'' + digit + '\')" ';
		
		if(size && size.toLowerCase()=='s') {			
			html += ' style="width:40px"';
		} else {
			html += ' style="width:95%"';
		}
		html += ' />';
		$(obj).html(html);
		$(obj).find(':text').eq(0).focus();
	}
}

function checkEnterKey(e) {
	return e.keyCode == 13;
}
function updateDynEdit(obj, table, field, id, digit) {
	var value = obj.value;
	if(digit && !is_numeric(value)) {		
		alert(lang_required_digit);
		return false;
	}
	if(digit && digit == 'int') {
		value = parseInt(value);
	}

	var parent = $(obj.parentNode);
	parent.html(value);
	parent.attr('init', 0);
	uFieldById(table, field, value, id);	
}


//搜索
function search_key(base_url, inputid, is_page) {
	var obj = document.getElementById(inputid);
	obj.value = $.trim(obj.value);
	if(obj.className != 'search_init') {
		base_url = appendParam(base_url, obj.name, encodeURIComponent(obj.value));
	} else {
		alert(lang_please_inter_search_content);
		return false;
	}
	if(is_page) {
		pagination(base_url);
	} else {
		loadPage(base_url, 1);
	}
	return false;
}

//过虑分类
function filter_category(base_url, sobj, is_page) {
	if(!empty(sobj.value)) {
		base_url = appendParam(base_url, sobj.name, sobj.value);
		if(is_page) {
			pagination(base_url);
		} else {
			loadPage(base_url, 1);
		}
	} else {
		if(is_page) {
			pagination(base_url);
		} else {
			loadPage(base_url, 1);
		}
	}
}

function tab(trigger_obj, cur_class) {
	var labelList = trigger_obj.parentNode.getElementsByTagName('label');
	var ddList = trigger_obj.parentNode.parentNode.getElementsByTagName('li');
	var len = labelList.length;
	
	
	for(var i = 0; i < len; i++) {	
		if(cur_class) {
			labelList[i].className = labelList[i].className.replace(cur_class, '');
		}
										
		if(labelList[i] == trigger_obj) {
			ddList[i].style.display = 'block';				
		} else {
			ddList[i].style.display = 'none';								
		}
	}
	if(cur_class) {
		if(trigger_obj.className) {
			trigger_obj.className = trigger_obj.className + ' ' + cur_class;
		} else {
			trigger_obj.className = cur_class;
		}
	}
}

//验证单个域是
//该函数为本文提示，要按照规定的HTML结构来写。
function checkSingle(eobj, unique, cnf_id) {	
	var error = '';
	if($(eobj).attr('required')=='true' && empty(eobj.value)) {
		error += $(eobj).attr('msg');
	} else if ($(eobj).attr('datatype')) {
		switch($(eobj).attr('datatype')) {
			case 'NUMERIC':
				if(!is_numeric(eobj.value) && !empty(eobj.value)) {
					error += $(eobj).attr('msg');
				}
				break;
			case 'EMAIL':
				var pattern = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

				if(!empty(eobj.value) && !pattern.test(eobj.value)) {
					error += $(eobj).attr('msg');
				}
				
				break;
			case 'URL':
				var pattern = /^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$/;
				if(!empty(eobj.value) && !pattern.test(eobj.value)) {
					error += $(eobj).attr('msg');
				}
				break;
			
		}
	}

	if(error == '' && cnf_id) {
		if(document.getElementById(cnf_id).value != eobj.value) {
			error = lang_confirm_password_error;
			$(eobj.form).find(":submit").attr('disabled', 'disabled');
		} else {
			$(eobj.form).find(":submit").removeAttr('disabled');
		}
	}

	if(error == '' && unique) {
		if(/^wrt_/.test(eobj.name)) {
			var field = eobj.name.substr(4);			
		} else {
			var field = eobj.name;
		}
		$.ajax({
			type: 'get',
			url:'dispatcher.php?disp=ajax/isExist&table='+unique+'&field='+field+'&value='+eobj.value,
			success: function(msg) {
				msg = $.trim(msg);
				if(msg == 'ok') {
					$(eobj.parentNode.parentNode).find('.f3').find('.tip').eq(0).html('<img src="'+rooturl+'/administrator/images/no.gif" border="0"/> ' + lang_has_exist);
					$(eobj.form).find(":submit").attr('disabled', 'disabled');
				} else {
					$(eobj.form).find(":submit").removeAttr('disabled');
				}
			}
		});
	}

	if(error != '') {
		var cnt = '<img src="'+rooturl+'/administrator/images/no.gif" border="0"/> ' + error;
	} else if(!empty(eobj.value)) {
		var cnt = '<img src="'+rooturl+'/administrator/images/yes.gif" border="0"/>';
	} else {
		var cnt = '';
	}
	$(eobj.parentNode.parentNode).find('.f3').find('.tip').eq(0).html(cnt);
}

function isExist(table, field, value) {
	$.ajax({
		type: 'get',
		url:'dispatcher.php?ajax/isExist&table='+table+'&field='+field+'&value='+value,
		success: function(msg) {
			msg = $.trim(msg);
			if(msg == 'ok') {
				return true;
			} else {
				return false;
			}
		}
	});
}

function clearCache(obj, req_url) {
	var label = obj.innerHTML;
	obj.innerHTML = 'Waiting...';
	$.ajax({
		type: 'get',
		url: req_url,
		success: function(msg) {
			msg = $.trim(msg);
			if(msg == 'ok') {
				showMsgByDiv(lang_cache_has_cleared);
				obj.innerHTML = label;
			} else {
				alert(msg);
			}
		}
	});
}

//保存记事内容
function saveNotepad(fobj, ke, reurl) {
	var title = fobj.title.value;
	var content = cvt(KE.util.getData('content'));
	if(fobj.is_urgency.checked) {
		var is_urgency = 1
	} else {
		var is_urgency = 0;
	}
	var id = fobj.id.value;
	var data = 'title=' + title + '&content=' + content + '&id=' + id + '&is_urgency=' + is_urgency + '&_t=' + Math.random();
	$.ajax({
		type: 'post',
		url: fobj.action,
		data: data,
		success: function(msg) {
			msg = $.trim(msg);
			if(msg == 'ok_i') {
				showMsgByDiv(lang_notepad_write_success);
				fobj.title.value = '';
				clearEditor('content', ke);
				fobj.id.value = '';
				pagination(reurl, 1);
			} else if(msg == 'ok_u') {
				showMsgByDiv(lang_notepad_update_success);
				fobj.title.value = '';
				clearEditor('content', ke);
				fobj.id.value = '';
				pagination(reurl);
			} else {
				alert(msg);
			}
		}
	});	
	return false;
}

function view_note(id) {
	if(document.getElementById(id).style.display == 'none') {
		$("div.note_content").css('display', 'none');
		document.getElementById(id).style.display = 'block';
	} else {
		$("div.note_content").css('display', 'none');
		document.getElementById(id).style.display = 'none';
	}
}

function editNotepad(id, is_urgency, ke) {
	var fobj = document.getElementById('nform1');	
	fobj.title.value = document.getElementById('ntit_' + id).innerHTML;
	clearEditor('content', ke);
	insertHtml('content', document.getElementById('ncont_' + id).innerHTML, ke);
	if(parseInt(is_urgency) > 0) {
		fobj.is_urgency.checked = true;
	} else {
		fobj.is_urgency.checked = false;
	}
	fobj.id.value = id;
}
function clearEditor(id, ke) {
  ke.g[id].iframeDoc.open();
  ke.g[id].iframeDoc.write(ke.util.getFullHtml(id));
  ke.g[id].iframeDoc.close();
  ke.g[id].newTextarea.value = '';
}

function insertHtml(id, html, ke) {
	ke.util.focus(id);
	ke.util.selection(id);
	ke.util.insertHtml(id, html);
}

function del_old_pic(inputid, previewid) {
	if(document.getElementById(inputid)) {
		var pic_path = document.getElementById(inputid).value;
		if(pic_path) {
			$.ajax({
				type: 'post',
				url: 'dispatcher.php?disp=ajax/deleteOldImage',
				data: 'pic_path=' + pic_path,
				success: function(msg) {
					msg = $.trim(msg);
					if(msg == 'ok') {						
						document.getElementById(previewid).innerHTML = '';						
						document.getElementById(inputid).value = '';
					} else {
						alert(msg);
					}
				}
			});
		}
	}	
}

function delete_pic_gallery(chkflag, reurl) {
	var cid = '';
	if(!isNaN(chkflag)) {
		cid = chkflag;
	} else {
		var checkobj = $("."+chkflag).filter("input:checked");
		var len = checkobj.length;		
		for(var i = 0; i < len; i++) {
			if(cid == '') {
				cid += checkobj.eq(i).attr("value");
			} else {
				cid += '-'+checkobj.eq(i).attr("value");
			}
		}
	}

	if(cid == '') {
		alert(lang_please_choose_option);
		return false;
	} else if(!confirm(lang_confirm_delete)) {
		return false;
	}
	
	$.ajax({
		type: 'post',
		url: 'dispatcher.php?disp=picture/deletePicGallery',
		data: 'cid='+cid,
		success: function(msg) {
			msg = $.trim(msg);
			if(msg == 'ok') {
				showMsgByDiv(lang_op_success);
				if(reurl) {
					loadPage(reurl);
				}
			} else {
				alert(msg);
			}
		}
	});
	
}

function update_sys_config_cache_file(fobj, req_url) {
	fobj.disabled = true;
	var orig_value = fobj.value;
	fobj.value = 'Runing, please wait ...';
	$.ajax({
		type: 'post',
		url: req_url,
		data: '',
		success: function(msg) {
			msg = $.trim(msg);
			if(msg == 'ok') {
				showMsgByDiv(lang_op_success);
			} else {
				alert(msg);
			}
			$(fobj).removeAttr('disabled');
			fobj.value = orig_value;
		}
	});
}

function gettags(thisobj, inputid, subid, msgid) {
	if($("#"+msgid).attr("class") == 'kindeditor') {
		var msg = KE.util.getData(msgid);
	} else {
		var msg = $("#"+msgid).val();
	}
	msg = encodeURIComponent(msg);
	var sub = $("#"+subid).val();
	sub = encodeURIComponent(sub);
	if(!sub && !msg) {
		return false;
	}
	thisobj.value = 'Runing...';
	thisobj.disabled = true;
	$.ajax({
		type: 'post',
		url: 'dispatcher.php?disp=ajax/gettags',
		data: 'sub=' + sub + '&msg=' + msg,
		success: function(msg) {
			msg = $.trim(msg);
			if(msg) {
				$("#"+inputid).attr("value", msg);
			}
			thisobj.value = lang_available_tag;
			$(thisobj).removeAttr('disabled');
		}
	});

}

/**搜索提示功能*/
var searchkeyval = '';
function show_down_menu(obj, t, f, menuid, targetid, cond_str) {
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
		if(cond_str) {
			cond_str = '&cond_str=' + cond_str;
		} else {
			cond_str = '';
		}
		$.ajax({
			type: 'post',
			url: 'dispatcher.php?disp=ajax/searchkey',
			data: 'keyword=' + encodeURIComponent(searchkeyval) + '&t=' + t + '&f=' + f + cond_str,
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

function cal_project_size(result_id) {
	var res = document.getElementById(result_id);
	res.innerHTML = 'Runing...';
	$.ajax({
		type: 'get',
		url: 'dispatcher.php?disp=ajax/calProjectSize',
		success: function(result) {
			res.innerHTML = result;
		}
	});
}

function international_focus(obj, classname) {
	$("."+classname).css({'backgroundColor':'#FFFFFF'});
	$(obj.parentNode.parentNode).css({'backgroundColor':'#FFFFDD'});
}

function del_data_backup(classname, req_url) {
	if(!confirm(lang_confirm_delete)) {
		return false;
	}
	var chks = $("."+classname);
	var len = chks.length;
	var cids = new Array();
	var i = 0;
	for(var j = 0; j < len; j++) {
		if(chks.eq(j).attr('checked')) {
			cids[i++] = chks.eq(j).val();
		}
	}
	if(i == 0) {
		alert(lang_please_choose_option);
		return false;
	}
	cids = toJson(cids);
	$.ajax({
		type: 'post',
		url: req_url,
		data: 'delids=' + cids,
		success: function(msg) {
			msg = $.trim(msg);
			if(msg == "ok") {
				showMsgByDiv(lang_op_success);
				loadPage(req_url, 1);
			} else {
				showMsgByDiv(msg, 1);
			}
		}
	});
}

//分类目录展开和收起
function cat_switch(imgobj, close_list, open_id) {	
	if(/add/.test(imgobj.src)) {
		//展开
		imgobj.src = imgobj.src.replace('add', 'jian');
		if(open_id) {
			var list = $(".parent_"+open_id);
			var len = list.length;
			for(var i = 0; i < len; i++) {
				list.eq(i).show();
			}
		}
	} else {
		//收起
		imgobj.src = imgobj.src.replace('jian', 'add');
		if(close_list) {
			var arr = close_list.split('-');
			var list, len, img;
			for(var i in arr) {				
				list = $(".parent_"+arr[i]);
				len = list.length;
				for(var j = 0; j < len; j++) {
					list.eq(j).hide();
					img = list.eq(j).find('.red').find('img');
					if(img) {
						img.eq(0).attr('src', 'images/add.gif');
					}
				}
			}
		}
	}
}

//分类目录全部展开和全部收起
function fold_all(flag) {
	var trobj = $("table.adminlist").find("tbody").find("tr");
	if(trobj) {
		var len = trobj.length;
		for(var i = 0; i < len; i++) {
			if(flag) {
				trobj.eq(i).show();
				trobj.eq(i).find('.red').find('img').eq(0).attr('src', 'images/jian.gif');
			} else {
				trobj.eq(i).hide();
				$(".parent_0").show();
				trobj.eq(i).find('.red').find('img').eq(0).attr('src', 'images/add.gif');
			}
		}
	}
}
//左菜单的打开和关闭
function toggle_menu(obj) {
	if(/left/.test(obj.src)) {
		//关闭
		$("#menu_wrap").hide();
		obj.src = obj.src.replace('left', 'right');		
	} else {
		//打开
		$("#menu_wrap").show();
		obj.src = obj.src.replace('right', 'left');		
	}
}