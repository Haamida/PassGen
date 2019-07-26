<?php


namespace App\Controller\Utility;


use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Csrf\CsrfTokenManager as CsrfTokenManagerAlias;
use Symfony\Component\Security\Csrf\TokenGenerator\UriSafeTokenGenerator;
use Symfony\Component\Security\Csrf\TokenStorage\SessionTokenStorage;
use Symfony\Component\Validator\Validation;

class Utilities
{
    /**
     * Create a csrf Manager to use for Forms CSRF Protection
     * @return CsrfTokenManagerAlias
     */
    public static function createCsrfManager(): CsrfTokenManagerAlias
    {
       $session = new Session();
       $csrfGenerator = new UriSafeTokenGenerator();
       $csrfStorage = new SessionTokenStorage($session);
       $csrfManager = new CsrfTokenManagerAlias($csrfGenerator, $csrfStorage);
       return $csrfManager;
   }
   public static function createValidator(){
       $vendorDirectory = realpath(__DIR__.'/../vendor');
       $vendorFormDirectory = $vendorDirectory.'/symfony/form';
       $vendorValidatorDirectory = $vendorDirectory.'/symfony/validator';

// creates the validator - details will vary
       $validator = Validation::createValidator();
       return $validator;
   }
}