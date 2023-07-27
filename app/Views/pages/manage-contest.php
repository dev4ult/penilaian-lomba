<!-- Header -->
<header class="pb-10 border-b-2 flex justify-between">
    <div class="prose">
        <h2 class="text-lg font-extrabold">Manajemen Lomba</h2>
        <p>Pengelolaan data user untuk aksesibilitas ke aplikasi dan pengaturan peranan atau tugas terhadap user</p>
    </div>

    <!-- Breadcrumbs -->
    <div class="text-sm breadcrumbs self-end">
        <ul>
            <li><a href="/" class="text-primary">Dashboard</a></li>
            <li><span class="badge badge-neutral rounded-full">Lomba</span></li>
        </ul>
    </div>
</header>

<!-- Manage Input / Button -->
<div class="flex gap-3 justify-between mb-6 mt-8">
    <!-- Modal Form -->
    <button class="btn btn-neutral capitalize btn-sm btn-outline self-end" onclick="modal_form.showModal()">Tambah
        Lomba</button>
    <dialog id="modal_form" class="modal">
        <form method="dialog" class="modal-box">
            <h3 class="font-bold text-lg">Hello!</h3>
            <p class="py-4">Press ESC key or click the button below to close</p>
            <div class="modal-action">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </div>
        </form>
    </dialog>

    <!-- Search Input -->
    <div class="join">
        <div>
            <div>
                <input class="input input-bordered join-item" placeholder="Cari Lomba" />
            </div>
        </div>
        <select class="select select-bordered join-item">
            <option disabled selected>Filter</option>
            <option>Admin</option>
            <option>Juri</option>
        </select>
        <div class="indicator">
            <button class="btn join-item capitalize btn-primary">Cari</button>
        </div>
    </div>
</div>

<div class="grid grid-flow-row grid-cols-4 gap-5">
    <div class="p-6 bg-white rounded border-2 hover:shadow prose">
        <h2>Adzan Senior</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, dolorum.</p>
        <button class="btn btn-sm btn-secondary btn-outline capitalize">detail</button>
    </div>
    <div class="p-6 bg-white rounded border-2 hover:shadow prose">
        <h2>Adzan Senior</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, dolorum.</p>
        <button class="btn btn-sm btn-secondary btn-outline capitalize">detail</button>
    </div>
    <div class="p-6 bg-white rounded border-2 hover:shadow prose">
        <h2>Adzan Senior</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, dolorum.</p>
        <button class="btn btn-sm btn-secondary btn-outline capitalize">detail</button>
    </div>
    <div class="p-6 bg-white rounded border-2 hover:shadow prose">
        <h2>Adzan Senior</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, dolorum.</p>
        <button class="btn btn-sm btn-secondary btn-outline capitalize">detail</button>
    </div>
    <div class="p-6 bg-white rounded border-2 hover:shadow prose">
        <h2>Adzan Senior</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, dolorum.</p>
        <button class="btn btn-sm btn-secondary btn-outline capitalize">detail</button>
    </div>
    <div class="p-6 bg-white rounded border-2 hover:shadow prose">
        <h2>Adzan Senior</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, dolorum.</p>
        <button class="btn btn-sm btn-secondary btn-outline capitalize">detail</button>
    </div>
</div>