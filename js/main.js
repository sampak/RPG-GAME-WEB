function hideInformation(div){
	if(div == null){ console.log("[ hideInformation ]Missing arguments { div }"); return }
	$(div).css( "display", "none" );
}

function showInformation(type, msg, div, popout){
if(div == null){ div = "#errorCode"; }
var className = $(div).attr('class');
$(div).removeClass(className);
$(div).addClass("alert alert-"+type);
$(div).css( "display", "block" );
$(div).html("<center>"+msg+"</center>");
	if(popout == true){ 
		if(timer){
			clearTimeout(timer);
			showInformation(type, msg, div, hide);
		} else {
			var timer = setTimeout(function(){
				hideInformation(div);
			},6000);
		}
	}
}

function checkAttr(div, attr, value){
	var divA = $(div).attr(attr);
	console.log("function "+divA);
	if(divA == value){
		return true
	} else {
		return false
	}
	
}

function checkIcon(textHTML, gif, div){
	console.log("FUNCTION IN BUILD");
	return
	if(gif == true){
		$(div).html(textHTML);
	} else {
		$(div).html(textHTML);
	}
}

function editBox(edit, text){
	$(edit).val(text);
}