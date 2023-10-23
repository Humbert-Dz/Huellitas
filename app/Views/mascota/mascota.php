<?= view('commons/head.php') ?>

    <div class="w-full m-auto flex justify-evenly mb-6">
    
        <!-- Modal agregar boton -->
        <button data-modal-target="add-modal" data-modal-toggle="add-modal" class="block flex gap-4 items-center px-4 py-3 bg-[#a8dadc] rounded-xl font-bold text-black text-lg" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" id="plus-add-more-detail" style="enable-background:new 0 0 15 15;" version="1.1"
                viewBox="0 0 15 15" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M7.5,0C3.364,0,0,3.364,0,7.5S3.364,15,7.5,15S15,11.636,15,7.5S11.636,0,7.5,0z M7.5,14C3.916,14,1,11.084,1,7.5  S3.916,1,7.5,1S14,3.916,14,7.5S11.084,14,7.5,14z"/><polygon points="8,3.5 7,3.5 7,7 3.5,7 3.5,8 7,8 7,11.5 8,11.5 8,8 11.5,8 11.5,7 8,7 "/></svg>
            Agregar Mascota
        </button>

        <!-- Modal agregar mascota -->
        <div id="add-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Agrega una mascota</h3>
                        <form class="space-y-6" action="<?= base_url('mascotas/agregar')?>" method="post">
                            <div>
                                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                <input type="text" name="nombre" id="nombre" minlength="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Ingresa el nombre de la mascota" required>
                            </div>
                            <div>
                                <label for="fecha_nacimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de nacimiento</label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            </div>
                            <div>
                                <label for="especie" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona la especie</label>
                                <select id="especie" name="especie" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <?php foreach ($especies as $especie) : ?>
                                        <option value="<?php echo $especie['id'] ?>"><?php echo $especie['nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <label for="raza" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona la raza</label>
                                <select id="raza" name="raza" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <?php foreach ($razas as $raza) : ?>
                                        <option value="<?php echo $raza['id'] ?>"><?php echo $raza['nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <label for="dieta" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona la dieta</label>
                                <select id="dieta" name="dieta" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <?php foreach ($dietas as $dieta) : ?>
                                        <option value="<?php echo $dieta['id'] ?>"><?php echo $dieta['nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="flex gap-4">
                                <button data-modal-hide="add-modal"  class="w-full active:scale-95 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 cursor-pointer">Cancelar</button>
                                <button type="submit" class="w-full active:scale-95 text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Aceptar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="div">
        
        <!-- Tabla de mascotas  -->
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 text-center">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            fecha de Nacimiento
                        </th>
                        <th scope="col" class="px-6 py-3">
                            edad
                        </th>
                        <th scope="col" class="px-6 py-3">
                            especie
                        </th>
                        <th scope="col" class="px-6 py-3">
                            raza
                        </th>
                        <th scope="col" class="px-6 py-3">
                            dieta
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($mascotas as $mascota) : ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $mascota['id'] ?>
                            </th>
                            <td class="px-6 py-4">
                                <?php echo $mascota['nombre'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $mascota['fecha_nacimiento'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $mascota['edad'] ?> (años)
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $mascota['especie'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $mascota['raza'] ?>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <?php echo $mascota['dieta'] ?>
                                : 
                                <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm py-1.5 px-2.5 text-center">Ver</button>
                            </td>
                            <td class="px-6 py-4 flex justify-evenly">
                                <a href="<?= base_url('mascotas/editar/' . $mascota['id']) ?>" class="active:scale-95 text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">Editar</a>
                                <a data-modal-target="popup-modal" data-modal-toggle="popup-modal"  class="active:scale-95 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer" onclick="eliminar('<?php echo $mascota['id']?>')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
        </table>

    </div>

    <!-- Modal eliminar mascota -->
    <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                
                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estas seguro de que quieres eliminar esta mascota?</h3>
                    <a id="eliminar" href="<?= base_url('mascotas/eliminar/') ?>" data-modal-hide="popup-modal" type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        Sí, estoy seguro
                    </a>
                    <button data-modal-hide="popup-modal" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        No, cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function eliminar(id) {
            // Obtén la etiqueta <a> por su ID
            var link = document.getElementById("eliminar");

            // Concatena el número `id` al atributo `href`
            link.href = link.href + id;
        }

        function editar(id) {
            // Obtén la etiqueta <a> por su ID
            var link = document.getElementById("editar");

            // Concatena el número `id` al atributo `href`
            link.href = link.href + id;
        }
    </script>

<?= view('commons/footer.php') ?>