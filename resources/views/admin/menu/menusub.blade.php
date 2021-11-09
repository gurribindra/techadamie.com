<!-- @foreach($childs as $child)
 <li><a class="dropdown-item {{ count($child->childs) ? 'dropdown-toggle' :'' }}" href="#" style="border:1px solid #ccc;">{{ $child->title }}</a>
       @if(count($child->childs))
          <ul class="dropdown-menu">
              <li>
                 <a class="dropdown-item" href="#" style="position: absolute;">
                       @include('admin.menu.menusub',['childs' => $child->childs])
                    </a>
                </li>
            </ul>
        @endif
   </li>
 @endforeach -->

 @foreach($childs as $child)
 <li><a href="{{ $child->slug }}">{{ $child->title }}</a>
   </li>
 @endforeach