<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SaveArticleController
{
    #[Route('articles/save')]
    public function saveArticle(): Response
    {
        return new Response('Saved');
    }

}