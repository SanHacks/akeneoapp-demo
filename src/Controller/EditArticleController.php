<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class EditArticleController
{
    #[Route('articles/edit/{id}',
        name: 'edit_article',
        condition: "params['id'] < 1000"
    )]
    public function editArticle(int $id): Response
    {
        $mockData = [
            'productID' => 1,
            'productName' => 'Product 1',
            'productPrice' => 100,
            'productQuantity' => 10,
            'productDescription' => 'Description 1',
            'productImage' => 'image1.jpg',
            'productCategory' => 'Category 1',
            'productStatus' => 'Available'
        ];

        $body = [
            'status' => 200,
            'data' => [
                'article' => $mockData
            ]
        ];

        $body = json_encode($body);

        return new Response($body);
    }

}