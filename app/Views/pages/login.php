<div class="flex items-center justify-center pt-24">
    <form action="/" method="post" class="flex flex-col gap-6 bg-white p-8 border-2 rounded w-[26rem] prose">
        <!-- Title and  Desc-->
        <div>
            <h2 class="font-extrabold text-3xl mt-0 mb-2">Login</h2>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, possimus.</p>
        </div>

        <!-- NIP -->
        <div class="flex flex-col gap-1 w-full">
            <label for="username" class="text-sm font-semibold">Username</label>
            <input type="text" id="username" name="username" class="input input-bordered" placeholder="Isikan Username">
        </div>

        <!-- Password -->
        <div class="flex flex-col gap-1 w-full">
            <label for="password" class="text-sm font-semibold">Password</label>
            <input type="password" id="password" name="password" class="input input-bordered"
                placeholder="Isikan Password">
        </div>

        <!-- Submit Button -->
        <button class="btn btn-primary w-full capitalize">Login</button>
    </form>
</div>