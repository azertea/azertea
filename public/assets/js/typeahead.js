$(function (){
   var deps = ['Mon pc est lent','Je veux un pc de gamer','Je veux un pc pour faire de graphisme','Mon son ne marche plus','Alpes de-Htes Provence','Hautes-Alpes',
'Problème de résolution','Je cherche un micro-processeur performant'];
   $('#input').typeahead({source: deps});
});  