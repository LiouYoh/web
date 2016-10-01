var sto;
function ifocus(n){
	try {
		document.getElementById(n).focus();
	} catch (error) {}
}

function login(){
	var g = document.getElementById('guest');
	if (g.value){
		var url = urlrandom('login.php');
		var obj = ajax();
		obj.open('POST', url, true);
		obj.setRequestHeader('Cache-Control', 'no-cache');
		obj.setRequestHeader('Content-Type',  'application/x-www-form-urlencoded');
		obj.onreadystatechange = function (){
			if (obj.readyState == 4 && obj.status == 200){
				var data = obj.responseText;
				if (data == g.value){
					location.href = urlrandom('chat.php');
				}
			}
		}
		obj.send('guest=' + g.value);
	}
}

function logout(){
	timeoutoff();
	var url = urlrandom('logout.php');
	var obj = ajax();
	obj.open('GET', url, true);
	obj.onreadystatechange = function (){
		if (obj.readyState == 4 && obj.status == 200){
			location.href = '.';
		}
	}
	obj.send(null);
}

function ajax(){
	if (typeof XMLHttpRequest != "undefined"){
		o = new XMLHttpRequest();
	}else if (typeof window.ActiveXObject != "undefined"){
		var ax = new Array ("Msxml2.XMLHTTP.6.0", "Msxml2.XMLHTTP.5.0", "Msxml2.XMLHTTP.4.0", "Msxml2.XMLHTTP.3.0", "Msxml2.XMLHTTP.2.6", "MSXML2.ServerXMLHTTP", "MSXML2.XMLHTTP", "Microsoft.XMLHTTP");
		for (var i=0; i<ax.length; i++){
			try {
				o = new ActiveXObject(ax[i]);
				if (typeof o == "object") break;
			} catch(error){
				o = null;
			}
		}
	}
	
	return o;
}

function talk(){
	sendlock(true);
	var cl = document.getElementById('color');
	var tk = document.getElementById('talk');
	if (tk.value != ''){
		var obj = ajax();
		var url = 'talk.php';
		obj.open('POST', url, true);
		obj.setRequestHeader('Cache-Control', 'no-cache');
		obj.setRequestHeader('Content-Type',  'application/x-www-form-urlencoded');
		obj.onreadystatechange = function (){
			if (obj.readyState == 4 && obj.status == 200){
				msg();
			}
		}
		obj.send('talk=' + tk.value +'&color=' + cl.value);
		tk.value = '';
	}else{
		alert('請輸入訊息!');
	}
	ifocus('talk');
}

function online(){
	var url = urlrandom('online.php');
	var obj = ajax();
	obj.open('GET', url, true);
	obj.setRequestHeader('Cache-Control', 'no-cache');
	obj.setRequestHeader('Content-Type',  'application/x-www-form-urlencoded');
	obj.onreadystatechange = function (){
		if (obj.readyState == 4){
			var el = document.getElementById('online');
			if (obj.status == 200){
				var data = obj.responseText;
				if (data){
					v = eval('(' + data + ')');
					el.value = v.join(', ');
				}
			}
			setTimeout(function (){ online(); }, 30000);
		}
	}
	obj.send(null);
}

function sendlock(s){
	var b = document.getElementById('send');
	if (s){
		b.disabled = true;
		b.value = '----';
		setTimeout(function () { sendlock(false); }, 1500);
	}else{
		b.disabled = false;
		b.value = 'send';
	}
}

function msg(){
	timeoutoff();
	var url = urlrandom('show.php');
	var obj = ajax();
	obj.open('GET', url, true);

	obj.setRequestHeader('Cache-Control', 'no-cache');
	obj.setRequestHeader('Content-Type',  'application/x-www-form-urlencoded');

	obj.onreadystatechange = function (){
		if (obj.readyState == 4){
			if (obj.status == 200){
				var data = obj.responseText;
				if (data){
					var el = document.getElementById('msgbox');
					v = eval('(' + data + ')');
					for (k in v){
						var p = document.createElement('p');
						p.className = 'saydate';
						p.innerHTML = k.substr(0, 5) + ' ' + v[k]['user'] + ' 說: ';
						var qu = document.createElement('blockquote');
						qu.innerHTML = v[k]['contents'];
						qu.className ='saycontent';
						var div = document.createElement('div');
						div.appendChild(p);
						div.appendChild(qu);
						div.style.color = v[k]['color'];
						el.appendChild(div);
						el.scrollTop = 10000
					}
				}
			}
			sto = setTimeout(function () { msg(); }, 3000);
		}
	}
	obj.send(null);
}

function enterkeydown(event, btn){
	if (event.keyCode == 13){
		document.getElementById(btn).click();
	}
}

function timeoutoff()
{
	if (typeof sto != 'undefined'){
		try {
			clearTimeout(sto);
		} catch (error) {}
	}
}

function urlrandom(url){
	return url+'?r=' + Math.floor(Math.random() * 123456 / Math.random());
}