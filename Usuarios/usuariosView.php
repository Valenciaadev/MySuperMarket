<?php 
$seccion_actual = 'Usuarios';
$seccion_nombre = 'USUARIOS';
include('../PanelControl/headerView.php'); ?>
  
  <!-- Contenido principal -->
      <div class="flex-1 flex flex-col mx-4">
        <!-- Título y párrafo alineados a la izquierda -->
        <div class="ml-8 mt-8">
          <h1 class="text-4xl font-semibold">USUARIOS</h1>
          <p class="text-lg text-gray-700 mt-1 mb-12">5 Usuarios</p>
        </div>

        <!-- Div centrado -->
        <div class="flex flex-1 justify-center items-start">
            <div class="bg-white shadow-lg rounded-lg p-4 w-full max-w-5xl" style="background-color: #FFFFFD;" >
                <!-- Contenido original del div -->
                <div class="flex justify-between items-center mt-6 mb-4 w-full">
                    <button id="add-patient-btn" class="text-white px-4 py-2 rounded-full shadow-lg" style="background-color: #2A5A19;">
                      + AGREGAR USUARIO
                    </button>
                </div>
                <!-- Tabla de pacientes -->
              <table class="table-auto w-full border-separate" style="border-spacing: 0px 12px;">
                <!-- Encabezado con borde redondeado -->
                <thead class="bg-white rounded-full"  style="box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.1); background-color: #F2F2EA;">
                    <tr>
                        <th class="px-4 py-2 text-left rounded-l-full">NOMBRE</th>
                        <th class="px-4 py-2 text-left">TIPO DE USUARIO</th>
                        <th class="px-4 py-2 text-left">ESTADO</th>
                        <th class="px-4 py-2 text-center rounded-r-full">OPCIONES</th>
                    </tr>
                </thead>
            
                <!-- Cuerpo de la tabla -->
                <tbody id="table-body" class="bg-gray-100">
                    <!-- Fila 1 -->
                    <tr class="table-row bg-sky-100 mb-2 overflow-hidden " style="box-shadow:  0px 4px 4px rgba(0, 0, 0, 0.1); background-color: #F2F2EA;">
                        <td class="px-4 py-3 text-left" style="border-top-left-radius: 50px; border-bottom-left-radius: 50px;">Adriana Andrade Villaseñor</td>
                        <td class="px-4 py-3 text-left">Trabajador</td>
                        <td class="px-4 py-3 text-left">ACTIVO</td>
                        <td class="px-4 py-3 text-center" style="border-top-right-radius: 50px; border-bottom-right-radius: 50px;">
                            <button class="ver-registro-btn bg-transparent border-0 cursor-pointer">
                              <i class='bx bx-id-card text-lg mx-2'></i>
                            </button>
                            <button class="bg-transparent border-0 cursor-pointer">
                                <i class='bx bx-trash text-lg mx-2' style='color:#3c3c3c'></i>
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
            let rowsPerPage = 6; // las filas por página en laptop
            let currentPage = 1;

            const tableRows = document.querySelectorAll(".table-row");
            const paginationNumbers = document.getElementById("pagination-numbers");
            const prevBtn = document.getElementById("prev-btn");
            const nextBtn = document.getElementById("next-btn");

            // Es lo que actualiza la cantidad de filas por página dependiendo del tamaño de la pantalla
            function updateRowsPerPage() {
              if (window.innerWidth <= 1208) {
                rowsPerPage = 18; // las filas por página en tablet
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

       <!----------------------------------------------------------------- Modal Agregar Paciente ------------------------------------------------------------------------->
       <div id="patient-modal" class="fixed inset-0 flex items-center justify-center bg-opacity-50 bg-black hidden">
        <div class=" p-8 rounded-lg overflow-auto relative" style="background-color: #FBFDFF;  height: 590px; width: 600px;">
          <!-- Botón X para cerrar el modal -->
          <button id="close-add-patient-modal-x" class="absolute top-0 right-0 m-2 pb-px border-4 border-green-900 text-green-900 hover:bg-green-900 hover:text-white w-8 h-8 rounded-full flex items-center justify-center text-lg font-bold">&times;</button>
          
      
 <!--1------------------------- Sección 1 del modal ----------------------------->
          
          <!-- Sección de Datos Personales -->
          <div class=" p-6 rounded-sm shadow-lg mb-10" style="background-color: #f5f7ff;">
            <h2 class="text-white px-4 pt-1 mb-10 rounded-full text-xl" style="background-color: #2A5A19; height: 40px;">
              Agregar Usuario
            </h2>
      
            <div class="grid grid-cols-2 gap-6">
                <!-- Input: Nombre(s) -->
                <div class="relative col-span-2">
                    <input class="pl-8 py-2 text-xs bg-[#E6ECF8] rounded-full w-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636]" type="text" placeholder="NOMBRE">
                </div>

                <!-- Input: Correo Electrónico -->
                <div class="relative col-span-2">
                    <input class="pl-8 py-2 text-xs bg-[#E6ECF8] rounded-full w-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636]" type="email" placeholder="CONTRASEÑA">
                </div>
            
               

                 <!-- Select: Rol -->
                <div class="relative col-span-2">
                    <label class="text-xs text-[#3B3636]">USUARIO</label>
                    <select id="doctorSelect" class="pl-8 py-2 text-xs bg-[#E6ECF8] rounded-full w-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636]">
                        <option disabled selected>Selecciona un tipo</option>
                        <option value="admin">Administrador</option>
                        <option value="doc">Trabajador</option>
                    </select>
                </div>
                 <!-- Select: Rol -->
                <div class="relative col-span-2">
                    <label class="text-xs text-[#3B3636]">ESTADO</label>
                    <select id="doctorSelect" class="pl-8 py-2 text-xs bg-[#E6ECF8] rounded-full w-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636]">
                        <option disabled selected>Selecciona un estado</option>
                        <option value="admin">Activo</option>
                        <option value="doc">Inactivo</option>
                    </select>
                </div>
            
            </div>
          </div>

                  



          <div class="flex justify-end mt-6">
          <!-- Botón de cerrar -->
          <button id="close-modal-btn" class="text-white px-4 py-2 rounded-full mr-2 shadow-inner" style="background-color: #2A5A19;">
            Cerrar
          </button>
            <button id="submit-patient" class="text-white px-4 py-2 rounded-full shadow-md" style="background-color: #2A5A19;">
              Agregar Paciente
            </button>
          </div>
        </div>
      </div>
      
      <script>
        const addPatientBtn = document.getElementById('add-patient-btn');
        const closeModalBtn = document.getElementById('close-modal-btn');
        const modal = document.getElementById('patient-modal');
        const genderSelect = document.getElementById('gender');
        const embarazoSection = document.getElementById('embarazo-section');
        const mesesEmbarazoInput = document.getElementById('meses-embarazo');
        const closeAddPatientModalX = document.getElementById('close-add-patient-modal-x');
      
        // Mostrar el modal al hacer clic en "AGREGAR PACIENTE"
        addPatientBtn.addEventListener('click', function() {
          modal.classList.remove('hidden');
        });
      
        // Cerrar el modal al hacer clic en "Cerrar"
        closeModalBtn.addEventListener('click', function() {
          modal.classList.add('hidden');
        });
      
        // Cerrar el modal al hacer clic en la "X"
        closeAddPatientModalX.addEventListener('click', function() {
          modal.classList.add('hidden');
        });
     

        
       

        //JS de la sexta seccion del modal
        const addSignatureBtn = document.getElementById('add-signature-btn');
            const signatureModal = document.getElementById('signature-modal');
            const signaturePad = document.getElementById('signature-pad');
            const signatureDisplay = document.getElementById('signature-display');
            const resetSignatureBtn = document.getElementById('reset-signature');
            const saveSignatureBtn = document.getElementById('save-signature');

            let isDrawing = false;
            const ctx = signaturePad.getContext('2d');

            // Abrir el modal
            addSignatureBtn.addEventListener('click', () => {
                signatureModal.classList.remove('hidden');
                ctx.clearRect(0, 0, signaturePad.width, signaturePad.height); // Limpiar el canvas
            });

            // Dibujar la firma
            signaturePad.addEventListener('mousedown', (e) => {
                isDrawing = true;
                ctx.moveTo(e.offsetX, e.offsetY);
            });

            signaturePad.addEventListener('mousemove', (e) => {
                if (isDrawing) {
                    ctx.lineTo(e.offsetX, e.offsetY);
                    ctx.stroke();
                }
            });

            signaturePad.addEventListener('mouseup', () => {
                isDrawing = false;
                ctx.beginPath(); // Resetear el path
            });

            // Reiniciar la firma
            resetSignatureBtn.addEventListener('click', () => {
                ctx.clearRect(0, 0, signaturePad.width, signaturePad.height);
            });

            // Guardar la firma
            saveSignatureBtn.addEventListener('click', () => {
                const dataUrl = signaturePad.toDataURL();
                signatureDisplay.innerHTML = `<img src="${dataUrl}" alt="Firma" class="h-full"/>`;
                signatureModal.classList.add('hidden'); // Cerrar el modal
            });

       // JS de la séptima sección del modal
const photoInput = document.getElementById('foto-input'); // Asegúrate de que el id coincida
const photoDisplay = document.getElementById('foto-display');

// Mostrar la fotografía seleccionada
photoInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            photoDisplay.innerHTML = `<img src="${e.target.result}" alt="Fotografía del paciente" class="h-full w-full object-cover rounded-md"/>`;
        }
        reader.readAsDataURL(file);
    }
});


      </script>
      





<!-- Modal Ver Registro -->
<div id="VerRegistro-modal" class="fixed inset-0 flex items-center justify-center bg-opacity-50 bg-black hidden">
  <div class="p-8 rounded-lg overflow-auto relative" style="background-color: #FBFDFF;height: 490px; width: 600px;">
    <!-- Botón X para cerrar el modal -->
    <button id="close-ver-registro-x" class="absolute top-0 right-0 m-2 pb-px border-4 border-green-900 text-green-900 hover:bg-green-900 hover:text-white w-8 h-8 rounded-full flex items-center justify-center text-lg font-bold">&times;</button>


     
        <div class="rounded-full shadow-md items-center justify-center flex text-center m-4" style="background-color: #2A5A19; height: 50px;">
          <h1 class="text-white text-3xl mr-4">Datos del Usuario</h1>
          <button id='edit-patient-btn' class="w-8 h-8 pt-1 bg-white rounded  shadow-md">
            <i class='bx bx-edit' style='color:#3c3c3c; font-size: 1.5rem; margin-top: 1.2px;'></i>
          </button>
        </div>
        <!-- Botón para abrir el modal --
        <button id="edit-patient-btn" class="bg-transparent border-0 cursor-pointer">
          <i class='bx bx-id-card text-lg mx-2'></i>
        </button>-->


           <!-- Sección de Datos Personales -->
           <div class=" p-6 rounded-sm shadow-lg mb-10" style="background-color: #f5f7ff;">
            
      
            <div class="grid  gap-6"></div>
                <div class="relative mb-4">
                    <input class="pl-8 py-2 text-xs bg-[#E6ECF8] rounded-full w-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636]"disabled type="text" placeholder="NOMBRE">
                </div>

                <!-- Input: Correo Electrónico -->
                <div class="relative mb-4">
                    <input class="pl-8 py-2 text-xs bg-[#E6ECF8] rounded-full w-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636]"disabled type="number" placeholder="CONTRASEÑA">
                </div>
                 <!-- Select: Rol -->
                <div class="relative col-span-2">
                    <label class="text-xs text-[#3B3636]">USUARIO</label>
                    <select id="doctorSelect" class="pl-8 py-2 text-xs bg-[#E6ECF8] rounded-full w-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636]"disabled>
                        <option disabled selected>Selecciona un tipo</option>
                        <option value="admin">Administrador</option>
                        <option value="doc">Trabajador</option>
                    </select>
                </div>
                 <!-- Select: Rol -->
                <div class="relative col-span-2">
                    <label class="text-xs text-[#3B3636]">ESTADO</label>
                    <select id="doctorSelect" class="pl-8 py-2 text-xs bg-[#E6ECF8] rounded-full w-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636]"disabled>
                        <option disabled selected>Selecciona un estado</option>
                        <option value="admin">Activo</option>
                        <option value="doc">Inactivo</option>
                    </select>
                </div>
               
            
                

                
           </div>
               
      

      <!-- Botones de Guardar y Cerrar -->
      <div class="flex justify-end mt-6">
        <button id="close-ver-registro-btn" class="text-white px-4 py-2 rounded-full mr-2 shadow-inner" style="background-color: #2A5A19;">Cerrar</button>
    </div>
  </div>
</div>

<!-- JavaScript para abrir y cerrar el modal -->
<script>
 const verRegistroBtns = document.querySelectorAll('.ver-registro-btn');
const verRegistroModal = document.getElementById('VerRegistro-modal');
const closeVerRegistroBtn = document.getElementById('close-ver-registro-btn');
const closeVerRegistroX = document.getElementById('close-ver-registro-x');

// Mostrar el modal al hacer clic en cualquiera de los botones
verRegistroBtns.forEach(btn => {
  btn.addEventListener('click', function() {
      verRegistroModal.classList.remove('hidden');
  });
});

// Cerrar el modal al hacer clic en el botón de cerrar
closeVerRegistroBtn.addEventListener('click', function() {
    verRegistroModal.classList.add('hidden');
});

// Cerrar el modal al hacer clic en la "X"
closeVerRegistroX.addEventListener('click', function() {
    verRegistroModal.classList.add('hidden');
});


  const generoSelect = document.getElementById('genero');
  const embarazoSeccion = document.getElementById('embarazo-seccion');
  const estadoEmbarazo = document.getElementById('estado-embarazo');
  const periodoEmbarazoInput = document.getElementById('periodo-embarazo');

  generoSelect.addEventListener('change', function() {
    if (this.value === 'femenino') {
      embarazoSeccion.style.display = 'block';
    } else {
      embarazoSeccion.style.display = 'none';
      periodoEmbarazoInput.style.display = 'none';
    }
  });

  estadoEmbarazo.addEventListener('change', function(event) {
    if (event.target.value === 'si') {
      periodoEmbarazoInput.style.display = 'block';
    } else {
      periodoEmbarazoInput.style.display = 'none';
    }
  });

        
        
        //JS de la segunda seccion del modal 
        document.getElementById('BRuxismo').addEventListener('change', function() {
          var Bruxismoadicional = document.getElementById('bruxismo-Adicional');
          if (this.value === 'si') {
            Bruxismoadicional.style.display = 'block';
          } else {
            Bruxismoadicional.style.display = 'none';
          }
        });


        //JS de la tercera seccion del modal 
        document.getElementById('Medicamento').addEventListener('change', function() {
                    document.getElementById('Cual-medicamento').style.display = this.value === 'si' ? 'block' : 'none';
                    });
                
                    document.getElementById('Alergico-medicamento').addEventListener('change', function() {
                    document.getElementById('Cual-alergico').style.display = this.value === 'si' ? 'block' : 'none';
                    });
                
                    document.getElementById('Operado').addEventListener('change', function() {
                    document.getElementById('De-que-operado').style.display = this.value === 'si' ? 'block' : 'none';
                    });
                
                    document.getElementById('Anticoagulante').addEventListener('change', function() {
                    document.getElementById('Cual-anticoagulante').style.display = this.value === 'si' ? 'block' : 'none';
                    });
                
                    document.getElementById('Antidepresivo').addEventListener('change', function() {
                    document.getElementById('Cual-antidepresivo').style.display = this.value === 'si' ? 'block' : 'none';
                    });
                
                    document.getElementById('Diabetes').addEventListener('change', function() {
                    document.getElementById('Valores-diabetes').style.display = this.value === 'si' ? 'block' : 'none';
                    });
                
                    document.getElementById('Hipertenso').addEventListener('change', function() {
                    document.getElementById('Valores-hipertenso').style.display = this.value === 'si' ? 'block' : 'none';
                    });


        //JS de la cuarta seccion del modal 
        document.getElementById('FAmiliar-enfermedad').addEventListener('change', function() {
                      const ENfermedadesFamiliares = document.getElementById('ENfermedades-familiares');
                      if (this.value === 'si') {
                        ENfermedadesFamiliares.style.display = 'block';
                      } else {
                        ENfermedadesFamiliares.style.display = 'none';
                      }
                    });
              
        //JS de la quinta seccion del modal 
        document.getElementById('Fuma').addEventListener('change', function() {
                      const Cigarrillos = document.getElementById('Cigarrillos');
                      if (this.value === 'si') {
                        Cigarrillos.style.display = 'block';
                      } else {
                        Cigarrillos.style.display = 'none';
                      }
                    });
                  
                    document.getElementById('Droga').addEventListener('change', function() {
                      const TipoDroga = document.getElementById('Tipo-droga');
                      if (this.value === 'si') {
                        TipoDroga.style.display = 'block';
                      } else {
                        TipoDroga.style.display = 'none';
                      }
                    });


                    
        //JS de la séptima seccion del modal
        const FotoInput = document.getElementById('Foto-input');
        const FotoDisplay = document.getElementById('Foto-display');

        // Mostrar la fotografía seleccionada
        FotoInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    FotoDisplay.innerHTML = `<img src="${e.target.result}" alt="Fotografía del paciente" class="h-full w-full object-cover rounded-md"/>`;
                }
                reader.readAsDataURL(file);
            }
        });

</script>






      <!----------------------------------------------------------------- Modal Editar Paciente ------------------------------------------------------------------------->
<!-- Modal Editar Paciente -->
<div id="EditPatient-modal" class="fixed inset-0 flex items-center justify-center bg-opacity-50 bg-black hidden">
  <div class="p-8 rounded-lg overflow-auto relative" style="background-color: #FBFDFF; height: 490px; width: 600px;">
     <!-- Botón X para cerrar el modal -->
     <button id="close-edit-registro-x" class="absolute top-0 right-0 m-2 pb-px border-4 border-green-900 text-green-900 hover:bg-green-900 hover:text-white w-8 h-8 rounded-full flex items-center justify-center text-lg font-bold">&times;</button>
      <!-- Contenido del Modal -->
      <h1 class="text-white text-center shadow-md rounded-full mb-10 text-3xl" style="background-color: #2A5A19; height: 50px;">
        Editar Datos del Doctor
      </h1>


          <!-- Campos de entrada -->
          <!-- Sección de Datos Personales -->
          <div class=" p-6 rounded-sm shadow-lg mb-10" style="background-color: #f5f7ff;">
            <h2 class="text-white px-4 pt-1 mb-10 rounded-full text-xl" style="background-color: #2A5A19; height: 40px;">
              DATOS PERSONALES
            </h2>
      
            <div class="grid grid-cols-2 gap-6">
              <!-- Input: Nombre(s) -->
                <div class="relative col-span-2">
                    <input class="pl-8 py-2 text-xs bg-[#E6ECF8] rounded-full w-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636]" type="text" placeholder="NOMBRE">
                </div>

                <!-- Input: Correo Electrónico -->
                <div class="relative col-span-2">
                    <input class="pl-8 py-2 text-xs bg-[#E6ECF8] rounded-full w-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636]" type="email" placeholder="CONTRASEÑA">
                </div>
            
               

                 <!-- Select: Rol -->
                <div class="relative col-span-2">
                    <label class="text-xs text-[#3B3636]">USUARIO</label>
                    <select id="doctorSelect" class="pl-8 py-2 text-xs bg-[#E6ECF8] rounded-full w-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636]">
                        <option disabled selected>Selecciona un tipo</option>
                        <option value="admin">Administrador</option>
                        <option value="doc">Trabajador</option>
                    </select>
                </div>
                 <!-- Select: Rol -->
                <div class="relative col-span-2">
                    <label class="text-xs text-[#3B3636]">ESTADO</label>
                    <select id="doctorSelect" class="pl-8 py-2 text-xs bg-[#E6ECF8] rounded-full w-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636]">
                        <option disabled selected>Selecciona un estado</option>
                        <option value="admin">Activo</option>
                        <option value="doc">Inactivo</option>
                    </select>
                </div>
          
          </div>
          </div>
                  




              
         
        <!-- Botones de Guardar y Cerrar -->
        <div class="flex justify-end mt-6">
          <button id="close-patient-modal-btn" class="text-white px-4 py-2 rounded-full mr-2 shadow-inner" style="background-color: #2A5A19;">Volver</button>
          <button id="submit-patient" class="text-white px-4 py-2 rounded-full shadow-md" style="background-color: #2A5A19;">Guardar Cambios</button>
      </div>
         
          </div>
        </div>
      </div>

    
  </div>
</div>

<!-- JavaScript para abrir y cerrar el modal -->
<script>
  const editPatientBtn = document.getElementById('edit-patient-btn');
  const editPatientModal = document.getElementById('EditPatient-modal');
  const closePatientModalBtn = document.getElementById('close-patient-modal-btn');
  const closeEditRegistroX = document.getElementById('close-edit-registro-x');

  // Mostrar el modal al hacer clic en el botón
  editPatientBtn.addEventListener('click', function() {
      editPatientModal.classList.remove('hidden');
  });

  // Cerrar el modal al hacer clic en el botón de cerrar
  closePatientModalBtn.addEventListener('click', function() {
      editPatientModal.classList.add('hidden');
  });

  // Cerrar el modal al hacer clic en la "X"
  closeEditRegistroX.addEventListener('click', function() {
      editPatientModal.classList.add('hidden'); // Cambiado a 'editPatientModal'
  });




        const GenderSelect = document.getElementById('Gender');
        const EmbarazoSeccion = document.getElementById('Embarazo-seccion');
        const EstadoEmbarazo = document.getElementById('Estado-embarazo');
        const PeriodoEmbarazoInput = document.getElementById('Periodo-embarazo');

        GenderSelect.addEventListener('change', function() {
          if (this.value === 'femenino') {
            EmbarazoSeccion.style.display = 'block';
          } else {
            EmbarazoSeccion.style.display = 'none';
            PeriodoEmbarazoInput.style.display = 'none';
          }
        });

        EstadoEmbarazo.addEventListener('change', function(event) {
          if (event.target.value === 'si') {
            PeriodoEmbarazoInput.style.display = 'block';
          } else {
            PeriodoEmbarazoInput.style.display = 'none';
          }
        });

        
        
        //JS de la segunda seccion del modal 
        document.getElementById('Bruxismo').addEventListener('change', function() {
          var BruxismoAdicional = document.getElementById('Bruxismo-adicional');
          if (this.value === 'si') {
            BruxismoAdicional.style.display = 'block';
          } else {
            BruxismoAdicional.style.display = 'none';
          }
        });


        //JS de la tercera seccion del modal 
        document.getElementById('MEdicamento').addEventListener('change', function() {
                    document.getElementById('CUal-medicamento').style.display = this.value === 'si' ? 'block' : 'none';
                    });
                
                    document.getElementById('ALergico-medicamento').addEventListener('change', function() {
                    document.getElementById('CUal-alergico').style.display = this.value === 'si' ? 'block' : 'none';
                    });
                
                    document.getElementById('OPerado').addEventListener('change', function() {
                    document.getElementById('DE-que-operado').style.display = this.value === 'si' ? 'block' : 'none';
                    });
                
                    document.getElementById('ANticoagulante').addEventListener('change', function() {
                    document.getElementById('CUal-anticoagulante').style.display = this.value === 'si' ? 'block' : 'none';
                    });
                
                    document.getElementById('ANtidepresivo').addEventListener('change', function() {
                    document.getElementById('CUal-antidepresivo').style.display = this.value === 'si' ? 'block' : 'none';
                    });
                
                    document.getElementById('DIabetes').addEventListener('change', function() {
                    document.getElementById('VAlores-diabetes').style.display = this.value === 'si' ? 'block' : 'none';
                    });
                
                    document.getElementById('HIpertenso').addEventListener('change', function() {
                    document.getElementById('VAlores-hipertenso').style.display = this.value === 'si' ? 'block' : 'none';
                    });


        //JS de la cuarta seccion del modal 
        document.getElementById('Familiar-enfermedad').addEventListener('change', function() {
                      const EnfermedadesFamiliares = document.getElementById('Enfermedades-familiares');
                      if (this.value === 'si') {
                        EnfermedadesFamiliares.style.display = 'block';
                      } else {
                        EnfermedadesFamiliares.style.display = 'none';
                      }
                    });
              
        //JS de la quinta seccion del modal 
        document.getElementById('FUma').addEventListener('change', function() {
                      const CIgarrillos = document.getElementById('CIgarrillos');
                      if (this.value === 'si') {
                        CIgarrillos.style.display = 'block';
                      } else {
                        CIgarrillos.style.display = 'none';
                      }
                    });
                  
                    document.getElementById('DRoga').addEventListener('change', function() {
                      const TIpoDroga = document.getElementById('TIpo-droga');
                      if (this.value === 'si') {
                        TIpoDroga.style.display = 'block';
                      } else {
                        TIpoDroga.style.display = 'none';
                      }
                    });


        //JS de la séptima seccion del modal
        const fotoInput = document.getElementById('foto-input');
                    const fotoDisplay = document.getElementById('foto-display');

                    // Mostrar la fotografía seleccionada
                    photoInput.addEventListener('change', (event) => {
                        const file = event.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                photoDisplay.innerHTML = `<img src="${e.target.result}" alt="Fotografía del paciente" class="h-full w-full object-cover rounded-md"/>`;
                            }
                            reader.readAsDataURL(file);
                        }
                    });
</script>


</body>
</html>