<?php

namespace Models;

class BasketballGames
{

    public function basketBall(){
        return Array(
            [
                'home' => ['name' => 'Orpi', 'points' => 30],
                'guest' => ['name' => 'Aspla', 'points' => 28],
            ],
        
            [
                'home' => ['name' => 'Tanic', 'points' => 29],
                'guest' => ['name' => 'Ball', 'points' => 29],
            ],
        
            [
                'home' => ['name' => 'Termic', 'points' => 27],
                'guest' => ['name' => 'Alpi', 'points' => 35],
            ],
        
            [
                'home' => ['name' => 'Narciso', 'points' => 12],
                'guest' => ['name' => 'Pinco', 'points' => 15],
            ],
        
            [
                'home' => ['name' => 'Dubai', 'points' => 24],
                'guest' => ['name' => 'Italia', 'points' => 36],
            ]
        );
    }
}