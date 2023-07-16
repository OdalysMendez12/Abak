/*QUERYS*/
/*VER DEPARTAMENTO, SUCURSAL, ROL Y DEPARTAMENTO TABLA USUARIO*/
SELECT usuario.clave_usuario, usuario.nombre,usuario.Apaterno,usuario.Amaterno, usuario.telefono, usuario.correo, departamento.nombre_dep AS fk_departamento, 
roles.rol AS fk_rol, puesto.nombre_puesto AS fk_puesto, sucursal.nombre_suc AS fk_sucursal, usuario.sexo  
FROM usuario INNER JOIN sucursal ON usuario.fk_sucursal = sucursal.id INNER JOIN puesto ON usuario.fk_puesto = puesto.id
INNER JOIN departamento ON usuario.fk_departamento = departamento.id 
INNER JOIN roles ON usuario.fk_rol = roles.id