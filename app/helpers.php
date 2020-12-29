<?php

	function getSelect($objeto, $valor){
		return $objeto==$valor ? 'selected':'';
	}

	function getCheck($objeto, $valor){
		if(is_array($objeto) && in_array($valor, $objeto)) {
			return 'checked';
		}
	}

	function getRadio($objeto, $valor){
		return $objeto==$valor ? 'checked':'';
	}

	function str2array($cadena){
		return $array = explode(',', $cadena);
	}

	function array2str($array){
		return $cadena = implode(',', $array);
	}

 ?>