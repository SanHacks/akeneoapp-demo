<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class EditArticleController
{
    #[Route('articles/edit')]
    public function editArticle(): Response
    {
        $content = 'Edit Article';
        $body = '<body>'.$content.'</body>';
        return new Response($body);
    }

}