<x-layout>
    <x-container>
        <div class="w-full flex flex-col gap-3 justify-center items-center">
            <h3 class="text-slate-700 text-4xl mb-3">Registration</h3>
            <form class="w-[40%] max-md:w-[70%] max-sm:w-[100%]" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="inline-block mb-1">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name"
                        class="bg-gray-100 border-2 @error('name') border-red-500 @else border-gray-200 @enderror w-full p-2 rounded-lg"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username" class="inline-block mb-1">Username</label>
                    <input type="text" name="username" id="username" placeholder="Your username"
                        class="bg-gray-100 border-2 @error('username') border-red-500 @else border-gray-200 @enderror w-full p-2 rounded-lg"
                        value="{{ old('username') }}">
                    @error('username')
                        <p class="text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="inline-block mb-1">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your email"
                        class="bg-gray-100 border-2 @error('email') border-red-500 @else border-gray-200 @enderror w-full p-2 rounded-lg"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="inline-block mb-1">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                    class="bg-gray-100 border-2 @error('password') border-red-500 @else border-gray-200 @enderror w-full p-2 rounded-lg"
                        value="">
                    @error('password')
                        <p class="text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="inline-block mb-1">Confirm password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="Confirm password"
                    class="bg-gray-100 border-2 border-gray-200 w-full p-2 rounded-lg"
                    value="">
                </div>
                <div>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
                </div>
            </form>
        </div>
    </x-container>
</x-layout>
