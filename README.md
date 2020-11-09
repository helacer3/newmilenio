# Store con pagos PlaceToPay WebCheckout - Symfony5

_ Tienda con integración con sistema de pagos PlaceToPay (Web Checkout)

## Comentarios:
_ El reporte de ordenes se dejó sin fitro de usuario, teniendo en cuenta que no existe un sistema de autenticación, para validar qué ordenes mostrar.

### Instalación 🔧

_ clonar el proyecto

_ ejecutar composer install, para descargar los paquetes necesarios

_ crear tablas de producto y ordenes con el comando: php bin/console doctrine:schema:update --force

_ correr el siguiente insert, para crear el producto de prueba:

```
insert  into `products`(`id`,`product_name`,`product_sku`,`product_image`,`created_at`,`updated_at`,`value`,`Status`) 
values (1,'PHP','php123','images/cursophp.jpg','2020-11-08 22:30:42','2020-11-08 22:30:49',200000,1);
```
_ configurar los parámetros de conexión a la base de datos, en el archivo: .env

_ ingresar a la APP desde su navegador preferido, con al siguiente URL. (en el home carga por defecto el listado de productos)

_ Listado Productos
http://URLBASE/

_ Listar Órdenes Creadas
http://URLBASE/showOrders