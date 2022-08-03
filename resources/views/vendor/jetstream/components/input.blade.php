@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'input bg-white focus:bg-white border-slate-300 focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400 out-of-range:border-rose-600 disabled:bg-slate-50 disabled:cursor-not-allowed disabled:font-bold disabled:text-slate-600 soft-transition']) !!}>
