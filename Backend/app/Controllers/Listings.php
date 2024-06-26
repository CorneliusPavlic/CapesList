<?php

namespace App\Controllers;

use App\Models\Listing;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Model;

class Listings extends ResourceController {

    use ResponseTrait;

    private string $table = 'listing';
    

    public function createListing() {

        //Prevents from random API access, done only through form
        if (!isset($_POST['listing'])) {
            $this->fail("No account details submitted");
        }

        //dd($_POST);

        //Now make a model
        $model = new Listing();

        //Now sanatize data
        $cleanData = [
           'COMIC_ID' => esc($_POST['listing']['COMIC_ID']),
           'PRICE' => esc($_POST['listing']['PRICE']),
           'POSTING_TYPE' => esc($_POST['listing']['POSTING_TYPE']),
           'LISTING_DATE' => esc($_POST['listing']['LISTING_DATE']),
           'SELLER_USER_ID' => esc($_POST['listing']['SELLER_USER_ID']),
           'BUYER_USER_ID' => esc((int)$_POST['listing']['BUYER_USER_ID']),
           'STATUS' => esc($_POST['listing']['STATUS'])
        ];

        $model -> createListing($cleanData);

        //Redirects
        header('Location: http://localhost:3000/create/listing', true, 301);
        exit;

        return;
    }

    public function deleteListingByComicID($comicId) {
        //Need to take the id
        $cleanComicID = esc($comicId);

        $model = new Listing();
        $model->deleteByComicID($cleanComicID);
    }


    public function allListings() {
        $model = new Listing();

        $result = $model -> getAllListings();



        return $this -> respond($result);
    }

    public function getListing($id) {
        
        //Cleanse the ID
        $cleanedListingID = esc($id);


        //Now query the backend for the listings
        $model = new Listing();
        $result = $model-> getListing($cleanedListingID);


        return $this -> respond($result);
    }


    public function getListingComicByUserID($id) {
        
        //Cleanse the ID
        $cleanedListingID = esc($id);


        //Now query the backend for the listings
        $model = new Listing();
        $result = $model-> getListingComicByUserID($cleanedListingID);


        return $this -> respond($result);
    }

    public function deleteListingByID() {
        //Check the POST array
        if(!isset($_POST['comicDelete'])) {
            return $this->fail("No listing data submitted");
        }

        //Now cleanse the data
        $cleanListingID = esc($_POST['comicDelete']['id']);

        //Make a model
        $model = new Listing;
        $model -> deleteListingByID($cleanListingID);

        //Now redirect
        header('Location: http://localhost:3000/Delete/comic');
        exit;


        return;
    }

    

}



?>