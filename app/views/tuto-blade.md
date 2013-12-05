Toute la doc : http://docs.laravel.fr/4/templates
**Affichage de données**

    Hello, {{ $name }}.

    The current UNIX timestamp is {{ time() }}.

Si vous avez besoin d'afficher un texte brut entre accolades et sans traitement par Blade, vous devez préfixer les accolades de votre texte avec un symbole `@` :

**Affichage de textes bruts avec accollades**

    @{{ Ceci ne sera pas traité par Blade }}

Bien sûr, toutes les données utilisateurs doivent être échappées ou purifiées. Pour échapper la sortie, utilisez trois accollades :

	Hello, {{{ $name }}}.

> **Note:** Soyez vraiment prudent lors de l'affichage de contenu soumit par les utilisateurs de votre application. Utilisez toujours les triples accollades pour échapper toutes les entitées HTML dans le contenu.

**Déclaration If**

    @if (count($records) === 1)
        I have one record!
    @elseif (count($records) > 1)
        I have multiple records!
	@else
		I don't have any records!
	@endif

	@unless (Auth::check())
		You are not signed in.
	@endunless

**Boucles**

	@for ($i = 0; $i < 10; $i++)
		The current value is {{ $i }}
	@endfor

	@foreach ($users as $user)
		<p>This is user {{ $user->id }}</p>
	@endforeach

	@while (true)
		<p>I'm looping forever.</p>
	@endwhile

**Inclusion d'une sous-vue**

	@include('view.name')

Vous pouvez aussi passer un tableau de données à la vue incluse :

    @include('view.name', array('some'=>'data'))

**Sections de remplacement**

Par défaut, les sections sont ajoutées à n'importe quel contenu précédent qui existe dans la section. Pour remplacer une section entièrement, vous pouvez utiliser la déclaration `overwrite`:

    @extends('list.item.container')
  
    @section('list.item.content')
        <p>This is an item of type {{ $item->type }}</p>
    @overwrite

**Affichage d'une ligne de langue**

	@lang('language.line')

	@choice('language.line', 1);

**Commentaires**

	{{-- This comment will not be in the rendered HTML --}}