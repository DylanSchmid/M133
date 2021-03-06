<?php 
require_once("login_functions.php");
if (isLoggedIn()): ?>
<br>
<h2>Vorwort</h2>
<p>CSS steht für "Cascading Style Sheets" und dient dazu, Formatierungen, wie z.B. Schriftart oder -grösse, sowie die Farbe, aber auch verschiedene Positionierungen vorzunehmen. Mit CSS kann eine ganze Homepage relativ einfach einheitlich gestaltet werden, und im Internet sind darum die meisten Homepages damit aufgebaut. Diese Kurzanleitung sollte einen kurzen Einstieg in CSS geben, um einen kurzen Überblick über CSS zu erhalten. Die Links führen zu weiteren Internetseiten, die wertvolle und umfangreiche Informationen zum Thema CSS enthalten.</p>
<p>Formatierungen können in jeder HTML-Datei einzeln gespeichert werden, was aber aufwendig ist, und bei einer späteren Anpassung zu einem ernormen Arbeitsaufwand führen kann, da jede Seite einzeln angepasst werden muss. Die Idee ist nun, dass man alle diese allgemeingültigen Formatierungen in eine separate Datei (z.B. style.css) schreibt, und dann von den einzelnen HTML-Seiten auf diese Datei zugreift.</p>
<?php else:
	header("Location: ../index.php");
endif;
?>