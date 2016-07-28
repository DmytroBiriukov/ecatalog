<!-- Drop down nav ie hack -->
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

<!-- ----------------------------------------------------------------------- -->




// convenience shortcut for getElementById()
function $(strId){
    return document.getElementById(strId);
}
// simple debug output for Firefox & Firebug
var userAgent = navigator.userAgent.toLowerCase();
var isFirefox = userAgent.search("firefox") > 0 ? 1 : 0;
function debug(s) {
    if(isFirefox)
        console.debug(s);
}
/*
function onTipClick(e) {
    var helpbox = $('help');
    var text = e.firstChild.cloneNode(true);
//     var text = e.firstChild; ei toimi, movaa!
//     deb(text);
//     helpbox.innerHTML = text.nodeValue;

    replaceElem(helpbox, text);

    helpbox.style.display = 'block';
}
*/
// hides tooltip on mouse move
/*
function onMouse() {
    var helpbox = $('help');
    helpbox.style.display = 'none';
}
*/
// removes all children of a target and inserts new content from source
/*
function replaceElem(target, source) {
    while (target.firstChild) {
        target.removeChild(target.firstChild);
    }
    target.appendChild(source);
}

function appendText() {
    var newtext = $('testchunk').cloneNode(true);
    // clear the id so there will be no duplicate ids
    newtext.id = "";
    $('tab1').appendChild(newtext);
    associateTipClicks();
}
*/
// timer callback function, called once per second
function clockTimerCallback() {
    var t = new Date()
    var min = t.getMinutes();
    var sec = t.getSeconds();
    if (min <= 9)
        min = "0"+min;
    if (sec <= 9)
        sec = "0"+sec;

    var str = t.getHours() + ":" + min + ":" + sec;

    var para = document.createElement('p');
    var text = document.createTextNode(str);
    para.appendChild(text);

    replaceElem($('timetext'), para);
}

// make tab links call onTabClick()
function associateTabClicks() {
    var tabs = $('navlist').getElementsByTagName('a');
    for(var i=0; i < tabs.length; i++) {
        var t = tabs[i];
        t.onclick = function() {
            onTabClick(this);
            return false;
        }
    }
}
//onclick="onTabClick(this)"

// make tooltip links call onTabClick()
/*
function associateTipClicks() {
    var links = $('content').getElementsByTagName('a');
    for(var i=0; i < links.length; i++) {
        var obj = links[i];
        if (obj.className == "tip") {
            obj.onclick = function() {
                onTipClick(this);
                return false;
                }
        }
    }
}
*/
// returns the next element sibling
// (can't just use elem.nextSibling, because in Firefox, it returns whitespace
function getNextSibling(n) {
  var x = n.nextSibling;
  while (x && x.nodeType != 1) {
    x = x.nextSibling;
   }
  return x;
}

// called when tab clicked
function onTabClick(e) {
    // highlight tab (ei voi childNodes, tulee newlineja!
    var tabs = $('navlist').getElementsByTagName('li');
    // ei voi ottaa, tulee kaikki divit!
    // divs = $('content').getElementsByTagName('div');
    var div = $('content').getElementsByTagName('div')[0];

    for(var i=0; i < tabs.length; i++) {
        var obj = tabs[i].firstChild;
        var cl = "";
        if (e == obj)
            cl = "current";
        obj.className = cl;
        var disp = "none";
        if (cl != "")
            disp = "block";
        div.style.display = disp;
        // get the sibling div (not any divs underneath)
        div = getNextSibling(div);
    }
}
// called when the page has been loaded
function myonLoad() {
    associateTabClicks();
//    associateTipClicks();
    //initWidget();
    // start clock timer
    setInterval(clockTimerCallback, 1000);
}

