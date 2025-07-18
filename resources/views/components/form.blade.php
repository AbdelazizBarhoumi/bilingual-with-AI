<form action="{{ route('form.submit') }}" method="POST" class="space-y-6 max-w-lg mx-auto">
    @csrf
    <div>
        <label class="block text-gray-700">{{ trans('forms.name') }}</label>
        <input type="text" name="name" required class="w-full p-2 border rounded @error('name') border-red-500 @enderror">
        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block text-gray-700">{{ trans('forms.email') }}</label>
        <input type="email" name="email" required class="w-full p-2 border rounded @error('email') border-red-500 @enderror">
        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block text-gray-700">{{ trans('forms.metrics') }}</label>
        <textarea name="metrics" required class="w-full p-2 border rounded @error('metrics') border-red-500 @enderror"></textarea>
        @error('metrics') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-700">{{ trans('forms.submit') }}</button>
</form>