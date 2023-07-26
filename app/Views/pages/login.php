<div class="h-screen flex items-center justify-center">
    <form action="" method="post" class="flex flex-col gap-6 p-8 border-2 rounded w-[26rem] prose">
        <!-- Title and  Desc-->
        <div>
            <h2 class="font-extrabold text-3xl mt-0 mb-2">Login</h2>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, possimus.</p>
        </div>

        <!-- NIP -->
        <div class="flex flex-col gap-1 w-full">
            <label for="nip" class="text-sm font-semibold">NIP</label>
            <input type="text" id="nip" name="nip" class="input input-bordered" placeholder="Isikan Nomor Induk Pegawai">
        </div>

        <!-- Password -->
        <div class="flex flex-col gap-1 w-full">
            <label for="password" class="text-sm font-semibold">Password</label>
            <input type="password" id="password" name="password" class="input input-bordered" placeholder="Isikan Password">
        </div>

        <!-- Submit Button -->
        <button class="btn btn-primary w-full capitalize">Login</button>
    </form>
</div>