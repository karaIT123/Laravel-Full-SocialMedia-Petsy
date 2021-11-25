<h1>Bonjour,</h1>

Merci {{ $user->name }} pour votre inscription. <br/><br/>

Pour valider votre email, veuillez cliqué: <a href="{{ url('confirm', [$user->id, $token]) }}"> ici</a>.
