<?php

namespace Users;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

Class User{
    function __construct(private int $id,private string $name,private string $email,private string $password){
    $this->id = $id;
    $this->validation_id($id);
    
    $this->name = $name;
    $this->validation_name($name);
    
    $this->email = $email;
    $this->validation_email($email);

    $this->password = $password;
    $this->validation_password($password);   

    }
        
    public function validation_id($id){
    $validator = Validation::createValidator();
    $violations = $validator ->validate($id,[
        new Assert\NotBlank(),
        new Assert\NotNull(),
        new Assert\Positive()
        new Assert\Range(min:999,max:1999),
        ]);
    if (count($violations) > 0 ){
        echo 'Incorrect id!:$id \r\n'
        }
    
    }
    
    public function validation_name($name){
    $validator = Validation::createValidator();
    $violations = $validator ->validate($name,[
        new Assert\NotBlank(),
        new Assert\Length(min:2,max:10),
        new Assert\Regex(pattern:'/^[A-Z][a-z]+$/i')
        ]);
    if(count($violations) > 0){
        echo 'Incorrect name!:$name \r\n'
        }   
    
    public function validation_email($email){
    $validator = Validation::createValidator();
    $violations = $validator ->validate($email,[
        new Assert\NotBlank(),
        new Assert\Email()   
        ]);
    if(count($violations) > 0){
        echo 'Incorrect email!:$email \r\n'    
        }
    }
    
    public function validation_pass($password){
    $validator = Validation::createValidator();
    $violations = $validator ->validate($password,[
        new Assert\NotBlank()
        new Assert\Length(min:4,max:15)
        new Assert\Regex(pattern:'/^\w+$/i')
])
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
}
