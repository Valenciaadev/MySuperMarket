<?php 
$seccion_actual = 'Panel';
$seccion_nombre = 'PANEL';
include('../PanelControl/headerView.php'); ?>

        <!-- Contenedor derecho -->
        <div class="flex-grow flex justify-center items-center min-h-screen">
            <!-- Columna izquierda (Panel y estadísticas) -->
            <div class="flex flex-col w-full max-w-screen-lg p-10 space-y-8 items-center">
                <!-- Sección roja grande en la parte superior -->
                <div class="w-full h-36 rounded-lg flex items-center justify-center px-8" style="background-color: #FFFFFD;">
                    <h1 class="font-semibold text-4xl text-center" style="color: #2A5A19;">Bienvenid@</h1>
                </div>


                <div class="grid grid-cols-2 gap-6 w-full">
                    <!-- Pacientes Registrados -->
                    <div class="shadow-lg rounded-lg p-6 flex flex-col items-center justify-center space-y-4 w-full h-32 cursor-pointer" style="background-color: #FFFFFD;">
                        <div class="flex items-center space-x-2">
                            <i class='bx bxs-user text-3xl text-gray-800'></i>
                            <h3 class="text-sm font-semibold">VENTAS</h3>
                        </div>
                        <span class="badge block shadow-sm text-sm text-white py-2 px-6 rounded-full" style="background-color: #2A5A19; box-shadow: inset 0 4px 6px rgba(43, 8, 8, 0.488); width: 125px;">8 Ventas</span>
                    </div>

                    <!-- Doctores Registrados -->
                    <div class="shadow-lg rounded-lg p-6 flex flex-col items-center justify-center space-y-4 w-full h-32 cursor-pointer" style="background-color: #FFFFFD;">
                        <div class="flex items-center space-x-2">
                            <i class='bx bx-group text-3xl text-gray-800'></i>
                            <h3 class="text-sm font-semibold">ORDENES RECIBIDAS</h3>
                        </div>
                        <span class="badge block shadow-sm text-sm text-white py-2 px-6 rounded-full" style="background-color: #2A5A19; box-shadow: inset 0 4px 6px rgba(43, 8, 8, 0.488);">5 Ordenes</span>
                    </div>

                  <!-- Citas Pendientes -->
                  <div class="shadow-lg rounded-lg p-6 w-full cursor-pointer" style="background-color: #FFFFFD;">
                    <div class="flex justify-between items-center">
                        <i class='bx bxs-book-bookmark text-4xl text-gray-800'></i>
                        <h3 class="text-xl font-semibold">PROVEEDORES</h3>
                      <span class="badge block text-sm text-white py-2 px-4 rounded-full" style="background-color: #2A5A19; box-shadow: inset 0 4px 6px rgba(43, 8, 8, 0.488);">6 Proveedores</span>
                    </div>
                    <div class="overflow-y-auto h-48 mt-4"> <!-- Ajusta la altura como sea necesario -->
                      <div class="space-y-4">
                        <!-- Ejemplo de cita -->
                        <div class="flex justify-between items-center rounded-lg p-4" style="background-color: #F2F2EA; box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.1);">
                          <div class="text-sm font-semibold text-gray-800">Carlos Manuel Eusebio Alejo</div>
                        </div>

                        <div class="flex justify-between items-center rounded-lg p-4" style="background-color: #F2F2EA; box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.1);">
                          <div class="text-sm font-semibold text-gray-800">Carlos Manuel Eusebio Alejo</div>
                        </div>

                        <div class="flex justify-between items-center rounded-lg p-4" style="background-color: #F2F2EA; box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.1);">
                          <div class="text-sm font-semibold text-gray-800">Carlos Manuel Eusebio Alejo</div>
                        </div>

                        <div class="flex justify-between items-center rounded-lg p-4" style="background-color: #F2F2EA; box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.1);">
                          <div class="text-sm font-semibold text-gray-800">Carlos Manuel Eusebio Alejo</div>
                        </div>

                        <div class="flex justify-between items-center rounded-lg p-4" style="background-color: #F2F2EA; box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.1);">
                          <div class="text-sm font-semibold text-gray-800">Carlos Manuel Eusebio Alejo</div>
                        </div>

                        <div class="flex justify-between items-center rounded-lg p-4" style="background-color: #F2F2EA; box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.1);">
                          <div class="text-sm font-semibold text-gray-800">Carlos Manuel Eusebio Alejo</div>
                        </div>

                        <!-- Más elementos de citas... -->
                        <!-- Añade aquí más citas siguiendo el mismo formato -->
                      </div>
                    </div>
                  </div>


                  <!-- Limpiezas Pendientes -->
                  <div class="shadow-lg rounded-lg p-6 w-full cursor-pointer" style="background-color: #FFFFFD;">
                    <div class="flex justify-between items-center">
                            <i class='bx bx-group text-3xl text-gray-800'></i>
                      <h3 class="text-xl font-semibold">USUARIOS</h3>
                      <span class="badge block text-sm text-white py-2 px-4 rounded-full" style="background-color: #2A5A19; box-shadow: inset 0 4px 6px rgba(43, 8, 8, 0.488);">4 Usuarios</span>
                    </div>
                    <div class="overflow-y-auto h-48 mt-4"> <!-- Ajusta la altura como sea necesario -->
                      <div class="space-y-4">
                        <!-- Limpieza 1 -->
                        <div class="flex justify-between items-center rounded-lg p-4" style="background-color: #F2F2EA; box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.1);">
                          <div class="text-sm font-semibold text-gray-800">Carlos Manuel Eusebio Alejo</div>
                        </div>

                        <!-- Limpieza 2 -->
                        <div class="flex justify-between items-center rounded-lg p-4" style="background-color: #F2F2EA; box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.1);">
                          <div class="text-sm font-semibold text-gray-800">Carlos Manuel Eusebio Alejo</div>
                        </div>

                        <!-- Limpieza 3 -->
                        <div class="flex justify-between items-center rounded-lg p-4" style="background-color: #F2F2EA; box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.1);">
                          <div class="text-sm font-semibold text-gray-800">Carlos Manuel Eusebio Alejo</div>
                        </div>

                        <!-- Limpieza 4 -->
                        <div class="flex justify-between items-center rounded-lg p-4" style="background-color: #F2F2EA; box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.1);">
                          <div class="text-sm font-semibold text-gray-800">Carlos Manuel Eusebio Alejo</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <style>
                    @media (min-width: 1208px) {
  .badge {
    width: auto; /* Ajusta el ancho si es necesario */
  }

  .badge::before {
    content: attr(data-number); /* Usa el atributo data-number para mostrar solo el número */
  }

  .badge {
    content: none;
  }
}

                  </style>
            </div>
        </div>
      </div>
</body>
</html>


</body>
</html>
          