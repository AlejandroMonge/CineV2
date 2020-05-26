Esta es una pagina diseñada para comentar y votar tus peliculas favoritas. 

Las peliculas se pueden añadir mediante un usuario que se crea cuando ejecutamos los seeders.

USUARIO: admin@administrador.com
CONTRASEÑA: admin1234

Este es el unico usuario que puede editar el contenido de la pagina, dentro de la misma pagina.

Los demas usuarios creados solo pueden comentar y votar.
Solo se permite un comentario ( por usuario ) por pelicula, si se desea cabiar el comentario se debe eliminar y volver a escribir. (hay un bote de basura en la parte superior del comentario, ahi se elimina).

Todos los usuarios son capaces de agregar peliculas a FAVORITAS o PROXIMAS A VER. Con los iconos de corazon(Favoritas) y reloj (Proximas a ver). Toda pelicula que comentes tambien aparecera un icono indicandote que ya la haz comentado.

Nombre base de datos:
DB_DATABASE=cine

Envio de correos electronicos (utilice sendgrid para enviar los correos, supongo que no habra problemas al montar la pagina desde otro equipo. Tambien utilizo mi correo personal para enviar correos por que no me dejo autentificar uno recien creado para la pagina): 

MAIL_MAILER=smtp
MAIL_HOST=smtp.sendgrid.net
MAIL_PORT=587
MAIL_USERNAME=apikey
MAIL_PASSWORD=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
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS='kmonge_rey@hotmail.com'
MAIL_FROM_NAME="CINE"
