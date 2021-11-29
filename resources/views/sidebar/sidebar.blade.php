<div class="list-group">
    <a href="{{ route('profil') }}" class="list-group-item list-group-item-action {{ $tab == "profile" ? "active" : ""}}">Mon profil</a>
    <a href="{{ route('pets.index') }}" class="list-group-item list-group-item-action {{ $tab == "pet" ? "active" : ""}}">Mes animaux</a>
    <a href="{{ route('posts.create') }}" class="list-group-item list-group-item-action {{ $tab == "post" ? "active" : ""}}">Publier une photo</a>

</div>
