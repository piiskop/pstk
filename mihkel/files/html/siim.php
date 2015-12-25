<!DOCTYPE html>
<html>
	<head>
	<title>Siim Tõld</title>
	<style>
		html{
			background-color: white;
		}
		body {
			
			
			font-family:times;
			height:850px;
			margin:0 auto;
			width:744px;
			position:relative;
			font-size:25px;
		}
		#top_padding{
			padding: 47px 0 0 0;
			/*
			Top padding is separated, because header may not have any padding from left side
			*/
		}

		.header {
			text-align: center;
			top:20px;
			width:438px;
		}
		img{
			height:440px;
			position: absolute;
			right:17px;
			top:47px;
			width:288px;
		}
		h1{
			font-size:43px;
			
			font-weight:bold;
			margin:0;
		}
		p{
			margin:0;
		}
		#email{
			font-size: 32px;
		}
		#education{
			padding: 127px 0 0 30px;
		}
		#experience{
			padding: 18px 0 0 30px;
		}
		.title{
			font-weight:bold;
			margin:0;
			padding:0;
		}
		.date {
			display:inline-block;
			margin:0 5px 0 0;
			padding:0;
			width:120px;
		}
		.specification_1 {
			display: inline-block;
			margin: 0;
			padding: 0;
			width: 280px;
		}
		.specification_2 {
			font-size:22px;
			margin: 0 0 0 134px;
			padding:;
			width: 280px;
		}
		#candidate_nr{
			position:absolute;
			font-size:168px;
			font-weight: bold;
			right:43px;
			top:468px;
		}
		#footer{
			padding: 10px 0 0 30px;
		}
		#background{
		background-color: #554601;
		/*#c3a000|#554601*/
		background-image: url("pic/background.jpg");
		}

	</style>
	<meta charset="UTF-8"/>
	</head>
	<body>
		<div id="background">
			<div id="top_padding"><!--This includes: 1) Header 2) Eduvation 3)Picture-->
				<div class="header">
					<h1>Kandidaat nr 194</h1>
					<h1>SIIM TÕLD</h1>
					<p id="email">siim.told@vlmeiekodu.ee</p>
				</div>
				<div id="education">
					<p class="title">Haridus:</p>
					<div class="date">2005-2011</div>
					<div class="specification_1">Tallinna Tehnikaülikool</div>
					<div class="specification_2">Magistraad tehnikateaduses</div>
					<div class="date">2002-2005</div>
					<div class="specification_1">Nõo Reaalgümnaasium</div>
					</br>
					<div class="date">1993-2002</div>
					<div class="specification_1">Otepää Gümnaasium</div>
				</div>
				<img src="pic/siim.jpg" />
			</div>
			<div id="experience">
				<div class="title">Töökogemus:</div>
				<div class="date">2013-...</div>
				<div class="specification_1">Uniro Grupp OÜ</div>
				<div class="specification_2">Projectijuht</div>
				<div class="date">2011-2013</div>
				<div class="specification_1">P.P Ehitusjärelevalve OÜ</div>
				<div class="specification_2">Ehitusinsener / projektijuht</div>
				<div class="date">2010-2011</div>
				<div class="specification_1">Alutex Pro OÜ</div>
				<div class="specification_2">Projektijuht</div>
				<div class="date">2006-2010</div>
				<div class="specification_1">Glaskek Alumiinium AS</div>
				<div class="specification_2">Projektijuht</div>
			</div>
			<div id="candidate_nr">194</div>
			<div id="footer">
				<p><span style="font-weight:bold">Kuulumine erialaliitudesse:</span> ehitusinseneride Liidu liige</p>
				<p><span style="font-weight:bold">Tugevad omadused:</span> Hea suhtlemisoskus,</p>
				<p><span style="padding: 0 0 0 95px">Kohusetundlikkus ja korrektsus</span></p>
				<p><span style="font-weight:bold">Huvialad:</span> Orienteerumine</p>
		</div>
		</div>
	</body>
</html>