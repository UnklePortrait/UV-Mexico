function MM_goToURL() { //v3.0
	var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
	for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
function MM_callJS(jsStr) { //v2.0
	return eval(jsStr)
}

function TyC() {
	window.open( "tyc.html", "myWindow", " fullscreen=0, toolbar=0, location=0, status=0, menubar=0, scrollbars=0, resizable=0, width=900, height=900",1);
}