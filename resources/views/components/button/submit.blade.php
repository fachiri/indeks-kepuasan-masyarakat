@props(['text', 'id', 'class' => '', 'color' => 'blue', 'icon' => '', 'name' => '', 'value' => ''])

<button type="submit" id="{{ $id }}"
  @if (!empty($name) && !empty($value)) name="{{ $name }}" value="{{ $value }}" @endif
  class="{{ $class }} text-white bg-{{ $color }}-700 hover:bg-{{ $color }}-800 focus:ring-4 focus:outline-none focus:ring-{{ $color }}-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-{{ $color }}-600 dark:hover:bg-{{ $color }}-700 dark:focus:ring-{{ $color }}-800">
  @if (!empty($icon))
    <x-icon name="{{ $icon }}" size="3.5" class="mr-2" stroke-width="2" />
  @endif
  {{ $text }}
</button>
