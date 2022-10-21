<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\RoomParameter;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;


  
class AdminController extends AbstractController
{

    

    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        $room = $this->getDoctrine()->getRepository(RoomParameter::class)->findOneBy(['id' => 1]);

        return $this->render('admin/index.html.twig', [
            'room' => $room,
        ]);
    }

    /**
     * @Route("/manageusers", name="manageusers")
     */
    public function manageusers()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();



        return $this->render('admin/manageusers.html.twig', [
            'users' => $users,
        ]);
    }



    /**
     * @Route("/deleteuser", name="deleteuser")
     */
    public function deleteuser(EntityManagerInterface $entityManager)
    {   
        if (isset($_GET)) {
            $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['id' => $_GET['id_user']]);
            if (!$user) {
                throw $this->createNotFoundException(
                    'No User found for id '.$_GET['id_user']
                );
            }
            $entityManager->remove($user);
            $entityManager->flush();
            die();
        }
    }




    /**
     * @Route("/createnewuser", name="createnewuser")
     */
    public function createnewuser(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $roles[] = 'ROLE_USER';
            $user->setRoles($roles);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('manageusers');
        }

        

        return $this->render('admin/createnewuser.html.twig', [
            'form' => $form->createView(),
        ]);
    }


}
