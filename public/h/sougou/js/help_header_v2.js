function h_ask(){
	var input = document.getElementById('smart_input');
	if(input){
		document.location = 'http://wenwen.sogou.com/z/AskQuestion.e?sp=0&sp=S'+encodeURIComponent(input.value);
	}
}
function h_search(){
	var input = document.getElementById('smart_input');
	if(input){
		document.location = 'http://wenwen.sogou.com/z/Search.e?sp=S'+encodeURIComponent(input.value);
	}
}

function redirectAnswer(){
	var sb = document.getElementById('smart_input');
	var param = '';
	if(sb.value != ''){
		param = 'sw='+encodeURIComponent(sb.value)+'&answerkey='+encodeURIComponent(sb.value)+'&ch=w.answer.word';
	}
	else{
		param += 'ch=w.answer.empty';
	}
	document.location  = "http://wenwen.sogou.com/z/TopQuestion.htm?"+param;
}


function h_on_search(){
	h_search();
	return false;
}
document.writeln("<center>");   
document.writeln("<table width=910 border=0 cellspacing=0 cellpadding=0><td height=3 bgcolor=005CCD></td></table><br>");   
document.writeln("<table width=860 border=0 cellspacing=0 cellpadding=0 style='margin:0 auto;'> ");   
document.writeln("<tr>");   
document.writeln("<td width=175 rowspan=3><a href='http://wenwen.sogou.com'><img src='http://soso.qstatic.com/wenwen/sg/i/logo.png'></a></td>");   
document.writeln("<td width=735 valign=bottom>");   
document.writeln("<form name=flpage action='' onsubmit='return h_on_search();' method=get style=margin:0;padding:0;padding-top:10px;>");                
document.writeln("<div class=s_search_form>");         	
document.writeln("<input name=w smartPid='smb.rp' class=search_input type=text autocomplete=off id=smart_input style=font-family:Arial,simsun /> <input value='搜 索' onclick='h_search()' class=search_bt type=button /> <input value='提 问' class=ask_bt onclick='h_ask()' type=button /> <input value='回 答' class=answer_bt onclick='redirectAnswer()' type=button />");
document.writeln("</div>");           
document.writeln("</form>");           
document.writeln("</td>");           
document.writeln("</tr>");   		
document.writeln("<tr><td height=13></td></tr>");       	
document.writeln("</table><br>");       
document.writeln("</center>"); 