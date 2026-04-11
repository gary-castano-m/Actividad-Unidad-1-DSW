# **Actividad-Unidad-1-DSW**
Desarrollar una aplicación web en PHP orientado a objetos, aplicando DDD y Arquitectura Hexagonal, siguiendo la misma estructura presentada en las Guías de aprendizaje. Estas guías ofrecen una introducción básica a los conceptos fundamentales de ambos enfoques y muestran cómo aplicar cada uno de ellos, paso a paso, en la construcción de un CRUDL de usuarios (Create, Read, Update, Delete, List), desarrollando cada capa de manera progresiva.

## Metodología de trabajo
La actividad se desarrolla de forma individual.

Se debe utilizar control de versiones con commits atómicos (por clase funcional probada), empleando Git y GitHub como sistema de versionado, creados única y exclusivamente con el correo institucional.

A cada estudiante se le ha asignado un ejercicio único, **el ejercicio que le fue asignado es el numero 10.**

* Entidad común (aplica a todos los ejercicios)
    
    **Usuario** — común a todos los ejercicios; va en su propio módulo.
 Atributos: id, clave, nombre, rol.
Nota: además de Usuario, cada ejercicio incluye una Entidad XYZ propia, con su propio id (y, si aplica, su clave). Abajo solo listamos los atributos de negocio de cada Entidad XYZ.

**Ejercicio # 10**

**Asignatura:** nombre, nombreCompleto, descripcion, areaConocimiento, carrera, numeroCreditos, contenidoTematico, semestre, profesor


## Requerimientos iniciales
Debe instalar un servidor web (Apache o Nginx), PHP v8+, MySQL y un IDE de su preferencia (VS Code, NetBeans, Eclipse, Visual Studio, IntelliJ IDEA, PhpStorm, etc.).
Para facilitar la instalación y configuración, puede utilizar empaquetadores como WAMP, XAMPP o Laragon (recomendado).


## Desarrollo de la actividad
1. Crear un repositorio en GitHub (usando la cuenta institucional).

2. Instalar Git en su equipo y configurarlo para trabajar con GitHub.

3. Leer las guías de aprendizaje y replicar el ejemplo de CRUDL de usuarios, creando un repositorio local y conectándolo con el repositorio remoto.

4. Crear ramas de trabajo (no se permite trabajar en una sola rama). Se recomienda una rama por guía.
Los commits deben estar bien descritos y seguir el estándar de GitLab.

5. Realizar Pull Requests (PR) con menos de 20 archivos y fusionarlos en la rama principal (main, master, trunk, etc.).

6. No subir PR con cambios que no hayan sido previamente probados.

7. Completar las funcionalidades de la aplicación desarrollada en las guías, incluyendo:

    *  Inicio de sesión

    * Cambio de contraseña (mediante envío de correo)

8. Desarrollar un CRUDL de la tabla correspondiente al ejercicio asignado, siguiendo la misma metodología, proceso y arquitectura utilizada en el CRUD de usuarios.

9. Opcionalmente, desplegar la aplicación en un servidor (hosting) que soporte PHP y MySQL, preferiblemente gratuito.

10. Realizar un video explicando el desarrollo del CRUD de la tabla asignada, incluyendo su integración en la aplicación.

11. Subir en el enlace de entrega un archivo PDF que contenga:

    * Nombre de la asignatura

    * Semestre

    * Carrera

    * Universidad

    * Código y nombre del estudiante

    * Correo electrónico institucional

    * Número y nombre del ejercicio asignado

    * Nombre de la actividad desarrollada

    * URL del repositorio

    * URL del video de sustentación