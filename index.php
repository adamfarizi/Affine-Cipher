<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Program Affine Cipher - SWACoder</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="bootstrap/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="bootstrap/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="bootstrap/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="bootstrap/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="bootstrap/bower_components/morris.js/morris.css">
	<link rel="stylesheet" href="bootstrap/bower_components/jvectormap/jquery-jvectormap.css">
	<link rel="stylesheet" href="bootstrap/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="bootstrap/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="bootstrap/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<script language="JavaScript" src="bootstrap/js/affine.js"></script>
	<script language="JavaScript" src="bootstrap/js/util.js"></script>
	<script language="JavaScript">
function start_update()
{
   if (! document.getElementById)
   {
      alert('Sorry, you need a newer browser.');
      return;
   }

   if ((! document.Affine_Loaded) || (! document.Util_Loaded) ||
       (! document.getElementById('affine')))
   {
      window.setTimeout('start_update()', 100);
      return;
   }
   upd();
}


function upd()
{
   if (IsUnchanged(document.encoder.a) * IsUnchanged(document.encoder.b) *
       IsUnchanged(document.encoder.encdec) *
       IsUnchanged(document.encoder.text))
   {
      window.setTimeout('upd()', 100);
      return;
   }
   
   var e = document.getElementById('affine');

   if (document.encoder.text.value == '')
   {
      e.innerHTML = 'Isi Planning Text, dan lihat hasilnya disini!';
   }
   else if (! IsCoprime(document.encoder.a.value * 1, 26)) {
      e.innerHTML = 'The value for "a" is not coprime to 26.  Pick another.';
   }
   else
   {
      e.innerHTML = SwapSpaces(HTMLEscape(Affine(document.encoder.encdec.value * 1,
	 document.encoder.text.value,
         document.encoder.a.value * 1, document.encoder.b.value * 1)));
   }
   
   window.setTimeout('upd()', 100);
}

function a_plus()
{
   var a = document.encoder.a.value;
   if (a < 1)
   {
      a = 1;
   }
   else
   {
      a ++;
      while (! IsCoprime(a, 26))
      {
         a ++;
      }
   }
   document.encoder.a.value = a;
}

function a_minus()
{
   var a = document.encoder.a.value;
   if (a < 2)
   {
      a = 1;
   }
   else
   {
      a --;
      while (! IsCoprime(a, 26))
      {
         a --;
      }
   }
   document.encoder.a.value = a;
}

window.setTimeout('start_update()', 100);

	</script>
</head>

<body class="hold-transition skin-green sidebar-mini">

	<div class="wrapper">
	
		<header class="main-header">
			<a href="index2.html" class="logo">
			  <span class="logo-mini"><b>A</b>CP</span>
			  <span class="logo-lg"><b>AFFINE</b>CIPHER</span>
			</a>
			
			<nav class="navbar navbar-static-top">
			  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
			  </a>
			</nav>
		</header>
		
		<aside class="main-sidebar">
			<section class="sidebar">
				<ul class="sidebar-menu" data-widget="tree">
					<li><a href="index.php"><i class="fa fa-circle-o text-green"></i> <span>REFRESH</span></a></li>
					<li><a href="https://swacoder.blogspot.com/"><i class="fa fa-circle-o text-red"></i> <span>Script by SWACoder</span></a></li>
				</ul>
			</section>
		</aside>

		<div class="content-wrapper">
			<section class="content">
				<div class="box box-solid">
				
					<div class="box-header with-border">
					  <i class="fa fa-arrow-circle-right"></i>
						<h3 class="box-title">Program Affine Cipher</h3>
					</div>
					
					<div class="box-body">
						<form name="encoder" method=post action="#" onsubmit="return false;">
							<p>
								<select name="encdec">
								<option value="1">Enkripsi
								<option value="-1">Dekripsi
								</select>
							</p>
							<p>
								<b>a:  </b><input name="a" type="text" size="3" value="1"> -
								<input type="button" name="plus" value="+" onclick="a_plus()">
								<input type="button" name="minus" value="-" onclick="a_minus()">
							</p>
							<p>
							<b>b:  </b><select name="b">
							<option value=0>0</option>
							<option value=1>1</option>
							<option value=2>2</option>
							<option value=3>3</option>
							<option value=4>4</option>
							<option value=5>5</option>
							<option value=6>6</option>
							<option value=7>7</option>
							<option value=8>8</option>
							<option value=9>9</option>
							<option value=10>10</option>
							<option value=11>11</option>
							<option value=12>12</option>
							<option value=13>13</option>
							<option value=14>14</option>
							<option value=15>15</option>
							<option value=16>16</option>
							<option value=17>17</option>
							<option value=18>18</option>
							<option value=19>19</option>
							<option value=20>20</option>
							<option value=21>21</option>
							<option value=22>22</option>
							<option value=23>23</option>
							<option value=24>24</option>
							<option value=25>25</option>
							</select>
							</p>
							<p>
							<textarea name="text" rows="5" cols="80" placeholder="Masukan Text..."></textarea>
							</p>
						</form>
							<p>Hasil :</p>
							<table border=0 cellpadding=0 cellspacing=0 class="r_box" align="center" style="margin-top: 8px; margin-bottom: 8px;"><tr><td class="r_box"><span id='affine'></span>
							</td></tr></table>
					</div>
					
				  </div>
			</section>
		</div>
		
		
	</div>

<script src="bootstrap/bower_components/jquery/dist/jquery.min.js"></script>
<script src="bootstrap/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="bootstrap/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bootstrap/bower_components/raphael/raphael.min.js"></script>
<script src="bootstrap/bower_components/morris.js/morris.min.js"></script>
<script src="bootstrap/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="bootstrap/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="bootstrap/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="bootstrap/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="bootstrap/bower_components/moment/min/moment.min.js"></script>
<script src="bootstrap/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="bootstrap/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="bootstrap/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="bootstrap/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bootstrap/bower_components/fastclick/lib/fastclick.js"></script>
<script src="bootstrap/dist/js/adminlte.min.js"></script>
<script src="bootstrap/dist/js/pages/dashboard.js"></script>
<script src="bootstrap/dist/js/demo.js"></script>
</body>
</html>