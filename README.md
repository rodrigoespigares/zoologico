# Central Park Zoo

Proyecto realizado para la gestión de entradas de un zoo. Es posible gestionar y crear tanto animales como rutas en la parte del administrador.

> [!NOTE]
> Compatible con navegadores Chrome y Mozilla ademas de contenido responsivo

> [!NOTE]
> Roles permitidos para el usuario: cliente (por defecto), guia (gestiona rutas), cuidador(gestiona animales), admin(gestiona todo)

## Guia de instalación

Para completar la instalación del proyecto es necesario tener instalado composer y node, si esto es así deberemos poner el comando

```
composer update
```

Una vez completada la instalación deberemos hacer:

```
npm install
```

Y tras esto:

```
npm run build
```
Tras esto deberemos crear la base de datos, y hacer los inserts necesarios:

```
php artisan migrate
```

Tras esto se pueden hacer los inserts.

Una vez hecho esto se puede iniciar el servicor con:

```
php artisan serve
```


## Contenido aprendido

Con este proyecto trabajando en grupo hemos aprendido a realizar:

Consultas básicas y complejas con el ORM de laravel.
Utilizar las vistas con blade y gestionar errores y mensajes de aceptado.
Usar laravel y gestionar a los usuarios y registro.

## Galeria
![imagen](https://github.com/rodrigoespigares/zoologico/assets/94736646/343396b4-a51b-4852-87d4-8615276bfc76)

![imagen](https://github.com/rodrigoespigares/zoologico/assets/94736646/a794bb9b-fb61-4140-99d9-2d0d801fc83f)

![imagen](https://github.com/rodrigoespigares/zoologico/assets/94736646/5542c694-fc70-46af-b0e1-903ce2a8e746)

## Autores

Realizado por Rodrigo y José Miguel.
