# Notas: 
 - Para compilar código SASS utilizamos: `npm run sass`, para esto primero debemos agregar el script en el package.json
 
    `"sass": "sass --watch src/scss:build/css"`, --watch deja en espera por cambios.
 - Instalar dependencias con `npm`:
    + `npm i -D gulp`  es lo mismo a `npm install --save-dev gulp` 
 - Llamar tareas en Gulp con `npx`:
    + Para llamar la tarea usamos: `npx gulp nombreTarea`
 - Llamar tareas en Gulp con `npm`:
    + Agregamos en el package.json el script `"tarea": "gulp tarea"`
    + Para llamarlo usamos: `npm run tarea`