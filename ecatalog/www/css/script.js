<!-- Drop down nav ie hack -->
sfHover = function() {
	var sfEls = document.getElementById("navigation").getElementsByTagName("LI");
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

<!-- ----------------------------------------------------------------------- -->

function fontIncrease(elemId)
{
// var sfEls = document.getElementById(elemId).getElementsByTagName("P");
 var sfEls = document.getElementsByTagName("P");
// document.write(sfEls[0]);
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
// document.write(sfEls.length);
}

function fontDecrease(elemId)
{
// var sfEls = document.getElementById(elemId).getElementsByTagName("P");
 var sfEls = document.getElementsByTagName("P");
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
{ 
// var sfEls = document.getElementById(elemId).getElementsByTagName("P");
 var sfEls = document.getElementsByTagName("P");
 for (var i=0; i<sfEls.length; i++)
  sfEls[i].style.fontSize="11px";
//  x.style.color = "Black";
//  x.style.fontStyle = "Normal";
//  x.style.background = "White";
}

function ShowHideDIV(showElemID, hideElemID)
{ var showEl = document.getElementsById(showElemID);
  var hideEl = document.getElementsById(hideElemID); 
//									  
  hideEl.style.display="none";
  showEl.style.display="";
}
