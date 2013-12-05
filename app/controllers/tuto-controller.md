Documentation : 
http://docs.laravel.fr/4/controllers

**Contrôleurs basiques**

Plutôt que de définir toute la logique de votre application au niveau des routes dans le fichier routes.php, il est d'usage de déplacer le comportement de votre application dans des contrôleurs. Les contrôleurs permettent de regrouper en une classe, la logique de routes connexes, et aussi de prendre avantage des fonctionnalités avancées du framework comme l'injection de dépendances.

Les contrôleurs sont stockés dans le dossier app/controllers, et ce dossier est enregistré dans l'option classmap de votre fichier composer.json par défaut.

Voici un exemple d'un contrôleur basique :

class UserController extends BaseController {

    /**
     * Show the profile for the given user.
     */
    public function showProfile($id)
    {
        $user = User::find($id);

        return View::make('user.profile', array('user' => $user));
    }

}

Tous les contrôleurs doivent hériter de la classe BaseController. La classe BaseController est également présente dans le dossier app/controllers, et peut être utilisée pour placer des éléments partagés. BaseController hérite de la classe Controller du framework. Maintenant, nous pouvons router vers notre contrôleur de la manière suivante :

Route::get('user/{id}', 'UserController@showProfile');

Si vous organisez votre code avec des namespaces PHP, utilisez simplement le nom complet de la classe lors de la définition de la route :

Route::get('foo', 'Namespace\FooController@method');

Vous pouvez également nommer ces routes avec la propriété as :

Route::get('foo', array('uses' => 'FooController@method',
                                        'as' => 'name'));

Pour générer une URL vers une action de contrôleur, utilisez la méthode URL::action :

$url = URL::action('FooController@method');

Vous pouvez accéder au nom de l'action du contrôleur qui est lancé en utilisant la méthode currentRouteAction :

$action = Route::currentRouteAction();
