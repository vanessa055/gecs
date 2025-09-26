<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../shared/styles/header.css">
  <title>Document</title>
  <style>
  body {
    background: pink;
  }
</style>
</head>
<body>
  
   

<section class="layout">
        <aside class="barra-lateral">

            <nav class="navegacion">
                <ul>
                    <li>
                        <a href="GeCS/public/index.php" title="menu">
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
                        <a href="/src/features/expedientes/frontend/inicioexpediente.php" title="expedientes">
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
                        <a id="home" href="../features/c_diagnosticos/frontend/diagnosticos.php" title="diagnosticos">
                            <svg
                                name="pencil-outline"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                <path d="M13.5 6.5l4 4" />
                            </svg>
                            <span>Diagnosticos</span>
                        </a>
                    </li>

                    <li>
                        <a href="Registros.php" title="Datos Estudiantes">
                            <svg
                                name="location-outline"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-note">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M13 20h-6a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8l4 4v10a2 2 0 0 1 -2 2h-2" />
                                <path d="M13 20v-4a2 2 0 0 1 2 -2h4" />
                            </svg>
                            <span>Ocupaciones</span>
                        </a>
                    </li>
                    <li>
                        <a href="Reportes.php" title="Reportes de Inasistencias">
                            <svg
                                name="pencil-outline"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-report">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" />
                                <path d="M18 14v4h4" />
                                <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" />
                                <path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path d="M8 11h4" />
                                <path d="M8 15h3" />
                            </svg>
                            <span>Escolaridades</span>
                        </a>
                    </li>
                    <li>
                        <a href="Reportes.php" title="Reportes de Inasistencias">
                            <svg
                                name="pencil-outline"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-report">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" />
                                <path d="M18 14v4h4" />
                                <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" />
                                <path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path d="M8 11h4" />
                                <path d="M8 15h3" />
                            </svg>
                            <span>Comorbilidades</span>
                        </a>
                    </li>
                    <li>
                        <a href="Reportes.php" title="Reportes de Inasistencias">
                            <svg
                                name="pencil-outline"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-report">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" />
                                <path d="M18 14v4h4" />
                                <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" />
                                <path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path d="M8 11h4" />
                                <path d="M8 15h3" />
                            </svg>
                            <span>Estados Civiles</span>
                        </a>
                    </li>
                    <li>
                        <a href="Reportes.php" title="Reportes de Inasistencias">
                            <svg
                                name="pencil-outline"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-report">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" />
                                <path d="M18 14v4h4" />
                                <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" />
                                <path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path d="M8 11h4" />
                                <path d="M8 15h3" />
                            </svg>
                            <span>Métodos Anticonceptivos</span>
                        </a>
                    </li>
                    <li>
                        <a href="Reportes.php" title="Reportes de Inasistencias">
                            <svg
                                name="pencil-outline"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-report">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" />
                                <path d="M18 14v4h4" />
                                <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" />
                                <path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path d="M8 11h4" />
                                <path d="M8 15h3" />
                            </svg>
                            <span>Departamentos</span>
                        </a>
                    </li>
                    <li>
                        <a href="Reportes.php" title="Reportes de Inasistencias">
                            <svg
                                name="pencil-outline"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-report">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" />
                                <path d="M18 14v4h4" />
                                <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" />
                                <path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path d="M8 11h4" />
                                <path d="M8 15h3" />
                            </svg>
                            <span>Municipios</span>
                        </a>
                    </li>
                    <li class="encabezado">Usuarios</li>
                    <li>
                        <a href="admin.php" title="Gestion de Usuarios">
                            <svg
                                name="person-add-outline"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icon-tabler-user-filled-circle">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" fill="none" />
                                <circle cx="12" cy="9.5" r="3" fill="currentColor" stroke="none" />
                                <path
                                    d="M6 18c2 -4 4 -5 6 -5s4 1 6 5v0.5c0 .3 -.2 .5 -.5 .5h-11c-.3 0 -.5 -.2 -.5 -.5z"
                                    fill="currentColor"
                                    stroke="none" />
                            </svg>
                            <span>Usuarios</span>
                        </a>
                    </li>

                </ul>
            </nav>
</aside>
</section>

    <main class="contenido-principal">
    <h1>holaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>
    </main>
    </body > 
</html>