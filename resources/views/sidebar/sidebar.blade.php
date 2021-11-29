<div class="list-group mb-3">
    <a href="{{ route('profil') }}" class="list-group-item list-group-item-action {{ $tab == "profile" ? "active" : ""}}">Mon profil</a>
</div>


<div class="list-group mb-3">
    <a href="{{ route('posts.create') }}" class="list-group-item list-group-item-action {{ $tab == "post" ? "active" : ""}}">Publier une photo</a>
    <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action {{ $tab == "posts" ? "active" : ""}}">Mes photos publiées</a>

</div>

<div class="list-group mb-3">
    <a href="{{ route('pets.index') }}" class="list-group-item list-group-item-action {{ $tab == "pet" ? "active" : ""}}">Mes animaux</a>

</div>
