# Nota: Para este proyecto previamente se debe descargar XAMPP

# Instalación del Proyecto

## Paso 1: Descarga y descompresión

1. Descarga el proyecto en ZIP.
2. Descomprime el ZIP en el siguiente directorio: `C:\xampp\htdocs`.
   
   Al descomprimir, obtendrás los siguientes archivos:
   
   ![Archivos descomprimidos](https://github.com/user-attachments/assets/e4f587a2-aac9-4fe9-abe6-054283928cd8)
   
   **Imagen 1**: Archivos descomprimidos en `C:\xampp\htdocs\proyectobd`.

## Paso 2: Configuración de la base de datos

1. Abre la terminal de MySQL y navega al directorio donde descomprimiste la carpeta `proyectobd`:
   
   ```
   cd htdocs
   cd proyectobd
   ```

   ![Terminal](https://github.com/user-attachments/assets/abb55d64-9450-4c4b-9b59-e3dfbc893356)

   **Imagen 2**: Navegación al directorio `proyectobd` en la terminal.

2. Accede a MariaDB con el siguiente comando:

   ```bash
   mysql --user=root

3. Ejecuta el script SQL para crear la base de datos:

   ```
   source Inv_lab.sql;
   ```
  
   <img width="373" alt="image" src="https://github.com/user-attachments/assets/6618f891-f7fb-47b7-bab9-b3823f1c631e">

   **Imagen 3**: Creación de la base de datos utilizando `Inv_lab.sql`.

## Paso 3: Verificación del entorno

1. Abre tu navegador web y dirígete a `localhost/proyectobd`. Si todo ha salido bien el usuario puede ingresar al sistema y crear un nuevo usuario.

   <img width="442" alt="image" src="https://github.com/user-attachments/assets/4836a362-5640-4772-8c9b-d45f68b74d23">

   **Imagen 4**: Página principal `index.html`.



