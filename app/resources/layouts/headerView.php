<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Wallpoet&display=swap" rel="stylesheet">
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
<link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>My Supermarket</title>
</head>
<body class="bg-#EFF1F9 " style="background-color: #BDC7BE;color: #3C3C3C">

    <!-- Contenedor principal -->
    <div class="flex h-screen w-full">
        <!-- Barra lateral -->
        <div class="h-screen w-64 p-6 flex flex-col justify-between shadow-lg text-gray-800 rounded-r-3xl sidebar" style="background-color: #FCFCFC;">
            <!-- Top Section (Logo y Menú) -->
            <div>
                <!-- Logo -->
                <div class="flex flex-col items-center">
                <span class="text-sm font-semibold mb-6">MY SUPERMARKET</span>
                    <img src="/Configuraciones/img/logo_b.png" alt="" class="w-24 h-24" />
                </div>

                <div class="flex justify-center mb-6 mt-6">
                    <div class="bg-[#E9EDFF] w-24 h-24 flex flex-col items-center justify-center rounded-lg shadow-lg">
                        <i class='bx bxs-dashboard text-2xl'></i>
                        <span class="text-sm font-semibold mt-2">
                            <?= isset($seccion_nombre) ? htmlspecialchars($seccion_nombre) : 'PANEL'; ?>
                        </span>
                    </div>
                </div>

                <!-- Menú -->
                <nav class="space-y-4">
                    <?php
                    $secciones = [
                        'Panel' => ['label' => 'PANEL', 'icon' => 'bxs-dashboard', 'url' => '/PanelControl/panelView.php'],
                        'Ventas' => ['label' => 'VENTAS', 'icon' => 'bx-groceries', 'url' => '/Ventas/ventasView.php'],
                        'Recibidos' => ['label' => 'RECIBIDOS', 'icon' => 'bx-box-alt', 'url' => '/Ordenes/ordenesView.php'],
                        'Existencias' => ['label' => 'EXISTENCIAS', 'icon' => 'bx-layers-down-left', 'url' => '/Existencias/existenciasView.php'],
                        'Proveedores' => ['label' => 'PROVEEDORES', 'icon' => 'bx-id-card', 'url' => '/Proveedores/proveedoresView.php'],
                        'Usuarios' => ['label' => 'USUARIOS', 'icon' => 'bx-group', 'url' => '/Usuarios/usuariosView.php'],
                    ];

                    foreach ($secciones as $clave => $info) {
                        $activo = ($seccion_actual ?? '') === $clave;
                        $classes = $activo
                            ? 'bg-white shadow-inner rounded-full'
                            : 'hover:bg-[#E9EDFF] rounded-lg';
                        $style = $activo
                            ? 'box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.1); background-color: #F2F2EA;'
                            : '';
                        echo "<a href='{$info['url']}' class='flex items-center p-2 $classes' style='$style'>
                                <i class='bx {$info['icon']} text-2xl'></i>
                                <span class='font-semibold mx-4'>{$info['label']}</span>
                            </a>";
                    }
                    ?>
                </nav>


            </div>

            <style>
            /* Media query para dispositivos con ancho menor a 768px (típicamente tablets) */
            @media (max-width: 1208px) {
              nav a span {
                display: none; /* Oculta el texto en tablets */
              }
              /* Centrar los íconos en tabletas y reducir el tamaño del div principal */
              .sidebar {
                width: 130px; /* Hacer la barra más delgada */
              }
              nav a i {
                justify-content: center; /* Asegura que los íconos estén centrados */
                margin: 0 auto;
              }
            }
          </style>    
        </div>