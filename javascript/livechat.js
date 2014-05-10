<!--
var click_for_live_support = "Click for Nepalilnk Live Support" ;

function dounique() { var date = new Date() ; return date.getTime() ; }
var chatwindow_loaded = 0 ;
var popblock_action_id = 1 ;
var tracker_refresh = 10000 ; // 1000 = 1 second
var btn = 288964 ;
var do_tracker_flag_288964 = 1 ;
var start_tracker = dounique() ;
var time_elapsed ;
var refer = escape( document.referrer ) ;
var phplive_base_url = 'http://chat.nepallink.net' ;
var initiate = chat_opened = 0 ;
var pullimage_288964 = new Image ;
var date = new Date() ;
var unique = dounique() ;
var chat_width = 450 ;
var chat_height = 360 ;
var url = escape( location.toString() ) ;
var phplive_image_288964 = "http://chat.nepallink.net/image.php?l=admin&x=1&deptid=2&pagex="+url+"&unique="+unique+"&refer="+refer+"&text=" ;


var scriptpad = "" ;
var ns=(document.layers);
var ie=(document.all);
var w3=(document.getElementById && !ie);

/********************************************/
/***** proactive image settings: begin ******/
var ProactiveDiv ;
var browser_width ;
var backtrack = 0 ;
var isclosed = 0 ;
var repeat = 1 ;
var timer = 20 ;
var halt = 0 ;

// browser detection
var browser_ua = navigator.userAgent.toLowerCase() ;
var browser_type, tempdata ;
function phplive_detect_ua( text )
{
	stringposition = browser_ua.indexOf(text) + 1 ;
	tempdata = text ;
	return stringposition ;
}

if (  phplive_detect_ua( "firefox" ) )
{
	chat_width = 461 ;
	chat_height = 360 ;
}

// write external style here.. it won't work if we put it directly in the DIV
style = "<style type=\"text/css\">" ;
style += "<!--" ;
style += "#ProactiveSupport_288964 {visibility:hidden; position:absolute; height:1; width:1; top:0; left:0;}" ;
style += "-->" ;
style += "</style>" ;
document.write( style ) ;
if (ie||w3)
	browser_width = document.body.offsetWidth ;
else
	browser_width = window.outerWidth ;

function toggleMotion( flag )
{
	if ( flag )
		halt = 1 ;
	else
		halt = 0 ;
}

function initializeProactive_288964()
{

	if(!ns && !ie && !w3) return ;
	if(ie)		ProactiveDiv = eval('document.all.ProactiveSupport_288964.style') ;
	else if(ns)	ProactiveDiv = eval('document.layers["ProactiveSupport_288964"]') ;
	else if(w3)	ProactiveDiv = eval('document.getElementById("ProactiveSupport_288964").style') ;

	if (ie||w3)
		ProactiveDiv.visibility = "visible" ;
	else
		ProactiveDiv.visibility = "show" ;

	backtrack = 0 ;
	isclosed = 0 ;
	repeat = 1 ;
	moveIt(20) ;
}

function moveIt( h )
{
	if (ie)
	{
		documentHeight = document.body.offsetHeight/2+document.body.scrollTop-20 ;
		documentWidth = document.body.offsetWidth ;
	}
	else if (ns)
	{
		documentHeight = window.innerHeight/2+window.pageYOffset-20 ;
		documentWidth = window.innerWidth ;
	}
	else if (w3)
	{
		documentHeight = self.innerHeight/2+window.pageYOffset-20 ;
		documentWidth = self.innerWidth ;
	}
	ProactiveDiv.top = documentHeight-100 ;
	ProactiveDiv.left = documentWidth/2 ; // mod

	ProactiveDiv.left = h ;
	if ( h > ( browser_width - 350 ) )
		backtrack = 1 ;
	if ( backtrack && repeat && !halt )
		h -= 2 ;
	else if ( !backtrack && repeat && !halt )
		h += 2 ;

	if ( halt )
	{
		setTimeout("moveIt("+h+")",timer) ;
	}
	else if ( ( !backtrack || ( backtrack && ( h >= 20 ) ) ) && ( ( ProactiveDiv.visibility == "visible" ) || ( ProactiveDiv.visibility == "show" ) ) && repeat && !isclosed )
		setTimeout("moveIt("+h+")",timer) ;
	else if ( !isclosed )
	{
		backtrack = 0 ;
		repeat = 0 ;
		setTimeout("moveIt("+h+")",timer) ;
	}
	else
	{
		// incase it is closed during when it's off the page, set the position
		// back to the page so the horizontal scrollbars disappear (IE only)
		ProactiveDiv.left = h ;
	}
}

function DoClose(){
	if (ie||w3)
		ProactiveDiv.visibility = "hidden" ;
	else
		ProactiveDiv.visibility = "hide" ;
	isclosed = 1 ;
	halt = 0 ;
}

/********************************************/
/********************************************/


function checkinitiate_288964()
{
	initiate = pullimage_288964.width ;
	if ( ( initiate == 2 ) && !chat_opened )
	{
		chat_opened = 1 ;
		popblock_action_id = 2 ;
		launch_support_288964() ;
	}
	else if ( ( initiate == 3 ) && !chat_opened )
	{
		chat_opened = 1 ;
		initializeProactive_288964() ;
	}
	else if ( initiate == 100 )
	{
		do_tracker_flag_288964 = 0 ;
	}

	if ( ( initiate == 1 ) && chat_opened )
		chat_opened = 0 ;
}
function do_tracker_288964()
{
	// check to make sure they are not idle for more then 1 hour... if so, then
	// they left window open and let's stop the tracker to save server load time.
	// (1000 = 1 second)
	var unique = dounique() ;
	time_elapsed = unique - start_tracker ;
	if ( time_elapsed > 3600000 )
		do_tracker_flag_288964 = 0 ;

	pullimage_288964 = new Image ;
	pullimage_288964.src = "http://chat.nepallink.net/image_tracker.php?l=admin&x=1&deptid=2&pagex="+url+"&unique="+unique ;

	pullimage_288964.onload = checkinitiate_288964 ;
	if ( do_tracker_flag_288964 == 1 )
		setTimeout("do_tracker_288964()",tracker_refresh) ;
}

function start_timer_288964( c )
{
	if ( c == 0 )
	{
		if ( !chatwindow_loaded && ( popblock_action_id == 1 ) )
			alert( "Popup blocker prevented the loading of the chat window.  Please press <SHIFT> while clicking the chat image." ) ;
		else if ( !chatwindow_loaded && ( popblock_action_id == 2 ) )
		{
			NotifyPopupBlocker_288964() ;
			chat_opened = 1 ;
			popblock_action_id = 1 ;
			initializeProactive_288964() ;
		}
		else
			chatwindow_loaded = 0 ;
	}
	else
	{
		--c ;
		var temp = setTimeout( "start_timer_288964("+c+")", 1000 ) ;
	}
}

function launch_support_288964()
{
	start_timer_288964( 2 ) ;
	var request_url_288964 = "http://chat.nepallink.net/request.php?l=admin&x=1&deptid=2&pagex="+url ;
	var newwin_chat = window.open( request_url_288964, unique, 'scrollbars=no,menubar=no,resizable=0,location=no,screenX=50,screenY=100,width='+chat_width+',height='+chat_height+'' ) ;
	if ( newwin_chat )
	{
		newwin_chat.focus() ;
		DoClose() ;
		chatwindow_loaded = 1 ;
	}
}

function WriteChatDiv()
{
	var scroll_image = new Image ;
	scroll_image.src = "http://chat.nepallink.net/scroll_image.php?x=1&l=admin&"+unique ;

	output = "<div id=\"ProactiveSupport_288964\">" ;
	output += "<table cellspacing=0 cellpadding=0 border=0>" ;
	output += "<tr><td align=right><table cellspacing=0 cellpadding=0 border=0><tr><td bgColor=#E1E1E1><a href='JavaScript:RejectInitiate();' OnMouseOver=\"toggleMotion(1)\" OnMouseOut=\"toggleMotion(0)\"><font color=#828282 size=1 face=arial>&nbsp;close window</font>&nbsp;<img src=\"http://chat.nepallink.net/images/initiate_close.gif\" width=10 height=10 border=0></a></td></tr></table></td></tr>" ;
	output += "<tr><td align=center>" ;
	output += "<a href=\"JavaScript:launch_support_288964()\" OnMouseOver=\"toggleMotion(1)\" OnMouseOut=\"toggleMotion(0)\"><img src=\""+scroll_image.src+"\" border=0></a>" ;
	output += "</td></tr></table>" ;
	output += "</div>" ;
	document.writeln( output ) ;

	if(ie)		ProactiveDiv = eval('document.all.ProactiveSupport_288964.style') ;
	else if(ns)	ProactiveDiv = eval('document.layers["ProactiveSupport_288964"]') ;
	else if(w3)	ProactiveDiv = eval('document.getElementById("ProactiveSupport_288964").style') ;

	if (ie||w3)
		ProactiveDiv.visibility = "hidden" ;
	else
		ProactiveDiv.visibility = "hide" ;
}

function RejectInitiate()
{
	var rejectimage_288964 = new Image ;
	rejectimage_288964.src = "http://chat.nepallink.net/image_tracker.php?l=admin&x=1&deptid=2&unique="+unique+"&action=reject" ;
	DoClose() ;
	chat_opened = 0 ;
}

function NotifyPopupBlocker_288964()
{
	var notifyimage_288964 = new Image ;
	notifyimage_288964.src = "http://chat.nepallink.net/image_tracker.php?l=admin&x=1&deptid=2&unique="+unique+"&action=notifypopup" ;
}


if ( !phplive_loaded )
{
	WriteChatDiv() ;
	do_tracker_288964() ;
}
var phplive_loaded = 1 ;
//-->