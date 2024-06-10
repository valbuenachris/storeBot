<?php

     // Función para eliminar los acentos de una cadena
function remove_accents($str) {
    // Reemplazar caracteres acentuados en minúsculas y mayúsculas
    $search = array('á', 'ä', 'â', 'à', 'å', 'ã', 'é', 'ë', 'ê', 'è', 'í', 'ï', 'î', 'ì', 'ó', 'ö', 'ô', 'ò', 'õ', 'ú', 'ü', 'û', 'ù', 'Á', 'Ä', 'Â', 'À', 'Å', 'Ã', 'É', 'Ë', 'Ê', 'È', 'Í', 'Ï', 'Î', 'Ì', 'Ó', 'Ö', 'Ô', 'Ò', 'Õ', 'Ú', 'Ü', 'Û', 'Ù');
    $replace = array('a', 'a', 'a', 'a', 'a', 'a', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'A', 'A', 'A', 'A', 'A', 'A', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U');
    return str_replace($search, $replace, $str);
}
