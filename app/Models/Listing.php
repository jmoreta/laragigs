<?php
namespace App\Models;

class Listing {

    public static function all(){

        
        return [
            [
                'id'=>1,
                'title'=> 'Listing One',
                'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit velit facilis vel officiis laboriosam voluptas. Accusantium doloremque aliquam libero officia, aut 
                repudiandae saepe odit unde ratione rem placeat nemo iste.'
            ],

            [
                'id'=>2,
                'title'=> 'Listing Two',
                'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit velit facilis vel officiis laboriosam voluptas. Accusantium doloremque aliquam libero officia, aut 
                repudiandae saepe odit unde ratione rem placeat nemo iste.'
            ]
            ];
        
        }


        public static function find($id){
            $listings = self::all();

            foreach ($listings as $listing){
                if($listing['id']==$id){

                    return $listing;
                }
                
            }
        }
}




