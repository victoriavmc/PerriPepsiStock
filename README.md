<h1 align="center">Sistema Stock PerriPepsi</h1>

<p align="center">
  <img src="/public/PerriPepsi.png" alt="logoSistema">
</p>


**Sistema integral de gestión de stock para tiendas de bebidas**, diseñado para controlar inventarios, ventas, precios y roles específicos según las necesidades de cada usuario.

---

## Formulación de la problemática

La gestión ineficiente del inventario y los roles específicos en tiendas de bebidas puede ocasionar pérdidas económicas, desorganización y falta de control. Esto afecta la calidad del servicio y el desempeño comercial.

---

## Definición de la idea

Este proyecto busca una solución que permita administrar de manera centralizada y eficiente las operaciones de una tienda de bebidas, integrando módulos de inventario, precios, ventas y usuarios con un enfoque flexible y adaptado al contexto de bebidas alcohólicas y no alcohólicas.

---

## Objetivo general

Desarrollar un sistema de gestión de stock que facilite la administración integral de una tienda de bebidas, mejorando el control de inventario, la trazabilidad de productos y la asignación de funciones específicas para cada rol.

---

## Objetivos específicos

- Implementar un módulo de gestión de usuarios que permita asignar roles y funciones personalizadas.
- Crear un sistema de productos que permita registrar, actualizar y eliminar productos.
- Implementar un sistema de inventario que registre entradas y salidas de productos.
- Desarrollar un módulo de ventas para el registro de transacciones con trazabilidad (mayorista y minorista).
- Generar informes que faciliten el análisis de pérdidas, donaciones y stock crítico.
- Incluir visualización de métodos de inventario (PEPS, UEPS, Promedio).

---

## Límites

- El sistema está diseñado para gestionar una sola tienda; la expansión a múltiples tiendas requerirá una versión ampliada.
- No incluye integración con sistemas externos de pagos.
- No contempla análisis avanzados de ventas (como predicciones o estadísticas detalladas).

---

## Alcance

- Administración de roles y permisos, en este caso para cinco perfiles de usuarios.
- Gestión de inventarios para productos alcohólicos y no alcohólicos.
- Registro y seguimiento de ventas y precios.
- Generación de informes básicos de inventario.

---

## Requerimientos funcionales

- **Gestión de usuarios**:
  - Crear, editar y desactivar usuarios.
  - Asignar roles y funciones personalizadas.
- **Gestión de inventarios**:
  - Registrar entradas y salidas de productos.
  - Generar alertas por stock mínimo.
- **Gestión de ventas**:
  - Registrar ventas y asociarlas a facturas.
- **Reportes**:
  - Generar informes de inventario, pérdidas y movimientos.

---

## Requerimientos no funcionales

- **Interfaz de usuario**:
  - Intuitiva y accesible desde dispositivos móviles.
- **Seguridad**:
  - Encriptación de contraseñas.
  - Uso de variables de entorno (.env) para manejo de información sensible.
- **Escalabilidad**:
  - Posibilidad de adaptarse a múltiples tiendas en futuras versiones.

---

## Extras de siempre:

- **.env** (Edita como corresponda)
  - php artisan key:generate (Esto generará automáticamente una nueva clave y la guardará en el archivo .env.)
  - SESSION_DRIVER=file
- **composer upgrade**
- **npm install**

---
## Definición de la tecnología a utilizar

<p align="center">

  <img src="https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white" alt="Mysql"> 
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="Php"> 
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind_CSS"> 
  <img src="https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white" alt="Github">
</p>

<details>
  <summary><strong>Ver detalles de la tecnología utilizada</strong></summary>

  - **Base de datos**: MySQL  
  - **Backend**: PHP, Laravel  
  - **Frontend**: Tailwind CSS  
  - **Control de versiones**: Git y GitHub  
  - **Seguridad**: Uso de archivo `.env` para configurar claves y accesos sensibles.

</details>