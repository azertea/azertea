<?php

use Illuminate\Database\Migrations\Migration;

class Main extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('annonce', function($table)
                {
                        $table->engine = 'InnoDB';
                        $table->increments('id');
                        $table->string('nom_produit');
                        $table->text('description');
						$table->float('prix');
						$table->string('photo');
						$table->string('URL');
						$table->boolean('dispo');
                        $table->integer('id_utilisateur')->unsigned()->nullable();
                        $table->foreign('id_utilisateur')->references('id')->on('utilisateur');
						$table->primary('id');
                });

				
				
				Schema::create('particulier', function($table)
                {
                        $table->engine = 'InnoDB';
						$table->increments('id');
                        $table->string('nom');
						$table->string('prenom');
						$table->string('telephone');
						$table->primary('id');
                });
				
				
				Schema::create('categorie', function($table)
				{
					$table->engine = 'InnoDB';
					$table->increments('id');
					$table->string('name');
					$table->primary('id');
				});
				
				
				Schema::create('recherche', function($table)
				{
					$table->engine = 'InnoDB';
					$table->increments('id');
					c
					$table->foreign('id_user')->references('id')->on('utilisateur');
					$table->string('keywordlist');
					$table->timestamps();
					$table->primary('id');
				});
				
				
				Schema::create('premium', function($table)
				{
					$table->engine = 'InnoDB';
					$table->increments('id');
					$table->timestamps();
					$table->primary('id');
				});
				
				
				Schema::create('mot_clef', function($table)
				{
					$table->engine = 'InnoDB';
					$table->increments('id');
					$table->string('nom');
					$table->primary('id');
				});

				
				Schema::create('utilisateur', function($table)
				{
					$table->increments('id');
					$table->string('pseudo');
					$table->string('email');
					$table->string('mdp');
					$table->boolean('est_valide');
					$table->integer('n°Siret')->unsigned()->nullable();
					$table->foreign('n°Siret')->references('n°Siret')->on('entreprise');
					$table->integer('id_particulier')->unsigned()->nullable();
					$table->foreign('id_particulier')->references('id')->on('particulier');
					$table->primary('id');
				});

				
				Schema::create('entreprise', function($table)
				{
					$table->integer('n°Siret')->unique();
					$table->string('nom');
					$table->timestamps();
					$table->boolean('entreprise');
					$table->primary('n°Siret');
				});
				
				
				Schema::create('sous_categorie', function($table)
				{
					$table->engine = 'InnoDB';
					$table->integer('id_mere')->unsigned()->nullable();
					$table->foreign('id_mere')->references('id')->on('categorie');
					$table->integer('id_fille')->unsigned()->nullable();
					$table->foreign('id_fille')->references('id')->on('categorie');
					$table->primary(array('id_mere', 'id_fille'));
				});				
				
				
				Schema::create('cat_ann', function($table)
                {
                        $table->engine = 'InnoDB';
                        $table->integer('id_annonce')->unsigned()->nullable();
                        $table->foreign('id_annonce')->references('id')->on('annonce');
						$table->integer('id_categorie')->unsigned()->nullable();
                        $table->foreign('id_categorie')->references('id')->on('categorie');
						$table->primary(array('id_annonce','id_categorie'));
                });
				
				
				Schema::create('MC_cat', function($table)
                {
                        $table->engine = 'InnoDB';
                        $table->integer('id_MC')->unsigned()->nullable();
                        $table->foreign('id_MC')->references('id')->on('mot_clef');
						$table->integer('id_categorie')->unsigned()->nullable();
                        $table->foreign('id_categorie')->references('id')->on('categorie');
						$table->primary(array('id_MC','id_categorie'));
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
			Schema::dropIfExists('categorie');
			Schema::dropIfExists('recherche');
			Schema::dropIfExists('sous_categorie');
			Schema::dropIfExists('mot_clef');
			Schema::dropIfExists('MC_cat');
			Schema::dropIfExists('cat_ann');
			Schema::dropIfExists('annonce');
			Schema::dropIfExists('entreprise');
			Schema::dropIfExists('particulier');
			Schema::dropIfExists('utilisateur');
	}

}