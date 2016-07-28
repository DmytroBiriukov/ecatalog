/*
   AJAX support
*/
// convenience shortcut for getElementById()
function $(strId)
{
    return document.getElementById(strId);
}
function $F(strId)
{
    return document.getElementById(strId).value;
}
// simple debug output for Firefox & Firebug
var userAgent = navigator.userAgent.toLowerCase();
var isFirefox = userAgent.search("firefox") > 0 ? 1 : 0;
function debug(s) {
    if(isFirefox)
        console.debug(s);
}


function getXmlHttp(){
  var xmlhttp;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

// retrieves data from server via ajax
function ajaxFetch(url, param, callback, result_div, isXML, isPost) 
{
    var req = getXmlHttp();
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            if(!isXML && req.responseText != null)
                callback(req.responseText, result_div);
            else if(isXML && req.responseXML != null)
                callback(req.responseXML, result_div);
            else
                callback(null, result_div);
        } else if (req.readyState == 4 && req.status != 200) {
            // fetched the wrong page or network error...
            var err = "Error: "+req.status;
            alert(err);
            callback(err, result_div);
        }
    }

    if (!isPost) {
        req.open("GET", url+"?"+param, true);
        req.send(null);
    } else {
        req.open("POST", url, true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.send(encodeURIComponent(param));
    }
} 

// process HTML via innerHTML
// data is HTML
function processAllHTML(data, result_div) 
{   // hide progress animation gif
    //$('waitpic').style.display = 'none';
    $(result_div).innerHTML = data;
}

// process XHTML, second paragraph
// data is XML, DOM functions can be used
function processPartialXML(data, result_div) 
{   var para = data.getElementsByTagName('p')[1];
    $(result_div).innerHTML = para.innerHTML;
} 

function updateTag(result_div, script_url, params)
{  ajaxFetch(script_url, params, processAllHTML, result_div, 0, 0); 
}
/*
   Drop down nav ie hack 
*/
sfHover = function() {
	var sfEls = document.getElementById("leftnav").getElementsByTagName("LI");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);
/*
 font manipulations
*/
function fontIncrease(elemId)
{
 var sfEls = document.getElementsByTagName("P");
 for (var i=0; i<sfEls.length; i++)
 { var x =sfEls[i];
   switch(x.style.fontSize)
   { case "9px": x.style.fontSize="10px"; break;
   	 case "10px": x.style.fontSize="11px"; break;	  
   	 case "11px": x.style.fontSize="12px"; break;	  
     case "12px": x.style.fontSize="13px"; break;
   	 case "13px": x.style.fontSize="14px"; break;
   	 default: x.style.fontSize="14px"; break;	  
 	}
 }
}

function fontDecrease(elemId)
{var sfEls = document.getElementsByTagName("P");
 for (var i=0; i<sfEls.length; i++)
 { var x =sfEls[i];
   switch(x.style.fontSize)
   { case "14px": x.style.fontSize="13px"; break;	  
     case "13px": x.style.fontSize="12px"; break;
   	 case "12px": x.style.fontSize="11px"; break;
   	 case "11px": x.style.fontSize="10px"; break;	  
   	 case "10px": x.style.fontSize="9px"; break;	  
   	 default: x.style.fontSize="9px"; break;	  
 	}
 }
}

function fontReset(elemId)
{ var sfEls = document.getElementsByTagName("P");
  for (var i=0; i<sfEls.length; i++)
  sfEls[i].style.fontSize="11px";
}

/*
  tag expending functions
*/
function ShowHideDIV(showElemID, hideElemID)
{ var showEl = document.getElementsById(showElemID);
  var hideEl = document.getElementsById(hideElemID); 
//									  
  hideEl.style.display="none";
  showEl.style.display="block";
}

function toggleExpanded (year) 
{ var e1 = document.getElementById("img_year_"+year);   //.getElementsByTagName("LI");
  var e2 = document.getElementById("content_year_"+year);   //.getElementsByTagName("LI");
  if(e2.style.display == 'none')
  { e1.src="http://ecatalog.univ.kiev.ua/css/img/minus.gif";  
    e2.style.display ='block';
  }else
  { e1.src="http://ecatalog.univ.kiev.ua/css/img/plus.gif";  
    e2.style.display = 'none';
  }	 
}
function togglePaperExpanded (paperID) 
{ var e1 = document.getElementById("img_paper_"+paperID);   //.getElementsByTagName("LI");
  var e2 = document.getElementById("content_paper_"+paperID);   //.getElementsByTagName("LI");
  if(e2.style.display == 'none')
  { e1.src="http://ecatalog.univ.kiev.ua/css/img/minus.gif";  
    e2.style.display ='block';
  }else
  { e1.src="http://ecatalog.univ.kiev.ua/css/img/plus.gif";  
    e2.style.display = 'none';
  }	 
}

function toggleExpand (tname) 
{ var e1 = document.getElementById("i"+tname);
  var e2 = document.getElementById("a"+tname);
  var e = document.getElementById(tname);
  if(e.style.display == 'none')
  { e1.src="http://ecatalog.univ.kiev.ua/css/img/up.gif";  
    e2.innerHTML="&nbsp;згорнути";
    e.style.display ='block';
  }else
  { e1.src="http://ecatalog.univ.kiev.ua/css/img/down.gif";  
    e2.innerHTML="&nbsp;показати";
    e.style.display = 'none';
  }	 
}