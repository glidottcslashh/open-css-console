<?php

/*......................................................................                                                          
  ..... _|_|_|. _|....... _|_|_|. _|_|_|_|_|... _|. _|_|_|. _|... _|....
  ... _|....... _|......... _|....... _|...... _| _|....... _|... _|....
  ... _|. _|_|. _|......... _|....... _|..... _|. _|....... _|_|_|_|....
  ... _|... _|. _|......... _|....... _|.... _|.. _|....... _|... _|....
  ..... _|_|_|. _|_|_|_|. _|_|_|. _|. _|... _|..... _|_|_|. _|... _|....
  ......................................................................*/                                                          
## 2112 gli.tc/h/bots copy<it>right



### GET CSS code + create new.css file

$console = $_POST['console'];
$css = stripslashes($console);  // srip slashes, which bugs out background img paths (hack!)
$name = $_POST['name'];
$author = $_POST['author'];

$file = fopen('css/'.$name.'_'.$author.'.css', 'w');
fwrite($file, $css);
fclose($file);

unlink('css/_.css');	// delete the initial _.css file that gets written (hack!)

### thnx to Donno24 --> http://www.codingforums.com/showthread.php?t=136567 (populate list when user 'saves' new stylez)
function buildList($theFolder) {
  if ($contents = @ scandir($theFolder)) {
    $found = array();
    $fileTypes = array('css');
	$found = array();
    foreach ($contents as $item) {
      $fileInfo = pathinfo($item);
      if (array_key_exists('extension', $fileInfo) && in_array($fileInfo['extension'],$fileTypes)) {
        $found[] = $item;
        }
      }
    if ($found) {
      natcasesort($found);
      foreach ($found as $filename) {
	$justName = explode(".", $filename);
	if($justName[0] != 'base') {
	  echo "<option id='$justName[0]' value='$filename'>$filename</option>\n";
	}
        }
      }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	
    <title>GLI.TC/H 2112</title>

	
    <link id="stylesheet" rel="stylesheet" href="css/base.css" type="text/css" /><!-- stylez from list -->
    <style id="customcss">
        /* custom css goes here */
    </style>	
	
</head>

<body style="margin:0;border:0;overflow:hidden;" onload="loadCSS()">
<div style="width:100%;">
	
<div id="left" style="position:absolute;left:0px;width:100%;height:100%;overflow:auto;" class="wrapper">
	
	<h1>GLI.TC/H 2112</h1>
	
	<div class="stylezDiv">
		style this site! <br>
		pix a stylez from the list below or add ur own styelz <button onclick="expand()" id="cb">OPEN CONSOLE</button>
		<form name="CSSlist">
			&lt;stylez&gt;
			<select onchange="submitCSS(this)">
			    <option id='base' value='base.css'>base.css</option>
			    <?php buildList('css'); ?>
			</select>
			&lt;/stylez&gt;
		</form>
	</div><br>
	
	<div class="barf">&#9604;&#9604;&#9496;&#9472;&#9608;&#9488;&#9608;&#9604;&#9496;&#9472;&#9472;&#9604;&#9604;&#9612;&#9608;&#9472;&#9612;&#9608;&#9612;&#9608;&#9608;&#9612;&#9608;&#9608;&#9488;&#9488;&#9604;&#9488;&#9608;&#9472;&#9608;&#9608;&#9600;&#9488;&#9608;&#9608;&#9612;&#9608;&#9600;&#9472;&#9608;</div>
		
	<div class="nfo">
	    <br>

	    "For everyone to have the opportunity to be involved in a given group and to participate in its activities the structure must be explicit,
	    not implicit. The rules of decision-making must be open and available to everyone, and this can happen only if they are formalized."<br>
	    -- Jo Freeman from The Tyranny of Strucutrelessness
	    <br><br>
	    
	    GLI.TC/H is a festival/conference/gathering for artists and enthusiests interested in the conceptual and formal potential of glitches.
	    GLI.TC/H is about creating a space (online && in-real-life) where the deeply invested and the mildy curious can come together to share
	    resources, work and ideas + collaborate + debate + push the conversations fwd. GLI.TC/H is a formalized structure for open participation.
	    <br><br>
	    
	    the GLI.TC/H 2112 website was designed to reflect this ideology The gli.tc/h/bots have organized the structre (the HTML) which
	    has no style or 'theme' && have invited others (in the form of an open CSS console) to create + contribute their own stylez. The console can be
	    used to edit the site's CSS in realtime + can generate a .css file which is saved on the server && can then be invoked via the drop down list +
	    generates a unique URL for the new version of the page.

	    <br><br>
            
	</div>
	
	<div class="barf">&#9612;&#9608;&#9472;..&#9612;&#9608;&#9612;&#9608;&#9608;&#9612;&#9608;&#9608;&#9612;&#9608;&#9600;&#9472;&#9608;&#9608;&#9612;&#9608;&#9608;&#9612;&#9608;&#9600;&#9608;&#9600;&#9488;&#9488;&#9604; &#9604; &#9608;&#9488;&#9608;&#9604;&#9496;</div>
	
	

</div>
<div id="right" style="position:absolute;right:0px;width:0%;height:100%;overflow:auto;font-family:monospace;background-color:#000;color:#fff;">
	
	<form name="preload" style="padding-left:20px;padding-top:20px;">
		/* ---------------------------------------------- */
		<br>
		/* preload someone else's stylez
		<select onchange="preloader(this)">
			<?php buildList('css'); ?>
		</select> */
		<br>
		/* ---------------------------------------------- */
	</form><br>
	<div style="padding-left:20px;padding-bottom:20px;">
		/* ---------------------------------------------- */<br>
		/* <button onclick="update()">APPLY STYLEZ</button> or <button onclick="saveit()">SAVE YOUR STYLEZ</button> <span style="padding-left:119px;">*/</span>
		<form name="mystyelz" action="" method="post">	
			/* stylez name: <input id="sName" name="name" onkeyup="this.value=this.value.replace(/[' ']/g,'')"/> <span style="padding-left:138px;">*/</span><br>
			/* author name: <input id="aName" name="author" onkeyup="this.value=this.value.replace(/[' ']/g,'')"/> <span style="padding-left:138px;">*/</span><br> 
			/* ---------------------------------------------- */<br><br>
			wtf is this you ask? This is a console with direct access to the site's server (OMG!?). Our base.css is totally empty and our html totally 1.0 -- type in your css code below and click "APPLY STYLEZ" to see your change! To share your codez input your credz above and click "SAVE YOUR STYLEZ", this will add your .css file to the &lt;stylez&gt; drop down list.
			<br><br>
			<textarea name="console" id="console" rows="50" onkeydown="return catchTab(this,event)" style="background-color:#000;color:#fff;font-family:monospace;width:100%;height:100%;">
/*

    base.css stylez below
    empty for the HaXoRz

*/
    .wrapper {
        
    }

    h1 {
        
    }
    
    .stylezDiv {
        
    }
    
    .barf {
        
    }
    
    .nfo {
        
    }
			</textarea>	    
		</form>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script src="js/tabforTextarea.js"></script>
<script type="text/javascript">

  //+++++++++++++++++ CODEZ +++++++++++++++++
  
    var CSScode; 				// whatevs is in the console 
    var customCSS = getUrlVars()["css"]; 	// URL Parameter
    
    
    function update() {
	var sheet = document.getElementById('stylesheet');
	sheet.setAttribute("href","css/base.css");
	var CSScode = document.getElementById('console').value;
	document.getElementById('customcss').innerHTML = CSScode;
    }
    
    function saveit() {
	var sName = document.getElementById('sName').value;
	var aName = document.getElementById('aName').value;
		    
	if(sName == "") { alert('gotta name your stylez!'); return false;}
	else if(aName == "") { alert('give yourself sum creidt!'); return false;}
	else {
		document.forms["mystyelz"].submit();
		alert('your stylez haz been saved! check out the stylez list on the left! Click on your stylez + email your custom gli.tc/h url to a friend!');
	}
	
    }
    
    function submitCSS(s) {        
        var selected = s.options[s.selectedIndex].value;
	window.location = 'index.php?css='+selected;
    }
    
    function preloader(s) {
	var selected = s.options[s.selectedIndex].value;
	$.ajax({
		url: "css/"+selected,
		dataType: "text",
		success: function(cssText) {
		    document.getElementById('console').value = cssText;
		}
	});
    }
    
    function expand() {
	document.getElementById('right').style.width = '50%';
	document.getElementById('left').style.width = '50%';
	var b = document.getElementById('cb');
	b.innerHTML = "CLOSE CONSOLE"
	b.setAttribute("onclick","contract()");
    }
    
    function contract() {
	document.getElementById('right').style.width = '0%';
	document.getElementById('left').style.width = '100%';
	var b = document.getElementById('cb');
	b.innerHTML = "OPEN CONSOLE";
	b.setAttribute("onclick","expand()");	
    }
    
    function getUrlVars() {
	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
		vars[key] = value;
	});
	return vars;
    }
    
    function loadCSS() {
	if(customCSS != undefined) {
		var sheet = document.getElementById('stylesheet');
		sheet.setAttribute("href","css/"+customCSS);
	}
	tagBugs();
    }
    

</script>


</body>
</html>