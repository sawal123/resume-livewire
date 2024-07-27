@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'class="  my-2 border bg-gray-100 border-gray-300 rounded  text-indigo-600 file:bg-[#8386F3BD] file:border-none file:rounded file:h-10 file:cursor-pointer file:transition-all file:duration-250 file:ease-in hover:file:bg-white hover:file:text-[#7C80B9]']) !!}>
