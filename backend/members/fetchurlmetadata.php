
<?php
echo $_GET['url'] = $links[0][0];
if($_GET['url']!='')
{
function get($a,$b,$c)
{ // Gets a string between 2 strings
$y = explode($b,$a);
$x = explode($c,$y[1]);
return $x[0];
}
$url=get_meta_tags("".$_GET['url'].""); 
?>
<div class="result">
<div class="title pad"><?php echo get(file_get_contents(''.$_GET['url'].''), "<title>", "</title"); ?></div>
<div ><strong>Description: </strong><i style="color:#008000;"><?php echo ($url["description"]); ?></i></div>
<div ><strong>Keywords: </strong><?php echo substr($url["keywords"], 0, 128); ?>..</div>
</div>
<?php
}
?>