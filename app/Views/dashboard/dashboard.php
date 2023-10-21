<?= view('commons/head.php') ?>

    <div class="w-full m-auto flex h-[200px] justify-evenly mb-6">
        <div class="w-[280px] p-2.5 bg-[#ade8f4] rounded-md flex flex-col text-center justify-evenly cursor-pointer hover:scale-105">
            <h2 class="font-bold text-slate-800 text-6xl">#28</h2>
            <p class="font-semibold text-slate-600 text-3xl">Mascotas en total</p>
        </div>
        <div class="w-[280px] p-2.5 bg-[#ade8f4] rounded-md flex flex-col text-center justify-evenly cursor-pointer hover:scale-105">
            <h2 class="font-bold text-slate-800 text-6xl">#20</h2>
            <p class="font-semibold text-slate-600 text-3xl">Mascotas en adopción</p>
        </div>
        <div class="w-[280px] p-2.5 bg-[#ade8f4] rounded-md flex flex-col text-center justify-evenly cursor-pointer hover:scale-105">
            <h2 class="font-bold text-slate-800 text-6xl">#8</h2>
            <p class="font-semibold text-slate-600 text-3xl">Mascotas disponibles</p>
        </div>
    </div>
    
    <hr class="mb-6">
    
    <div class="w-full m-auto flex justify-evenly mb-6">

        <a href="#" class="block w-[280px] px-8 py-3 bg-[#fff0f3] rounded-md cursor-pointer active:scale-95 active:bg-[#FFE1E7] duration-400 hover:shadow-sombrita hover:scale-105">
            <figure class="w-[150px] m-auto flex flex-col gap-4 items-center">
                <img src="<?= base_url('src/images/huella.svg') ?>" alt="">
                <figcaption>
                        <h2 class="font-bold text-slate-800 text-center text-4xl">Mascotas</h2>
                    </figcaption>
            </figure>
        </a>
        <a href="#" class="block w-[280px] px-8 py-3 bg-[#fff0f3] rounded-md cursor-pointer active:scale-95 active:bg-[#FFE1E7] duration-400 hover:shadow-sombrita hover:scale-105">
            <figure class="w-[150px] m-auto flex flex-col gap-4 items-center">
                <img src="<?= base_url('src/images/dieta.svg') ?>" alt="">
                <figcaption>
                        <h2 class="font-bold text-slate-800 text-center text-4xl">Dietas</h2>
                    </figcaption>
            </figure>
        </a>

    </div>

<?= view('commons/footer.php') ?>