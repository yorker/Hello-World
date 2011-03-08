// JavaScript Document

/**
 * 该文件需要Jquery的支持
 * load该文件时，需要先load Jquery库
 * Create on December 2, 2009
 * Author by Yorker
 */

/*JS md5 加密函数 begin*/
var hexcase = 0;
var b64pad  = "";
var chrsz   = 8;
function hex_md5(s){ return binl2hex(core_md5(str2binl(s), s.length * chrsz));}
function b64_md5(s){ return binl2b64(core_md5(str2binl(s), s.length * chrsz));}
function hex_hmac_md5(key, data) { return binl2hex(core_hmac_md5(key, data)); }
function b64_hmac_md5(key, data) { return binl2b64(core_hmac_md5(key, data)); }
function calcMD5(s){ return binl2hex(core_md5(str2binl(s), s.length * chrsz));}

function md5_vm_test() {
  return hex_md5("abc") == "900150983cd24fb0d6963f7d28e17f72";
}

function core_md5(x, len)
{

  x[len >> 5] |= 0x80 << ((len) % 32);
  x[(((len + 64) >>> 9) << 4) + 14] = len;
  var a =  1732584193;
  var b = -271733879;
  var c = -1732584194;
  var d =  271733878;
  for(var i = 0; i < x.length; i += 16)
  {
    var olda = a;
    var oldb = b;
    var oldc = c;
    var oldd = d;

    a = md5_ff(a, b, c, d, x[i+ 0], 7 , -680876936);
    d = md5_ff(d, a, b, c, x[i+ 1], 12, -389564586);
    c = md5_ff(c, d, a, b, x[i+ 2], 17,  606105819);
    b = md5_ff(b, c, d, a, x[i+ 3], 22, -1044525330);
    a = md5_ff(a, b, c, d, x[i+ 4], 7 , -176418897);
    d = md5_ff(d, a, b, c, x[i+ 5], 12,  1200080426);
    c = md5_ff(c, d, a, b, x[i+ 6], 17, -1473231341);
    b = md5_ff(b, c, d, a, x[i+ 7], 22, -45705983);
    a = md5_ff(a, b, c, d, x[i+ 8], 7 ,  1770035416);
    d = md5_ff(d, a, b, c, x[i+ 9], 12, -1958414417);
    c = md5_ff(c, d, a, b, x[i+10], 17, -42063);
    b = md5_ff(b, c, d, a, x[i+11], 22, -1990404162);
    a = md5_ff(a, b, c, d, x[i+12], 7 ,  1804603682);
    d = md5_ff(d, a, b, c, x[i+13], 12, -40341101);
    c = md5_ff(c, d, a, b, x[i+14], 17, -1502002290);
    b = md5_ff(b, c, d, a, x[i+15], 22,  1236535329);
    a = md5_gg(a, b, c, d, x[i+ 1], 5 , -165796510);
    d = md5_gg(d, a, b, c, x[i+ 6], 9 , -1069501632);
    c = md5_gg(c, d, a, b, x[i+11], 14,  643717713);
    b = md5_gg(b, c, d, a, x[i+ 0], 20, -373897302);
    a = md5_gg(a, b, c, d, x[i+ 5], 5 , -701558691);
    d = md5_gg(d, a, b, c, x[i+10], 9 ,  38016083);
    c = md5_gg(c, d, a, b, x[i+15], 14, -660478335);
    b = md5_gg(b, c, d, a, x[i+ 4], 20, -405537848);
    a = md5_gg(a, b, c, d, x[i+ 9], 5 ,  568446438);
    d = md5_gg(d, a, b, c, x[i+14], 9 , -1019803690);
    c = md5_gg(c, d, a, b, x[i+ 3], 14, -187363961);
    b = md5_gg(b, c, d, a, x[i+ 8], 20,  1163531501);
    a = md5_gg(a, b, c, d, x[i+13], 5 , -1444681467);
    d = md5_gg(d, a, b, c, x[i+ 2], 9 , -51403784);
    c = md5_gg(c, d, a, b, x[i+ 7], 14,  1735328473);
    b = md5_gg(b, c, d, a, x[i+12], 20, -1926607734);
    a = md5_hh(a, b, c, d, x[i+ 5], 4 , -378558);
    d = md5_hh(d, a, b, c, x[i+ 8], 11, -2022574463);
    c = md5_hh(c, d, a, b, x[i+11], 16,  1839030562);
    b = md5_hh(b, c, d, a, x[i+14], 23, -35309556);
    a = md5_hh(a, b, c, d, x[i+ 1], 4 , -1530992060);
    d = md5_hh(d, a, b, c, x[i+ 4], 11,  1272893353);
    c = md5_hh(c, d, a, b, x[i+ 7], 16, -155497632);
    b = md5_hh(b, c, d, a, x[i+10], 23, -1094730640);
    a = md5_hh(a, b, c, d, x[i+13], 4 ,  681279174);
    d = md5_hh(d, a, b, c, x[i+ 0], 11, -358537222);
    c = md5_hh(c, d, a, b, x[i+ 3], 16, -722521979);
    b = md5_hh(b, c, d, a, x[i+ 6], 23,  76029189);
    a = md5_hh(a, b, c, d, x[i+ 9], 4 , -640364487);
    d = md5_hh(d, a, b, c, x[i+12], 11, -421815835);
    c = md5_hh(c, d, a, b, x[i+15], 16,  530742520);
    b = md5_hh(b, c, d, a, x[i+ 2], 23, -995338651);
    a = md5_ii(a, b, c, d, x[i+ 0], 6 , -198630844);
    d = md5_ii(d, a, b, c, x[i+ 7], 10,  1126891415);
    c = md5_ii(c, d, a, b, x[i+14], 15, -1416354905);
    b = md5_ii(b, c, d, a, x[i+ 5], 21, -57434055);
    a = md5_ii(a, b, c, d, x[i+12], 6 ,  1700485571);
    d = md5_ii(d, a, b, c, x[i+ 3], 10, -1894986606);
    c = md5_ii(c, d, a, b, x[i+10], 15, -1051523);
    b = md5_ii(b, c, d, a, x[i+ 1], 21, -2054922799);
    a = md5_ii(a, b, c, d, x[i+ 8], 6 ,  1873313359);
    d = md5_ii(d, a, b, c, x[i+15], 10, -30611744);
    c = md5_ii(c, d, a, b, x[i+ 6], 15, -1560198380);
    b = md5_ii(b, c, d, a, x[i+13], 21,  1309151649);
    a = md5_ii(a, b, c, d, x[i+ 4], 6 , -145523070);
    d = md5_ii(d, a, b, c, x[i+11], 10, -1120210379);
    c = md5_ii(c, d, a, b, x[i+ 2], 15,  718787259);
    b = md5_ii(b, c, d, a, x[i+ 9], 21, -343485551);

    a = safe_add(a, olda);
    b = safe_add(b, oldb);
    c = safe_add(c, oldc);
    d = safe_add(d, oldd);
  }
  return Array(a, b, c, d);

}

function md5_cmn(q, a, b, x, s, t)
{
  return safe_add(bit_rol(safe_add(safe_add(a, q), safe_add(x, t)), s),b);
}
function md5_ff(a, b, c, d, x, s, t)
{
  return md5_cmn((b & c) | ((~b) & d), a, b, x, s, t);
}
function md5_gg(a, b, c, d, x, s, t)
{
  return md5_cmn((b & d) | (c & (~d)), a, b, x, s, t);
}
function md5_hh(a, b, c, d, x, s, t)
{
  return md5_cmn(b ^ c ^ d, a, b, x, s, t);
}
function md5_ii(a, b, c, d, x, s, t)
{
  return md5_cmn(c ^ (b | (~d)), a, b, x, s, t);
}

function core_hmac_md5(key, data)
{
  var bkey = str2binl(key);
  if(bkey.length > 16) bkey = core_md5(bkey, key.length * chrsz);

  var ipad = Array(16), opad = Array(16);
  for(var i = 0; i < 16; i++)
  {
    ipad[i] = bkey[i] ^ 0x36363636;
    opad[i] = bkey[i] ^ 0x5C5C5C5C;
  }

  var hash = core_md5(ipad.concat(str2binl(data)), 512 + data.length * chrsz);
  return core_md5(opad.concat(hash), 512 + 128);
}

function safe_add(x, y)
{
  var lsw = (x & 0xFFFF) + (y & 0xFFFF);
  var msw = (x >> 16) + (y >> 16) + (lsw >> 16);
  return (msw << 16) | (lsw & 0xFFFF);
}

function bit_rol(num, cnt)
{
  return (num << cnt) | (num >>> (32 - cnt));
}

function str2binl(str)
{
  var bin = Array();
  var mask = (1 << chrsz) - 1;
  for(var i = 0; i < str.length * chrsz; i += chrsz)
    bin[i>>5] |= (str.charCodeAt(i / chrsz) & mask) << (i%32);
  return bin;
}

function binl2hex(binarray)
{
  var hex_tab = hexcase ? "0123456789ABCDEF" : "0123456789abcdef";
  var str = "";
  for(var i = 0; i < binarray.length * 4; i++)
  {
    str += hex_tab.charAt((binarray[i>>2] >> ((i%4)*8+4)) & 0xF) +
           hex_tab.charAt((binarray[i>>2] >> ((i%4)*8  )) & 0xF);
  }
  return str;
}

function binl2b64(binarray)
{
  var tab = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
  var str = "";
  for(var i = 0; i < binarray.length * 4; i += 3)
  {
    var triplet = (((binarray[i   >> 2] >> 8 * ( i   %4)) & 0xFF) << 16)
                | (((binarray[i+1 >> 2] >> 8 * ((i+1)%4)) & 0xFF) << 8 )
                |  ((binarray[i+2 >> 2] >> 8 * ((i+2)%4)) & 0xFF);
    for(var j = 0; j < 4; j++)
    {
      if(i * 8 + j * 6 > binarray.length * 32) str += b64pad;
      else str += tab.charAt((triplet >> 6*(3-j)) & 0x3F);
    }
  }
  return str;
}


/*JS md5加密函数 end*/

//设置Cookie
function setCookie(c_name,value,expiredays) {
	var exdate=new Date();
	if(expiredays) {
		exdate.setDate(exdate.getDate()+expiredays);
	}

	document.cookie=c_name+ "=" +escape(value)+
	((expiredays==null) ? "" : ";expires="+exdate);
}

//取得Cookie
function getCookie(c_name) {
	if (document.cookie.length>0) {
		c_start=document.cookie.indexOf(c_name + "=");
		if (c_start!=-1) {
			c_start=c_start + c_name.length+1;
			c_end=document.cookie.indexOf(";",c_start);
			if (c_end==-1)
				c_end=document.cookie.length;
			return unescape(document.cookie.substring(c_start,c_end));
		}
	}
	return "";
}

//检查是否为空
function empty(data) {
	data += '';
	if(data == null || data == '') {
		return true;
	}
	return false;
}

//检查是否为数值型号
function is_numeric(data) {
	if(!empty(data) && !isNaN(data)) {
		return true;
	}
	return false;
}

//验证表单，匹配所有 input, textarea, select 和 button 元素，但是不包括[type=checkbox]和[type=radio]
//如果是kindeditor，必须要在textarea中设置一个标志，class="kindeditor"，以方便进行处理
//提供对NUMERIC, EMAIL, URL类型的验证
function checkForm(fobj) {
	var error = '';
	var obj = $(fobj).find(":input").not(":checkbox, :radio, .kindeditor");
	var len = obj.length;

	for(var i = 0; i < len; i++) {

		if(obj.eq(i).attr('required')=='true' && empty(obj.eq(i).attr('value'))) {
			error += obj.eq(i).attr('msg') + "\n";
			continue;
		}
		if(obj.eq(i).attr('datatype')) {
			switch(obj.eq(i).attr('datatype')) {
				case 'NUMERIC':
					if(!is_numeric(obj.eq(i).attr('value')) && !empty(obj.eq(i).attr('value'))) {
						error += obj.eq(i).attr('msg') + "\n";
					}
					break;
				case 'EMAIL':
					var pattern = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
					
					if(!empty(obj.eq(i).attr('value')) && !pattern.test(obj.eq(i).val())) {
						error += obj.eq(i).attr('msg') + "\n";
					}
					break;
				case 'URL':
					var pattern = /^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$/;
					if(!empty(obj.eq(i).attr('value')) && !pattern.test(obj.eq(i).val())) {
						error += obj.eq(i).attr('msg') + "\n";
					}
					break;
				case 'TEL':     
					if(!empty(obj.eq(i).attr('value'))) {
						//mobile
						var pattern = /^\+?[0-9 ]{11,15}$/;
						//telephone
						var pattern1 = /^([0-9]{3,4})?[- ]?[0-9]{7,8}[- ]?([0-9]{4})?$/;
						if(!pattern.test(obj.eq(i).val()) && !pattern1.test(obj.eq(i).val())) {
							error += obj.eq(i).attr('msg') + "\n";
						}
					}
					break;
			}
		}
	}

	//验证kindeditor的数据
	var kind = $(fobj).find(".kindeditor");
	var len = kind.length;
	for(var i = 0; i < len; i++) {
		var id = kind.eq(i).attr('id');
		
		if(KE.util.getData(id).length < 40) {
			var kind_data = KE.util.getData(id);
			kind_data = kind_data.replace(/<br\s*\/?>/gi, '');
			if(kind.eq(i).attr('required')=='true' && empty($.trim(kind_data))) {
				error += kind.eq(i).attr('msg');
			}
		}
	}

	if(error != '') {
		alert(error);
		return false;
	}
	return true;
}

//验证radio是否有被选中
function checkRadio(radio) {
	var obj = $(radio);
	var len = $(radio).length;
	for(var i = 0; i < len; i++) {
		if(obj.eq(i).attr('checked')) {
			return true;
		}
	}
	return false;
}

//验证checkbox是否有选中
function checkCheckbox(box, classname) {
	if(box) {		
		var obj = $(box);
	} else if(classname) {
		var obj = $("."+classname);
	}
	
	var len = obj.length;
	for(var i = 0; i < len; i++) {
		if(obj.eq(i).attr('checked')) {
			return true;
		}
	}
	return false;
}

//获得表单数据，并构建成一个AJAX请求的POST数据格式
function getDatas(fobj) {
	var datas = '';

	//构建input，除checkbox, radio以外
	var obj = $(fobj).find(":input").not(":checkbox, :radio");
	var len = obj.length;
	for(var i = 0; i < len; i++) {
		if(obj.eq(i).attr("name")) {
			if(datas == '') {
				datas += obj.eq(i).attr("name") + "=" + cvt(obj.eq(i).attr("value"));
			} else {
				datas += "&" + obj.eq(i).attr("name") + "=" + cvt(obj.eq(i).attr("value"));
			}
		}
	}

	//构建checkbox, radio
	var obj = $(fobj).find(":checkbox, :radio");
	var len = obj.length;
	var names = Array();
	var j = 0;
	for(var i = 0; i < len; i++) {
		if(obj.eq(i).attr("name") && !_in_array(obj.eq(i).attr("name"), names)) {
			names[j++] = obj.eq(i).attr("name");
		}
	}

	var checkobj = $(fobj).find(":checked");
	var checklen = checkobj.length;
	for(var n in names) {
		if(datas == '') {
			datas += names[n] + "=";
		} else {
			datas += "&" + names[n] + "=";
		}
		var tmp = new Array();
		j=0;
		for(var i = 0; i < checklen; i++) {
			if(checkobj.eq(i).attr("name") == names[n]) {
				tmp[j++] = cvt(checkobj.eq(i).val());
			}
		}
		if(tmp.length > 1) {
			datas += toJson(tmp);
		} else if(tmp.length == 1) {
			datas += tmp[0];
		}
	}

	//提取kindeditor的数据
	var kind = $(fobj).find(".kindeditor");
	var len = kind.length;
	for(var i = 0; i < len; i++) {
		var id = kind.eq(i).attr("id");
		var name = kind.eq(i).attr("name");
		if(datas == '') {
			datas += name + "=" + cvt(KE.util.getData(id));
		} else {
			datas += "&" + name + "=" + cvt(KE.util.getData(id));
		}
	}

	return datas;
}

function cvt(data) {
	return encodeURIComponent(data);
}


//将JS数组转化为JSON
function toJson(arr) {
	var j = '';
	for(var n in arr) {
		if(typeof arr[n] != 'object') {
			var tmp = '"'+n+'":"'+arr[n]+'"';
			if(j) {
				j += ','+tmp;
			} else {
				j += tmp;
			}
		} else {
			var tmp = '"'+n+'":'+toJson(arr[n]);
			if(j) {
				j += ','+tmp;
			} else {
				j += tmp;
			}
		}
	}

	return '{'+j+'}';
}

//将JSON字符串解析成JS对象
function jsonTo(json) {
	return eval('('+json+')');
}

function _in_array(needle, stack) {
	for(var i in stack) {
		if(stack[i] == needle) {
			return true;
		}
	}
	return false;
}

//消息显示
//overlib文本提示，需要overlib 库的支持
function hint(text) {
	if(!empty(text)) {
		var show = "<div style=\"background:url(" + rooturl + "/administrator/images/tip_bar1.gif) repeat-x;height:10px\"><div style=\"background:url(" + rooturl + "/administrator/images/tip_bar2.gif) no-repeat scroll 0px 0px;height:10px;overflow:hidden;\" >&nbsp;</div></div><div style=\"background-color:#FFFFCC; font-size:12px; line-height:18px; padding:6px; border-left:1px solid #D4D5AA; border-bottom:1px solid #D4D5AA; border-right:1px solid #D4D5AA; \">" + text + "</div>";
		return overlib(show, WIDTH, 150, OFFSETX, 16, OFFSETY, 13, FGCOLOR, '');
	}
}

//overlib图片提示，需要overlib库的支持
function showImg(url, w, h) {
	var props = '';
	if(w) {
		props += ' width=' + w;
	}
	if(h) {
		props += ' height=' + h;
	}
	var div = "<div style=\"background-color:#FFFFFF; border:1px solid #CCCCCC; padding:3px; text-align:center; \"><img src=\""+url+"\" border=0 " + props + "/></div>"
	return overlib(div, WIDTH, 1, OFFSETX, 10);
}

//将信息显示在一个浮动的div上，需要JQuery的支持
function showMsgByDiv(msg, failure) {
	if(msg != '' || msg != null) {
		$("body").append("<div id=\"msg\"></div>");
		if(!failure) {
			$("#msg").css({"display":"none", "position":"fixed", "background-color":"#00EE00", "border":"1px solid #FF0000", "width":"auto", "text-align":"center", "padding":"12px", "font-size":"12px"});
		} else {
			$("#msg").css({"display":"none", "position":"fixed", "background-color":"#EE0000", "border":"1px solid #FF0000", "width":"auto", "text-align":"center", "padding":"12px", "font-size":"12px", "font-weight":"bold"});
		}
		var sw = window.screen.width;
		var dw = $("#msg").width();

		if(sw > dw) {
			var lf = (sw-dw)/2;
			var obj = document.getElementById("msg");
			obj.style.left = lf+"px";
			//obj.style.top = (document.documentElement.scrollTop + 50) + "px";
			obj.style.top = 100 + "px";
		}
		$("#msg").html(msg);
		$("#msg").fadeIn(100);
		setTimeout("$('#msg').fadeOut(2000)", 2000);
		setTimeout("$('#msg').remove()", 5000);
	}
}


//显示一个确认消息框, 需要JQuery的支持
function showMsgByBox(msg, flag) {
	if(msg != "" && msg != null) {
		if(!document.getElementById("abs_prompt")) {
			$("body").append('<div id="abs_prompt"><div class="icon"></div><div class="information" id="prompt_info" style="text-align:center">'+msg+'</div><div class="ok"><input style="border:1px solid #CCCCCC" type="button" value="确定" onclick="$(\'#abs_prompt\').hide()" /></div></div>');

			var s_w = window.screen.width;
			var left = parseInt((s_w-300)/2) + "px";
			//style
			$("#abs_prompt").css({"position":"absolute", "left":left, "top":"150px", "width":"300px", "height":"221px", "font-size":"13px", "background":"url(images/popup_prompt.png) no-repeat scroll 0 0", "z-index":"100", "display":"none"});
			if(flag == 'ERROR') {
				$("#abs_prompt div.icon").css({"background":"url(images/icon-prompt.gif) no-repeat scroll center top", "height":"32px", "margin":"12px"});
			} else {
				$("#abs_prompt div.icon").css({"background":"url(images/icon-prompt.gif) no-repeat scroll center bottom", "height":"32px", "margin":"12px"});
			}
			$("#abs_prompt div.information").css({"margin":"12px", "height":"100px"});
			$("#abs_prompt div.ok").css({"text-align":"center"});
		} else {
			$("#prompt_info").html(msg);
		}

		$("#abs_prompt").show();
	}
}

//在鼠标的位置处显示消息。
function showMsg(e, msg) {
	var ret = getScroll();
	//获得文档的坐标
	var top = ret.top + e.clientY;
	var left = ret.left + e.clientX;
	$('#tipmsg').remove();
	$('body').append('<div id="tipmsg" style="position:absolute; border:1px solid #CCCCCC; top:' + top + 'px; left:' + left + 'px; background-color:#F7F7F7; border:3px solid #CCCCCC; padding:6px; font-size:13px; font-weight:bold; color:#999999;">'+msg+'</div>');
	setTimeout("$('#tipmsg').remove()", 4000);
}

//kindeditor加载函数
function addEditor(id, items) {
	$("#"+id).addClass('kindeditor');
	
	if(items) {
		KE.init({
			id : id,
			resizeMode : 0,
			filterMode : false,
			items : items
		});
	} else {
		KE.init({
			id : id,
			resizeMode : 0,
			filterMode : false
		});
	}
	setTimeout("KE.create('" + id + "');", 10);	
}


//checkbox全选设置
function checkAll(thisobj, classname) {
	if($(thisobj).attr('checked')) {
		$("."+classname).attr('checked', 'checked');
	} else {
		$("."+classname).removeAttr('checked');
	}
}

function changeValidateCode(imgobj) {
	imgobj.src='validate.php?_t='+Math.random();
}

function encrypt(fobj) {
	var v = fobj.vcode.value;
	if(v) {
		v = v.toUpperCase();
		v = hex_md5(v);
		$(fobj).append('<input type="hidden" name="enc_vcode" value="'+v+'"/>');
	}
}

//改变验证码函数
function re_captcha(iobj) {
	iobj.src = iobj.src.replace(/\?.*/, '');
	iobj.src = iobj.src + '?_t=' + Math.random();
}

//重定向时进行确认提示
function redirect(url, msg) {
	if(confirm(msg)) {
		location.href=url;
	} else {
		return false;
	}
}

//取得滚动条的位置
function getScroll()  {
	var t, l, w, h;
	if (document.documentElement && document.documentElement.scrollTop) {
		t = document.documentElement.scrollTop;
		l = document.documentElement.scrollLeft;
		w = document.documentElement.scrollWidth;
		h = document.documentElement.scrollHeight;
	} else if (document.body) {
		t = document.body.scrollTop;
		l = document.body.scrollLeft;
		w = document.body.scrollWidth;
		h = document.body.scrollHeight;
	}
	return { top: t, left: l, width: w, height: h };
}

function pagination(url, cur) {
	if(cur && !isNaN(cur)) {
		if(url.indexOf('?') > 0) {
			var url = url+"&page=" + cur;
		} else {
			var url = url+"?page=" + cur;
		}

	}

    $.ajax({
        type: "GET",
        url: url,
		beforeSend: function() {
			$("#pagination_show").html('Loading...');
		},
        success: function(res) {
            $("#pagination_show").html(res);
        }
    });
}

function appendParam(url, key, value) {
	if(url.indexOf('?') > 0) {
		var url = url + '&' + key + '=' + value;
	} else {
		var url = url + '?' + key + '=' + value;
	}
	return url;
}

function addFavorite(url, title) {
	if(!url) {
		url = window.location;
	}
	if(!title) {
		title = document.title
	}

	if (document.all) {
		window.external.addFavorite(url, title);
	}
	else if (window.sidebar) {
		window.sidebar.addPanel(title, url, '');
	}
}


function setHomepage(url) {
	if(!url) {
		url = window.location;
	}
	if (document.all) {
		document.body.style.behavior='url(#default#homepage)';
		document.body.setHomePage(url);
	} else if (window.sidebar) {
		if(window.netscape) {
			try {
				netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
			} catch (e) {
				alert( "该操作被浏览器拒绝，如果想启用该功能，请在地址栏内输入 about:config,然后将项 signed.applets.codebase_principal_support 值该为true" );
			}
		}
		var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
		prefs.setCharPref('browser.startup.homepage', url);
	}
}

function chr(ascii) {
	return String.fromCharCode(ascii);
}

function chkEnter(e) {	
	var code;
	if(window.event) {
		code = e.keyCode;
	} else if(e.which) {
		code = e.which;
	}
	if(code == 13) {
		return true;
	}
	return false;
}

//将输入的文字转为大写，常用使用方法：onkeyup="chupper(this)"
function chupper(obj) {
	var str = obj.value;
	if(str) {
		obj.value = str.toUpperCase();
	}
}

//加开一个ajax的window页面
function openAjaxWin(url, width, height) {
	//检查是否有新窗口打开
	if(document.getElementById('ajax_open_content')) {		
		alert('You have opened a window, please close it and try again!');
		return;
	}
	

	//定义相关DIV的ID
	var win_id = 'ajax_window';
	var content_id = 'ajax_open_content';
	
	var doc_width = $(window).width();
	var bar = getScroll();
	var doc_height = $(window).height() + bar['top'];
	var all_height = $(document).height();
	


	//首先给整个页面加上层，以挡掉其它操作。
	var AjaxOverLayer = document.createElement('div');
	AjaxOverLayer.id = 'AjaxOverLayer';
	$(AjaxOverLayer).css({
		width:'100%',
		height:all_height,
		position:'absolute',
		top:0,
		left:0,
		backgroundColor:'#000000',
		filter:'alpha(opacity=10)',
		opacity: 0.1,
		zIndex:200
	});
	$("body").append(AjaxOverLayer);
	//end
	
	var wrap_div = document.createElement('div');
	wrap_div.id = win_id;
	if(!width) {
		width = 500;
	}
	if(!height) {
		height = 280;
	}
	$(wrap_div).css({
		width:width, 
		height:height, 
		border:'2px solid #ABBDD3',
		position:'absolute',
		background:'#FFFFFF',
		overflow:'auto',
		display:'none',
		left:parseInt((doc_width-width)/2),
		top:parseInt((doc_height-height)/2),
		zIndex:201
	});
	$(wrap_div).html('<div style="text-align:right; padding:4px; color:#FF0000; font-size:12px; background-color:#EFEFEF;"><span style="cursor:pointer;" onclick="closeAjaxWin()">关闭</span></div><div id="' + content_id + '" style="padding:6px;">loading...</div>');
	$("body").append(wrap_div);
	$(wrap_div).fadeIn(200);
	
	//载入页面
	$.ajax({
		type: 'post',
		url: url,
		success: function(cont) {
			$("#"+content_id).html(cont);
		}
	});
}
function closeAjaxWin() {
	var win_id = 'ajax_window';
	$("#"+win_id).remove();
	$("#AjaxOverLayer").remove();
}