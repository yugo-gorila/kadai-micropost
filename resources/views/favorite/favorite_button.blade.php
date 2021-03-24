 @if(Auth::id() != $micropost->user_id)
 @if(Auth::user()->is_favorite($micropost->user_id))
    {!! Form::open(["route" => ["favorites.unfavorite",$micropost->id],"method" => "delete"]) !!}
   {!! Form::submit("UnFavorite",["class" => "btn-success  btn-sm"]) !!}
   {!! Form::close() !!}
  @else
      {!! Form::open(["route" => ["favorites.favorite",$micropost->id]]) !!}
      {!! Form::submit("Favorite",["class" => "btn btn-primary btn-sm"]) !!}
      {!! Form::close() !!}
 @endif 
 @endif