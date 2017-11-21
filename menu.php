<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("Conexao/");
    include_once("../template/templateIndTop.php");
    include_once("Conexao.class.php");
    include_once("../Pagina/Pagina.class.php");
    include_once("../Pagina/PaginaDAO.class.php");
    include_once("../Util/Util.class.php");
chdir(dirname(__FILE__));
error_reporting(0);
$idPagina = 3;
$idIdioma = $_GET['idIdioma']; // 1 = Port, 2 = Ingl e 3 = Espa

$Util = new Util();
$Pagina = new Pagina($idPagina,$idIdioma);
$Pagina->carregarTextos();

function quebraTexto($string){
  $paragrafo  = "<div class='tituloB'>";
  $paragrafo .= str_replace("\n","</div><br><div class='titulo'>",$string);
  $paragrafo .= "</div>";
  return $paragrafo;
}
?>
<script>
if (!document.layers)
document.write('<div id="divStayTopLeft" style="position:absolute">')
</script>

<layer id="divStayTopLeft">

<!--EDIT BELOW CODE TO YOUR OWN MENU-->
<table border="1" width="120" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" bgcolor="#FFFFCC">
      <embed src="img/esteira.swf" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="121" height="500" align="absmiddle"></td>
  </tr>
</table>
<!--END OF EDIT-->

</layer>


<script type="text/javascript">

/*
Floating Menu script-  Roy Whittle (http://www.javascript-fx.com/)
Script featured on/available at http://www.dynamicdrive.com/
This notice must stay intact for use
*/

//Enter "frombottom" or "fromtop"
var verticalpos="frombottom"

if (!document.layers)
document.write('</div>')

function JSFX_FloatTopDiv()
{
	var startX = 100,
	startY = 570;
	var ns = (navigator.appName.indexOf("Netscape") != -1);
	var d = document;
	function ml(id)
	{
		var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
		if(d.layers)el.style=el;
		el.sP=function(x,y){this.style.left=x;this.style.top=y;};
		el.x = startX;
		if (verticalpos=="fromtop")
		el.y = startY;
		else{
		el.y = ns ? pageYOffset + innerHeight : document.body.scrollTop + document.body.clientHeight;
		el.y -= startY;
		}
		return el;
	}
	window.stayTopLeft=function()
	{
		if (verticalpos=="fromtop"){
		var pY = ns ? pageYOffset : document.body.scrollTop;
		ftlObj.y += (pY + startY - ftlObj.y)/8;
		}
		else{
		var pY = ns ? pageYOffset + innerHeight : document.body.scrollTop + document.body.clientHeight;
		ftlObj.y += (pY - startY - ftlObj.y)/8;
		}
		ftlObj.sP(ftlObj.x, ftlObj.y);
		setTimeout("stayTopLeft()", 10);
	}
	ftlObj = ml("divStayTopLeft");
	stayTopLeft();
}
JSFX_FloatTopDiv();
</script>
<table border="0" width="98%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" class="tableConteudo" align="center">
<tr><td class="titulo"><?=quebraTexto($Pagina->textos[7])?></td></tr>
<tr><td class="text"><?=$Pagina->textos[8]?></td></tr>
<tr><td class="titulo"><?=$Pagina->textos[6]?></td></tr>
<tr><td class="text"><?=$Util->paragrafoTexto($Pagina->textos[9])?></td></tr>
<tr><td class="titulo"><?=$Pagina->textos[10]?></td></tr>
<tr><td class="text"><?=$Pagina->textos[11]?></td></tr>
<tr><td class="titulo"><?=$Pagina->textos[12]?></td></tr>
<tr><td class="text" valig="top"><?=$Util->paragrafoTexto($Pagina->textos[13])?></td></tr>
</table>
<script language="javascript"> selecionar(3); </script>
<?php
chdir("Conexao/");
    include_once("../template/templateIndDown.php");
chdir(dirname(__FILE__));
error_reporting(0);
?>
