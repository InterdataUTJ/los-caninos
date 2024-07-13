# Documentación de URLs

En esta página se documentan los diferentes enlaces de la app, su descripción, los permisos de acceso y demás detalles varios.

> [!IMPORTANT]  
> La pagina implementa el modelo de diseño MVC, por lo que todas las URLs aquí documentadas representan una vista.
> Dichas vistas cuentan con su propio controlador alojado en la ruta `/controllers/[url]/`. Ejemplo:
> `/controllers/perfil/editar/`

### Tabla de contenido

- [URLs globales](#urls-globales)
  - [Inicio](#inicio)
  - [Iniciar sesión](#iniciar-sesión)
  - [Crear una cuenta](#crear-una-cuenta)
  - [Cerrar sesión](#cerrar-sesión)
- [General](#general)
  - [Ver perfil](#ver-perfil)
  - [Editar perfil](#editar-perfil)
  - [Panel de control](#panel-de-control)
- [Servicios](#servicios)
  - [Ver servicios](#ver-servicios)
  - [Detalle servicio](#detalle-servicio)
  - [Editar servicio](#editar-servicio)
  - [Nuevo servicio](#nuevo-servicio)
  - [Eliminar servicio](#eliminar-servicio)
- [Mascotas](#mascotas)
  - [Ver mascotas](#ver-mascotas)
  - [Detalle mascota](#detalle-mascota)
  - [Editar mascota](#editar-mascota)
  - [Nueva mascota](#nueva-mascota)
  - [Eliminar mascota](#eliminar-mascota)
- [Empleados](#empleados)
  - [Ver empleados](#ver-empleados)
  - [Detalle empleado](#detalle-empleado)
  - [Editar empleado](#editar-empleado)
  - [Nuevo empleado](#nuevo-empleado)
  - [Eliminar empleado](#eliminar-empleado)
- [Clientes](#clientes)
  - [Ver cientes](#ver-clientes)
  - [Detalle ciente](#detalle-cliente)
- [Reportes](#reportes)
  - [Reporte: servicios](#reporte-servicios)
  - [Reporte: clientes](#reporte-clientes)
  - [Reporte: mascotas](#reporte-mascotas)
  - [Reporte: empleados](#reporte-empleados)



## URLs globales


### Inicio

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Ninguno</td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Página principal donde se mostrara información relevante sobre el negocio para atraer nuevos clientes.
      Este URL no requiere ningun tipo de cuenta y puede ser accedido sin iniciar sesión o crear una cuenta.
    </td>
  </tr>
</table>


### Iniciar sesión

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/login/</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Ninguno</td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Inicia sesión con una cuenta ya existente. Puede ser usada por clientes y empleados. 
    </td>
  </tr>
</table>


### Crear una cuenta

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/singup/</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Ninguno</td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Permite crear una cuenta nueva. La cuenta creada tendra rol de cliente, los privilegios de empleado pueden ser otorgados más
      tarde por un gerente. 
    </td>
  </tr>
</table>


### Cerrar sesión

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/logout/</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Cualquiera <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Permite cerrar la sesión del usuario actual, sin importar el rol o permisos que este tenga.
    </td>
  </tr>
</table>




## General


### Ver perfil

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/perfil/</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Cualquiera <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite ver al usuario información relacionada a su perfil, ya sea que este sea un cliente o un empleado.
    </td>
  </tr>
</table>


### Editar perfil

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/perfil/editar/</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Cualquiera <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite al usuario editar información relacionada a su perfil, ya sea que este sea un cliente o un empleado.
      Algunas propiedades de los empleados (como puesto, sueldo, etc.) solo pueden ser editados por un gerente.
    </td>
  </tr>
</table>


### Panel de control

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/panel/</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Cualquiera <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Esta es la página más importante para usuarios. Permite ver a los distintos roles las acciones que pueden llevar a cabo
      en los siguientes URLs, las opciones disponibles cambian segun el rol (cliente, veterinario o gerente).
    </td>
  </tr>
</table>




## Servicios


### Ver servicios

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/servicios/</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Veterinario, Gerente y Cliente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite ver al usuario los servicios realizados. Para los empleados se mostraran todos los servicios encontrados segun los
      filtros aplicados. Para los clientes solo se mostraran aquellos servicios aplicados a sus mascotas.
    </td>
  </tr>
</table>


### Detalle servicio

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/servicios/ver/?id=[idServicio]</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Veterinario, Gerente y Cliente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite al usuario ver toda la información relacionada al servicio actual. El usuario debe de tener acceso al servicio que
      se quiere ver, de lo contrario se arrojara un error.
    </td>
  </tr>
</table>


### Editar servicio

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/servicios/editar/?id=[idServicio]</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Veterinario y Gerente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite al empleado editar toda la información relacionada al servicio actual.
    </td>
  </tr>
</table>


### Nuevo servicio

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/servicios/nuevo/</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Veterinario y Gerente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite al empleado registrar un nuevo servicio. Las mascotas deben de estar previamente registradas.
    </td>
  </tr>
</table>


### Eliminar servicio

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/servicios/eliminar/?id=[idServicio]</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Veterinario y Gerente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite al empleado eliminar el registro de un servicio. Este proceso requiere confirmación para asegurar que
      la acción deseada no es un error. 
    </td>
  </tr>
</table>




## Mascotas


### Ver mascotas

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/mascotas/</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Veterinario, Gerente y Cliente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite ver al usuario las mascotas registradas. Para los empleados se mostraran todas las mascotas encontradas segun los
      filtros aplicados. Para los clientes solo se mostraran aquellas que esten registradas en su perfil.
    </td>
  </tr>
</table>


### Detalle mascota

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/mascotas/ver/?id=[idMascota]</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Veterinario, Gerente y Cliente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite al usuario ver toda la información relacionada a la mascota actual. El usuario debe de tener acceso a esta mascota, 
      de lo contrario se arrojara un error.
    </td>
  </tr>
</table>


### Editar mascota

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/mascotas/editar/?id=[idMascota]</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Veterinario y Gerente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite al empleado editar toda la información relacionada a la mascota actual.
    </td>
  </tr>
</table>


### Nueva mascota

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/mascotas/nuevo/</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Veterinario y Gerente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite al empleado registrar una nueva mascota. El cliente debe de haberse registrado con anterioridad.
    </td>
  </tr>
</table>


### Eliminar mascota

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/mascotas/eliminar/?id=[idMascota]</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Veterinario y Gerente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite al empleado eliminar el registro de una mascota. Este proceso requiere confirmación para asegurar que
      la acción deseada no es un error. 
    </td>
  </tr>
</table>




## Empleados


### Ver empleados

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/empleados/</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Gerente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite ver al gerente los empleados registradas y su estado (Activo o Inactivo).
    </td>
  </tr>
</table>


### Detalle empleado

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/empleados/ver/?id=[idEmpleado]</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Gerente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite al gerente ver toda la información relacionada al empleado actual.
    </td>
  </tr>
</table>


### Editar empleado

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/empleados/editar/?id=[idEmpleado]</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Gerente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite al gerente editar toda la información relacionada al empleado actual. Aquí se puede editar el estado en caso de despidos.
    </td>
  </tr>
</table>


### Nuevo empleado

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/empleados/nuevo/</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Gerente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite al gerente registrar un nuevo empleado. El empleado debe de haberse registrado con anterioridad con una cuenta como cliente, 
      esto con el fin de asegurar que el sea el unico en saber su contraseña.
    </td>
  </tr>
</table>


### Eliminar empleado

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/empleados/eliminar/?id=[idEmpleado]</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Gerente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite al gerente eliminar el registro de un empleado. Este proceso requiere confirmación para asegurar que
      la acción deseada no es un error. Para despidos se recomienda cambiar el estado del registro y no eliminarlo.
    </td>
  </tr>
</table>




## Clientes


### Ver clientes

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/clientes/</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Gerente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite ver al gerente los clientes registrados.
    </td>
  </tr>
</table>


### Detalle cliente

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/clientes/ver/?id=[idCliente]</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Gerente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite al gerente ver toda la información relacionada al cliente actual.
    </td>
  </tr>
</table>




## Reportes


### Reporte: servicios

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/reporte/servicios/</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Gerente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite ver al gerente un reporte de los servicios realizados. Además le permite aplicar filtros para ajustar la infromación mostrada.
    </td>
  </tr>
</table>


### Reporte: clientes

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/reporte/clientes/</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Gerente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite ver al gerente un reporte de los clientes registrados. Además le permite aplicar filtros para ajustar la infromación mostrada.
    </td>
  </tr>
</table>


### Reporte: mascotas

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/reporte/mascotas/</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Gerente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite ver al gerente un reporte de las mascotas registradas. Además le permite aplicar filtros para ajustar la infromación mostrada.
    </td>
  </tr>
</table>


### Reporte: empleados

<table>
  <tr>
    <td><b>URL</b></td>
    <td><code>/reporte/empleados/</code></td>
  </tr>
  <tr>
    <td><b>ROL</b></td>
    <td>Gerente <i>(sesión requerida)</i></td>
  </tr>
  <tr>
    <td><b>Descripción</b></td>
    <td>
      Le permite ver al gerente un reporte de los empleados registrados. Además le permite aplicar filtros para ajustar la infromación mostrada.
    </td>
  </tr>
</table>