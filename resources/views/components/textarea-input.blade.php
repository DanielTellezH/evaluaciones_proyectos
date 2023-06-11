@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-ipn-500 focus:ring-ipn-500 rounded-md shadow-sm']) !!}></textarea>
