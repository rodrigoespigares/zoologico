<x-app-layout>
    <x-slot name="slot">
        
    <table class="table">
        @foreach ($opciones as $key => $opcion)
            <a href="{{$opcion}}">{{$key}}</a>
        @endforeach
    </table>
</x-slot>
</x-app-layout>