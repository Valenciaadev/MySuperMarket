<?php 
$seccion_actual = 'Recibidos';
$seccion_nombre = 'RECIBIDOS';
include('../PanelControl/headerView.php'); ?>

      
    <!-- Contenido principal -->
    <div class="flex-1 flex flex-col mx-4">
        <!-- Título y párrafo alineados a la izquierda -->
        <div class="ml-8 mt-8">
            <h1 class="text-4xl font-semibold">ORDENES RECIBIDAS</h1>
            <p class="text-lg text-gray-700 mt-1 mb-12">8 Ordenes</p>
        </div>
  
       <!-- Div centrado -->
        <div class="flex flex-1 justify-center items-start">
            <div class="bg-white shadow-lg rounded-lg p-4 w-full max-w-5xl" style="background-color: #FFFFFD;">
                <!-- Contenido original del div -->
                <div class="flex justify-between items-center mt-6 mb-4 w-full">
                          
                    
                    <div>
                        <input type="text" placeholder="Buscar Orden" class="px-4 py-2 rounded-full shadow-lg">
                    </div>
                </div>

                <table class="table-auto w-full border-separate" style="border-spacing: 0px 12px;">
                    <!-- Encabezado con borde redondeado -->
                    <thead class="bg-white rounded-full"  style="  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.1); background-color: #F2F2EA;">
                        <tr>
                            <th class="px-4 py-2 text-left rounded-l-full">FECHA DE CREACIÓN</th>
                            <th class="px-4 py-2 text-left">CODIGO</th>
                            <th class="px-4 py-2 text-left">PROVEDOR</th>
                            <th class="px-4 py-2 text-left">NOMBRE</th>
                            <th class="px-4 py-2 text-center rounded-r-full">OPCIONES</th>
                        </tr>
                    </thead>
                
                    <!-- Cuerpo de la tabla -->
                    <tbody id="table-body" class="bg-gray-100">
                        <!-- Fila 1 -->
                        <tr class="table-row bg-sky-100 mb-2 overflow-hidden " style="border-radius: 50px;  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.1); background-color: #F2F2EA;">
                            <td class="px-4 py-3 text-left" style="border-top-left-radius: 50px; border-bottom-left-radius: 50px;">Miércoles 2 de Octubre del 2024</td>
                            <td class="px-4 py-3 text-left">PO-002</td>
                            <td class="px-4 py-3 text-left">ESDERM</td>
                            <td class="px-4 py-3 text-left">Lavadora</td>
                            <td class="px-4 py-3 text-center" style="border-top-right-radius: 50px; border-bottom-right-radius: 50px;">
                                <button id="edit-limpieza-btn" class="bg-transparent border-0 cursor-pointer">
                                    <i class='bx bx-edit text-lg mx-2'></i>
                                </button>
                                <button class="bg-transparent border-0 cursor-pointer">
                                <i class='bx bx-trash  text-lg mx-2' style='color:#3c3c3c'></i>
                                </button>
                            </td>
                        </tr>

                
                        <!-- Fila 2 -->
                        <tr class="table-row overflow-hidden mb-2" style="background-color: #F2F2EA; border-radius: 50px;  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.1);">
                            <td class="px-4 py-3 text-left" style="border-top-left-radius: 50px; border-bottom-left-radius: 50px;">Miércoles 2 de Octubre del 2024</td>
                            <td class="px-4 py-3 text-left">PO-002</td>
                            <td class="px-4 py-3 text-left">ESDERM</td>
                            <td class="px-4 py-3 text-left">Lavadora</td>
                            <td class="px-4 py-3 text-center" style="border-top-right-radius: 50px; border-bottom-right-radius: 50px;">
                                <button id="edit-limpieza-btn" class="bg-transparent border-0 cursor-pointer">
                                    <i class='bx bx-edit text-lg mx-2'></i>
                                </button>
                                <button class="bg-transparent border-0 cursor-pointer">
                                <i class='bx bx-trash  text-lg mx-2' style='color:#3c3c3c'></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Controles de paginación -->
                <div class="flex items-center justify-center mt-6 pagination-container">
                  <nav aria-label="Pagination" class="flex space-x-4 relative">
                    <button 
                      id="prev-btn" 
                      class="relative flex items-center justify-center w-10 h-10 bg-white/50 border border-gray-300 rounded-full shadow-lg backdrop-blur-lg hover:bg-white/70 disabled:opacity-50 disabled:cursor-not-allowed"
                      disabled
                    >
                      <i class="bx bx-chevron-left text-xl text-gray-700"></i>
                      <span class="absolute top-full mt-1 px-2 py-1 text-xs text-white bg-gray-700 rounded-md opacity-0 hover:opacity-100 transition-opacity pointer-events-none">
                        Anterior
                      </span>
                    </button>
                    <div id="pagination-numbers" class="flex space-x-2"></div>
                    <button 
                      id="next-btn" 
                      class="relative flex items-center justify-center w-10 h-10 bg-white/50 border border-gray-300 rounded-full shadow-lg backdrop-blur-lg hover:bg-white/70"
                    >
                      <i class="bx bx-chevron-right text-xl text-gray-700"></i>
                      <span class="absolute top-full mt-1 px-2 py-1 text-xs text-white bg-gray-700 rounded-md opacity-0 hover:opacity-100 transition-opacity pointer-events-none">
                        Siguiente
                      </span>
                    </button>
                  </nav>
                </div>
            </div>
        </div>
    </div>

    <script>
        let rowsPerPage = 5; // las filas por página en laptop
        let currentPage = 1;

        const tableRows = document.querySelectorAll(".table-row");
        const paginationNumbers = document.getElementById("pagination-numbers");
        const prevBtn = document.getElementById("prev-btn");
        const nextBtn = document.getElementById("next-btn");

        // Es lo que actualiza la cantidad de filas por página dependiendo del tamaño de la pantalla
        function updateRowsPerPage() {
          if (window.innerWidth <= 1208) {
            rowsPerPage = 10; // las filas por página en tablet
          } else {
            rowsPerPage = 6; // las ilas por página en laptop
          }
          renderTable(currentPage);
          renderPagination();
        }

        function renderTable(page) {
          const start = (page - 1) * rowsPerPage;
          const end = start + rowsPerPage;

          tableRows.forEach((row, index) => {
            if (index >= start && index < end) {
              row.style.display = "";
            } else {
              row.style.display = "none";
            }
          });
        }


        function renderPagination() {
          const totalPages = Math.ceil(tableRows.length / rowsPerPage);
          paginationNumbers.innerHTML = "";

          for (let i = 1; i <= totalPages; i++) {
            const button = document.createElement("button");
            button.className = `px-3 py-2 ${i === currentPage ? "bg-blue-900 text-white" : "bg-white text-gray-500"} border border-gray-300 rounded-md hover:bg-gray-800`;
            button.textContent = i;
            button.onclick = () => goToPage(i);
            paginationNumbers.appendChild(button);
          }

          prevBtn.disabled = currentPage === 1;
          nextBtn.disabled = currentPage === totalPages;
        }

        function goToPage(page) {
          currentPage = page;
          renderTable(page);
          renderPagination();
        }

        prevBtn.onclick = () => goToPage(currentPage - 1);
        nextBtn.onclick = () => goToPage(currentPage + 1);

        window.addEventListener('resize', updateRowsPerPage);
        updateRowsPerPage(); 
</script>


<!------------------------------------------------------------- Modal Editar Limpieza -------------------------------------------------------------------->
<div id="edit-limpieza-modal" class="fixed inset-0 flex items-center justify-center bg-opacity-50 bg-black hidden">
    <div class="p-8 rounded-lg overflow-auto relative" style="background-color: #FBFDFF; height: 590px; width: 600px;">
       <!-- Botón X para cerrar el modal -->
      <button id="close-edit-limpieza-modal-x" class="absolute top-0 right-0 m-2 pb-px border-4 border-green-900 text-white hover:text-white w-8 h-8 rounded-full flex items-center justify-center text-lg font-bold" style="background-color: #2A5A19;">&times;</button>
         
      <!-- Título principal -->
      <h1 class="text-white text-center rounded-full mb-10 text-2xl" style="background-color: #2A5A19; height: 40px;">
        Editar Orden
      </h1>
  
      <!-- Sección de Datos de la Limpieza -->
      <div class="p-6 rounded-sm shadow-md mb-10" style="background-color: #f5f7ff;">
        <div class="grid grid-cols-2 gap-6">
  
          <!-- Input: Nombre del Paciente -->
          <div class="relative col-span-2">
            <label class="text-xs text-[#3B3636]">NOMBRE</label>
            <input class="pl-8 py-2 text-xs bg-[#E6ECF8] rounded-full w-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636]" type="text" placeholder="Nombre del Producto">
          </div>
  
           <!-- Input: Número de Teléfono -->
          <div class="relative col-span-2">
            <label class="text-xs text-[#3B3636]">FECHA</label>
            <input class="pl-8 py-2 text-xs bg-[#E6ECF8] rounded-full w-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636]" type="date" placeholder="Provedor">
          </div>

          
          <!-- Select: Género -->
          <select class="pl-8 py-2 bg-[#E6ECF8] col-span-2 text-xs rounded-full w-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636]" id="gender">
              <option disabled selected>PROVEDOR</option>
              <option value="femenino">ESDERM</option>
              <option value="masculino">INETEC</option>
          </select>

           <!-- Input: Número de Teléfono -->
          <div class="relative col-span-2">
            <label class="text-xs text-[#3B3636]">CODIGO</label>
            <input class="pl-8 py-2 text-xs bg-[#E6ECF8] rounded-full w-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636]" type="number" placeholder="Código">
          </div>

            
      
        </div>
      </div>
  
      <!-- Botones de Cerrar y Guardar -->
      <div class="flex justify-end mt-6">
        <!-- Botón de cerrar -->
        <button id="close-edit-limpieza-modal-btn" class="text-white px-4 py-2 rounded-full mr-2 shadow-inner" style="background-color: #2A5A19;">
          Cerrar
        </button>
        <button id="submit-edit-limpieza" class="text-white px-4 py-2 rounded-full shadow-md" style="background-color: #2A5A19;">
          Guardar
        </button>
      </div>
    </div>
  </div>
  
  <script>
    const editLimpiezaBtn = document.getElementById('edit-limpieza-btn');
    const closeEditLimpiezaModalBtn = document.getElementById('close-edit-limpieza-modal-btn');
    const editLimpiezaModal = document.getElementById('edit-limpieza-modal');
    const closeEditLimpiezaModalX = document.getElementById('close-edit-limpieza-modal-x');
  
    // Mostrar el modal al hacer clic en "EDITAR LIMPIEZA"
    editLimpiezaBtn.addEventListener('click', function() {
      editLimpiezaModal.classList.remove('hidden');
    });
  
    // Cerrar el modal al hacer clic en "Cerrar"
    closeEditLimpiezaModalBtn.addEventListener('click', function() {
      editLimpiezaModal.classList.add('hidden');
    });

    // Cerrar el modal al hacer clic en la "X"
    closeEditLimpiezaModalX.addEventListener('click', function() {
      editLimpiezaModal.classList.add('hidden');
    });
  </script>


