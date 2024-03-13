<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserFormType;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StoreUserController extends AbstractController
{
    public function __construct(
        public EventDispatcherInterface $eventDispatcherInterface, 
        public UserService $userService
    ) {
        // 
    }

    #[Route('/', name: 'app_index', methods: ['GET', 'POST', 'HEAD'])]
    public function __invoke(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserFormType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user = $this->userService->storeUser($form->getData());
            $this->addFlash('success', 'User Created Successfully!');
            return $this->redirectToRoute('app_index');
        }

        return $this->render('store_user/index.html.twig', [
            'newUserForm' => $form->createView(),
        ]);
    }

}
