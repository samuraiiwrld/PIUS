<?php

namespace u8202112;

use DateTime;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

require './vendor/autoload.php';

Class User{
    function __construct(private int $id,private string $name,private string $email,private string $password)
    {
    $this->validationId($id);
    $this->validationName($name);
    $this->validationEmail($email);
    $this->validationPassword($password);   
    }
        
    public function validationId($id)
    {
    $validator = Validation::createValidator();
    $violations = $validator ->validate($id,[
        new Assert\NotBlank(),
        new Assert\NotNull(),
        new Assert\Positive(),
        new Assert\Range(min:999,max:1999),
        ]);
    if (count($violations) > 0 ){
        echo "Incorrect id!:$id \r\n"; 
        }
    }
    
    public function validationName($name)
    {
    $validator = Validation::createValidator();
    $violations = $validator ->validate($name,[
        new Assert\NotBlank(),
        new Assert\Length(min:2,max:10),
        new Assert\Regex(pattern:'/^[A-Z][a-z]+$/i')
        ]);
    if(count($violations) > 0){
        echo "Incorrect name!:$name \r\n"; 
        }   
    }
    public function validationEmail($email)
    {
    $validator = Validation::createValidator();
    $violations = $validator ->validate($email,[
        new Assert\NotBlank(),
        new Assert\Email()   
        ]);
    if(count($violations) > 0){
        echo "Incorrect email!:$email \n";    
        }
    }
    
    public function validationPassword($password){
    $validator = Validation::createValidator();
    $violations = $validator ->validate($password,[
        new Assert\NotBlank(),
        new Assert\Length(min:4,max:15),
        new Assert\Regex(pattern:'/^\w+$/i'),
        ]);
     if(count($violations) > 0){
        echo "Incorrect password!:$password \n";    
        }
    }
        

    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getCreationDAte(): DateTime
    {
        return $this->creationDate = new DateTime();
    }
}


