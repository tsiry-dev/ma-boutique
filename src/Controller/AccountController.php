<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AccountController extends AbstractController
{
    #[Route('/account', name: 'app_account')]
    public function index(): Response
    {
        return $this->render('pages/account/index.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }

    #[Route('/account/order', name: 'account.order')]
    public function order(): Response
    {
        return $this->render('pages/account/order.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }

    #[Route('/account/address', name: 'account.address')]
    public function address(): Response
    {
        return $this->render('pages/account/address.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }

    #[Route('/account/security', name: 'account.security')]
    public function security(): Response
    {
        return $this->render('pages/account/security.html.twig', []);
    }
}
