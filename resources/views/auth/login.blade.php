<x-layout>
    <x-container>
        <div class="w-full flex flex-col gap-3 justify-center items-center">
            <h3 class="text-slate-700 text-4xl mb-3">Log in</h3>
            <form class="w-[40%] max-md:w-[70%] max-sm:w-[100%]" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="inline-block mb-1">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your email"
                    class="bg-gray-100 border-2 @error('email') border-red-500 @else border-gray-200 @enderror w-full p-2 rounded-lg" value="{{old('email')}}">
                    @error('email')
                        <p class="text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="inline-block mb-1">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                    class="bg-gray-100 border-2 @error('password') border-red-500 @else border-gray-200 @enderror w-full p-2 rounded-lg" value="">
                    @error('password')
                        <p class="text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Log in</button>
                </div>
            </form>
        </div>
    </x-container>
</x-layout>
    