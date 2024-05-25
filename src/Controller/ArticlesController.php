<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{
    #[Route('articles/list')]
    public function articles(): Response
    {
        //Akeneo Articles Go Here
        $articles = [
            'Article 1',
            'Article 2',
            'Article 3',
            'Article 4',
            'Article 5',
            'Article 6'
        ];
        $count = count($articles);

        return $this->render('articles_list.html.twig', [
            'count' => $count
        ]);
    }
}