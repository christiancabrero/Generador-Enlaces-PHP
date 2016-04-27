<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--<meta http-equiv="refresh" content="1"><!--Linea que refresca la página-->
<title>Enlaces</title>

<!-- HOJAS DE ESTILO -->
<meta name="viewport" content="width=device-width" />
<link href="reset.css" rel="stylesheet" type="text/css"/>
<link href="style.css" rel="stylesheet" type="text/css"/>
<!-- FIN HOJAS DE ESTILO -->
</head>
<body align=center>
<?php

	$direccion=$_REQUEST['direccion'];
	$modo=$_REQUEST['modo'];
	$inicio=$_REQUEST['inicio'];
	$fin=$_REQUEST['fin'];
	$limite=$_REQUEST['limite'];
	$busqueda="/<h3>.*<\/h3>/"; //Patrón PCRE
	set_time_limit($limite); //Tiempo límite de ejecución, si no se pone, por defecto es 30
	
	echo "<h2>Enlaces generados: "."$fin-$inicio"."</h2>";
	echo "<a href=\"javascript:history.back()\">Atras</a>";
	
	if($modo=="fichero"){
		$fichero=fopen("enlaces_generados.html","a") or die("No se puede crear.");
	
		for($i=$inicio;$i<=$fin;$i++){ //Especificación de páginas de links
		
			$url = $direccion.$i; //Direccion completa
			$contenido = file_get_contents($url); //Guarda todo el contenido de la pagina
		
			preg_match_all($busqueda,$contenido,$salida); //Patrón,Contenido y Resultado de la búsqueda
			foreach ($salida as $titulo); //Conversión de Array a String
		
			echo "<a href=\"$url\">$titulo[0]</a>"; //Muestra por pantalla
		
			fputs ($fichero,"\n"."<a href=\"$url\">$titulo[0]</a>"."\n"); //Guarda datos en un archivo
		}
		fclose ($fichero);
	}
	elseif($modo=="no"){
		for($i=$inicio;$i<=$fin;$i++){ //Especificación de páginas de links
		
			$url = $direccion.$i; //Direccion completa
			$contenido = file_get_contents($url); //Guarda todo el contenido de la pagina
		
			preg_match_all($busqueda,$contenido,$salida); //Patrón,Contenido y Resultado de la búsqueda
			foreach ($salida as $titulo); //Conversión de Array a String
		
			echo "<br>"."$i"." - "."$titulo[0] "."<a href=\"$url\">$url</a>"; //Muestra por pantalla
		}
	}
	elseif($modo=="SQL"){
		
		
		
		
		
		
		
		
		
	}
	
?>
</body>
</html>