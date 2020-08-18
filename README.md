# Store con pagos PlaceToPay WebCheckout - Symfony5

_ Tienda con integración con sistema de pagos PlaceToPay (Web Checkout)

## Comentarios:
_ La tienda se generó en modo demo, los datos del producto no son tomados de base de datos.
_ El reporte de ordenes se dejó sin fitro de usuario, teniendo en cuenta que no existe una autenticación de usuarios, para valdiar qué ordenes mostrar

### Instalación 🔧

_ clonar el proyecto

_ composer update para descargar los paquetes necesario

_ crear tabla de ordenes con el comando: php bin/console doctrine:schema:update --force

_ configurar los parámetros de conexión a la base de datos, en el archivo: .env

_ ingresar a la APP desde su navegador preferido