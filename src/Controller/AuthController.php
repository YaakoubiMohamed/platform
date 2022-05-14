<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Repository\UserRepository;
use Firebase\JWT\JWT;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AuthController extends AbstractController
{
    private $userPasswordHasherInterface;

    public function __construct (UserPasswordHasherInterface $userPasswordHasherInterface) 
    {
        $this->userPasswordHasherInterface = $userPasswordHasherInterface;
    }
    
    /**
     * @Route("/api/register", name="register", methods={"POST"})     
     */
    public function register(Request $request): JsonResponse
    {
        //$email = "ok";
       // dd($email);
        $password = $request->get('password');
        $email = $request->get('email');
        $data = json_decode($request->getContent(), true);
        //dd($data['email']);
        $user = new User();
        $user->setPassword(
            $this->userPasswordHasherInterface->hashPassword(
                $user, $data['password']
            )
        );
        $user->setEmail($data['email']);
        $user->setNom($data['nom']);
        $user->setPrenom($data['prenom']);
        $user->setTelephone($data['telephone']);
        $user->setAdresse($data['adresse']);
        $user->setCodepostal($data['codepostal']);
        $user->setVille($data['ville']);
        $user->setRoles($data['roles']);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        return $this->json([
            'user' => $user
        ]);
    }

    /**
     * @Route("/api/login", name="login", methods={"POST"})     
     */
    public function login(Request $request): JsonResponse
    {
        $email = "ok";
        dd($email);
    }
    
}
