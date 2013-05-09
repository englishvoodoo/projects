<?php

// 1. Our base object that gets decorations on it
class Cupcake
{
        public $Toppings = array('sprinkles' => 0, 'frosting' => 'none');
        
        public function __construct($int, $str)
        {
                $this->Toppings['sprinkles'] = $int;
                $this->Toppings['frosting'] = $str;
        }
}

// 2. Just a nice little wrapper to keep the decorators consistent!
abstract class Decorator_Wrapper
{
        abstract function Add($mixed);
        abstract function Remove($mixed);
}

// 3. A decorator that manipulates our main object!
class Sprinkle_Decorator extends Decorator_Wrapper
{
        public function __construct(Cupcake $c)
        {
                $this->Cupcake = $c;
        }
        
        public function Add($int)
        {
                $this->Cupcake->Toppings['sprinkles'] += $int;
        }
        
        public function Remove($int)
        {
                $this->Cupcake->Toppings['sprinkles'] -= $int;
        }
        
}

// 4. Another decorator that manipulates our main object!
class Frosting_Decorator extends Decorator_Wrapper
{
        public function __construct(Cupcake $c)
        {
                $this->Cupcake = $c;
        }
        
        public function Add($str)
        {
                $this->Cupcake->Toppings['frosting'] = $str;
        }
        
        public function Remove($str)
        {
                echo "Hrmm.. We cant seem to remove your $str, it's stuck on the muffin!";
        }
        
}


// Run through some tests to satisfy our customer!
echo '<p>Mmm! I want a cupcake!</p>';
$cupcake = new Cupcake(5, 'none');
print_r($cupcake->Toppings);


echo '<p>Hey, I want more sprinkles!</p>' ;
$sprinkle = new Sprinkle_Decorator($cupcake);
$sprinkle->Add('55');
print_r($cupcake->Toppings);


echo '<p>Not so many!</p>' ;
$sprinkle->Remove('25');
print_r($cupcake->Toppings);


echo '<p>If only I had some frosting :)</p>';
$frosting = new Frosting_Decorator($cupcake);
$frosting->Add('Chocolate');
print_r($cupcake->Toppings);