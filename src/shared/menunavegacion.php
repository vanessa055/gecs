<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
        <nav class="navegacion">
            <ul>
                <li>
                    <a href="/gecs/public/index.php" title="menu">
                        <svg
                            name="home-outline"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-home">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                        </svg>
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="encabezado">Pacientes</li>
                <li>
                    <a href="/gecs/src/features/expedientes/frontend/inicioexpediente.php" title="expedientes">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 64 64"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icon-tabler-form-plus">
                            <rect x="10" y="8" width="44" height="48" rx="4" />
                            <line x1="18" y1="20" x2="46" y2="20" />
                            <line x1="18" y1="28" x2="46" y2="28" />
                            <line x1="18" y1="36" x2="34" y2="36" />
                            <circle cx="48" cy="48" r="8" stroke="currentColor" />
                            <line x1="48" y1="44" x2="48" y2="52" />
                            <line x1="44" y1="48" x2="52" y2="48" />
                        </svg>
                        <span>Expedientes</span>
                    </a>
                </li>
                <li class="encabezado">Catálogos</li>
                <li>
                    <a id="home" href="/gecs/src/features/c_diagnosticos/frontend/diagnosticos.php" title="diagnosticos">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentcolor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                            <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                            <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                            <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
                            <path d="M12 8m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            <path d="M10 17v-1a2 2 0 1 1 4 0v1" />
                            <path d="M8 10c.666 .666 1.334 1 2 1h4c.666 0 1.334 -.334 2 -1" />
                            <path d="M12 11v3" />
                        </svg>
                        <span>Diagnosticos</span>
                    </a>
                </li>

                <li>
                    <a href="/gecs/src/features/c_ocupaciones/frontend/ocupaciones.php" title="Ocupaciones">
                       <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentcolor" 
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                            <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" />
                            <path d="M12 12l0 .01" />
                            <path d="M3 13a20 20 0 0 0 18 0" />
                        </svg>
                        <span>Ocupaciones</span>
                    </a>
                </li>
                <li>
                    <a href="/gecs/src/features/c_escolaridades/frontend/escolaridades.php" title="Escolaridades">
                         <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentcolor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                            <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                        </svg>
                        <span>Escolaridades</span>
                    </a>
                </li>
                <li>
                    <a href="/gecs/src/features/c_comorbilidades/frontend/comorbilidades.php" title="Comorbilidades">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentcolor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M17 12a5 5 0 1 0 -5 5" />
                            <path d="M12 7v-4" />
                            <path d="M11 3h2" />
                            <path d="M15.536 8.464l2.828 -2.828" />
                            <path d="M17.657 4.929l1.414 1.414" />
                            <path d="M17 12h4" />
                            <path d="M21 11v2" />
                            <path d="M12 17v4" />
                            <path d="M13 21h-2" />
                            <path d="M8.465 15.536l-2.829 2.828" />
                            <path d="M6.343 19.071l-1.413 -1.414" />
                            <path d="M7 12h-4" />
                            <path d="M3 13v-2" />
                            <path d="M8.464 8.464l-2.828 -2.828" />
                            <path d="M4.929 6.343l1.414 -1.413" />
                            <path d="M17.5 17.5m-2.5 0a2.5 2.5 0 1 0 5 0a2.5 2.5 0 1 0 -5 0" />
                            <path d="M19.5 19.5l2.5 2.5" />
                        </svg>
                        <span>Comorbilidades</span>
                    </a>
                </li>
                <li>
                    <a href="/gecs/src/features/c_estadociviles/frontend/estadosciviles.php" title="Estados_Civiles">
                   <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentcolor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M13 10l7.383 7.418c.823 .82 .823 2.148 0 2.967a2.11 2.11 0 0 1 -2.976 0l-7.407 -7.385" />
                            <path d="M6 9l4 4" />
                            <path d="M13 10l-4 -4" />
                            <path d="M3 21h7" />
                            <path d="M6.793 15.793l-3.586 -3.586a1 1 0 0 1 0 -1.414l2.293 -2.293l.5 .5l3 -3l-.5 -.5l2.293 -2.293a1 1 0 0 1 1.414 0l3.586 3.586a1 1 0 0 1 0 1.414l-2.293 2.293l-.5 -.5l-3 3l.5 .5l-2.293 2.293a1 1 0 0 1 -1.414 0z" />
                        </svg>
                        <span>Estados Civiles</span>
                    </a>
                </li>
                <li>
                    <a href="/gecs/src/features/c_metodosanticonceptivos/frontend/manticonceptivos.php" title="Metodos_Anticonceptivos">
                             <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentcolor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M9 5v-1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-4" />
                            <path d="M8.7 8.705a1.806 1.806 0 0 1 -.2 .045c-.866 .144 -1.5 .893 -1.5 1.77v8.48a2 2 0 0 0 2 2h6a2 2 0 0 0 2 -2v-2m0 -4v-2.48c0 -.877 -.634 -1.626 -1.5 -1.77a1.795 1.795 0 0 1 -1.5 -1.77v-.98" />
                            <path d="M7 12h5m4 0h1" />
                            <path d="M7 18h10" />
                            <path d="M11 15h2" />
                            <path d="M3 3l18 18" />
                        </svg>
                        <span>Métodos Anticonceptivos</span>
                    </a>
                </li>
                <li>
                    <a href="/gecs/src/features/c_departamentos/frontend/departamentos.php" title="Departamentos">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentcolor" class="icon icon-tabler icons-tabler-filled icon-tabler-map-pin">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203 .21l-4.243 4.242a3 3 0 0 1 -4.097 .135l-.144 -.135l-4.244 -4.243a9 9 0 0 1 12.728 -12.728zm-6.364 3.364a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" />
                        </svg>
                        <span>Departamentos</span>
                    </a>
                </li>
                <li>
                    <a href="/gecs/src/features/c_municipios/frontend/municipios.php" title="Municipios">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-map-pins">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10.828 9.828a4 4 0 1 0 -5.656 0l2.828 2.829l2.828 -2.829z" />
                            <path d="M8 7l0 .01" />
                            <path d="M18.828 17.828a4 4 0 1 0 -5.656 0l2.828 2.829l2.828 -2.829z" />
                            <path d="M16 15l0 .01" />
                        </svg> 
                        <span>Municipios</span>
                    </a>
                </li>
                <li class="encabezado">Usuarios</li>
                <li>
                    <a href="/gecs/src/features/authentication/frontend/comorbilidades.php" title="Gestion de Usuarios">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentcolor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4c.96 0 1.84 .338 2.53 .901" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                <path d="M16 19h6" />
                                <path d="M19 16v6" />
                            </svg>
                        <span>Usuarios</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>


    


</body>

</html>