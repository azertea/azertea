<?php

class ProductController extends BaseController {

		public function getProductList()
        {
			$recep=Input::get('');
            $result = array(); // Requete toutes annonces pour id categorie donné
            return Response::json($result);
        }


        public function getProductAdd()
        {
               
        }
        public function postProductAdd()
        {
               
        }

        public function getProductSend()
        {
               
        }
        public function postProductSend()
        {
               
        }

        public function getProduct()
        {

        }
}
        

