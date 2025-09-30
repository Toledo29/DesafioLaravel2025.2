@props(['type' => 'submit', 'width' => 'full'])
<button type="{{$type}}" class="w-{{$width}} bg-gray-600 text-white font-bold py-2 px-4 rounded hover:bg-gray-700">{{$slot}}</button>