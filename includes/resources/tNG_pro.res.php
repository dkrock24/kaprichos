<?php
/*
 * ADOBE SYSTEMS INCORPORATED
 * Copyright 2007 Adobe Systems Incorporated
 * All Rights Reserved
 * 
 * NOTICE:  Adobe permits you to use, modify, and distribute this file in accordance with the 
 * terms of the Adobe license agreement accompanying it. If you have received this file from a 
 * source other than Adobe, then your use, modification, or distribution of it requires the prior 
 * written permission of Adobe.
 */

$res = array(
'BADWORDS_SQL_ERROR' => 'Error al leer la lista de malas palabras desde la base de datos!',
'BADWORDS_SQL_ERROR_D' => 'Error reading bad word list from database! %s, %s',
'BADWORDS_FILE_ERROR' => 'Error al leer la lista de malas palabras desde el archivo.',
'BADWORDS_FILE_ERROR_D' => 'Error reading bad words from file: %s',
'FOLDER_DEL_ERROR' => 'Error al borrar directorio. El error de servidor es: %s',
'FOLDER_DEL_ERROR_D' => 'Error deleting folder. Server error is: %s',
'FORBIDDEN_FIELD_ERROR' => 'Campo tiene palabras prohibidas.',
'FORBIDDEN_FIELD_ERROR_D' => '',
'LOGIN_LOGGER_ERROR' => '\'Ocurri&oacute; un error mientras ingresaba.',
'LOGIN_LOGGER_ERROR_D' => 'An error occured when saving log information: %s, %s',
'LOGIN_MESSAGE__MAXTRIES' => 'La cuenta ha sido deshabilitada porque usted alcanz&oacute; el m&aacute;ximo de intentos de ingreso fallidos permitido.',
'LOGIN_MESSAGE__MAXTRIES_D' => '',
'LOGIN_MESSAGE__ACCOUNT_EXPIRE' => 'Su cuenta ha expirado.',
'LOGIN_MESSAGE__MAXTRIES_DENIED' => 'La cuenta ha sido temporalmente deshabilitada (%s minutos) porque usted alcanz&oacute; el m&aacute;ximo de intentos de ingreso fallidos permitidos (%s)',
'LOGIN_MESSAGE__MAXTRIES_DENIED_D' => '',
'LOGIN_MESSAGE__MAXTRIES_DENIED_PERMANENT' => 'La cuenta ha sido permanentemente deshabilitada (%s minutos) porque usted alcanz&oacute; el m&aacute;ximo de intentos de ingreso fallidos permitidos (%s)',
'LOGIN_MESSAGE__MAXTRIES_DENIED_PERMANENT_D' => '',
'LOGIN_MESSAGE__MAXTRIES_ERROR_D' => 'Error executing the SQL %s, %s',
'TRIGGER_MESSAGE__CHECK_FORBIDDEN_WORDS' => 'Se encontraron palabras prohibidas en el(los) campo(s) \'%s\'.',
'ERR_DOWNLOAD_FILE_D' => 'Error downloading file! %s, %s',
'LOGIN_MESSAGE__MAXTRIES_ERROR_D' => 'Error executing the SQL %s, %s',
'LOGIN_MESSAGE__EXP_ACCOUNT_ERROR' => 'Error ejecutando SQL',
'LOGIN_MESSAGE__EXP_ACCOUNT_ERROR_D' => 'Error executing the SQL %s, %s',
'LOGIN_MESSAGE__EXP_ACCOUNT' => 'Su cuenta ha expirado!',
'LOGIN_MESSAGE__EXP_ACCOUNT_D' => '',
'INCREMENTER_ERROR' => 'Error al incrementar el campo de contador!',
'INCREMENTER_ERROR_D' => 'Error incrementing the counter field! %s, %s',
'INCREMENTER_ERROR_FK' => 'Usted no puede descargar archivos mientras no haya ingresado!',
'INCREMENTER_ERROR_FK_D' => 'You cannot use the Download Files behavior if you are not logged in!<br/>WARNING: You should apply a Restrict Access to Page behavior on all files where you use Download Files with limit per user! %s',
'INCREMENTER_ERROR_PK' => 'Error descargando archivo! La llave primaria no tiene valor.',
'INCREMENTER_ERROR_PK_D' => 'Error downloading file! Primary key has no value! %s',
'CHECK_COUNTER_ERROR' => 'Error al incrementar el contador de descargas! %s',
'CHECK_COUNTER_ERROR_D' => 'Error incrementing the download counter! %s',
'CHECK_COUNTER_ERROR_MAX' => 'Usted ha alcanzado el n&uacute;mero m&aacute;ximo de descargas %s',
'CHECK_COUNTER_ERROR_MAX_D' => '',
'TRIGGER_MESSAGE__CHECK_FORBIDDEN_WORDS_D' => '',
'EMAIL_ERROR_FOLDER' => 'Ha ocurrido un error al leer el directorio que contiene el archivo adjunto.',
'EMAIL_ERROR_FOLDER_D' => 'An error occured when reading the folder with the attachment %s, %s.',
'MAX_FILES_NO_REACHED' => 'Se ha alcanzado el n&uacute;mero m&aacute;ximo de achivos (%s)',
'FOLDER_DEL_SECURITY_ERROR' => 'Error de carpeta. Error de seguridad.',
'FOLDER_DEL_SECURITY_ERROR_D' => 'Folder error. Security Error. Folder \'%s\' is out of base folder \'%s\'.',
'FLASH_MAX_SIZE_REACHED' => 'Omitiendo archivo %s. El tama&ntilde;o del archivo es %s kB y el tama&ntilde;o m&aacute;ximo permitido es %s kB.',
'FLASH_MAX_FILES_REACHED' => 'Omitiendo archivo %s. No puede subir mas de %s archivos.',
'FLASH_EMPTY_FILE' => 'Saltando archivo %s. El tama&ntilde;o de archivo es 0 kB. No puede subir archivos vac&iacute;os.',
'DELETE' => 'Borrar',
'UPLOAD' => 'Subir',
'CLOSE' => 'Cerrar Ventana',
'FILES' => 'archivos',
'MAXFILES' => 'de m&aacute;ximo',
'FLASH_SKIPPING' => 'Rechazando archivo',
'FLASH_HTTPERROR' => 'Ha ocurrido un error al intentar comunicar con el sevidor para enviar: %s. Error: %s.',
'FLASH_HTTPERROR_HEAD' => 'Error de HTTP',
'FLASH_IOERROR' => 'Ha ocurrido un error de lectura/escritura: %s.',
'FLASH_IOERROR_HEAD' => 'Error de IO',
'FLASH_COMPLETE_MSG' => 'Cerrando el Upload de Flash. Si el navegador no se actualiza autom&aacute;ticamente, haga click en el bot&oacute;n de actualizar',
'FLASH_UPLOAD_BATCH' => 'Subido %s de %s',
'FLASH_UPLOAD_SINGLE' => 'Subiendo Archivo',
'CLICK_ENLARGE' => 'Click para aumentar',
'EMPTY_MUP_POPUP' => 'No hay archivos para subir al servidor.<br /> Haga click en el bot&oacute;n de examinar para seleccionar los archivos a subir.',
);
?>