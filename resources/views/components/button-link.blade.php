<a href="{{route($route)}}" class="rounded-sm {{request()->is($href) ? 'bg-orange-400 text-white' : 'text-orange-100'}}  px-5 py-2  font-medium flex space-x-3 items-center">
  <div>
    {{$slot}}
  </div>
  <span>{{$title}}</span>
</a>