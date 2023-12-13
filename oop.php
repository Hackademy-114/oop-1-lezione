<?php

//! classi - classificazioni, blocchi di codice che posso ripetere
//nome della classe - iniziale maiuscola, nome al singolare, inglese
// class Name{
//ATTRIBUTI/ PROPRIETA
// METODO COSTRUTTORE
//METODI/COMPORTAMENTI 
// }

class Animal
{
    //!ATTRIBUTI/ PROPRIETA - caratteristiche comuni
    public $species;
    public $name;
    public $age;
    private $id;


    public static $counter = 0;


    //! costruttore (_ _ construct) - specifichiamo come costruire gli oggetti e dare valore agli attributi
    public function __construct($specie, $nome, $eta)
    {
        //this - fa riferimento all'oggetto della classe Animal
        //* -> - object operator
        $this->name = $nome;
        $this->age = $eta;
        $this->species = $specie;

        //* :: - scope resolution operator
        self::$counter++;
    }

    //! metodi
    public function info()
    {
        echo "E' un $this->species, si chiama $this->name e ha $this->age anni, \n";
    }

    public function getSpecies()
    {
        echo "Specie: $this->species \n";
    }

    public function setId()
    {
        $this->id = Animal::$counter;
        echo $this->id;
    }
    // public function setCiao($string)
    // {
    //     $this->ciao = $string;
    //     echo $this->ciao;
    // }
}
//! creare oggetti: keyword new + nomeClasse OGGETTI 


$danno = new Animal('cane amstaff', 'Danno', 8);
$ice = new Animal('Gatto', 'Ice', 7);
$dylan = new Animal('cane', 'Dylan', 15);


//! INVOCO UN METODO : oggetto->metodo();
$ice->getSpecies();

// $ice->age = 6;
// echo $ice->age;
// $ice->setCiao('Miao ciao');

// echo Animal::$counter . "\n";

$micia = new Animal('gatto', 'Micia', 19);

// echo Animal::$counter;

//! EREDITARIETAà
// singola - l la possibilità per una classe di ereditare da un’altra tutti gli attributi e i metodi per estendere il concetto della classe base ed ampliarla.
// Quindi posso creare una nuova classe che eredita tutto ciò che la prima classe aveva e specializzarlo.

class Pet extends Animal
{
    public $owner;
    protected $city;

    public function __construct($specie, $nome, $eta, $proprietario, $citta)
    {
        //eredita la construct del parent:
        parent::__construct($specie, $nome, $eta);
        // $this->name = $nome;
        // $this->age = $eta;
        // $this->species = $specie;
        $this->owner = $proprietario;
        $this->city = $citta;
    }

    public function sayHello()
    {
        echo "Ciao, sono $this->owner e il mio animale domestico è $this->name \n";
    }

    public function getCity()
    {
        echo "$this->city \n";
    }
    public function getId(){
        echo $this->id;
    }
}

$pappagallo = 'pappagallo';
$pet = new Pet($pappagallo, 'Pippo', '', 'Mattia', 'Bari');
$pet->age = 15;
echo $pet->age;

var_dump($pet);

// echo $pet->city;
$pet->getCity();


class Wild extends Animal
{
    public $habitat;
}

//! ACCESS MODIFIERS - MODIFICATORE D'ACCESSO, VISIBILITA DELL'ATTRIBUTO/FUNZIONE
// protected - Protected - l’attributo è accessibile in lettura e in scrittura solo dall’interno della classe. Di solito si utilizza per proteggere dei dati, che è un tipo di comportamento definito DATA HIDING (nascondimento di un dato). ereditato sia in lettura che in scrittura
// private -ha lo stesso comportamento di protected ma l’attributo non viene ereditato da eventuali classi figlie. Sarà specifico per questa classe. attributo ereditato ma non accessibile