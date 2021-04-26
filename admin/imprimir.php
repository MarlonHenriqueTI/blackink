<?php 

// INÍCIO DO CÓDIGO DE IMPRESSÃO DIRETA

$texto="TEXTO PARA IMPRIMIR"; // texto que será impresso

$_SESSION['PrintBuffer']="$texto";

$handle=printer_open(); // impressora configurada no windows

printer_set_option($handle, PRINTER_MODE, "RAW");

printer_write($handle, $_SESSION['PrintBuffer']);

printer_close($handle);

// FIM DO CÓDIGO DE IMPRESSÃO DIRETA